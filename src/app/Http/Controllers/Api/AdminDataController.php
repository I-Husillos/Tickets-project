<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;

class AdminDataController extends Controller
{
    public function indexAdmins(Request $request)
    {
        $admin = auth('api')->user();

        if (!$admin) {
            Log::warning('Token rechazado o expirado');
            return response()->json(['error' => 'Token inválido'], 401);
        }

        $query = Admin::query();

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

        $locale = $request->header('X-Locale') ?? $request->input('locale') ?? 'en';
        App::setLocale($locale);

        $data = $admins->map(function ($admin) use ($locale) {
            $editUrl = url("/$locale/" . trans('routes.admin.admins.edit', [], $locale));
            $editUrl = str_replace('{admin}', $admin->id, $editUrl);

            $deleteUrl = url("/$locale/" . trans('routes.admin.admins.confirm_delete', [], $locale));
            $deleteUrl = str_replace('{admin}', $admin->id, $deleteUrl);

            return [
                'name' => $admin->name,
                'email' => $admin->email,
                'actions' => view('components.actions.admin-actions', [
                    'editUrl' => $editUrl,
                    'deleteUrl' => $deleteUrl,
                ])->render(),
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


