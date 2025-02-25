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
    <title>Golden State Roleplay</title>
    <!-- Bootstrap CSS -->
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap');
	</style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body class="background-profile">
    <?php include_once 'navbar.php'; ?>
    <?php include_once 'sidebar.php'; ?>        
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>



