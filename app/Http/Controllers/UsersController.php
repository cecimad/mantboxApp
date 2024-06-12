<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

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

    public function create()
    {
        return view('usuario');
    }

    public function logout(Request $request)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        // Obtener el token de la sesión
        $bearerToken = session('bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken, // Incluir el token de portador en el encabezado Authorization
        ])->get($url . '/logout');

        $data = $response->json();

        if ($data['success']) {
            // Si la solicitud de perfil es exitosa, carga la vista de perfil con los datos.
            return view('/login', compact('data'));
        } else {
            // Si la solicitud de perfil falla, regresa con un mensaje de error.
            return back()->withErrors(['message' => $data['message']]);
        }
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'rol' => 'required|array',
            'rol.*' => 'string|in:super-admin,admin,supervisor,user', // Validar roles permitidos
        ]);

        // Obtener el token de la sesión
        $bearerToken = session('bearer_token');

        // URL del servidor API desde el archivo .env, con un valor por defecto
        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        // Realizar la solicitud HTTP POST con el token de autorización
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->post($url . '/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
            'roles' => $request->rol
        ]);

        // Manejo de errores
        if ($response->failed()) {

            $responseData = $response->json();
            $errors = $responseData['message'] ?? ['Unknown error occurred'];

            return redirect()->back()->withErrors($errors)->withInput();
        }

        return redirect()->route('usuarios');
    }






    // public function store(Request $request)
    // {
    //     $url = env('URL_SERVER_API', 'http://127.0.0.1');
    //     // Obtener el token de la sesión
    //     $bearerToken = session('bearer_token');

    //     $response = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . $bearerToken, // Incluir el token de portador en el encabezado Authorization
    //     ])->post($url . '/register', [
    //         'name' => $request->input('name'),
    //         'email' => $request->input('email'),
    //         'password' => $request->input('password'),
    //         'password_confirm' => $request->input('password_confirm'),
    //         'rol' => $request->input('rol')
    //     ]);

    //     $data = $response->json();
    //     if ($data['success']) {
    //         // Si la creación del usuario es exitosa, redirige a la vista de usuarios
    //         return response()->json(['success' => true, 'data' => $data]);
    //     } else {
    //         // Si la creación del usuario falla, regresa con mensajes de error específicos.
    //         $errors = [];
    //         if (isset($data['message']['email'])) {
    //             $errors['email'] = $data['message']['email'][0];
    //         }
    //         if (isset($data['message']['password'])) {
    //             $errors['password'] = $data['message']['password'][0];
    //         }
    //         if (empty($errors)) {
    //             $errors['message'] = $data['message'];
    //         }
    //         return response()->json(['success' => false, 'message' => $errors]);
    //     }
    // }

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
