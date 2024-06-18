<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EquiposController extends Controller
{
    //
    public function getEquipos(Request $request)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        // Obtener el token de la sesión
        $bearerToken = session('bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken, // Incluir el token de portador en el encabezado Authorization
        ])->get($url . '/equipments');

        $data = $response->json();
        
        if ($data['success']) {
            // Si la solicitud de perfil es exitosa, carga la vista de perfil con los datos.
            // Verifica si hay empresas, si no, asigna un arreglo vacío
            $equipments = $data['data']['equipos'] ?? [];

            return view('/equipos', compact('equipments'));
        } 
        else {
            // Si la solicitud de perfil falla, regresa con un mensaje de error.
            //return back()->withErrors(['message' => $data['message']]);
            $equipments = $data['data']['equipments'] ?? [];
            return view('/equipos', compact('equipments'));
        }
    }

    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:100',
        'description' => 'required|string|max:500',
        'installation_date' => 'required|date',
        'location' => 'required|string|max:255',
    ]);

    // Obtener el token de la sesión
    $bearerToken = session('bearer_token');

    // URL del servidor API desde el archivo .env, con un valor por defecto
    $url = env('URL_SERVER_API', 'http://127.0.0.1');

    // Realizar la solicitud HTTP POST con el token de autorización
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $bearerToken,
    ])->post($url . '/equipments', [
        'name' => $request->name,
        'code' => $request->code,
        'description' => $request->description,
        'installation_date' => $request->installation_date,
        'location' => $request->location,
    ]);

    // Manejo de errores
    if ($response->failed()) {
        $responseData = $response->json();
        $errors = $responseData['message'] ?? ['Unknown error occurred'];

        return redirect()->back()->withErrors($errors)->withInput();
    }

    return redirect()->route('equipos');
}

    public function update(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'id' => 'required|exists:equipos,id',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'installation_date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        // Obtener el token de la sesión
        $bearerToken = session('bearer_token');

        // URL del servidor API desde el archivo .env, con un valor por defecto
        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->post($url . '/equipments/' . $validated['id'], [
                'name' => $validated['name'],
                'code' => $validated['code'],
                'description' => $validated['description'],
                'installation_date' => $validated['installation_date'],
                'location' => $validated['location'],
            ]);

            if ($response->successful()) {
                // Redirigir a la ruta 'empresas' si la solicitud es exitosa
                return redirect()->route('equipos');
            } else {
                // Manejar otro tipo de respuesta (opcional)
                return response()->json([
                    'error' => 'Error al actualizar el equipo',
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

}
