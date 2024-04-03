<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \Firebase\JWT\JWT;



class LoginController extends Controller
{
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Le champ email est important',
            'email.email' => 'Veuillez entrer une adresse email valide',
            'password.required' => 'Le champ mot de passe est important',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid email or password'], 404);

        }

        $payload = [
            'iss' => $_SERVER['HTTP_HOST'],
            'iat' => time(),
            'id' => $user->id,
        ];

        $jwt = JWT::encode($payload, $_ENV['JWT_SECRET'], $_ENV['JWT_ALGO']);
        return response()->json(['token' => $jwt], 200);


    }
}
