<?php 
// include("../seguridad.php");
include("config.php");

function seguridad_sql($var)
{
	include("config.php");
	return mysqli_real_escape_string($connection, $var);
}
function seguridad_php($var)
{
return stripslashes(htmlentities($var, ENT_QUOTES, "UTF-8"));
}

function CuentaDatoNombre($nombre, $dato)
{
	include("config.php");
	$sql = mysqli_query($connection, "SELECT * FROM `jugadores` WHERE nombre = '".seguridad_sql($nombre)."'");
	if(mysqli_num_rows($sql) > 0){
		while($row = mysqli_fetch_array($sql)){
			$q = $row[''.$dato.''];
			return htmlentities($q);
		}
	}else{
		return 1;
	}
}
$sql4 = mysqli_query($connection, "SELECT * FROM `f_categorias` WHERE tipo = '0'");
if(mysqli_num_rows($sql4) > 0)
{
$cont = 0;
	while($col4 = mysqli_fetch_array($sql4))
	{
	$cont++;
		$sql = mysqli_query($connection,"SELECT * FROM `f_categorias` WHERE tipo = '1' AND vinculo = '".seguridad_sql($col4['id'])."'");
		if(mysqli_num_rows($sql) > 0)
		{
		
			echo'
			<link rel="stylesheet" type="text/css" href="../css/estilos.css">
			<div class="ventanamarco">
			<div class="bordes" style="min-width:730px; width:99%;">
			<div class="fondo-titulox">
						<span class="icono"><img src="../img/estrella.png" alt=""></span>';
				echo'<span class="titulo">'.$col4['nombre'].'</span>
					</div>
			<div class="dentrocaja" style="padding:-20px;">
				<div class="tablas-bonit">
					<table class="tablas tablas-bloque tablas-bordeado tablas-mov">
					<thead>
					<tr>
						<th style="width:3%">
							Imagen
						</th>
						<th style="width:50%">
							Titulo con descripcion
						</th>
						<th style="width:30%">
							Ultimas respuestas
						</th>
						<th style="width:5%">
							Estadisticas
						</th>
					</tr>
					</thead>
					<tbody class="font-museo"><tr>';
			while($col = mysqli_fetch_array($sql))
			{
				
						
						$ultimotema = '<center>No hay respuestas en esta categoria</center>';
						$sql2 = mysqli_query($connection, "SELECT * FROM `f_temas` WHERE categoria = '".$col['id']."' ORDER BY `fecha` ASC");
						if(mysqli_num_rows($sql2) > 0) 
						{ 
							while($col2 = mysqli_fetch_array($sql2))
							{
							$sql3 = mysqli_query($connection,"SELECT * FROM `f_respuestas` WHERE vinculo = '".$col2['id']."' ORDER BY `fecha` ASC");
								while($col3 = mysqli_fetch_array($sql3))
								{
								$id=CuentaDatoNombre($col3['autor'],"id")+100000000;
								$sacarxd = seguridad_php($col3['autor']);
								$remarxd = str_replace('_', ' ', $sacarxd);
								
								$ultimotema = '<center>Ultima resp. por <a style="" href="?a=4&b='.$id.'"><b>'.$remarxd.'</b></a> en<br><a style="color:black;" href="?a=8&b=4&c='.$col2['id'].'"><b>'.seguridad_php($col2['nombre']).'</b></a><br>El '.$col3['fecha'].'</center>';
								}
							}
						}
							$numresp=0;
							$sqlq = mysqli_query($connection, "SELECT * FROM `f_temas` WHERE categoria = '".seguridad_sql($col['id'])."'");
							while($colq = mysqli_fetch_array($sqlq))
							{
								$numresp=$numresp+$colq['respuestas'];				
							}
							$temas = mysqli_num_rows($sqlq);
							
							echo'<td><img src="img/foro/'.$col['imagen'].'" width="48px" height="48px" align="left" style="padding:2px; -webkit-border-radius: 7px 7px 7px 7px; border: solid 1px #696C69;"></td>';
							echo'<td><a href="?a=8&b=3&c='.$col['id'].'"><b>'.seguridad_php($col['nombre']).'</b></a><br />';
					
							$sql99 = mysqli_query($connection, "SELECT * FROM `f_categorias`");
							if(mysqli_num_rows($sql99) == 0) { echo''.seguridad_php($col['descripcion']).''; }
							else
							{
								while($col99 = mysqli_fetch_array($sql99))
								{
									echo'<a href="?a=8&b=3&c='.$col99['id'].'"><img src="img/subforo.png">'.$col99['nombre'].'</a> ';
								}
							}
							echo'</td>';
							echo'<td>'.$ultimotema.'</td>';
							echo'<td><center><b>'.$temas.'</b><br>Temas</center></td>';
							echo'<td><center><b>'.$numresp.'</b><br>Resp.</center></td>';

				
						$ultimotema = '<center>No hay respuestas en esta categoria</center>';
						$sql2 = mysqli_query($connection, "SELECT * FROM `f_temas` WHERE categoria = '".$col['id']."' ORDER BY `fecha` ASC");
						if(mysqli_num_rows($sql2) > 0) 
						{ 
							while($col2 = mysqli_fetch_array($sql2))
							{
							$sql3 = mysqli_query($connection,"SELECT * FROM `f_respuestas` WHERE vinculo = '".$col2['id']."' ORDER BY `fecha` ASC");
								while($col3 = mysqli_fetch_array($sql3))
								{
								$sacarxd2 = seguridad_php($col3['autor']);
								$remarxd2 = str_replace('_', ' ', $sacarxd2);
								$id=CuentaDatoNombre($col3['autor'],"id")+100000000;
								$ultimotema = '<center>Ultima resp. por <a href="?a=4&b='.$id.'"><b>'.$remarxd2.'</b></a> en<br><a style="color:black;" href="?a=8&b=4&c='.$col2['id'].'"><b>'.seguridad_php($col2['nombre']).'</b></a><br>El '.$col3['fecha'].'</center>';
								}
							}
						}
							$numresp=0;
							$sqlq = mysqli_query($connection, "SELECT * FROM `f_temas` WHERE categoria = '".seguridad_sql($col['id'])."'");
							while($colq = mysqli_fetch_array($sqlq))
							{
								$numresp=$numresp+$colq['respuestas'];				
							}
							$temas = mysqli_num_rows($sqlq);
							
							echo'<td><img src="img/foro/'.$col['imagen'].'" style="border:1px solid #ebebeb; margin-left:10px; margin-top:10px; margin-right:10px;" align="left" width="50px" height="50px"></td>';
							echo'<td><a href="?a=8&b=3&c='.$col['id'].'"><b>'.seguridad_php($col['nombre']).'</b></a><br />';
							$sql99 = mysqli_query($connection,"SELECT * FROM `f_categorias` ");
							if(mysqli_num_rows($sql99) == 0) { echo''.seguridad_php($col['descripcion']).''; }
							else
							{
								while($col99 = mysqli_fetch_array($sql99))
								{
									echo'<a href="?a=8&b=3&c='.$col99['id'].'"><img src="img/subforo.png">'.$col99['nombre'].'</a> ';
								}
							}
							echo'</td>';
							echo'<td>'.$ultimotema.'</td>';
							echo'<td><center><b>'.$temas.'</b><br>Temas</center></td>';
							echo'<td><center><b>'.$numresp.'</b><br>Resp.</center></td>';
				
							
					echo'</tr>';
			}
			echo'</tbody></form></table>
			</div></div></div></div>';
			
				
		}
	} 
} 
?>