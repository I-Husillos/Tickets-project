@extends('layouts.user')

@section('title', __('general.frontoffice.auth.login.title'))

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card card-primary shadow">
            <div class="card-header">
                <h3 class="card-title text-center">{{ __('general.frontoffice.auth.login.heading') }}</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login', ['locale' => app()->getLocale()]) }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">{{ __('general.frontoffice.auth.login.label_email') }}</label>
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
                        <label for="password" class="form-label">{{ __('general.frontoffice.auth.login.label_password') }}</label>
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


                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block w-100">
                                <i class="fas fa-sign-in-alt"></i> {{ __('general.frontoffice.auth.login.submit') }}
                            </button>
                        </div>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <p>{{ __('general.frontoffice.auth.login.no_account') }} 
                        <a href="{{ route('register', ['locale' => app()->getLocale()]) }}">{{ __('general.frontoffice.auth.login.register_here') }}</a>
                    </p>
                    
                </div>
            </div>

            @if(session('error'))
                <div class="alert alert-danger mt-2">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
