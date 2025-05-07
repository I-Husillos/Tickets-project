@extends('layouts.frontoffice')

@section('title', __('general.frontoffice.auth.register.title'))

@section('content')
<div class="container mt-5">
    <h2 class="text-center text-primary">{{ __('general.frontoffice.auth.register.heading') }}</h2>
    <form method="POST" action="{{ route('register') }}" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('general.frontoffice.auth.register.label_name') }}</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('general.frontoffice.auth.register.label_email') }}</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('general.frontoffice.auth.register.label_password') }}</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('general.frontoffice.auth.register.label_password_confirm') }}</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary w-100">{{ __('general.frontoffice.auth.register.submit') }}</button>
    </form>

    <div class="text-center mt-4">
        <a href="{{ route('login') }}" class="btn btn-secondary">{{ __('general.frontoffice.auth.register.back_to_home') }}</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection
