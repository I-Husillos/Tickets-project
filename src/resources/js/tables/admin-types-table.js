import $ from 'jquery';

export function initAdminTypesTable(locale, url) {
    $('#tabla-types').DataTable({
        processing: true,
        responsive: true,
        ajax: url,
        columns: [
            { data: 'name', className: 'align-middle' },
            { data: 'description', className: 'align-middle' },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' }
        ],
    });
}
