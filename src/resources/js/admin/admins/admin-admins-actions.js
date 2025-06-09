import $ from 'jquery';

document.addEventListener('DOMContentLoaded', () => {
    const token = localStorage.getItem('api_token');

    // Abrir modal de edición de administrador
    $(document).on('click', '.btn-edit-admin', function () {
        const adminId = $(this).data('id');
        const name = $(this).data('name');
        const email = $(this).data('email');

        $('#edit-admin-id').val(adminId);
        $('#edit-admin-name').val(name);
        $('#edit-admin-email').val(email);
        $('#edit-admin-password').val('');
        $('#edit-admin-password-confirmation').val('');

        $('#edit-admin-form').attr('data-admin-id', adminId);
        $('#editAdminModal').modal('show');
    });

    // Abrir modal de confirmación de eliminación
    $(document).on('click', '.btn-delete-admin', function () {
        const adminId = $(this).data('id');
        $('#delete-admin-id').val(adminId);
        $('#deleteAdminModal').modal('show');
    });

    // Enviar eliminación
    $('#delete-admin-form').on('submit', async function (e) {
        e.preventDefault();
        const id = $('#delete-admin-id').val();

        try {
            const response = await fetch(`/api/admin/admins/${id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (!response.ok) throw new Error(result.message || 'Error al eliminar');

            $('#deleteAdminModal').modal('hide');
            $('#tabla-administradores').DataTable().ajax.reload(null, false);
            alert(result.message || 'Administrador eliminado correctamente');

        } catch (error) {
            console.error('Error al eliminar:', error);
            alert(error.message || 'No se pudo eliminar el administrador');
        }
    });

    // Enviar edición
    const form = document.getElementById('edit-admin-form');
    if (form && token) {
        form.addEventListener('submit', async function (e) {
            e.preventDefault();

            const adminId = form.dataset.adminId;
            const formData = new FormData(form);
            formData.append('_method', 'PUT');

            try {
                const response = await fetch(`/api/admin/admins/${adminId}`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const result = await response.json();

                if (!response.ok) {
                    console.error('Errores de validación:', result.errors || result);
                    throw result;
                }

                $('#editAdminModal').modal('hide');
                $('#tabla-administradores').DataTable().ajax.reload(null, false);
                alert(result.message || 'Administrador actualizado correctamente');

            } catch (error) {
                console.error('Error al actualizar:', error);
                alert(error.message || 'No se pudo actualizar el administrador');
            }
        });
    }
});
