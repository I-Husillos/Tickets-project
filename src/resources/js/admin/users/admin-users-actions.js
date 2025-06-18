import $ from 'jquery';


if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', main);
} else {
    main();
}

document.addEventListener('DOMContentLoaded', () => {
    const token = localStorage.getItem('api_token');

    // Abrir modal de edición y rellenar campos
    $(document).on('click', '.btn-edit-user', function () {
        const userId = $(this).data('id');
        const name = $(this).data('name');
        const email = $(this).data('email');

        // Rellenar campos del formulario
        $('#edit-user-id').val(userId);
        $('#edit-user-name').val(name);
        $('#edit-user-email').val(email);
        $('#edit-user-password').val('');
        $('#edit-user-password-confirmation').val('');

        // Establecer el ID como atributo del formulario
        $('#edit-user-form').attr('data-user-id', userId);

        // Mostrar modal
        $('#editUserModal').modal('show');
    });

    // Abrir modal de confirmación de eliminación
    $(document).on('click', '.btn-delete-user', function () {
        const userId = $(this).data('id');
        const name = $(this).data('name');

        $('#delete-user-id').val(userId);
        $('#delete-user-name').text(name);

        $('#deleteUserModal').modal('show');
    });

    // Enviar eliminación
    $('#delete-user-form').on('submit', async function (e) {
        e.preventDefault();
        const id = $('#delete-user-id').val();

        try {
            const response = await fetch(`/api/admin/users/${id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (!response.ok) throw new Error(result.message || 'Error al eliminar');

            $('#deleteUserModal').modal('hide');
            $('#tabla-usuarios').DataTable().ajax.reload(null, false);
            alert(result.message || 'Usuario eliminado correctamente');

        } catch (error) {
            console.error('Error al eliminar:', error);
            alert(error.message || 'No se pudo eliminar el usuario');
        }
    });

    // Enviar edición
    const form = document.getElementById('edit-user-form');
    if (form && token) {
        form.addEventListener('submit', async function (e) {
            e.preventDefault();

            const userId = form.dataset.userId;
            const formData = new FormData(form);
            formData.append('_method', 'PUT'); // Para que Laravel lo interprete como PUT

            try {
                const response = await fetch(`/api/admin/users/${userId}`, {
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

                $('#editUserModal').modal('hide');
                $('#tabla-usuarios').DataTable().ajax.reload(null, false);
                alert(result.message || 'Usuario actualizado correctamente');

            } catch (error) {
                console.error('Error al actualizar:', error);
                alert(error.message || 'No se pudo actualizar el usuario');
            }
        });
    }
});
