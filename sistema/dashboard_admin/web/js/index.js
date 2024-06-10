const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');

sideLinks.forEach(item => {
    const li = item.parentElement;
    item.addEventListener('click', () => {
        sideLinks.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});

const menuBar = document.querySelector('.content nav .bx.bx-menu');
const sideBar = document.querySelector('.sidebar');

menuBar.addEventListener('click', () => {
    sideBar.classList.toggle('close');
});

const searchBtn = document.querySelector('.content nav form .form-input button');
const searchBtnIcon = document.querySelector('.content nav form .form-input button .bx');
const searchForm = document.querySelector('.content nav form');

searchBtn.addEventListener('click', function (e) {
    if (window.innerWidth < 576) {
        e.preventDefault;
        searchForm.classList.toggle('show');
        if (searchForm.classList.contains('show')) {
            searchBtnIcon.classList.replace('bx-search', 'bx-x');
        } else {
            searchBtnIcon.classList.replace('bx-x', 'bx-search');
        }
    }
});

window.addEventListener('resize', () => {
    if (window.innerWidth < 768) {
        sideBar.classList.add('close');
    } else {
        sideBar.classList.remove('close');
    }
    if (window.innerWidth > 576) {
        searchBtnIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
});

const toggler = document.getElementById('theme-toggle');

toggler.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('dark');
    } else {
        document.body.classList.remove('dark');
    }
});


// Captura todos los enlaces del menú lateral
const sideMenuLinks = document.querySelectorAll('.side-menu a');

// Itera sobre los enlaces del menú lateral y agrega un evento de clic a cada uno
sideMenuLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault(); // Evita la acción predeterminada del enlace

        // Oculta todas las secciones de contenido
        const views = document.querySelectorAll('.view');
        views.forEach(view => {
            view.style.display = 'none';
        });

        // Obtiene el ID de la vista asociada al enlace
        const viewId = link.getAttribute('data-view');

        // Muestra la vista correspondiente
        const targetView = document.getElementById(viewId);
        if (targetView) {
            targetView.style.display = 'block';
        }
    });
});


$(document).ready(function() {
    // Inicializar la tabla de DataTables en español
    var table = $('#clientTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });

    // Función para abrir el modal de agregar/editar cliente
    $('#addButton').click(function() {
        $('#modalTitle').text('Agregar Cliente');
        $('#modal').show();
    });

    // Función para cerrar el modal
    $('.close').click(function() {
        $('#modal').hide();
    });

    // Función para guardar el cliente
    $('#clientForm').submit(function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();
        // Aquí debería haber una llamada AJAX para guardar los datos del cliente
        // Una vez guardado el cliente, se debería actualizar la tabla y cerrar el modal
        $('#modal').hide();
    });

    // Función para eliminar un cliente
    $('#clientTable tbody').on('click', 'button.delete', function() {
        // Aquí debería haber una llamada AJAX para eliminar el cliente seleccionado
        // Una vez eliminado el cliente, se debería actualizar la tabla
    });

    // Función para editar un cliente
    $('#clientTable tbody').on('click', 'button.edit', function() {
        // Aquí debería haber una llamada AJAX para obtener los datos del cliente seleccionado
        // Una vez obtenidos los datos, se deberían mostrar en el modal de edición y abrirlo
    });
});

