<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="web/css/style.css">
    <title>ArxaTEC ADMIN</title>
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
            <li><a href="#" data-view="clientes"><i class='bx bx-user'></i>Gestión de Clientes</a></li>
            <li><a href="#" data-view="citas"><i class='bx bx-calendar'></i>Gestión de Citas</a></li>
            <li><a href="#" data-view="casos"><i class='bx bx-briefcase'></i>Gestión de Casos</a></li>
            <li><a href="#" data-view="facturacion"><i class='bx bx-dollar'></i>Facturación</a></li>
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
            <p>Bienvenido al Dashboard.</p>
        </main>

        <main id="clientes" class="view" style="display: none;">
            <?php
            // Incluir el archivo PHP deseado aquí
            include 'web/views/clientes.php';
            ?>
        </main>

        <main id="citas" class="view" style="display: none;">
            <h2>Gestión de Citas</h2>
            <p>Aquí puedes gestionar las citas.</p>
        </main>

        <main id="casos" class="view" style="display: none;">
            <h2>Gestión de Casos</h2>
            <p>Aquí puedes gestionar los casos.</p>
        </main>

        <main id="facturacion" class="view" style="display: none;">
            <h2>Facturación</h2>
            <p>Aquí puedes gestionar la facturación.</p>
        </main>

        <main id="configuracion" class="view" style="display: none;">
            <h2>Configuración</h2>
            <p>Aquí puedes configurar el sistema.</p>
        </main>

        <main id="ayuda" class="view" style="display: none;">
            <h2>Ayuda y Soporte</h2>
            <p>Aquí puedes encontrar ayuda y soporte.</p>
        </main>
    </div>


    <script src="web/js/index.js"></script>
</body>

</html>