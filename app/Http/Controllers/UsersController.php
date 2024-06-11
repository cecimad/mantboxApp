<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function index2()
    {
        return view('login2');
    }
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::post($url . '/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        $data = $response->json();
        if ($data['success']) {
            // Almacenar el token en la sesión
            session(['bearer_token' => $data['data']['token']]);
            session(['userName' => $data['data']['user']['name']]);
            session(['userEmail' => $data['data']['user']['email']]);
            // Si el inicio de sesión es exitoso, redirige a la vista del dashboard con los datos.
            return view('/dashboard', compact('data'));
        } else {
            // Si el inicio de sesión falla, regresa al formulario de inicio de sesión con un mensaje de error específico.
            if (isset($data['message']['email'])) {
                // Si hay un error específico en el correo electrónico, muestra ese mensaje.
                return back()->withErrors(['email' => $data['message']['email'][0]]);
            } elseif (isset($data['message']['password'])) {
                // Si hay un error específico en la contraseña, muestra ese mensaje.
                return back()->withErrors(['password' => $data['message']['password'][0]]);
            } else {
                // De lo contrario, muestra el mensaje general de error devuelto por la API.
                return back()->withErrors(['message' => $data['message']]);
            }
        }
    }


    public function usuarios(Request $request)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        // Obtener el token de la sesión
        $bearerToken = session('bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken, // Incluir el token de portador en el encabezado Authorization
        ])->get($url . '/users');

        $data = $response->json();

        if ($data['success']) {
            // Si la solicitud de perfil es exitosa, carga la vista de perfil con los datos.
            return view('/usuarios', compact('data'));
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
        return redirect()->route('usuarios')->with('success', 'Usuario eliminado correctamente');
    }
}


    // public function index(){
    //     $url = env('URL_SERVER_API', 'http://127.0.0.1');
    //     $response = Http::post($url.'/login', [
    //         'email' => 'ana.madrid@unison.mx',
    //         'password' => '12345678'
    //     ]);
    //     $data = $response->json();
    //     return view('dashboard', compact('data'));
    // }
