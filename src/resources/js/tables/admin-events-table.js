import $ from 'jquery';

export function initAdminEventsTable(locale, url) {
    $('#tabla-eventos').DataTable({
        processing: true,
        responsive: true,
        ajax: {
            url: url,
            data: function (d) {
                const eventType = document.querySelector('input[name="event_type"]');
                const user = document.querySelector('input[name="user"]');
                const date = document.querySelector('input[name="date"]');

                d.event_type = eventType ? eventType.value : '';
                d.user = user ? user.value : '';
                d.date = date ? date.value : '';
            }
        },
        columns: [
            { data: 'event_type', className: 'align-middle' },
            { data: 'description', className: 'align-middle' },
            { data: 'user', className: 'align-middle' },
            { data: 'created_at', className: 'align-middle' },
        ],
    });

    document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault();
        $('#tabla-eventos').DataTable().ajax.reload();
    });
}
