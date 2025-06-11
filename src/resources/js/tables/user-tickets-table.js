import $ from 'jquery';

export function initUserTicketsTable(apiUrl, token) {
    const locale = document.documentElement.lang || 'en';

    $('#tabla-tickets-usuario').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: apiUrl,
            type: 'GET',
            dataType: 'json',
            data: { locale },
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + token);
                xhr.setRequestHeader('X-Locale', locale);
            },
            error: function (xhr) {
                console.error('Error en respuesta AJAX:', xhr.responseText);
            }
        },error: function (xhr) {
            console.error('Error AJAX tabla usuario:', xhr.responseText);
        },
        columns: [
            { data: 'title', className: 'text-center align-middle' },
            { data: 'status', className: 'text-center align-middle' },
            { data: 'priority', className: 'text-center align-middle' },
            { data: 'comments', className: 'text-center align-middle' },
            { data: 'date', className: 'text-center align-middle' },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' },
        ]
    });
}
