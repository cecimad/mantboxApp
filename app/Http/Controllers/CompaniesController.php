<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CompaniesController extends Controller
{
    //
    public function getCompanies(Request $request)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        // Obtener el token de la sesión (esto puede variar dependiendo de cómo manejes la autenticación y el token)
        $bearerToken = $request->session()->get('bearer_token');

        // Hacer la solicitud a la API para obtener las companies
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get($url . '/companies');

        $data = $response->json();

        if ($response->successful()) {
            // Si la solicitud es exitosa, obtener las companies y mostrar la vista
            $companies = $data['data']['companies'] ?? [];
            return view('companies', compact('companies'));
        } else {
            // Si hay un error, manejarlo adecuadamente (por ejemplo, redirigir o mostrar un mensaje de error)
            //$error_message = $data['message'] ?? 'Error al obtener las companies.';
            //return back()->withErrors(['message' => $error_message]);

            $companies = $data['data']['companies'] ?? [];
            return view('companies', compact('companies'));
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

        return redirect()->route('companies');
    }

    public function update(Request $request)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'id' => 'required|exists:companies,id',
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
            ])->post($url . '/companies/' . $validated['id'], [
                'name' => $validated['name'],
                'address' => $validated['address'],
                'phone' => $validated['phone'],
            ]);

            if ($response->successful()) {
                // Redirigir a la ruta 'companies' si la solicitud es exitosa
                return redirect()->route('companies');
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

        // Redireccionar a la ruta 'companies' si la eliminación fue exitosa
        return redirect()->route('companies')->with('success', 'Empresa eliminada correctamente');
    }

    public function selectEmpresa($id)
    {
        if (!is_numeric($id)) {
            abort(400, 'Invalid ID supplied');
        }

        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        // Obtener el token de la sesión
        $bearerToken = session('bearer_token');
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken, // Incluir el token de portador en el encabezado Authorization
            ])->put($url . '/select-company', [
                'company_id' => $id
            ]);

            // Verificar si la solicitud fue exitosa
            $response->throw(); // Lanza una excepción si la solicitud no fue exitosa

        } catch (\Throwable $e) {
            // Capturar errores de la solicitud HTTP
            $errorMessage = $e->getMessage();
            return redirect()->back()->withErrors([$errorMessage])->withInput();
        }

        // Verificar el estado de la respuesta HTTP
        if ($response->successful()) {
            // Redireccionar a la ruta 'companies' si la selección fue exitosa
            return redirect()->route('companies')->with('success', 'Empresa seleccionada correctamente');
        } else {
            // Manejar caso de respuesta no exitosa
            $errorResponse = $response->json(); // Obtener el cuerpo de la respuesta JSON si hay errores específicos
            $errorMessage = $errorResponse['message'] ?? 'Error al seleccionar la empresa';
            return redirect()->back()->withErrors([$errorMessage])->withInput();
        }
    }
}
