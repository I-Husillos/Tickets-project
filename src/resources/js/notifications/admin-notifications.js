// resources/js/admin-notifications.js

$(document).on('click', '.show-notification-btn', function () {
    const notificationId = $(this).data('id');
    const token = localStorage.getItem('adminToken'); // o usa una <meta name="token">

    fetch(`/api/admin/notifications/${notificationId}`, {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    })
    .then(res => {
        if (!res.ok) throw new Error('Error en la API');
        return res.json();
    })
    .then(data => {
        $('#showNotificationModal .modal-title').text(data.title);
        $('#showNotificationModal .modal-body').html(data.content);
        $('#showNotificationModal').modal('show');
    })
    .catch(error => {
        console.error('Error loading notification:', error);
        alert('No se pudo cargar el detalle de la notificación.');
    });
});
