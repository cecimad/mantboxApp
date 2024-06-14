<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MantenimientosController extends Controller
{
    //
    public function getMantenimientos(Request $request)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        // Obtener el token de la sesión
        $bearerToken = session('bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken, // Incluir el token de portador en el encabezado Authorization
        ])->get($url . '/maintenance-types');

        $data = $response->json();
        return view('/mantenimientos');
        // if ($data['success']) {
        //     // Si la solicitud de perfil es exitosa, carga la vista de perfil con los datos.
        //     // Verifica si hay empresas, si no, asigna un arreglo vacío
        //     $equipments = $data['data']['equipments'] ?? [];
        //     return view('/mantenimientos', compact('equipments'));
        // } else {
        //     // Si la solicitud de perfil falla, regresa con un mensaje de error.
        //     //return back()->withErrors(['message' => $data['message']]);
        //     $equipments = $data['data']['equipments'] ?? [];
        //     return view('/equipos', compact('equipments'));
        // }
    }

    public function store(){}
    public function update(){}

}
