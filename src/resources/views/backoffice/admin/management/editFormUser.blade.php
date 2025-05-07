@extends('layouts.admin')

@section('title', __('general.admin_edit_user.page_title'))

@section('admincontent')
<div class="container mt-5">
    <h2>{{ __('general.admin_edit_user.heading') }}</h2>

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('general.admin_edit_user.label_name') }}</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('general.admin_edit_user.label_email') }}</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{ __('general.admin_edit_user.label_password') }}</label>
            <input type="password" class="form-control" name="password">
            <small class="text-muted">{{ __('general.admin_edit_user.password_help') }}</small>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('general.admin_edit_user.label_password_confirm') }}</label>
            <input type="password" class="form-control" name="password_confirmation">
            <small class="text-muted">{{ __('general.admin_edit_user.password_confirm_help') }}</small>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('general.admin_edit_user.update_button') }}</button>
        <a href="{{ route('admin.dashboard.list.users') }}" class="btn btn-secondary">{{ __('general.admin_edit_user.cancel_button') }}</a>
    </form>
</div>
@endsection
