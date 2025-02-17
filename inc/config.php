<?php
    $host = 'localhost';
    $user = 'gsroleplay';
    $password = 'fA52FW49DQ';
    $db = 'gsroleplay';
    $domain = 'http://gsroleplay.com'; //DEBE SER REAL SI O SI ej: nombre.com
    $connection = mysqli_connect($host,$user,$password);
mysqli_select_db($connection, $db);
?>