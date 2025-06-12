function getNotificationTableId(guard) {
    return guard === 'admin'
        ? 'tabla-notificaciones-admin'
        : 'tabla-notificaciones-usuario';
}

function getTokenByGuard(guard) {
    return localStorage.getItem('api_token'); // correcto si usas un único token para todo
}

// MARCAR COMO LEÍDA
$(document).on('click', '.mark-as-read', function () {
    const notificationId = $(this).data('id');
    const guard = $(this).data('guard');
    const token = getTokenByGuard(guard);

    if (!token) {
        console.error(`No se encontró un token válido para el guard "${guard}".`);
        return;
    }

    const locale = document.documentElement.lang || 'es';
    const tableId = getNotificationTableId(guard);

    $.ajax({
        url: `/api/${guard}/notifications/${notificationId}/read`,
        method: 'PATCH',
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json',
            'X-Locale': locale
        },
        success: function () {
            $(`#${tableId}`).DataTable().ajax.reload(null, false);
        },
        error: function (xhr) {
            console.error('Error al marcar como leída:', xhr.responseText);
        }
    });
});

// MARCAR COMO NO LEÍDA
$(document).on('click', '.mark-as-unread', function () {
    const notificationId = $(this).data('id');
    const guard = $(this).data('guard');
    const token = getTokenByGuard(guard);

    if (!token) {
        console.error(`No se encontró un token válido para el guard "${guard}".`);
        return;
    }

    const locale = document.documentElement.lang || 'es';
    const tableId = getNotificationTableId(guard);

    $.ajax({
        url: `/api/${guard}/notifications/${notificationId}/unread`,
        method: 'PATCH',
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json',
            'X-Locale': locale
        },
        success: function () {
            $(`#${tableId}`).DataTable().ajax.reload(null, false);
        },
        error: function (xhr) {
            console.error('Error al marcar como no leída:', xhr.responseText);
        }
    });
});
