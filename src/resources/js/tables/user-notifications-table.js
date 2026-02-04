import $ from 'jquery';
import { NotificationsAPI } from '../api/notificationsAPI';

/**
 * Tabla de notificaciones del usuario
 * ✅ Refactorizado para usar NotificationsAPI
 * ✅ Mantiene la estructura DataTables existente
 */

export function initUserNotificationsTable(apiUrl, token) {
    const locale = document.documentElement.lang || 'es';
    const api = new NotificationsAPI('user');

    const table = $('#tabla-notificaciones-usuario').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: apiUrl,
            type: 'GET',
            dataType: 'json',
            data: function (d) {
                d.locale = locale;
                d.type = $('#filter-type').val();
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + token);
            },
            // ✅ Usar fetch de la API en lugar de AJAX puro
            dataSrc: function(json) {
                return json.data || [];
            },
            error: function (xhr) {
                console.error('Error AJAX:', xhr.responseText);
            }
        },
        columns: [
            { data: 'type', className: 'text-center align-middle' },
            { data: 'content', className: 'align-middle' },
            { data: 'date', className: 'text-center align-middle' },
            { 
                data: null, 
                orderable: false, 
                searchable: false, 
                className: 'text-center align-middle',
                render: function(data, type, row) {
                    return renderActions(row, 'user');
                }
            },
        ],
        language: {
            lengthMenu: 'Mostrar _MENU_ registros',
            search: 'Buscar:',
            info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
            infoEmpty: 'Mostrando 0 registros',
            infoFiltered: '(filtrado de _MAX_ registros totales)',
            loadingRecords: 'Cargando...',
            processing: 'Procesando...',
            paginate: {
                first: 'Primero',
                last: 'Último',
                next: 'Siguiente',
                previous: 'Anterior'
            }
        }
    });

    return table;
}

/**
 * Renderiza botones de acciones
 */
function renderActions(row, guard) {
    const readBtn = row.read_at
        ? `<button class="btn btn-sm btn-secondary mark-as-unread" data-id="${row.id}" data-guard="${guard}" title="Marcar como no leída"><i class="fas fa-times"></i></button>`
        : `<button class="btn btn-sm btn-primary mark-as-read" data-id="${row.id}" data-guard="${guard}" title="Marcar como leída"><i class="fas fa-check"></i></button>`;

    return `
        <div class="btn-group btn-group-sm" role="group">
            <button class="btn btn-info show-notification" data-id="${row.id}" data-guard="${guard}" title="Ver detalles">
                <i class="fas fa-eye"></i>
            </button>
            ${readBtn}
        </div>
    `;
}