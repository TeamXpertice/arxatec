<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Gestión de Clientes</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="client-management container">
        <h2>CRUD de Gestión de Clientes</h2>
        <button id="addButton">Agregar Cliente</button>
        <table id="clientTable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se cargarán los datos de los clientes -->
            </tbody>
        </table>
    </div>

    <!-- Modal para agregar/editar cliente -->
    <div id="modal" class="client-management modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modalTitle">Agregar Cliente</h2>
            <form id="clientForm">
                <input type="hidden" id="clientId">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <label for="phone">Teléfono:</label>
                <input type="text" id="phone" name="phone">
                <button type="submit" id="saveButton">Guardar</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="scripts.js"></script>
</body>

</html>