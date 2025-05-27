import $ from 'jquery';

export function initAdminAssignedTicketsTable(locale, url) {
    $('#tabla-tickets-asignados').DataTable({
        processing: true,
        responsive: true,
        ajax: url,
        columns: [
            { data: 'id', className: 'align-middle' },
            { data: 'title', className: 'align-middle' },
            { data: 'description', className: 'align-middle' },
            { data: 'status', className: 'align-middle' },
            { data: 'priority', className: 'align-middle' },
            { data: 'type', className: 'align-middle' },
            { data: 'comments_count', className: 'align-middle' },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' }
        ],
    });

    // Recargar tabla al enviar el filtro
    document.querySelector('form').addEventListener('submit', e => {
        e.preventDefault();
        $('#tabla-tickets-asignados').DataTable().ajax.reload();
    });
}
