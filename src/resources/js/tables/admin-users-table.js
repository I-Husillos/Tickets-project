import $ from 'jquery';

export function initAdminUsersTable(apiUrl, token) {

    console.log('Url recibida:', apiUrl);
    $('#tabla-usuarios').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: 'http://localhost:8080/api/admin/users',
            type: 'GET',
            dataType: 'json',
            beforeSend: function (xhr) {
                const token = localStorage.getItem('api_token');
                if (token) {
                    xhr.setRequestHeader('Authorization', 'Bearer ' + token);
                }
            },
            error: function (xhr) {
                console.error('Error en respuesta AJAX:', xhr.responseText);
            }
        },
        columns: [
            { data: 'name', className: 'text-center align-middle' },
            { data: 'email', className: 'text-center align-middle' },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' },
        ]
    });
}



    