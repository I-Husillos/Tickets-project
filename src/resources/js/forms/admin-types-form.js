document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('create-type-form');

    form.addEventListener('submit', async function (e) {
        e.preventDefault(); // Evita el envío tradicional

        const formData = new FormData(form);
        const locale = document.documentElement.lang;
        const token = localStorage.getItem('api_token'); // o desde meta tag

        try {
            const response = await fetch('/api/admin/types/store', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok) {
                // Mostrar errores de validación
                console.error('Errores:', data.errors);
                return;
            }

            alert(data.message);
            form.reset();

        } catch (error) {
            console.error('Error al crear el tipo:', error);
            alert('Error al crear el tipo: ' + error.message);
        }
    });
});