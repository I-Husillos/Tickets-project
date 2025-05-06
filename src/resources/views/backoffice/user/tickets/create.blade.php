@extends('layouts.frontoffice')

@section('title', 'Crear Ticket')

@section('content')
<div class="container mt-5">
    <h2>Crear Nuevo Ticket</h2>

    @if ($errors->any())
        <div class="alert alert-danger">Error al mandar el formulario</div>
    @endif


    <form method="POST" action="{{ route('user.tickets.store') }}">
        @csrf
        
        <div class="form-group mt-3">
            <label for="title">Título</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        
        <div class="form-group mt-3">
            <label for="description">Descripción</label>
            <textarea 
                id="description" 
                name="description" 
                class="form-control">{{ old('description') }}</textarea>
        </div>
        
        <div class="form-group mt-3">
            <label for="type">Tipo</label>
            <select 
                id="type" 
                name="type" 
                class="form-control">
                <option value="bug" {{ old('type') === 'bug' ? 'selected' : '' }}>Bug</option>
                <option value="improvement" {{ old('type') === 'improvement' ? 'selected' : '' }}>Mejora</option>
                <option value="request" {{ old('type') === 'request' ? 'selected' : '' }}>Solicitud</option>
            </select>
        </div>
        
        <div class="form-group mt-3">
            <label for="priority">Prioridad</label>
            <select 
                id="priority" 
                name="priority" 
                class="form-control">
                <option value="low" {{ old('priority') === 'low' ? 'selected' : '' }}>Baja</option>
                <option value="medium" {{ old('priority') === 'medium' ? 'selected' : '' }}>Media</option>
                <option value="high" {{ old('priority') === 'high' ? 'selected' : '' }}>Alta</option>
                <option value="critical" {{ old('priority') === 'critical' ? 'selected' : '' }}>Crítica</option>
            </select>
        </div>
        
        <input type="hidden" name="status" value="new">

        <button type="submit" class="btn btn-success mt-4">
            Crear Ticket
        </button>
    </form>
    <div class="mt-3">
        <a href="{{ route('user.tickets.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</div>
@endsection
