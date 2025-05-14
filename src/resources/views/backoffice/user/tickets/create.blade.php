@extends('layouts.frontoffice')

@section('title', 'Crear Ticket')

@section('content')
<div class="container mt-5">
    <h2>{{ __('frontoffice.tickets.create_new_ticket') }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">Error al mandar el formulario</div>
    @endif


    <form method="POST" action="{{ route('user.tickets.store', ['locale' => app()->getLocale()]) }}">
        @csrf
        <div class="form-group mt-3">
            <label for="title">{{ __('frontoffice.tickets.title') }}</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        
        <div class="form-group mt-3">
            <label for="description">{{ __('frontoffice.tickets.description') }}</label>
            <textarea 
                id="description" 
                name="description" 
                class="form-control">{{ old('description') }}</textarea>
        </div>
        
        <div class="form-group mt-3">
            <label for="type">{{ __('frontoffice.tickets.type') }}</label>
            <select 
                id="type" 
                name="type" 
                class="form-control">
                <option value="bug" {{ old('type') === 'bug' ? 'selected' : '' }}>{{ __('frontoffice.tickets.types_options.bug') }}</option>
                <option value="improvement" {{ old('type') === 'improvement' ? 'selected' : '' }}>{{ __('frontoffice.tickets.types_options.improvement') }}</option>
                <option value="request" {{ old('type') === 'request' ? 'selected' : '' }}>{{ __('frontoffice.tickets.types_options.request') }}</option>
            </select>
        </div>
        
        <div class="form-group mt-3">
            <label for="priority">{{ __('frontoffice.tickets.priority') }}</label>
            <select 
                id="priority" 
                name="priority" 
                class="form-control">
                <option value="low" {{ old('priority') === 'low' ? 'selected' : '' }}>{{ __('frontoffice.tickets.priority_options.low') }}</option>
                <option value="medium" {{ old('priority') === 'medium' ? 'selected' : '' }}>{{ __('frontoffice.tickets.priority_options.medium') }}</option>
                <option value="high" {{ old('priority') === 'high' ? 'selected' : '' }}>{{ __('frontoffice.tickets.priority_options.high') }}</option>
                <option value="critical" {{ old('priority') === 'critical' ? 'selected' : '' }}>{{ __('frontoffice.tickets.priority_options.critical') }}</option>
            </select>
        </div>
        
        <input type="hidden" name="status" value="new">

        <button type="submit" class="btn btn-success mt-4">
        {{ __('frontoffice.tickets.create_button') }}
        </button>
    </form>
    <div class="mt-3">
        <a href="{{ route('user.tickets.index', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">{{ __('frontoffice.tickets.cancel') }}</a>
    </div>
</div>
@endsection
