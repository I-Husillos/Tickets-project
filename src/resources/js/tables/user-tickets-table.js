import $ from 'jquery';

export function initUserTicketsTable(apiUrl, token) {
    const locale = document.documentElement.lang || 'en';

    $('#tabla-tickets').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: apiUrl,
            type: 'GET',
            dataType: 'json',
            data: {
                locale: locale
            },
            responsive: true,
            beforeSend: function (xhr) {
                if (token) {
                    xhr.setRequestHeader('Authorization', 'Bearer ' + token);
                }
                xhr.setRequestHeader('X-Locale', locale);
            },
            error: function (xhr) {
                console.error('Error en respuesta AJAX:', xhr.responseText);
            }
        },
        columns: [
            { data: 'title', className: 'text-center align-middle' },
            { data: 'status', className: 'text-center align-middle' },
            { data: 'priority', className: 'text-center align-middle' },
            { data: 'comments_count', className: 'text-center align-middle' },
            { data: 'created_at', className: 'text-center align-middle' },
            { 
                data: 'actions', 
                orderable: false, 
                searchable: false,
                className: 'text-center align-middle' 
            },
        ],
        language: {
            url: `/vendor/datatables/i18n/${locale}.json`
        }
    });
}
