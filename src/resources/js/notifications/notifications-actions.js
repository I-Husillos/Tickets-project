$(document).on('click', '.mark-as-read', function () {
    const notificationId = $(this).data('id');
    const token = localStorage.getItem('api_token'); // Asegúrate de tenerlo guardado tras login
    const locale = document.documentElement.lang || 'es';

    $.ajax({
        url: `/api/user/notifications/${notificationId}/read`,
        method: 'PATCH',
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json',
            'X-Locale': locale
        },
        success: function (response) {
            // Opcional: recargar DataTable o actualizar fila
            $('#tabla-notificaciones-usuario').DataTable().ajax.reload(null, false);
        },
        error: function (xhr) {
            console.error('Error al marcar como leída:', xhr.responseText);
        }
    });
});
