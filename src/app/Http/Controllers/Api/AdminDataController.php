<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;

class AdminDataController extends Controller
{
    public function index(Request $request)
    {
        $admin = auth('user-api')->user();

        if (!$admin) {
            Log::warning('Token rechazado o expirado');
            return response()->json(['error' => 'Token inválido'], 401);
        }

        Log::info('Petición a lista de admins', ['user' => auth()->user()]);

        $query = Admin::query();

        // Filtro de búsqueda
        $search = $request->input('search.value');
        if ($search) {
            $query->where('name', 'LIKE', "%$search%")
                  ->orWhere('email', 'LIKE', "%$search%");
        }

        $total = Admin::count();
        $filtered = $query->count();

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $admins = $query->skip($start)->take($length)->get();

        $locale = app()->getLocale();

        $data = $admins->map(function ($admin) use ($locale) {
            $actions = view('components.actions.admin-actions', compact('admin', 'locale'))->render();

            return [
                'name' => $admin->name,
                'email' => $admin->email,
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


