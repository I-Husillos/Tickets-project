import $ from 'jquery';

export function initAdminTicketCommentsTable(locale, url) {
    $('#tabla-comentarios').DataTable({
        processing: true,
        responsive: true,
        ajax: url,
        columns: [
            { data: 'author', className: 'align-middle' },
            { data: 'message', className: 'align-middle' },
            { data: 'date', className: 'align-middle' },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' }
        ],
    });
}
