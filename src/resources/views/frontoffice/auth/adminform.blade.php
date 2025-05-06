@extends('layouts.frontoffice')

@section('title', 'Inicio de Sesión - Administrador')

@section('content')
<div class="container mt-5">
    <h2 class="text-center text-primary">Iniciar sesión como Administrador</h2>
    <form action="{{ route('admin.login') }}" method="POST" class="mt-4">
        @csrf
        
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Introduce tu correo">

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" id="password" name="password" class="form-control @error('email') is-invalid @enderror" placeholder="Introduce tu contraseña">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror   
        </div>

        <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
    </form>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

</div>
@endsection
