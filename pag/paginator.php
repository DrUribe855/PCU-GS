<?php
    include '../inc/config.php';
    include '../inc/func.php';

    $autos = getUserVehicles($connection, 1, );
    foreach( $autos as  $auto ) {
        echo $auto["data"]["health"];
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginación Segura con Fetch API</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .paginacion button {
            margin: 5px;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        .paginacion button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginador con JS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Lista de Vehículos</h2>
    <div id="vehicleTable"></div>
    <nav>
        <ul class="pagination" id="pagination"></ul>
    </nav>
</div>

<script>
// Pasar la variable PHP a JavaScript
let vehicles = <?php echo json_encode($autos); ?>;

let currentPage = 1;
const itemsPerPage = 5; // Cantidad de elementos por página

// Mostrar los datos paginados
function displayPage(page) {
    currentPage = page;
    const start = (page - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const dataToShow = vehicles.slice(start, end);

    let html = `<table class="table table-bordered">
                    <tr><th>ID</th><th>Marca</th><th>Modelo</th><th>Placa</th></tr>`;
    dataToShow.forEach(vehicle => {
        html += `<tr>
                    <td>${vehicle.data.health}</td>
                    <td>${vehicle.data.combustible}</td>
                    <td>${vehicle.modelo}</td>
                    <td>${vehicle.data.matricula}</td>
                 </tr>`;
    });
    html += `</table>`;

    document.getElementById("vehicleTable").innerHTML = html;
}

// Crear paginación
function createPagination() {
    const totalPages = Math.ceil(vehicles.length / itemsPerPage);
    let paginationHTML = "";

    for (let i = 1; i <= totalPages; i++) {
        paginationHTML += `<li class="page-item ${i === currentPage ? 'active' : ''}">
            <a class="page-link" href="#" onclick="displayPage(${i})">${i}</a>
        </li>`;
    }

    document.getElementById("pagination").innerHTML = paginationHTML;
}

// Inicializar tabla y paginación
displayPage(1);
createPagination();

</script>


</body>
</html>