@extends('layouts.admin')

@section('title', __('general.admin_types.page_title'))

@section('admincontent')
<div class="container-fluid mt-3">

    <!-- Card contenedora del índice -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">
                <i class="fas fa-list"></i>
                {{ __('general.admin_types.list_title') }}
            </h3>
            <a href="{{ route('admin.types.create', ['locale' => app()->getLocale()]) }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> {{ __('general.admin_types.new_type') }}
            </a>
        </div>

        <div class="card-body">
            <!-- Alert de éxito -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center align-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th>{{ __('general.admin_types.name') }}</th>
                            <th>{{ __('general.admin_types.description') }}</th>
                            <th>{{ __('general.admin_types.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($types as $type)
                            <tr>
                                <td>{{ $type->name }}</td>
                                <td>{{ $type->description }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.types.edit', ['locale' => app()->getLocale(), 'type' => $type->id]) }}" 
                                           class="btn btn-warning btn-sm" title="{{ __('general.admin_types.edit') }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.types.confirmDelete', ['locale' => app()->getLocale(), 'type' => $type->id]) }}" 
                                           class="btn btn-danger btn-sm" title="{{ __('general.admin_types.delete') }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">{{ __('general.admin_types.no_records') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div> <!-- /.card-body -->
    </div> <!-- /.card -->

</div> <!-- /.container-fluid -->
@endsection
