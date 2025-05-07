@extends('layouts.frontoffice')

@section('title', __('general.frontoffice.auth.admin_login.title'))

@section('content')
<div class="container mt-5">
    <h2 class="text-center text-primary">{{ __('general.frontoffice.auth.admin_login.heading') }}</h2>
    <form action="{{ route('admin.login') }}" method="POST" class="mt-4">
        @csrf
        
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('general.frontoffice.auth.admin_login.label_email') }}</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('general.frontoffice.auth.admin_login.placeholder_email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('general.frontoffice.auth.admin_login.label_password') }}</label>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('general.frontoffice.auth.admin_login.placeholder_password') }}">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror   
        </div>

        <button type="submit" class="btn btn-primary w-100">{{ __('general.frontoffice.auth.admin_login.submit') }}</button>
    </form>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

</div>
@endsection
