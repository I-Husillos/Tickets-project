document.addEventListener('DOMContentLoaded', () => {
    $('.admin-view-notification-btn').on('click', function () {
        const notificationId = $(this).data('id');
        const locale = document.documentElement.lang || 'es';
        const modal = $('#notificationModal');
        const container = $('#notificationDetails');

        container.html('<div class="text-center text-muted"><i class="fas fa-spinner fa-spin fa-2x"></i></div>');

        $.ajax({
            url: `/${locale}/administrador/notificaciones/mostrar/${notificationId}`,
            method: 'GET',
            success: function (response) {
                // Componer contenido HTML dinámico
                const data = response.data;
                console.log('Response:', response);
                let html = `
                    <p><strong>${data.message}</strong></p>
                `;

                if (data.author) {
                    html += `<p><strong>Autor:</strong> ${data.author}</p>`;
                }

                if (data.comment) {
                    html += `<p><strong>Comentario:</strong> "${data.comment}"</p>`;
                }

                if (data.status) {
                    html += `<p><strong>Estado:</strong> ${data.status}</p>`;
                }

                if (data.priority) {
                    html += `<p><strong>Prioridad:</strong> ${data.priority}</p>`;
                }

                if (data.created_at) {
                    html += `<p><strong>Fecha:</strong> ${data.created_at}</p>`;
                }

                if (data.link) {
                    html += `<a href="${data.link}" class="btn btn-outline-primary mt-3" target="_blank">Ver Ticket</a>`;
                }

                container.html(html);
                modal.modal('show');
            },
            error: function () {
                container.html('<div class="alert alert-danger">Ocurrió un error al cargar la notificación.</div>');
            }
        });
    });
});
