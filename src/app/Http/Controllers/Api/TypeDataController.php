<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Support\Facades\App;

class TypeDataController extends Controller
{
    public function indexTypes(Request $request)
    {
        $locale = $request->header('X-Locale') ?? $request->input('locale') ?? 'en';
        App::setLocale($locale);

        $query = Type::query();

        $search = $request->input('search.value');
        if ($search) {
            $query->where('name', 'LIKE', "%$search%")
                  ->orWhere('description', 'LIKE', "%$search%");
        }

        $total = Type::count();
        $filtered = $query->count();

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $types = $query->skip($start)->take($length)->get();

        $data = $types->map(function ($type) use ($locale) {
            $editUrl = url("/$locale/types/edit/" . $type->id);
            $deleteUrl = url("/$locale/types/delete/" . $type->id);

            return [
                'name' => $type->name,
                'description' => $type->description,
                'actions' => view('components.actions.type-actions', [
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
