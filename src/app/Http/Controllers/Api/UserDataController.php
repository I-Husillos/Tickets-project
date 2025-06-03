<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserDataController extends Controller
{
    public function index(Request $request)
    {
        if (!auth('api')->check()) {
            Log::warning('Token rechazado o expirado');
            return response()->json(['error' => 'Token inválido'], 401);
        }


        if (!auth('api')->check()) {
            Log::warning('Token inválido');
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }
        

        $admin = auth('api')->user();
        Log::info('Admin autenticado', ['id' => $admin->id]);
        

        
        Log::info('Usuario autenticado:', ['user' => auth()->user()]);

        
        $query = User::query();

        // Filtros y paginación
        $search = $request->input('search.value');
        if ($search) {
            $query->where('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%");
        }

        $total = User::count();
        $filtered = $query->count();

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $users = $query->skip($start)->take($length)->get();

        $locale = app()->getLocale(); // o desde la request si viene con ?locale=es

        return response()->json([
            'draw' => (int) $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $users->map(function ($user) use ($locale) {
                return [
                    'name' => $user->name,
                    'email' => $user->email,
                    'actions' => view('components.actions.user-actions', compact('user', 'locale'))->render(),
                ];  
            }),
        ]);
    }


}


