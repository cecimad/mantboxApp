<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Socialite;

class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        $googleUser = Socialite::driver('google')->user();
        // Obteniendo el token de acceso
        $token = $googleUser->token;
        // Mostrar el token
        // dd($googleUser);

        $url = env('URL_SERVER_API', 'http://localhost:8000');

        // Construyendo la URL con los parámetros de la solicitud
        $response = Http::post($url . '/login/callback', [
            'provider' => 'google',
            'access_provider_token' => $token,
            'roles' => ['admin']
        ]);

        // Procesando la respuesta
        $data = $response->json();
        if ($data['success']) {
            // Si la solicitud de perfil es exitosa, carga la vista de dashboard con los datos.
            session(['bearer_token' => $data['data']['token']]);
            session(['userName' => $data['data']['user']['name']]);
            session(['userEmail' => $data['data']['user']['email']]);
            return view('/dashboard', compact('data'));
        } else {
            // Si la solicitud de perfil falla, regresa con un mensaje de error.
            return back()->withErrors(['message' => $data['message']]);
        }
    }
}
