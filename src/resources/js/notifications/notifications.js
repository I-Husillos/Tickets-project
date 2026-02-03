document.addEventListener('DOMContentLoaded', () => {
    $(document).on('click', '.show-notification', function () {
        const notificationId = $(this).data('id');
        const modal = $('#notificationModal');
        const guard = $(this).data('guard');
        const locale = $(this).data('locale');
        const container = $('#notificationDetails');

        container.html('<div class="text-center text-muted"><i class="fas fa-spinner fa-spin fa-2x"></i></div>');

        $.ajax({
            url: `/api/${guard}/notifications/${notificationId}`,
            method: 'GET',
            headers: {
                'X-Locale': locale
            },
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
                        } else if (data.updated_by && typeof data.updated_by === 'string') {
                            html += `<p><strong>Actualizado por:</strong> ${data.updated_by}</p>`;
                        }
                        break;
            
                    case 'closed':
                        if (data.created_by) {
                            html += `<p><strong>El ticket:</strong> ${data.ticket} <strong> del usuario </strong> ${data.author} <strong> ha sido cerrado.</strong></p>`;
                        }

                        break;

                    case 'create':
                        if (data.created_by && data.created_by.name) {
                            html += `<p><strong>Creado por:</strong> ${data.created_by.name}</p>`;
                        } else if (data.created_by && typeof data.created_by === 'string') {
                            html += `<p><strong>Creado por:</strong> ${data.created_by}</p>`;
                        } else if (data.author) {
                            html += `<p><strong>Creado por:</strong> ${data.author}</p>`;
                        }
                        if (data.ticket) {
                            html += `<p><strong>Ticket:</strong> ${data.ticket}</p>`;
                        }
                        break;

                    case 'reopened':
                        if (data.created_by) {
                            html += `<p><strong>Reabierto por:</strong> ${data.created_by}</p>`;
                        } else if (data.author) {
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
                            <button
                                type="button"
                                class="btn btn-outline-primary go-to-ticket"
                                data-link="${data.link}">
                                <i class="fas fa-ticket-alt"></i> Ver ticket
                            </button>
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
