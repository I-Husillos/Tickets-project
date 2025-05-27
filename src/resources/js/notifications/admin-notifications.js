document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.view-notification-btn');
    const modal = document.getElementById('notificationModal');
    const modalBody = modal?.querySelector('.modal-body');

    const urlTemplate = document.querySelector('meta[name="admin-notification-url-template"]')?.content;

    console.log(urlTemplate);

    if (!urlTemplate || !modal || !modalBody) {
        console.warn('Faltan elementos esenciales para el modal de notificaciones admin.');
        return;
    }

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const notificationId = button.dataset.id;

            console.log(notificationId);

            const url = urlTemplate.replace(':id', notificationId);

            console.log(url);

            fetch(url)
                .then(res => res.json())
                .then(data => {
                    if (data.error) {
                        return alert(data.error);
                    }

                    modalBody.innerHTML = `
                        <p><strong>${window.translations.message}:</strong> ${data.message}</p>
                        ${data.title ? `<p><strong>${window.translations.title}:</strong> ${data.title}</p>` : ''}
                        ${data.priority ? `<p><strong>${window.translations.priority}:</strong> ${data.priority}</p>` : ''}
                        ${data.type ? `<p><strong>${window.translations.type}:</strong> ${data.type}</p>` : ''}
                        ${data.created_by ? `<p><strong>${window.translations.created_by}:</strong> ${data.created_by}</p>` : ''}
                        <p><strong>${window.translations.received_at}:</strong> ${data.created_at}</p>
                        <a href="${data.link}" class="btn btn-primary mt-2"><i class="fas fa-eye"></i> Ver ticket</a>
                    `;
                    $('#notificationModal').modal('show');
                })
                .catch(error => {
                    console.error('Error cargando notificación:', error);
                    alert('Ocurrió un error al cargar los detalles.');
                });
        });
    });
});
