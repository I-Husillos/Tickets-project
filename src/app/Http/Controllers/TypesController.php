<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use App\Models\EventHistory;
use Illuminate\Http\Request;use Illuminate\Validation\Rule;
use App\Services\TypeService;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use Dotenv\Util\Str;

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

    public function store(StoreTypeRequest $request)
    {
        $validated = $request->validated();

        $this->typeService->createType($validated);

        return redirect()->route('admin.types.index')->with('success', 'Tipo creado con éxito.');
    }

    public function edit(String $locale, Type $type)
    {
        return view('backoffice.admin.types.edit', compact('type'));
    }

    public function update(UpdateTypeRequest $request, Type $type, String $locale)
    {
        $validated = $request->validated();

        $this->typeService->updateType($type, $validated);

        return redirect()->route('admin.types.index', ['locale' => $locale])->with('success', 'Tipo actualizado con éxito.');
    }


    public function destroy(Type $type)
    {
        $this->typeService->deleteType($type);

        return redirect()->route('admin.types.index')->with('success', 'Tipo eliminado con éxito.');
    }

    public function confirmDelete(String $locale, Type $type)
    {
        return view('backoffice.admin.types.confirm-delete', compact('type'));
    }

}

