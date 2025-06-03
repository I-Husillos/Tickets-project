<a href="{{ route('admin.admins.edit', ['locale' => $locale, 'admin' => $admin->id]) }}"
   class="btn btn-sm btn-warning rounded-circle shadow" title="{{ __('Editar') }}">
    <i class="fas fa-edit"></i>
</a>
<a href="{{ route('admin.admins.confirmDelete', ['locale' => $locale, 'admin' => $admin->id]) }}"
   class="btn btn-sm btn-danger rounded-circle shadow" title="{{ __('Eliminar') }}">
    <i class="fas fa-trash-alt"></i>
</a>
