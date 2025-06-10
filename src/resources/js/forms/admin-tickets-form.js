document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('edit-ticket-form');
    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData();
        const token = localStorage.getItem('api_token');
        const ticketId = form.getAttribute('action').split('/').pop();

        // Añadimos los campos
        formData.set('title', document.getElementById('title').value.trim());
        formData.set('description', document.getElementById('description').value.trim());
        formData.set('type', document.getElementById('type').value);
        formData.set('priority', document.getElementById('priority').value);

        const assignedTo = document.getElementById('assigned_to');
        if (assignedTo) formData.set('assigned_to', assignedTo.value);

        const status = document.getElementById('status');
        if (status) formData.set('status', status.value);

        // Método PATCH simulado con FormData
        formData.set('_method', 'PATCH');

        try {
            const response = await fetch(`/api/admin/tickets/update/${ticketId}`, {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json',
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok) {
                if (data.errors) {
                    Object.values(data.errors).flat().forEach(msg => alert(msg));
                } else {
                    alert(data.message || 'Error al actualizar el ticket.');
                }
                return;
            }

            alert(data.message || 'Ticket actualizado correctamente');
            setTimeout(() => location.reload(), 1500);

        } catch (error) {
            console.error(error);
            alert('Error de red inesperado.');
        }
    });
});
