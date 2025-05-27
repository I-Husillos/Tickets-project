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
