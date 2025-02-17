    
    
    
    
    <nav class="navbar navbar-expand-lg navbar-color">
		<div class="container-fluid">
			<!-- Icono a la izquierda -->
			<a class="navbar-brand" href="#">
				<img src="imagenes/gslogo.png" alt="Icono" width="70" height="70" class="d-inline-block align-text-top" style="margin-left: 0.5em;">
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