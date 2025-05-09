<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;

use App\Models\User;
use App\Models\EventHistory;

class UserAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('frontoffice.auth.login');
    }


    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email','password');

        if(Auth::guard('user') -> attempt($credentials))
        {
            return redirect()->route('user.tickets.index', ['locale' => app()->getLocale()])->with('success', 'Inicio de sesión exitoso.');
        }

        return back()->with('error', 'Correo o contraseña incorrectos. Por favor, inténtalo de nuevo.');
    }


    public function showRegisterForm()
    {
        return view('frontoffice.auth.register');
    }


    public function register(RegisterUserRequest $request)
    {
        $validated = $request->validated();
        

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);


        EventHistory::create([
            'event_type' => 'Registro',
            'description' => 'Nuevo usuario registrado',
            'user' => $validated['name'],
        ]);

        Auth::guard('user')->login($user);

        return redirect()->route('user.tickets.index', ['locale' => app()->getLocale()])->with('success', '¡Registro exitoso! Bienvenido/a.');
    }

    public function logOut()
    {
        Auth::guard('user')->logout();
        session()->forget('url.intended');
        return redirect()->route('login', ['locale' => app()->getLocale()]);
    }
}
