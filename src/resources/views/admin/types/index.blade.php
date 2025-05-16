@extends('layouts.admin')

{{-- Se define el título de la página usando la clave de traducción --}}
@section('title', __('general.admin_types.page_title'))

@section('admincontent')
<div class="container mt-4">
    <!-- Título del listado -->
    <h2 class="text-center">{{ __('general.admin_types.list_title') }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Botón para crear un nuevo tipo, traducido -->
    <a href="{{ route('admin.types.create', ['locale' => app()->getLocale()]) }}" class="btn btn-primary mb-3">
        {{ __('general.admin_types.new_type') }}
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('general.admin_types.name') }}</th>
                <th>{{ __('general.admin_types.description') }}</th>
                <th style="text-align: center;">{{ __('general.admin_types.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($types as $type)
                <tr>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->description }}</td>
                    <td>
                        <div class="text-center">
                            <a href="{{ route('admin.types.confirmDelete', ['locale' => app()->getLocale(), 'type' => $type->id]) }}" class="btn btn-danger btn-sm">
                                {{ __('general.admin_types.delete') }}
                            </a>
                            <a href="{{ route('admin.types.edit', ['locale' => app()->getLocale(), 'type' => $type->id]) }}" class="btn btn-warning btn-sm">
                                {{ __('general.admin_types.edit') }}
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
