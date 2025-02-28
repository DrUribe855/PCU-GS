<?php
    include_once 'config.php';
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    if( isset($_POST["username"]) && isset($_POST["age"]) && isset($_POST["sex"]) &&
        isset($_POST["email"]) && isset($_POST["race"]) &&  isset($_POST["city"]) &&
        isset($_POST["password"]))
    {

        if(formatValidate($_POST["username"])){
            $connection->begin_transaction();

            try{
                $username = $_POST["username"];
                $age = $_POST["age"];
                $sex =  $_POST["sex"];
                $email = $_POST["email"];
                $race = $_POST["race"];
                $city = $_POST["city"];
                $password = $_POST["password"];
                $salt = substr(generateSalt(), 0, 11);
                echo $salt;
                $encryptedPassword = hashPassword($password, $salt);

                $stmt1 = mysqli_prepare($connection, "INSERT INTO users (nombre, password, salt, email ) VALUES (?,?,?,?)");
                $stmt1->bind_param("ssss", $username, $encryptedPassword, $salt, $email);
                $stmt1->execute();

                $userId = $stmt1->insert_id;

                $stmt2 = mysqli_prepare($connection, "INSERT INTO usuario_extra (usuario_id, raza, edad, sexo, ciudad) VALUES (?,?,?,?,?)");
                $stmt2->bind_param("issss",$userId, $race, $age, $sex, $city);
                $stmt2->execute();

                $connection->commit();
            }catch(Exception $e){
                $connection->rollback();
                echo "Errpr añ registrar el usuario: " . $e->getMessage();
            }
            
            $stmt1->close();
            $stmt2->close();
            $connection->close();
        }    
    }else{
        echo "Faltan datos";
        echo $_POST["username"];
        echo $_POST["age"];
        echo $_POST["sex"];
        echo $_POST["email"]; 
        echo $_POST["race"];  
        echo $_POST["city"];
        echo "salt".$salt;
        echo $_POST["password"];
    } 

    function formatValidate($username){
        $regex = '/^[A-Z][a-z]+_[A-Z][a-z]+$/';

        if (preg_match($regex, $username)) {
            return true;
        } else {
            return false;
        }
    }
    
    function generateSalt($length = 11) {
        return bin2hex(random_bytes($length));
    }

    function hashPassword($password, $salt) {
        return hash('sha256', $salt . $password);
    }


?>