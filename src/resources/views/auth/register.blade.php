@extends('layouts.user')

@section('title', __('general.frontoffice.auth.register.title'))

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card card-primary shadow">
            <div class="card-header">
                <h3 class="card-title text-center">{{ __('general.frontoffice.auth.register.heading') }}</h3>
            </div>
            <div class="card-body">
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register', ['locale' => app()->getLocale()]) }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">{{ __('general.frontoffice.auth.register.label_name') }}</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            class="form-control @error('name') is-invalid @enderror" 
                            value="{{ old('name') }}" 
                            placeholder="John Doe">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">{{ __('general.frontoffice.auth.register.label_email') }}</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            value="{{ old('email') }}" 
                            placeholder="example@domain.com">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="form-label">{{ __('general.frontoffice.auth.register.label_password') }}</label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            placeholder="********">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password_confirmation" class="form-label">{{ __('general.frontoffice.auth.register.label_password_confirm') }}</label>
                        <input 
                            type="password" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            class="form-control" 
                            placeholder="********">
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block w-100">
                                <i class="fas fa-user-plus"></i> {{ __('general.frontoffice.auth.register.submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-footer text-center">
                <a href="{{ route('login', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> {{ __('general.frontoffice.auth.register.back_to_home') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
