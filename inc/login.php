<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    session_start();  
    include 'config.php';
    include 'func.php';

    if (isset($_SESSION['id_users'])) {
        header("Location: ../index.php");
        exit;
    }
    
    function logIn($connection, $username, $password){

        if(empty($username) || empty($password)){
            $_SESSION['error'] = 'Hay campos sin diligenciar';
            
        }else{
            if(userExists($connection, $username)){
                if(validatePassword($connection, $username, $password)){
                    header('Location: ../index.php');
                    exit;
                }else{
                    $_SESSION['error'] = 'Datos incorrectos';
                }
            }else{
               $_SESSION['error'] = 'El usuario no existe';
            }
        }
           
    }

    function validatePassword($connection, $username, $password){
        $sql = 'SELECT id_users, nombre, password FROM users WHERE nombre = ?';
        $stmt = mysqli_prepare($connection, $sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        if($password == $user['password']){
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['id_users'] = $user['id_users'];
            return true;
        }else{
            return false;
        }
    }


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        logIn($connection, $_POST['username'], $_POST['password']);
    }

    

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap');
        </style>
        <link rel="stylesheet" href="../css/styles.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Iniciar sesión</title>
    </head>
    <body>
        <div class="background d-flex justify-content-center align-items-center min-vh-100">
            <!-- From Uiverse.io by Praashoo7 --> 
            <form class="form" method="POST">
                <p id="heading"><strong>Inicio de sesión</strong></p>
                
                <div class="field">
                    <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"></path>
                    </svg>
                    <input autocomplete="off" placeholder="Nombre de usuario" name="username" class="input-field" type="text">
                </div>
                <div class="field">
                    <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
                    </svg>
                    <input placeholder="Contraseña" class="input-field" name="password" type="password">
                </div>
                <div class="btn">
                <button class="button1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ingresar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <button class="button2">Registrarse</button>
                </div>
                <button class="button3">Recuperar contraseña</button>
            </form>
        </div>



        <?php if(isset($_SESSION['error'])): ?>
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: '<?php echo $_SESSION['error']; ?>'
                                }).then(() => {
                                    window.location.href = 'login.php'; // Redirige después de cerrar la alerta
                                });
                            </script>
                            <?php unset($_SESSION['error']); ?>
                        <?php endif; ?>
                        <?php if(isset($_SESSION['success'])): ?>
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Éxito',
                                    text: '<?php echo $_SESSION['success']; ?>'
                                });
                            </script>
                            <?php unset($_SESSION['success']); ?>
                        <?php endif; ?>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
