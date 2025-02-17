<?php
    // include '../inc/func.php';
    include '../inc/config.php';
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<div class="mensajealerta mazul" style="width:80%;" ><b>Importante:</b><br>La seccion de <b>Informacion vehiculos</b> esta en la version <b>BETA</b>, por lo que se pueden presentar algunos errores de estadisticas.</div>
<hr class="gs">
<div class="inventario" style="text-align:center;">Informacion Vehiculos</div>
<hr class="gs">
<ul>
    <?php   
        $vehicles = getUserVehicles($connection, $userId, 'modelo');
        foreach ($vehicles as $vehicle): ?>
        <li><img style="" src="../imagenes/vehi/<?= $vehicle?>.png"></li>
        <p><?= $vehicle ?></p>
            
    <?php endforeach; ?>        
</ul>
