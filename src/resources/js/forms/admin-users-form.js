document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('#create-user-form');

    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const url = form.action;

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })

            if (!response.ok) {
                const errorData = await response.json(); // errores 422, 500, etc.
                console.error('Error en la respuesta:', errorData);
                alert('Error al crear el usuario: ' + (errorData.message || 'por favor intenta nuevamente'));
                return;
            }

            const result = await response.json();

            if (result.success) {
                alert(result.message);
                form.reset();
            } else {
                alert('Error al crear el usuario');
            }


        } catch (error) {
            console.error(error);
            alert('Error al crear el usuario por favor intenta nuevamente');
        }
    });
});

