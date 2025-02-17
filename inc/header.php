<?php 
    error_reporting(1);
    ini_set('display_errors', '1');
	session_start();
	// $_SESSION['nombre'] = null;
	// $_SESSION['id_users'] = null;
	// $_SESSION['nombre'] = "Web_Master";
	// $_SESSION['id_users'] = 1;
    include 'func.php'; // Archivo de conexión a base de datos.
	include 'config.php';
	function getUserAvatar($connection, $userId){
		return "imagenes/skins/".htmlspecialchars(getPrincipalUserInformationById($connection, $userId, "skin")).".png";
	}

	function getTotalUsers($connection){
		$sql = "SELECT COUNT(*) AS totalUsers FROM users";
		$result = mysqli_query($connection, $sql);
		$row = mysqli_fetch_array($result);
		return $row["totalUsers"];
	}

	$username = isset($_SESSION['nombre']) ? htmlspecialchars($_SESSION['nombre']): null;
	$userId = isset($_SESSION['id_users']) ? (int) htmlspecialchars($_SESSION['id_users']): null;
	// $notifications = $username ? getUserNotifications($connection, $username): [];
	echo "<script>console.log('Username: " . addslashes($username) . "');</script>";
	echo "<script>console.log('UserID: " . $userId . "');</script>";	
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
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Carrusel -->
    <?php include 'carrusel.php'; ?>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


</body>

