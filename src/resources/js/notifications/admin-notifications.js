$(document).on('click', '.show-notification-dashboard', function () {
    const notificationId = $(this).data('id');
    
    fetch(`/api/admin/notifications/${notificationId}`, {
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('adminToken') // O meta-tag/token correcto
        }
    })
    .then(response => response.json())
    .then(data => {
        $('#showNotificationModal .modal-title').text(data.title);
        $('#showNotificationModal .modal-body').html(data.content);
        $('#showNotificationModal').modal('show');
    })
    .catch(error => {
        console.error('Error loading notification:', error);
        alert('No se pudo cargar la notificación');
    });
});
    