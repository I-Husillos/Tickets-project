document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.view-notification-btn');
    const modal = document.getElementById('notificationModal');
    const modalBody = modal.querySelector('.modal-body');


    const urlTemplate = document.querySelector('meta[name="notification-url-template"]')?.content;

    if (!urlTemplate || !modal || !modalBody) {
        console.warn('Faltan elementos esenciales para mostrar el modal.');
        return;
    }

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const notificationId = button.getAttribute('data-id');
            const url = urlTemplate.replace(':id', notificationId);

            console.log(url);


            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                        return;
                    }

                    // Rellenar el contenido del modal dinámicamente
                    modalBody.innerHTML = `
                        <p><strong>${window.translations.message}:</strong> ${data.message}</p>
                        ${data.title ? `<p><strong>${window.translations.title}:</strong> ${data.title}</p>` : ''}
                        ${data.status ? `<p><strong>${window.translations.status}:</strong> ${data.status}</p>` : ''}
                        ${data.priority ? `<p><strong>${window.translations.priority}:</strong> ${data.priority}</p>` : ''}
                        ${data.type ? `<p><strong>${window.translations.type}:</strong> ${data.type}</p>` : ''}
                        ${data.comment ? `<p><strong>${window.translations.comment}:</strong> "${data.comment}"</p>` : ''}
                        ${data.author ? `<p><strong>${window.translations.author}:</strong> ${data.author}</p>` : ''}
                        ${data.updated_by ? `<p><strong>${window.translations.updated_by}:</strong> ${data.updated_by}</p>` : ''}
                        ${data.created_by ? `<p><strong>${window.translations.created_by}:</strong> ${data.created_by}</p>` : ''}
                        <p><strong>${window.translations.received_at}:</strong> ${data.created_at}</p>
                    `;

                    
                    // Mostrar el modal
                    $('#notificationModal').modal('show');
                })
                .catch(error => {
                    console.error('Error al cargar la notificación:', error);
                    alert('Error al cargar la notificación');
                });
        });
    });
});

    


// document.querySelectorAll('.view-notification-btn').forEach(function(button) {
//     button.addEventListener('click', function(event) {
//         event.preventDefault();
//         var notificationId = this.getAttribute('data-id');

//         // Reemplazar ':id' por el ID de la notificación
//         const url = window.notificationRoute.replace(':id', notificationId);

//         // Realizar una petición AJAX para obtener los detalles de la notificación
//         fetch(url)
//             .then(response => response.json())
//             .then(data => {
//                 if (data.error) {
//                     alert(data.error);
//                 } else {
//                     // Verificar si el modal y el contenedor de detalles están disponibles
//                     const notificationDetails = document.getElementById('notificationDetails');

//                     console.log(notificationDetails);
                    
//                     if (notificationDetails) {
//                         notificationDetails.innerHTML = `
//                             <strong>Mensaje:</strong> ${data.message} <br>
//                             <strong>Fecha:</strong> ${data.created_at} <br>
//                             <strong>Estado:</strong> ${data.status}
//                         `;
                        

//                         const modalElement = $('#notificationModal');
//                         if (modalElement.length) {
//                             modalElement.modal('show');
//                         } else {
//                             console.error("El modal 'notificationModal' no se encuentra en el DOM.");
//                         }

//                     } else {
//                         console.error("No se encontró el contenedor 'notificationDetails' en el DOM.");
//                     }
//                 }
//             })
//     });
// });
