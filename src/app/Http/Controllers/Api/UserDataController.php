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
        Log::info('---------------------Entrando a /api/admin/users');
        return response()->json(['ok' => true]);
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

        $data = $users->map(function ($user) use ($locale) {
            $actions = view('components.actions.user-actions', compact('user', 'locale'))->render();

            return [
                'name' => $user->name,
                'email' => $user->email,
                'actions' => $actions,
            ];
        });

        return response()->json([
            'draw' => (int) $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);
    }


}


