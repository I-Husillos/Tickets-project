@extends('layouts.admin')

@section('title', __('general.admin_delete_user.page_title'))

@section('admincontent')
<div class="container mt-5">
    <h2>{{ __('general.admin_delete_user.heading') }}</h2>

    <p>{{ __('general.admin_delete_user.confirmation', ['name' => $user->name]) }}</p>

    <form method="POST" action="{{ route('admin.users.destroy', ['user' => $user->id, 'locale' => app()->getLocale()]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">{{ __('general.admin_delete_user.confirm_button') }}</button>
        <a href="{{ route('admin.dashboard.list.users', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">{{ __('general.admin_delete_user.cancel_button') }}</a>
    </form>
</div>
@endsection
