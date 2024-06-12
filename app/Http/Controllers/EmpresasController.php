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
            return view('/empresas', compact('data'));
        } else {
            // Si la solicitud de perfil falla, regresa con un mensaje de error.
            return back()->withErrors(['message' => $data['message']]);
        }
    }

    

    public function edit($id)
    {
        // Lógica para editar el usuario con el ID proporcionado
    }

    public function destroy($id)
    {
        // Lógica para eliminar el usuario con el ID proporcionado
        // Por ejemplo:
        // User::find($id)->delete();
        return redirect()->route('empresas')->with('success', 'Empresa eliminada correctamente');
    }
}
