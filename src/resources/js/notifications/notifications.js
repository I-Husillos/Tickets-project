document.addEventListener('DOMContentLoaded', () => {
    $(document).on('click', '.show-notification', function () {
        const notificationId = $(this).data('id');
        const locale = document.documentElement.lang || 'es';
        const modal = $('#notificationModal');
        const guard = $(this).data('guard');
        const container = $('#notificationDetails');

        container.html('<div class="text-center text-muted"><i class="fas fa-spinner fa-spin fa-2x"></i></div>');

        $.ajax({
            url: `/api/${guard}/notifications/${notificationId}`,
            method: 'GET',
            success: function (response) {
                const data = response.data;
            
                let html = `
                    <p>${data.message ?? ''}</p>
                `;

                // Mostramos datos específicos según el tipo de notificación
                switch (data.type) {
                    case 'comment':
                        if (data.author) {
                            html += `<p><strong>Autor:</strong> ${data.author}</p>`;
                        }
                        if (data.comment) {
                            html += `<p><strong>Comentario:</strong> "${data.comment}"</p>`;
                        }
                        break;
            
                    case 'status':
                        if (data.status) {
                            html += `<p><strong>Estado:</strong> ${data.status}</p>`;
                        }
                        if (data.priority) {
                            html += `<p><strong>Prioridad:</strong> ${data.priority}</p>`;
                        }
                        if (data.updated_by && data.updated_by.name) {
                            html += `<p><strong>Actualizado por:</strong> ${data.updated_by.name}</p>`;
                        }
                        break;
            
                    case 'close':
                        if (data.created_by) {
                            html += `<p><strong>Cerrado por:</strong> ${data.created_by}</p>`;
                        }
                        break;
            
                    case 'reopen':
                        if (data.author) {
                            html += `<p><strong>Reabierto por:</strong> ${data.author}</p>`;
                        }
                        break;
            
                    default:
                        html += `<p><em>Tipo de notificación no reconocido.</em></p>`;
                        break;
                }
            
                // Fecha
                if (data.created_at) {
                    html += `<hr><p class="text-muted"><i class="far fa-clock"></i> ${data.created_at}</p>`;
                }
            
                // Botón para ir al ticket
                if (data.link) {
                    html += `
                        <div class="mt-3 text-center">
                            <a href="${data.link}" class="btn btn-outline-primary" target="_blank">
                                <i class="fas fa-ticket-alt"></i> Ver ticket
                            </a>
                        </div>
                    `;
                }
            
                $('#notificationDetails').html(html);
                $('#notificationModal').modal('show');
            },
            error: function () {
                container.html('<div class="alert alert-danger">Error al cargar la notificación.</div>');
            }
        });
    });
});
