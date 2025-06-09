<div class="btn-group" role="group">
  <button type="button"
          class="btn btn-sm btn-warning rounded-circle shadow btn-edit-admin"
          data-id="{{ $admin->id }}"
          data-name="{{ $admin->name }}"
          data-email="{{ $admin->email }}"
          title="{{ __('Editar') }}"
          data-toggle="modal"
          data-target="#editAdminModal">
    <i class="fas fa-edit"></i>
  </button>

  <button type="button"
          class="btn btn-sm btn-danger rounded-circle shadow btn-delete-admin"
          data-id="{{ $admin->id }}"
          title="{{ __('Eliminar') }}"
          data-toggle="modal"
          data-target="#deleteAdminModal">
    <i class="fas fa-trash-alt"></i>
  </button>
</div>
