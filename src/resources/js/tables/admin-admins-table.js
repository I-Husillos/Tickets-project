import $ from 'jquery';


export function initAdminAdminsTable(apiUrl, token) {
    console.log('Token recibido:', token); // Asegura que no sea null

    $('#tabla-admins').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: `/api/admin/admins`,
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + token);
            },
            error: function (xhr) {
                console.error('Error en respuesta AJAX:', xhr.status, xhr.responseText);
            }
        },
        columns: [
            { data: 'name', className: 'text-center align-middle' },
            { data: 'email', className: 'text-center align-middle' },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' },
        ]
    });
}
