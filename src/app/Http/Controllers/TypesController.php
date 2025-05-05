<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use App\Models\EventHistory;
use Illuminate\Http\Request;use Illuminate\Validation\Rule;
use App\Services\TypeService;


class TypesController
{
    protected $typeService;

    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }

    public function index()
    {
        $types = Type::all();
        return view('backoffice.admin.types.index', compact('types'));
    }

    public function create()
    {
        return view('backoffice.admin.types.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:types,name',
            'description' => 'nullable|string|max:255',
        ],[
            'name.unique' => 'Ya existe un tipo con ese nombre.',
            'name.required' => 'El campo nombre es obligatorio.',
        ]);

        $this->typeService->createType($validated);

        return redirect()->route('admin.types.index')->with('success', 'Tipo creado con éxito.');
    }

    public function edit(Type $type)
    {
        return view('backoffice.admin.types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:types,name,' . $type->id,
            'description' => 'nullable|string|max:255',
        ],[
            'name.unique' => 'Ya existe un tipo con ese nombre.',
            'name.required' => 'El campo nombre es obligatorio.',
        ]);

        $this->typeService->updateType($type, $validated);

        return redirect()->route('admin.types.index')->with('success', 'Tipo actualizado con éxito.');
    }


    public function destroy(Type $type)
    {
        $this->typeService->deleteType($type);

        return redirect()->route('admin.types.index')->with('success', 'Tipo eliminado con éxito.');
    }

    public function confirmDelete(Type $type)
    {
        return view('backoffice.admin.types.confirm-delete', compact('type'));
    }

}

