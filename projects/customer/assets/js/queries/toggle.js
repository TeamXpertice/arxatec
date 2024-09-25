document.addEventListener('DOMContentLoaded', function() {
    // Al hacer clic en "consultar"
    document.getElementById('consultarButton').addEventListener('click', function(e) {
        e.preventDefault();  // Evita que el enlace realice su comportamiento predeterminado
        document.getElementById('consultasSection').classList.add('d-none');  // Oculta toda la sección de consultas
        document.getElementById('mensajeConsulta').classList.remove('d-none');  // Muestra el formulario de consulta
    });

    // Al hacer clic en "Volver"
    document.getElementById('volverButton').addEventListener('click', function(e) {
        e.preventDefault();  // Evita el comportamiento predeterminado
        document.getElementById('mensajeConsulta').classList.add('d-none');  // Oculta el formulario de consulta
        document.getElementById('consultasSection').classList.remove('d-none');  // Muestra la sección de consultas nuevamente
    });
});
