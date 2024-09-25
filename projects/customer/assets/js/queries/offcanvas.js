// Seleccionamos los elementos para el estado de consultas
const openMenuButton = document.getElementById('openMenu');
const closeMenuButton = document.getElementById('closeMenu');
const offcanvas = document.getElementById('offcanvasEstado');
const overlay = document.getElementById('overlay');

// Función para abrir el menú y mostrar el overlay
openMenuButton.addEventListener('click', function() {
    offcanvas.classList.add('active');
    overlay.classList.add('active'); // Mostrar el overlay
});

// Función para cerrar el menú y ocultar el overlay
closeMenuButton.addEventListener('click', function() {
    offcanvas.classList.remove('active');
    overlay.classList.remove('active'); // Ocultar el overlay
});

// Cerrar el menú y el overlay si se hace clic fuera del menú
overlay.addEventListener('click', function() {
    offcanvas.classList.remove('active');
    overlay.classList.remove('active');
});

// Seleccionamos los elementos para el historial
const openHistorialButton = document.getElementById('openHistorial');
const closeHistorialButton = document.getElementById('closeHistorial');
const offcanvasHistorial = document.getElementById('offcanvasHistorial');
const overlayHistorial = document.getElementById('overlayHistorial');

// Función para abrir el menú de historial y mostrar el overlay
openHistorialButton.addEventListener('click', function() {
    offcanvasHistorial.classList.add('active');
    overlayHistorial.classList.add('active');
});

// Función para cerrar el menú de historial y ocultar el overlay
closeHistorialButton.addEventListener('click', function() {
    offcanvasHistorial.classList.remove('active');
    overlayHistorial.classList.remove('active');
});

// Cerrar el menú de historial y el overlay si se hace clic fuera del menú
overlayHistorial.addEventListener('click', function() {
    offcanvasHistorial.classList.remove('active');
    overlayHistorial.classList.remove('active');
});
