<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class AdminAuthController extends Controller
{


    public function showLoginForm()
    {
        return view('frontoffice.auth.adminform');
    }


    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email','password');;

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.manage.dashboard')->with('success', 'Inicio de sesión exitoso.');
        }

        return back()->with('error', 'Correo o contraseña incorrectos.');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
