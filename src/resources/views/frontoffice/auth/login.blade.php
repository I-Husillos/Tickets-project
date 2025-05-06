@extends('layouts.frontoffice')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="container mt-5">
    <h2 class="text-center text-primary">Iniciar Sesión</h2>
    <form method="POST" action="{{ route('login') }}" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" id="password" name="password" class="form-control @error('email') is-invalid @enderror">

            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-3">Iniciar Sesión</button>
    </form>

    <div class="text-center mt-3">
        <p>¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate aquí</a></p>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

</div>
@endsection
