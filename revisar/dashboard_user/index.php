<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="web/css/style.css">
    <title>ArxaTEC</title>
    <link rel="icon" href="web/img/ARXATEC.png" type="image/png" />
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bx-buildings'></i>
            <div class="logo-name"><span>Arxa</span>TEC</div>
        </a>
        <ul class="side-menu">
            <li><a href="#" data-view="dashboard"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="#" data-view="servicios"><i class='bx bx-briefcase'></i>Servicios Legales</a></li>
            <li><a href="#" data-view="consultas"><i class='bx bx-message-square-detail'></i>Consultas ArxaTEC</a></li>
            <li><a href="#" data-view="seguimiento"><i class='bx bx-line-chart'></i>Seguimiento legal</a></li>
            <li><a href="#" data-view="cursos"><i class='bx bx-book-open'></i>Cursos</a></li>
            <li><a href="#" data-view="configuracion"><i class='bx bx-cog'></i>Configuración</a></li>
            <li><a href="#" data-view="ayuda"><i class='bx bx-help-circle'></i>Ayuda y Soporte</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Cerrar sesión
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Buscar...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a>
            <a href="#" class="profile">
                <img src="web/img/logo.png">
            </a>
        </nav>

        <!-- End of Navbar -->

        <main id="dashboard" class="view">
            <h2>Contenido del Dashboard</h2>
            <p>Bienvenido al Dashboard. Aquí podrás ver estadísticas clave sobre el rendimiento del sistema.</p>
        </main>

        <main id="servicios" class="view" style="display: none;">
            <h2>Gestión de Clientes</h2>
            <p>Aquí puedes gestionar a tus clientes. Agrega, visualiza y actualiza la información de tus clientes.</p>
        </main>

        <main id="consultas" class="view" style="display: none;">
            <h2>Gestión de Citas</h2>
            <p>Aquí puedes gestionar las citas. Programa nuevas citas, visualiza las citas programadas y recibe recordatorios de citas pendientes.</p>
        </main>

        <main id="seguimiento" class="view" style="display: none;">
            <h2>Gestión de Casos</h2>
            <p>Aquí puedes gestionar los casos. Registra información detallada sobre cada caso, adjunta documentos relevantes y realiza un seguimiento de plazos importantes.</p>
        </main>

        <main id="cursos" class="view" style="display: none;">
            <h2>Plataforma de Cursos</h2>
            <p>Accede a material de formación sobre temas legales. Inscríbete en cursos, realiza un seguimiento del progreso y completa evaluaciones.</p>
        </main>

        <main id="configuracion" class="view" style="display: none;">
            <h2>Configuración</h2>
            <p>Personaliza la configuración del sistema. Ajusta la apariencia, gestiona permisos de usuario y realiza integraciones con otras herramientas.</p>
        </main>

        <main id="ayuda" class="view" style="display: none;">
            <h2>Ayuda y Soporte</h2>
            <p>Encuentra ayuda y soporte. Accede a tutoriales, guías de usuario y ponte en contacto con nuestro equipo de soporte técnico.</p>
        </main>

    </div>


    <script src="web/js/index.js"></script>
</body>

</html>