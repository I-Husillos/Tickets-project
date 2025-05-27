import $ from 'jquery';

export function initAdminAdminsTable(locale, url) {

    $('#tabla-admins').DataTable({
        processing: true,
        responsive: true,
        ajax: url,
        columns: [
            { data: 'name', className: 'text-center align-middle' },
            { data: 'email', className: 'text-center align-middle' },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' }
        ],
    });
}
