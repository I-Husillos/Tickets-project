import $ from 'jquery';

export function initAdminUsersTable(locale, apiUrl, token) {
    $('#tabla-usuarios').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: apiUrl,
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + token);
            }
        },
        columns: [
            { data: 'name', className: 'text-center align-middle' },
            { data: 'email', className: 'text-center align-middle' },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' },
        ]
    });
}



    