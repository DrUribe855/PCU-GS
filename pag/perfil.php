<?php
    session_start();
    include '../inc/config.php';
    include '../inc/func.php';
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $userId = $_SESSION['id_users'];

    $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/imagenes/gslogo.png';

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php    include_once 'navbar.php'; ?>
    <div class="container-fluid text-center">
        <div class="row m-0">
            <div class="col-lg-2 col-sm-12">
                <div class="border mt-3">
                    <div>
                        <h5 class="text-center border text-black m-0 p-1">Shakewell Outlawz</h5>
                        <img src="../imagenes/skins/2.png" alt="Avatar" class="profile-img">
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
                    <span class="badge bg-warning">3000</span>
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
            <div class="col-lg-10 col-sm-12 mt-3">
                <div class="row">
                    <div class="col-sm-12 pb-2">
                        <div class="card">
                            <a class="btn" href="">Información</a>
                        </div>
                    </div>
                    <div class="col-sm-12 pb-2">
                        <div class="card">
                            <a class="btn" href="">Vehiculos</a>
                        </div>
                    </div>
                    <div class="col-sm-12 pb-2">
                        <div class="card">
                            <a class="btn" href="">Información</a>
                        </div>        
                    </div>
                    <div class="col-sm-12 pb-2">
                        <div class="card">
                            <a class="btn" href="">Información</a>
                        </div>        
                    </div>
                </div>
            </div>
            <div class="row mt-3 p-0 ps-4">
                    <h3 class="mb-3 col-sm-12">Información de tu cuenta</h3>
                    <div class="col-lg-6 col-sm-12 p-0">
                        <div class="d-flex flex-column">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1">🪪 Nombre:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?php echo $usuario['nombre']; ?></strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1" >📅 Edad:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?php echo $usuario['edad']; ?> años</strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1">⭐ Nivel:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?php echo $usuario['nivel']; ?></strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1">📈 Experiencia:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?php echo $usuario['nivel']; ?></strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1">⚠️ Sanciones:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?php echo $usuario['sanciones']; ?></strong></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 p-0">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1">🕒 Ultima conexión:</p>
                                        <p class="m-0 p-1 pe-2"><strong>1</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1">📱 Teléfono:</p>
                                        <p class="m-0 p-1 pe-2"><strong>1</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1">❤️ Salud:</p>
                                        <p class="m-0 p-1 pe-2"><strong>1</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1">🛡️ Chaleco:</p>
                                        <p class="m-0 p-1 pe-2"><strong>1</strong></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mt-3 p-0 ">
                <h3 class="mb-3 col-sm-12">Inventario</h3>
                <div class="col-lg-6 col-sm-12">
                    <div class="d-flex flex-column">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1">💊 Medicamentos:</p>
                                        <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1">🌿 Marihuana:</p>
                                        <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1">⚙️ Piezas:</p>
                                        <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1">📦 Materiales:</p>
                                        <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1">💉 Botiquines:</p>
                                        <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1">🌱 Semillas:</p>
                                        <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1">🎙️ Radio:</p>
                                        <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1">🪛 Destornillador:</p>
                                        <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="d-flex flex-column">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1"><img src="..\imagenes\iconos\armas\Weapon-4.gif" alt=""> Arma blanca:</p>
                                        <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1"><img src="..\imagenes\iconos\armas\Weapon-24.gif" alt=""> Pistola:</p>
                                        <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1"><img src="..\imagenes\iconos\armas\Weapon-27.gif" alt=""> Escopeta:</p>
                                        <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1"><img src="..\imagenes\iconos\armas\Weapon-29.gif" alt=""> Subfusil:</p>
                                        <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1"><img src="..\imagenes\iconos\armas\Weapon-31.gif" alt=""> Fusil de asalto:</p>
                                        <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1"><img src="..\imagenes\iconos\armas\Weapon-33.gif" alt=""> Rifle:</p>
                                        <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>




