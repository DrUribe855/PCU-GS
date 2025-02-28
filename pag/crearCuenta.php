<?php
    include '../inc/config.php';

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap');
        </style>
        <link rel="stylesheet" href="../css/styles.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Iniciar sesión</title>
    </head>
    <body>
        <div class="background d-flex justify-content-center align-items-center min-vh-100">
            <form class="form-register" action="../inc/createAccount.php" method="POST">
                <p id="heading"><strong>Registro de usuario</strong></p>
                <div class="container">
                    <div class="row d-flex justify-content-around">
                        <div class="field col-5 ">
                            <input autocomplete="off" placeholder="Nombre de usuario" name="username" class="input-field" type="text">
                        </div>
                        <div class="field col-5 ">
                            <input autocomplete="off" placeholder="Edad" name="age" class="input-field" type="text">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-around mt-4">
                        <div class="field col-5 ">
                            <select autocomplete="off" placeholder="Sexo" name="sex" class="input-field form-select" type="text">
                                <option class="bg-dark text-white" selected disabled>Género</option>
                                <option class="bg-dark text-white" value="1">Masculino</option>
                                <option class="bg-dark text-white" value="2">Femenino</option>
                            </select>
                        </div>
                        <div class="field col-5 ">
                            <input autocomplete="off" placeholder="Email" name="email" class="input-field" type="text">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-around mt-4">
                        <div class="field col-5 ">
                            <select autocomplete="off" placeholder="Género" name="race" class="input-field form-select" type="text">
                                <option class="bg-dark text-white" selected disabled>Raza</option>
                                <option class="bg-dark text-white" value="1">Norteamericano</option>
                                <option class="bg-dark text-white" value="2">Centroamericano</option>
                                <option class="bg-dark text-white" value="3">Sudamericano</option>
                                <option class="bg-dark text-white" value="4">Africano</option>
                                <option class="bg-dark text-white" value="5">Europeo</option>
                                <option class="bg-dark text-white" value="6">Euroasiatico</option>
                                <option class="bg-dark text-white" value="7">Asiatico</option>
                                <option class="bg-dark text-white" value="8">Oceanico</option>
                            </select>
                        </div>
                        <div class="field col-5 ">
                            <select autocomplete="off" placeholder="Ciudad" name="city" class="input-field form-select" type="text">
                                <option class="bg-dark text-white" selected disabled>Ciudad</option>
                                <option class="bg-dark text-white" value="1">Los Santos</option>
                                <option class="bg-dark text-white" value="2">San Fierro</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="field col-10 ">
                        <input autocomplete="off" placeholder="Contraseña" name="password" class="input-field" type="password">
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <button type="submit" class="create-user-button m-0 mt-4 mb-4 col-lg-10">Registrarse</button>
                </div>
                
            </form>
        </div>
    </body>
    