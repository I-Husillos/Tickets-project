<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Requests\RegisterUserRequest;


class AuthController extends Controller
{
    // Registro
    public function register(RegisterUserRequest $request)
    {
        $validated = $request->validated();


        if ($validated->fails()) {
            return response()->json($validated->errors(), 422);
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('API Token')->accessToken;

        return response()->json([
            'user'  => $user,
            'token' => $token,
        ]);
    }

    // Login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Usa el guard correcto (por defecto es 'web')
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'error' => 'Unauthorized'
            ], 401);
        }

        $user = Auth::user(); // o tu modelo admin si tienes guard personalizado

        return response()->json([
            'token_type' => 'Bearer',
            'access_token' => $user->createToken('admin-session-token')->accessToken
        ]);
    }

    // Obtener usuario autenticado
    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}


