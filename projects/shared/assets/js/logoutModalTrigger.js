// Variable de control para rastrear si el modal ya se ha mostrado
let isModalShown = false;

// Al cargar la página, agregamos una entrada al historial
window.history.pushState(null, null, window.location.href);

window.addEventListener('popstate', function(event) {
    if (!isModalShown) {
        // Si el modal no se ha mostrado antes, lo mostramos ahora
        $('#logoutModal').modal('show'); // Mostrar el modal de cierre de sesión
        isModalShown = true; // Marcamos que el modal ha sido mostrado
        window.history.pushState(null, null, window.location.href); // Evitar que el usuario realmente vaya hacia atrás
    } else {
        // Si el modal ya se ha mostrado, volvemos a empujar el estado sin hacer nada
        // Esto asegura que el modal se muestre nuevamente si se vuelve a presionar la flecha hacia atrás
        window.history.pushState(null, null, window.location.href);
    }
});

// Evento para resetear la variable de control cuando el modal se cierra
$('#logoutModal').on('hidden.bs.modal', function () {
    isModalShown = false; // Resetear la variable de control cuando el modal se cierra
});
