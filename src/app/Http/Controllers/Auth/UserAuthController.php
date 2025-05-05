<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\EventHistory;

class UserAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('frontoffice.auth.login');
    }


    public function login(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email','password');

        if(Auth::guard('user') -> attempt($credentials))
        {
            return redirect()->route('user.tickets.index');
        }

        return back()->with('error', 'Correo o contraseña incorrectos. Por favor, inténtalo de nuevo.');
    }


    public function showRegisterForm()
    {
        return view('frontoffice.auth.register');
    }


    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed',
        ], [
            'email.unique' => 'Este correo ya está registrado. Por favor, inicia sesión o usa otro correo.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);
        

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);


        EventHistory::create([
            'event_type' => 'Registro',
            'description' => 'Nuevo usuario registrado',
            'user' => $validated['name'],
        ]);

        Auth::guard('user')->login($user);

        return redirect()->route('user.tickets.index')->with('success', '¡Registro exitoso! Bienvenido/a.');
    }

    public function logOut()
    {
        Auth::guard('user')->logout();

        return redirect()->route('login');
    }
}
