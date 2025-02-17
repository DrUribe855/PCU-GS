<div class="todo-izq">
  <div class="menuizq-fondo"></div>
</div>
<div class="menuizq">
	<?php if(empty($username)): ?>
		<ul class="nav emp-derech">
			<li><span class="glow"></span><a href="?a=0" title="Inicio"><i class="icono-inicio icono-2x"></i> Inicio</a></li>
			<li><span class="glow"></span><a href="?a=1&b=1" title="Inicio"><i class="icono-perfil icono-2x"></i> Iniciar Sesion</a></li>
			<li><span class="glow"></span><a href="?a=1&b=3" title="Inicio"><i class="icono-salir icono-2x"></i> Registrarse</a></li>
			<li><span class="glow"></span><a href="?a=6&b=2" title="Inicio"><i class="icono-reglas icono-2x"></i> Reglas GSRP</a></li>
		</ul>
	<?php else: ?>
		<div class="abajomenu"></div>
		<div class="nombrebusq">
			<b>Estadisticas Generales</b>
		</div>
		<div class="contentperf">
			<div class="avatarperfil">
				<img src="<?= getUserAvatar($connection, $userId) ?>" alt="skin" style="max-width:155px;max-height:155px; z-index:5; border: solid 1px #7C7C7C;" class="b3noabajo">
				<div class="nombreest">
					<?php if(getPrincipalUserInformationById($connection, $userId, 'vip') == 0) : ?>
						<span class="marcovip bord3">No VIP</span>
					<?php elseif(getPrincipalUserInformationById( $connection, $userId,'vip') == 1) : ?>
						<span class="marcovip bord3"><b>VIP BRONCE</b></span>
					<?php elseif(getPrincipalUserInformationById( $connection, $userId,'vip') == 2) : ?>
						<span class="marcovip bord3"><b>VIP PLATA</b></span>
					<?php elseif(getPrincipalUserInformationById( $connection, $userId,'vip') == 3) : ?>
						<span class="marcovip bord3"><b>VIP GOLD</b></span>
					<?php endif ?>
				</div>
			</div>
			<div class="marcotexto2">
				<div class="marcotexto">';
					<?php $nivel = getPrincipalUserInformationById($connection, $userId,'nivel');
					if($nivel == 1): ?> <b>Puntos de respeto: <?= getPrincipalUserInformationById($connection, $userId, 'experiencia') ?>/ 7</b>
					<?php elseif($nivel == 2): ?> <<b>Puntos de respeto: <? getPrincipalUserInformationById($connection, $userId, 'experiencia') ?> / 7</b>
					<?php elseif($nivel == 2): ?><b>Puntos de respeto: <?= getPrincipalUserInformationById($connection, $userId, 'experiencia') ?> / 12</b>
					<?php elseif($nivel == 3): ?><b>Puntos de respeto: <?= getPrincipalUserInformationById($connection, $userId, 'experiencia') ?> / 19</b>
					<?php elseif($nivel == 4): ?><b>Puntos de respeto: <?= getPrincipalUserInformationById($connection, $userId, 'experiencia') ?> / 31</b>
					<?php elseif($nivel == 5): ?><b>Puntos de respeto: <?= getPrincipalUserInformationById($connection, $userId, 'experiencia') ?> / 52</b>
					<?php elseif($nivel == 6): ?><b>Puntos de respeto: <?= getPrincipalUserInformationById($connection, $userId, 'experiencia') ?> / 86</b>
					<?php elseif($nivel == 7): ?><b>Puntos de respeto: <?= getPrincipalUserInformationById($connection, $userId, 'experiencia') ?> / 143</b>
					<?php elseif($nivel == 8): ?><b>Puntos de respeto: <?= getPrincipalUserInformationById($connection, $userId, 'experiencia') ?> / 239</b>
					<?php elseif($nivel == 9): ?><b>Puntos de respeto: <?= getPrincipalUserInformationById($connection, $userId, 'experiencia') ?> / 397</b>
					<?php elseif($nivel == 10): ?><b>Puntos de respeto: <?= getPrincipalUserInformationById($connection, $userId, 'experiencia') ?> / 662</b>
					<?php elseif($nivel == 11): ?><b>Puntos de respeto: <?= getPrincipalUserInformationById($connection, $userId, 'experiencia') ?> / 846</b>
					<?php elseif($nivel == 12): ?><b>Puntos de respeto: <?= getPrincipalUserInformationById($connection, $userId, 'experiencia') ?> / 1044</b>
					<?php elseif($nivel == 13): ?><b>Puntos de respeto: <?= getPrincipalUserInformationById($connection, $userId, 'experiencia') ?> / 1259</b>
					<?php elseif($nivel == 14): ?><b>Puntos de respeto: <?= getPrincipalUserInformationById($connection, $userId, 'experiencia') ?> / 1427</b>
					<?php elseif($nivel == 15): ?><b>Puntos de respeto: <?= getPrincipalUserInformationById($connection, $userId, 'experiencia') ?> / 1654</b>
					<?php endif ?>
					
					<div class="progress progress-striped progress-blue active">
						<div class="bar tip" title="10%" data-percent="10" style="width: 10%;"></div>
					</div>
					  
					<div class="barra-prog barra-progresos activo">
						<div class="barraprog" style="width: 60%;">
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="abajomenu"></div>

		<ul class="nav nav-collapse collapse nav-collapse-primary">
			<li class="active">
			<span class="glow"></span>
			  <a href="#">
				  <i class="icono-inicio icono-2x"></i>
				  <span>Inicio</span>
			  </a>
			</li>
			<li class="">
			<span class="glow"></span>
			  <a href="#">
				  <i class="icono-adms icono-2x"></i>
				  <span>Equipo Admin</span>
			  </a>
			</li>
			
			<li class="">
			<span class="glow"></span>
			  <a href="#">
				  <i class="icono-reglas icono-2x"></i>
				  <span>Reglas</span>
			  </a>
			</li>
			<li class="">
			<span class="glow"></span>
			  <a href="#">
				  <i class="icono-contacto icono-2x"></i>
				  <span>Contactenos</span>
			  </a>
			</li>
		</ul>

		<div class="abajomenu"></div>

		<div class="nombrebusq">
			<b>Perfil Jugador:</b>
		</div>

		<div class="contenbusq">
			<?php if(empty($username)): ?>
				<div class="alerta alerta-error"><b>Inicia sesion<br>Si deseas buscar un perfil.</b></div>
			<?php else: ?>
				<b><form><input class="busquedausuario" placeholder="Nombre_Apellido" id="jugador" type="text"></form></b>
			<?php endif ?>

			<div id="cargando" style="display:none;">
				<img src="imagenes/cargando.gif" height="30" width="30">
			</div>
		</div>
		<br>
		<div class="bordebusq">
			<table class="busqueda" cellspacing="0">
			<br>
			<tbody id="resultados">
			</tbody>
			</table>
			<div class="abajomenu">
			</div>
		</div>
	<?php endif ?>
</div>