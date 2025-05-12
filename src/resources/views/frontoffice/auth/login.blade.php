@extends('layouts.frontoffice')

@section('title', __('general.frontoffice.auth.login.title'))

@section('content')
<div class="container mt-5">
    <h2 class="text-center text-primary">{{ __('general.frontoffice.auth.login.heading') }}</h2>




    <form method="POST" action="{{ route('login', ['locale' => app()->getLocale()]) }}" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('general.frontoffice.auth.login.label_email') }}</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('general.frontoffice.auth.login.label_password') }}</label>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-3">{{ __('general.frontoffice.auth.login.submit') }}</button>
    </form>

    <div class="text-center mt-3">
        <p>{{ __('general.frontoffice.auth.login.no_account') }} <a href="{{ route('register', ['locale' => app()->getLocale()]) }}">{{ __('general.frontoffice.auth.login.register_here') }}</a></p>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

</div>
@endsection
