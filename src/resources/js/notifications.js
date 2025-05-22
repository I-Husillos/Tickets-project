document.querySelectorAll('.view-notification-btn').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var notificationId = this.getAttribute('data-id');

        // Reemplazar ':id' por el ID de la notificación
        const url = window.notificationRoute.replace(':id', notificationId);

        // Realizar una petición AJAX para obtener los detalles de la notificación
        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    // Verificar si el modal y el contenedor de detalles están disponibles
                    const notificationDetails = document.getElementById('notificationDetails');

                    console.log(notificationDetails);
                    
                    if (notificationDetails) {
                        notificationDetails.innerHTML = `
                            <strong>Mensaje:</strong> ${data.message} <br>
                            <strong>Fecha:</strong> ${data.created_at} <br>
                            <strong>Estado:</strong> ${data.status}
                        `;
                        

                        const modalElement = $('#notificationModal');
                        if (modalElement.length) {
                            modalElement.modal('show');
                        } else {
                            console.error("El modal 'notificationModal' no se encuentra en el DOM.");
                        }

                    } else {
                        console.error("No se encontró el contenedor 'notificationDetails' en el DOM.");
                    }
                }
            })
    });
});
