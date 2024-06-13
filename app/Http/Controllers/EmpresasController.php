<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmpresasController extends Controller
{
    //
    public function getEmpresas(Request $request)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        // Obtener el token de la sesión
        $bearerToken = session('bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken, // Incluir el token de portador en el encabezado Authorization
        ])->get($url . '/companies');

        $data = $response->json();

        if ($data['success']) {
            // Si la solicitud de perfil es exitosa, carga la vista de perfil con los datos.
            // Verifica si hay empresas, si no, asigna un arreglo vacío
            $companies = $data['data']['companies'] ?? [];
            return view('/empresas', compact('companies'));
        } else {
            // Si la solicitud de perfil falla, regresa con un mensaje de error.
            //return back()->withErrors(['message' => $data['message']]);
            $companies = $data['data']['companies'] ?? [];
            return view('/empresas', compact('companies'));
        }
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // Obtener el token de la sesión
        $bearerToken = session('bearer_token');

        // URL del servidor API desde el archivo .env, con un valor por defecto
        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        // Realizar la solicitud HTTP POST con el token de autorización
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->post($url . '/companies', [
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        // Manejo de errores
        if ($response->failed()) {
            $responseData = $response->json();
            $errors = $responseData['message'] ?? ['Unknown error occurred'];

            return redirect()->back()->withErrors($errors)->withInput();
        }

        return redirect()->route('empresas');
    }

    public function update(Request $request)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'id' => 'required|exists:empresas,id',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // Obtener el token de la sesión
        $bearerToken = session('bearer_token');

        // URL del servidor API desde el archivo .env, con un valor por defecto
        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->put($url . '/companies/' . $validated['id'], [
                'name' => $validated['name'],
                'address' => $validated['address'],
                'phone' => $validated['phone'],
            ]);

            if ($response->successful()) {
                // Redirigir a la ruta 'empresas' si la solicitud es exitosa
                return redirect()->route('empresas');
            } else {
                // Manejar otro tipo de respuesta (opcional)
                return response()->json([
                    'error' => 'Error al actualizar el usuario',
                    'status' => $response->status(),
                    'response' => $response->json()
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al actualizar el usuario: ' . $e->getMessage()
            ], 500);
        }
    }

    // Método en CompanyController
    public function edit($id)
    {
    }

    public function destroy($id)
    {
        // Verificar si el ID proporcionado es numérico
        if (!is_numeric($id)) {
            abort(400, 'Invalid ID supplied');
        }
    
        // Lógica para eliminar el recurso en el servidor API
        $bearerToken = session('bearer_token');
    
        // URL del servidor API desde el archivo .env, con un valor por defecto
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
    
        try {
            // Realizar la solicitud HTTP DELETE con el token de autorización
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->delete($url . '/companies/' . $id);
    
            // Verificar si la solicitud fue exitosa
            $response->throw(); // Lanza una excepción si la solicitud no fue exitosa
    
        } catch (\Throwable $e) {
            // Capturar errores de la solicitud HTTP
            $errorMessage = $e->getMessage();
            return redirect()->back()->withErrors([$errorMessage])->withInput();
        }
    
        // Redireccionar a la ruta 'empresas' si la eliminación fue exitosa
        return redirect()->route('empresas')->with('success', 'Empresa eliminada correctamente');
    }
    
}
