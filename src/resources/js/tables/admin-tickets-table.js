import $ from 'jquery';

export function initAdminTicketsTable(locale, url) {
    $('#tabla-tickets').DataTable({
        processing: true,
        responsive: true,
        ajax: url,
        columns: [
            { data: 'id', className: 'align-middle' },
            { data: 'title', className: 'align-middle' },
            { data: 'status', className: 'align-middle' },
            { data: 'priority', className: 'align-middle' },
            { data: 'type', className: 'align-middle' },
            { data: 'comments_count', className: 'align-middle' },
            { data: 'assigned_to', className: 'align-middle' },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' }
        ],
    });
}
