<div class="btn-group" role="group">
    <a href="{{ route('admin.users.edit', ['locale' => $locale, 'user' => $user->id]) }}"
       class="btn btn-sm btn-warning rounded-circle shadow"
       data-toggle="tooltip" title="{{ __('Editar') }}">
        <i class="fas fa-edit"></i>
    </a>
    <a href="{{ route('admin.users.confirmDelete', ['locale' => $locale, 'user' => $user->id]) }}"
       class="btn btn-sm btn-danger rounded-circle shadow"
       data-toggle="tooltip" title="{{ __('Eliminar') }}">
        <i class="fas fa-trash-alt"></i>
    </a>
</div>
