/**
 * Componente Modal para mostrar notificaciones
 * ✅ Renderiza contenido según tipo
 * ✅ Maneja abrir/cerrar
 */
export class NotificationModal {
    constructor(modalSelector = '#notificationModal') {
        this.modal = document.querySelector(modalSelector);
        this.titleElement = this.modal?.querySelector('.modal-title');
        this.detailsContainer = this.modal?.querySelector('[data-notification-details]');
        
        if (!this.modal) {
            console.warn(`Modal no encontrado: ${modalSelector}`);
            return;
        }
    }

    /**
     * Muestra una notificación en el modal
     * @param {Object} notification - Objeto con data de NotificationService
     */
    show(notification) {
        if (!this.modal) return;

        // Establecer título
        this.titleElement.textContent = notification.message || 'Notificación';

        // Renderizar contenido
        this.detailsContainer.innerHTML = this.renderContent(notification);

        // Mostrar modal con jQuery (compatible con tu setup actual)
        $(this.modal).modal('show');
    }

    /**
     * Cierra el modal
     */
    close() {
        $(this.modal).modal('hide');
    }

    /**
     * Renderiza el contenido completo
     */
    renderContent(notification) {
        const typeSpecific = this.renderTypeSpecificContent(notification);
        const actionButton = notification.link ? this.renderActionButton(notification.link) : '';

        return `
            <div class="notification-content">
                <div class="lead">${notification.content}</div>
                
                ${typeSpecific}
                
                <hr>
                
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        <i class="far fa-clock"></i> 
                        <strong>${notification.created_at}</strong>
                    </small>
                    ${actionButton}
                </div>
            </div>
        `;
    }

    /**
     * Renderiza contenido específico según tipo de notificación
     */
    renderTypeSpecificContent(notification) {
        const { type, raw_data } = notification;
        const data = raw_data || {};

        switch (type) {
            case 'created':
                return `
                    <div class="alert alert-info mt-3">
                        <strong>${data.created_by || 'Usuario'}</strong> 
                        creó el ticket
                        <br>
                        <em>"${data.title || 'Sin título'}"</em>
                    </div>
                `;

            case 'comment':
                return `
                    <div class="alert alert-info mt-3">
                        <p><strong>${data.author || 'Usuario'}</strong> comentó:</p>
                        <blockquote class="blockquote">
                            ${data.content || data.comment || 'Sin contenido'}
                        </blockquote>
                    </div>
                `;

            case 'status':
                return `
                    <div class="alert alert-warning mt-3">
                        <p><strong>Ticket:</strong> ${data.title || 'Sin título'}</p>
                        <p><strong>Nuevo estado:</strong> ${data.status || 'Desconocido'}</p>
                        <p><strong>Prioridad:</strong> ${data.priority || 'Normal'}</p>
                        <p><strong>Actualizado por:</strong> ${data.updated_by || 'Desconocido'}</p>
                    </div>
                `;

            case 'closed':
                return `
                    <div class="alert alert-danger mt-3">
                        <p><strong>Ticket:</strong> ${data.title || 'Sin título'}</p>
                        <p><strong>Cerrado por:</strong> ${data.closed_by || 'Desconocido'}</p>
                    </div>
                `;

            case 'reopened':
                return `
                    <div class="alert alert-success mt-3">
                        <p><strong>Ticket:</strong> ${data.title || 'Sin título'}</p>
                        <p><strong>Reabierto por:</strong> ${data.reopened_by || 'Desconocido'}</p>
                    </div>
                `;

            default:
                return `<div class="alert alert-secondary mt-3">Notificación</div>`;
        }
    }

    /**
     * Renderiza botón de acción
     */
    renderActionButton(link) {
        return `
            <a href="${link}" class="btn btn-sm btn-outline-primary">
                <i class="fas fa-ticket-alt"></i> Ver Ticket
            </a>
        `;
    }
}