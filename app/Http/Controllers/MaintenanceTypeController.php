<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MaintenanceTypeController extends Controller
{
    //
    public function getMaintenanceType(Request $request)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        // Obtener el token de la sesión
        $bearerToken = session('bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken, // Incluir el token de portador en el encabezado Authorization
        ])->get($url . '/maintenance-types');

        $data = $response->json();
        //return view('/maintenanceType');
        if ($data['success']) {
            // Si la solicitud de perfil es exitosa, carga la vista de perfil con los datos.
            // Verifica si hay empresas, si no, asigna un arreglo vacío
            $maintenanceTypes = $data['data']['Tipos'] ?? [];
            return view('/maintenanceType', compact('maintenanceTypes'));
        } else {
            // Si la solicitud de perfil falla, regresa con un mensaje de error.
            //return back()->withErrors(['message' => $data['message']]);
            $maintenanceTypes = $data['data']['Tipos'] ?? [];
            return view('/maintenanceType', compact('maintenanceTypes'));
        }
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'type_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        // Obtener el token de la sesión
        $bearerToken = session('bearer_token');

        // URL del servidor API desde el archivo .env, con un valor por defecto
        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        try {
            // Realizar la solicitud HTTP POST con el token de autorización
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->post($url . '/maintenance-types', [
                'type_name' => $validatedData['type_name'],
                'description' => $validatedData['description']
            ]);
            //dd($response);
            // Manejo de errores
            if ($response->failed()) {
                $responseData = $response->json();
                $errors = $responseData['message'] ?? ['Ha ocurrido un error'];

                return redirect()->back()->withErrors($errors)->withInput();
            }

            // Redirigir a la ruta de tipos de mantenimiento con un mensaje de éxito
            return redirect()->route('maintenanceType')->with('success', 'Tipo de Mantenimiento creado exitosamente.');
        } catch (\Exception $e) {
            // Capturar errores de la solicitud HTTP y redirigir con un mensaje de error
            return redirect()->back()->withErrors(['Ha ocurrido un error: ' . $e->getMessage()])->withInput();
        }
    }

    public function update(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'id' => 'required|exists:maintenance_types,id',
            'type_name' => 'required|string|max:255',
            'description' => 'required|string|max:500'
        ]);

        // Obtener el token de la sesión
        $bearerToken = session('bearer_token');

        // URL del servidor API desde el archivo .env, con un valor por defecto
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000');

        try {
            // Construir la URL con los parámetros de consulta
            $apiUrl = $url . '/maintenance-types/' . $validated['id'] .
                '?type_name=' . urlencode($validated['type_name']) .
                '&description=' . urlencode($validated['description']);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->put($apiUrl);

            if ($response->successful()) {
                // Redirigir a la ruta 'maintenanceType' si la solicitud es exitosa
                return redirect()->route('maintenanceType')->with('success', 'Tipo de Mantenimiento actualizado correctamente.');
            } else {
                // Manejar otro tipo de respuesta (opcional)
                return response()->json([
                    'error' => 'Error al actualizar el Tipo de Mantenimiento',
                    'status' => $response->status(),
                    'response' => $response->json()
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al actualizar el Tipo de Mantenimiento: ' . $e->getMessage()
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
            ])->delete($url . '/maintenance-types/' . $id);

            // Verificar si la solicitud fue exitosa
            $response->throw(); // Lanza una excepción si la solicitud no fue exitosa

        } catch (\Throwable $e) {
            // Capturar errores de la solicitud HTTP
            $errorMessage = $e->getMessage();
            return redirect()->back()->withErrors([$errorMessage])->withInput();
        }

        // Redireccionar a la ruta 'equipments' si la eliminación fue exitosa
        return redirect()->route('maintenanceType')->with('success', 'Tipo de Mantenimiento eliminado correctamente');
    }
}
