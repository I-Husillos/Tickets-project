$('#comment-form').on('submit', function(event) {
    event.preventDefault(); // Evitar que el formulario se envíe de inmediato
    let form = $(this);

    // Enviar el formulario a través de AJAX
    $.ajax({
        type: "POST",
        url: form.attr('action'),
        data: form.serialize(),
        success: function(response) {
            // Mostrar mensaje de éxito
            alert(response.message || 'Comentario agregado exitosamente');

            // Cerrar el modal y limpiar el formulario
            $('#commentModal').modal('hide');
            form.trigger('reset'); // Limpiar el formulario
        },
        error: function(xhr, status, error) {
            // Manejar errores de la solicitud
            alert('Ocurrió un error, por favor intenta nuevamente');
        }
    });
});