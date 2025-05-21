document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.view-notification-btn');

    buttons.forEach(btn => {
        btn.addEventListener('click', async () => {
            const id = btn.dataset.id;

            try {
                // Construir la URL correctamente utilizando JavaScript
                const url = `/${window.Laravel.locale}/admin/notifications/${id}`;
                const response = await fetch(url);
                
                if (!response.ok) throw new Error('Error cargando notificación');

                const html = await response.text();
                document.getElementById('notificationContent').innerHTML = html;

                const modal = new bootstrap.Modal(document.getElementById('notificationModal'));
                modal.show();
            } catch (err) {
                alert('Hubo un error al cargar el contenido.');
                console.error(err);
            }
        });
    });
});
