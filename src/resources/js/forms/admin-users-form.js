document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('create-user-form');

    
    form.addEventListener('submit', async function (e) {
        e.preventDefault(); // Evita el envío tradicional

        const formData = new FormData(form);
        const locale = document.documentElement.lang;
        const token = localStorage.getItem('api_token'); // o desde meta tag

        try {
            const response = await fetch('/api/admin/users/store', {
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

            alert(data.message); // Usuario creado correctamente.
            form.reset(); // Limpiar formulario
            // Redirigir o actualizar tabla
        } catch (error) {
            console.error('Error al crear usuario:', error);
        }
    });
});







// document.addEventListener('DOMContentLoaded', () => {
//     const form = document.querySelector('#create-user-form');

//     form.addEventListener('submit', async function (e) {
//         e.preventDefault();

//         const formData = new FormData(form);
//         const url = form.action;

//         try {
//             const response = await fetch(url, {
//                 method: 'POST',
//                 headers: {
//                     'Accept': 'application/json',
//                     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//                 },
//                 body: formData
//             })

//             if (!response.ok) {
//                 const errorData = await response.json(); // errores 422, 500, etc.
//                 console.error('Error en la respuesta:', errorData);
//                 alert('Error al crear el usuario: ' + (errorData.message || 'por favor intenta nuevamente'));
//                 return;
//             }

//             const result = await response.json();

//             if (result.success) {
//                 alert(result.message);
//                 form.reset();
//             } else {
//                 alert('Error al crear el usuario');
//             }


//         } catch (error) {
//             console.error(error);
//             alert('Error al crear el usuario por favor intenta nuevamente');
//         }
//     });
// });

