<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserDataController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Filtro por búsqueda
        if ($search = $request->input('search.value')) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        }

        $total = $query->count();

        $users = $query->offset($request->input('start'))
                       ->limit($request->input('length'))
                       ->get();


        $data = $users->map(function ($user) {
            return [
                'name' => $user->name,
                'email' => $user->email,
                'actions' => view('components.actions.user-actions', compact('user'))->render(),
            ];
        });

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $data,
        ]);

    }
}



