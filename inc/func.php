<?php
    include("config.php");
    function totalUsers($connection){
        $connectedUsers = mysqli_query($connection, "SELECT COUNT(*) AS total FROM users WHERE conectado = 1");
        $totalUsers = mysqli_fetch_array($connectedUsers);
        echo $totalUsers['total'];
    }

    /* Función para extracción de datos de usuarios de la tabla users */
    function getUserData($connection, $userId){
        $sql = "SELECT * FROM users WHERE id_users = ?";
        $stmt = mysqli_prepare($connection, $sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc() ?? [];
    }

    /* Función para extracción de datos de usuarios de la tabla usuario_principal */

    function getPrincipalUserInformation($connection, $userId){
        $sql = "SELECT * FROM usuario_principal WHERE usuario_id = ?";
        $stmt = mysqli_prepare($connection, $sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc() ?? [];
    }

    /* Función para extracción de datos de usuarios de la tabla de usuario_extra */

    function getUserExtraInformation($connection, $userId){
        $sql = "SELECT * FROM usuario_extra WHERE usuario_id = ?";
        $stmt = mysqli_prepare($connection, $sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc() ?? [];
    }

    /* Función para extracción de datos de usuarios de la tabla de usuario_inventario */

    function getUserInventory($connection, $userId){
        $sql = "SELECT * FROM usuario_inventario WHERE usuario_id = ?";
        $stmt = mysqli_prepare($connection, $sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc() ?? [];
    }

    /* Función para extracción de datos de la tabla vehiculos */

    function getUserVehicles($connection, $userId, $key){
        $sql = "SELECT $key FROM vehiculos WHERE prop_id = ?";
        $stmt = mysqli_prepare($connection, $sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $vehicles = [];
        while($row = $result->fetch_assoc()){
            $vehicles[] = $row[$key];
        }

        return $vehicles;
    }

    // Función para verificar si un usuario es admin y validar que rango tiene.
    function isAdmin($connection, $userId){
        $sql = "SELECT admin FROM usuario_principal WHERE usuario_id = ?";
        $stmt = mysqli_prepare($connection, $sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if( $row = $result->fetch_assoc()){
            return htmlspecialchars($row['admin']);
        }
		return null;
	}

    function userExists($connection, $username){
        $sql = 'SELECT nombre FROM users WHERE nombre = ?';
        $stmt = mysqli_prepare($connection, $sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            return true;
        }
    }

    function getVehicleName($vehicleid){
		$carname = array("Landstalker", "Bravura", "Buffalo", "Linerunner", "Perrenial", "Sentinel",
		"Dumper", "Firetruck", "Trashmaster", "Stretch", "Manana", "Infernus",
		"Voodoo", "Pony", "Mule", "Cheetah", "Ambulance", "Leviathan", "Moonbeam",
		"Esperanto", "Taxi", "Washington", "Bobcat", "Whoopee", "BF Injection",
		"Hunter", "Premier", "Enforcer", "Securicar", "Banshee", "Predator", "Bus",
		"Rhino", "Barracks", "Hotknife", "Trailer", "Previon", "Coach", "Cabbie",
		"Stallion", "Rumpo", "RC Bandit", "Romero", "Packer", "Monster", "Admiral",
		"Squalo", "Seasparrow", "Pizzaboy", "Tram", "Trailer", "Turismo", "Speeder",
		"Reefer", "Tropic", "Flatbed", "Yankee", "Caddy", "Solair", "Berkley's RC Van",
		"Skimmer", "PCJ-600", "Faggio", "Freeway", "RC Baron", "RC Raider", "Glendale",
		"Oceanic","Sanchez", "Sparrow", "Patriot", "Quad", "Coastguard", "Dinghy",
		"Hermes", "Sabre", "Rustler", "ZR-350", "Walton", "Regina", "Comet", "BMX",
		"Burrito", "Camper", "Marquis", "Baggage", "Dozer", "Maverick", "News Chopper",
		"Rancher", "FBI Rancher", "Virgo", "Greenwood", "Jetmax", "Hotring", "Sandking",
		"Blista Compact", "Police Maverick", "Boxvillde", "Benson", "Mesa", "RC Goblin",
		"Hotring Racer A", "Hotring Racer B", "Bloodring Banger", "Rancher", "Super GT",
		"Elegant", "Journey", "Bike", "Mountain Bike", "Beagle", "Cropduster", "Stunt",
		"Tanker", "Roadtrain", "Nebula", "Majestic", "Buccaneer", "Shamal", "Hydra",
		"FCR-900", "NRG-500", "HPV1000", "Cement Truck", "Tow Truck", "Fortune",
		"Cadrona", "FBI Truck", "Willard", "Forklift", "Tractor", "Combine", "Feltzer",
		"Remington", "Slamvan", "Blade", "Freight", "Streak", "Vortex", "Vincent",
		"Bullet", "Clover", "Sadler", "Firetruck", "Hustler", "Intruder", "Primo",
		"Cargobob", "Tampa", "Sunrise", "Merit", "Utility", "Nevada", "Yosemite",
		"Windsor", "Monster", "Monster", "Uranus", "Jester", "Sultan", "Stratium",
		"Elegy", "Raindance", "RC Tiger", "Flash", "Tahoma", "Savanna", "Bandito",
		"Freight Flat", "Streak Carriage", "Kart", "Mower", "Dune", "Sweeper",
		"Broadway", "Tornado", "AT-400", "DFT-30", "Huntley", "Stafford", "BF-400",
		"News Van", "Tug", "Trailer", "Emperor", "Wayfarer", "Euros", "Hotdog", "Club",
		"Freight Box", "Trailer", "Andromada", "Dodo", "RC Cam", "Launch", "Police Car",
		"Police Car", "Police Car", "Police Ranger", "Picador", "S.W.A.T", "Alpha",
		"Phoenix", "Glendale", "Sadler", "Luggage", "Luggage", "Stairs", "Boxville",
		"Tiller", "Utility Trailer");
		$vehicleid = (int) $vehicleid; // Asegúrate de que sea un número
		$key = $vehicleid - 400;

		// Verificar si la clave existe en el arreglo
		if (isset($carname[$key])) {
			return $carname[$key];
		} else {
			// Manejar el caso en el que la clave no existe
			return "Clave no encontrada";
		}
	}



 









    

?>



