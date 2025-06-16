import $ from 'jquery';

export function initEditTicketForm(token) {
    $('#edit-ticket-form').on('submit', function (e) {
        e.preventDefault();

        const ticketId = $(this).data('ticket-id');
        const locale = document.documentElement.lang || 'en';

        const formData = {
            title: $('#title').val(),
            description: $('#description').val(),
            status: $('#status').val(),
            priority: $('#priority').val(),
            type: $('#type').val(),
            assigned_to: $('#assigned_to').val() || null,
        };

        fetch(`/api/admin/tickets/update/${ticketId}`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token,
                'X-Locale': locale,
                'Accept': 'application/json'
            },
            body: JSON.stringify(formData)
        })
        .then(res => {
            if (!res.ok) throw new Error('Error al guardar');
            return res.json();
        })
        .then(data => {
            alert(data.message || 'Cambios guardados correctamente');
        })
        .catch(err => {
            console.error(err);
            alert('Error al guardar los cambios');
        });
    });
}
