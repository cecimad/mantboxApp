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

    public function users(Request $request)
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
            $users = $data['data']['users'] ?? [];
            return view('/users', compact('users'));
        } else {
            // Si la solicitud de perfil falla, regresa con un mensaje de error.
            //return back()->withErrors(['message' => $data['message']]);
            $users = $data['data']['users'] ?? [];
            return view('/users', compact('users'));
        }
    }

    public function create()
    {
        return view('user');
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
        ])->post($url . '/?', [
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

        return redirect()->route('users');
    }

    public function passwordRecovery(Request $request)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        $response = Http::post($url . '/password/email', [
            'email' => $request->input('email') // Asegúrate de obtener el email correctamente
        ]);

        $data = $response->json();

        if (isset($data['success']) && $data['success']) {
            // Si la solicitud es exitosa, redirige a la vista de login con un mensaje de éxito.
            return redirect()->route('login')->with('success', 'Correo de recuperación enviado. Sigue las instrucciones para continuar.');
        } else {
            // Si la solicitud falla, regresa con un mensaje de error.
            return back()->withErrors(['message' => $data['message']]);
        }
    }

    public function password_Recovery()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        return view('/password_recovery');
        // $response = Http::post($url . '/password/email', [
        //     'email' => $request->input('email') // Asegúrate de obtener el email correctamente
        // ]);

        // $data = $response->json();

        // if (isset($data['success']) && $data['success']) {
        //     // Si la solicitud es exitosa, redirige a la vista de login con un mensaje de éxito.
        //     return redirect()->route('login')->with('success', 'Correo de recuperación enviado. Sigue las instrucciones para continuar.');
        // } else {
        //     // Si la solicitud falla, regresa con un mensaje de error.
        //     return back()->withErrors(['message' => $data['message']]);
        // }
    }


    public function update(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'rol' => 'required|array',
            'rol.*' => 'exists:roles,name', // Asegúrate de que los roles existan en la tabla roles
        ]);

        // Obtener el token de la sesión
        $bearerToken = session('bearer_token');

        // URL del servidor API desde el archivo .env, con un valor por defecto
        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        try {
            $data = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'roles' => $validated['rol'],
            ];

            // Solo incluir la contraseña si se proporciona
            if (!empty($validated['password'])) {
                $data['password'] = $validated['password'];
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->put($url . '/users/' . $validated['id'], $data);

            if ($response->successful()) {
                // Redirigir a la ruta 'users' si la solicitud es exitosa
                return redirect()->route('users');
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
        // Lógica para eliminar el user con el ID proporcionado
        // Por ejemplo:
        // User::find($id)->delete();
        return redirect()->route('users')->with('success', 'user eliminado correctamente');
    }

    public function getUser($id)
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
            ])->get($url . '/users/' . $id);

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
