<?php

namespace App\Http\Controllers\Api\Types;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\EventHistory;
use App\Http\Requests\UpdateTypeRequest;


class TypeApiController extends Controller
{
    public function storeType(StoreTypeRequest $request)
    {
        $type = Type::create($request->validated());

        EventHistory::create([
            'event_type' => 'Registro',
            'description' => 'Tipo "' . $type->name . '" creado.',
            'user' => Auth::guard('api')->user()->name,
        ]);

        return response()->json(['success' => true, 'message' => 'Tipo creado correctamente.'], 201);
    }


    public function updateType(UpdateTypeRequest $request, Type $type)
    {
        $type->update($request->validated());

        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => 'Tipo "' . $type->name . '" actualizado.',
            'user' => Auth::guard('api')->user()->name,
        ]);

        return response()->json(['success' => true, 'message' => 'Tipo actualizado correctamente.']);
    }


    public function destroyType(Type $type)
    {
        $type->delete();

        EventHistory::create([
            'event_type' => 'Eliminación',
            'description' => 'Tipo "' . $type->name . '" eliminado.',
            'user' => Auth::guard('api')->user()->name,
        ]);

        return response()->json(['success' => true, 'message' => 'Tipo eliminado correctamente.']);
    }
}

