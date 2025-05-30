<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;

class AdminAuthController extends Controller
{


    public function redirectToLogin(Request $request)
    {
        $locale = $request->route('locale') ?? app()->getLocale();

        if (auth('admin')->check()) {
            return redirect()->route('admin.dashboard', ['locale' => $locale]);
        }

        return redirect()->route('admin.login', ['locale' => $locale]);
    }

    public function showLoginForm()
    {
        return view('auth.adminform');
    }


    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();

            $token = $admin->createToken('admin-session-token')->accessToken;

            Log::info('Login exitoso para: ' . $credentials['email']);
            return redirect()
                ->route('admin.manage.dashboard', ['locale' => app()->getLocale()])
                ->with('success', 'Inicio de sesión exitoso.')
                ->with('token', $token);
        }
    
        Log::error('Login fallido para: ' . $credentials['email']);
        
    
        return back()->with('error', 'Correo o contraseña incorrectos.');
    }
    
    

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login', ['locale' => app()->getLocale()]);
    }
}
