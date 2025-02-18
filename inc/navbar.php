<?php
    $userId = isset($_SESSION['id_users']);
    $userName = isset($_SESSION['nombre']);
?>


<nav class="navbar navbar-expand-lg container-fluid p-0 navbar-color">
    <div class="row w-100 m-0 d-flex align-items-center position-relative">
        <!-- Icono en pantallas grandes -->
        <div class="col-lg-3 d-none d-lg-flex align-items-center">
            <a href="#"><img src="imagenes/gslogo.png" alt="" class="nav-icon img-fluid"></a>
        </div>
        
        <!-- Botón para el menú en dispositivos móviles -->
        <button class="navbar-toggler d-lg-none ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Menú desplegable lateral para móviles -->
        <div class="offcanvas offcanvas-start d-lg-none navbar-color" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="mobileMenuLabel">
                    <a href="#"><img src="imagenes/gslogo.png" alt="" class="nav-icon img-fluid"></a>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr>
            <div class="offcanvas-body">
                <ul class="list-unstyled">
                    <li><a href="index.php" class="text-white">Inicio</a></li>
                    <li><a href="" class="text-white">Tienda</a></li>
                    <li><a href="" class="text-white">Foro</a></li>
                    <li><a href="" class="text-white">Discord</a></li>
                    <?php if($userId): ?>
                        <li><a href="inc/login.php" class="text-white">Perfil</a></li>
                    <?php else: ?>
                        <li><a href="login.php" class="text-white">Iniciar sesión</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        
        <!-- Menú normal en pantallas grandes -->
        <ul class="col-lg-6 col-md-6 col-sm-8 col-xs-8 d-none d-lg-flex justify-content-around align-items-center list-unstyled m-0">
            <li><a href="index.php" class="text-white nav-link">Inicio</a></li>
            <li><a href="" class="text-white nav-link">Tienda</a></li>
            <li><a href="" class="text-white nav-link">Foro</a></li>
            <li><a href="" class="text-white nav-link">Discord</a></li>
        </ul>
		<!-- Botón de iniciar sesión en pantallas grandes -->
        <ul class="col-lg-3 d-none d-lg-flex justify-content-end align-items-center list-unstyled m-0 pe-4">
            <?php if($userId): ?>
                <li><a href="pag\perfil.php" class="text-white">Perfil</a></li>
            <?php else: ?>
                <li><a href="login.php" class="text-white">Iniciar sesión</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>