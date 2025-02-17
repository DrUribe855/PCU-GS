<?php
    session_start();
    include '../inc/config.php';
    include '../inc/func.php';
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $userId = $_SESSION['id_users'];

    function moneyFormat($number, $fractional = false) {
        $decimals = $fractional ? 2 : 0;  
        return number_format($number, $decimals, ',', '.'); 
    }

    $usuario = [
        'nombre' => 'Shakewell Outlawz',
        'edad' => 20,
        'nivel' => 7,
        'experiencia' => '34 EXP. (6,286 min)',
        'sanciones' => 5,
        'ultima_conexion' => '25/01/2022 09:53',
        'telefono' => '319035',
        'salud' => '78%',
        'chaleco' => '0%',
        'skin' => '146',
        'dinero' => 686,
        'banco' => 0
    ];
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Golden State Roleplay</title>
    <!-- Bootstrap CSS -->
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap');
	</style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-color">
		<div class="container-fluid">
			<!-- Icono a la izquierda -->
			<a class="navbar-brand" href="#">
				<img src="../imagenes/gslogo.png" alt="Icono" width="70" height="70" class="d-inline-block align-text-top" style="margin-left: 0.5em;">
				Golden State Roleplay
			</a>

			<!-- Botón para colapsar en dispositivos móviles -->
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Contenedor del navbar -->
			<div class="collapse navbar-collapse " id="navbarNav">
				<!-- Items centrados -->
				<ul class="navbar-nav mx-auto gap-5">
					<li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Tienda</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Foro</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Discord</a></li>
				</ul>

				<!-- Elementos a la derecha -->
				<div class="d-flex ms-auto align-items-center">
					<?php if(empty($username)): ?>
						<a href="inc/login.php" class="btn logIn-btn text-white me-3">Iniciar sesión</a>
					<?php else: ?>
						<!-- Dropdown alineado a la derecha -->
						<li class="dropdown nav-link" style="padding-right: 2em; padding-top: 0.5em;">
							<a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Menú
							</a>
							<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="pag/perfil.php">Perfil</a></li>
								<li><a class="dropdown-item" href="#">Salir</a></li>
								<li><hr class="dropdown-divider"></li>
							</ul>
						</li>
					<?php endif ?>
				</div>
			</div>
		</div>
	</nav>
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-2">
                <div class="border mt-3">
                    <div>
                        <h5 class="text-center text-black">Shakewell Outlawz</h5>
                        <hr class="text-secondary">
                        <img src="../imagenes/skins/2.png" alt="Avatar" class="profile-img">
                    </div>
                    <div class="menu-item">
                        <i class="fas fa-cog"></i>
                        <a href="#" class="text-black text-decoration-none">Configuración de cuenta</a>
                    </div>
                    <div class="menu-item">
                        <i class="fas fa-trophy"></i>
                        <a href="#" class="text-black text-decoration-none">Resumen y logros</a>
                    </div>
                    <div class="card-money">
                        <span class="text-black">💰 Moneda GS</span>
                        <span class="text-warning">3000</span>
                    </div>
                    <div class="card-money">
                        <span class="text-black">💵 Dinero</span>
                        <span class="badge bg-success">$686</span>
                    </div>
                    <div class="card-money">
                        <span class="text-black">🏦 Banco</span>
                        <span class="badge bg-primary">$0</span>
                    </div>
                </div>
            </div>
            <div class="col-10 mt-3">
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <a class="btn btn-primary" href="">Información</a>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <a class="btn btn-primary" href="">Vehiculos</a>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <a class="btn btn-primary" href="">Información</a>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <a class="btn btn-primary" href="">Información</a>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <h3>Información de tu cuenta</h3>
                    <div class="col-6 ">
                    <div class="d-flex flex-column">
                        <table class="table table-bordered">
                            <tbody>
                                <tr >
                                    <div class="d-flex justify-content-between text-center border">
                                        <p>📌 Nombre:</p>
                                        <p class="pe-2 pt-2"><strong><?php echo $usuario['nombre']; ?></strong></p>
                                    </div>
                                    <td >
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <p>📅 Edad:</p>
                                            <p class="pe-2"><strong><?php echo $usuario['edad']; ?> años</strong></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <p>🎖 Nivel:</p>
                                            <p class="pe-2"><strong><?php echo $usuario['nivel']; ?></strong></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <p>⚠️ Sanciones:</p>
                                            <p class="pe-2"><strong><?php echo $usuario['sanciones']; ?></strong></p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        
                        
                        
                        
                    </div>
                    </div>
                    <div class="col-6 border">
                        <div class="d-flex flex-column">
                            <p>🏅 Logros: <strong>Logros</strong></p>
                            <p>🎯 Objetivos: <strong>Objetivos</strong></p>
                            <p>💼 Puesto: <strong>Puesto</strong></p>
                            <p>🌍 Ubicación: <strong>Ubicación</strong></p>
                            <p>📧 Correo: <strong>Correo</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="container border">
        <div class="row border">
            <div class="col-4 sidebar mt-3">
                <h5 class="text-center text-black">Shakewell Outlawz</h5>
                <hr class="text-secondary">
                <img src="../imagenes/skins/2.png" alt="Avatar" class="profile-img">
                <div class="menu-item">
                    <i class="fas fa-cog"></i>
                    <a href="#" class="text-black text-decoration-none">Configuración de cuenta</a>
                </div>
                <div class="menu-item">
                    <i class="fas fa-trophy"></i>
                    <a href="#" class="text-black text-decoration-none">Resumen y logros</a>
                </div>
                <div class="card-money">
                    <span class="text-black">💰 Moneda GS</span>
                    <span class="text-warning">3000</span>
                </div>
                <div class="card-money">
                    <span class="text-black">💵 Dinero</span>
                    <span class="badge bg-success">$686</span>
                </div>
                <div class="card-money">
                    <span class="text-black">🏦 Banco</span>
                    <span class="badge bg-primary">$0</span>
                </div>
                <div class="container text-center mt-3 me-1 ms-1 p-3">
            </div>
        </div>
            
            
        </div>
        
        
        <div class="container text-center mt-3 me-1 ms-1 p-3">
            <div class="row border ms-1 me-1">
                <a class="col-3 border text-black p-1" href="">Información</a>
                <a class="col-3 border text-black p-1" href="">Vehiculos</a>
                <a class="col-3 border text-black p-1" href="">Información</a>
                <a class="col-3 border text-black p-1" href="">Información</a>
            </div>
                    </div>
        
    </div> -->
    
</body>




