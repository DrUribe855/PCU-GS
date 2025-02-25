<?php
    session_start();
    include '../inc/config.php';
    include '../inc/func.php';
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $userId = isset($_SESSION['id_users']);
    if(empty($userId)) {
        header('Location: ../index.php');
    }

    $autos = getUserVehicles($connection, 1, );

    function moneyFormat($number, $fractional = false) {
        $decimals = $fractional ? 2 : 0;  
        return number_format($number, $decimals, ',', '.'); 
    }

    $inventory = getUserInventory($connection, $userId);
    $userData = getUserData($connection, $userId);
    $principalUserData = getPrincipalUserInformation($connection, $userId);
    $extraUserData = getUserExtraInformation($connection, $userId);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginador con JS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <style>
		@import url('https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap');
	</style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container-fluid text-center mt-4 container-image" >
        <div class="row m-0">
            <div class="col-lg-2 col-sm-12">
                <div class="border mt-3 rounded">
                    <div class="">
                        <h5 class="text-center border text-black m-0 p-1"><?= $userData['nombre']; ?></h5>
                        <img src="<?= '../imagenes/skins/' . $principalUserData['skin'] . '.png' ?>" alt="Avatar" class="profile-img rounded">
                    </div>
                </div>
                <div class="btn w-100 border mt-2">
                    <i class="fa-solid fa-gear"></i>
                    <a href="#" class="text-black text-decoration-none">Configuración de cuenta</a>
                </div>
                <div class="btn w-100 border mt-2">
                    <i class="fas fa-trophy"></i>
                    <a href="#" class="text-black text-decoration-none">Resumen y logros</a>
                </div>
                <div class="card-money">
                    <span class="text-black">💰 Moneda GS</span>
                    <span class="badge bg-warning"> <?= moneyFormat($principalUserData['monedas']); ?></span>
                </div>
                <div class="card-money">
                    <span class="text-black">💵 Dinero</span>
                    <span class="badge bg-success">$ <?= moneyFormat($principalUserData['dinero']); ?></span>
                </div>
                <div class="card-money">
                    <span class="text-black">🏦 Banco</span>
                    <span class="badge bg-primary">$ <?= moneyFormat($principalUserData['banco']); ?></span>
                </div>
            </div>
            <div class="col-lg-10 col-sm-12 mt-3">
                <div class="row d-flex justify-content-between mb-2">
                    <div class="col-sm-12 col-lg-3 pb-2">
                        <div class="card">
                            <a class="btn btn-perfil" href="perfil.php">Información</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 pb-2">
                        <div class="card">
                            <a class="btn btn-perfil" href="paginator.php">Vehiculos</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 pb-2">
                        <div class="card">
                            <a class="btn btn-perfil" href="">Información</a>
                        </div>        
                    </div>
                    <div class="col-sm-12 col-lg-3 pb-2">
                        <div class="card">
                            <a class="btn btn-perfil" href="">Información</a>
                        </div>        
                    </div>
                </div>
                <div class="container border shadow rounded">
                <div class="row mt-3 d-flex ">
                    <h3 class="mb-4 col-sm-12 col-lg-12 mt-2">Tus vehiculos</h3>
                </div>
                <div class="container mt-4" id="vehicleTable"></div>
                <nav>
                    <ul class="pagination" id="pagination"></ul>
                </nav>
            </div>
        </div>     
    </div>

    <script>
        let vehicles = <?php echo json_encode($autos); ?>;
        let currentPage = 1;
        const itemsPerPage = 5;

        function displayPage(page){
            currentPage = page;
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const dataToShow = vehicles.slice(start, end);

            let html = `<table class="table table-bordered">
                            <tr><th>Modelo</th><th>Combustible</th><th>Daño</th><th>Vehiculo</th></tr>`;
            dataToShow.forEach(vehicle => {
                html += `<tr>
                            <td>${vehicle.modelo}</td>
                            <td>${vehicle.data.combustible}</td>
                            <td>${vehicle.data.health}%</td>
                            <td><img style="width: 4em;" src="../imagenes/vehi/${vehicle.data.modelo}.png"></td>
                        </tr>`;
            });
            html += `</table>`;

            document.getElementById("vehicleTable").innerHTML = html;
            updatePagination();
        }

        function updatePagination(){
            let paginationContainer = document.getElementById("pagination");
            paginationContainer.innerHTML = ""; // Limpiar los botones antes de regenerarlos

            const totalPages = Math.ceil(vehicles.length / itemsPerPage);
            
            for (let i = 1; i <= totalPages; i++) {
                let li = document.createElement("li");
                li.classList.add("page-item");
                if (i === currentPage) {
                    li.classList.add("active"); // Marcar la página actual
                }

                let a = document.createElement("a");
                a.classList.add("page-link");
                a.href = "#";
                a.innerText = i;
                a.onclick = function () {
                    displayPage(i); // Cambiar de página
                    return false; // Evitar recarga de página
                };

                li.appendChild(a);
                paginationContainer.appendChild(li);
            }
        }

        function createPagination(){
            const totalPages = Math.ceil(vehicles.length / itemsPerPage);
            let paginationHTML = "";

            for (let i = 1; i <= totalPages; i++){
                paginationHTML += `<li class="page-item ${i === currentPage ? 'active' : ''}">
                    <a class="page-link" href="#" onclick="displayPage(${i})">${i}</a>
                </li>`;
            }

            document.getElementById("pagination").innerHTML = paginationHTML;
        }

        displayPage(1);
        createPagination();


    </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>