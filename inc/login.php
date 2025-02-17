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
            $_SESSION['error'] = 'Por favor, rellene todos los campos';
            
        }else{
            if(userExists($connection, $username)){
                if(validatePassword($connection, $username, $password)){
                    header('Location: ../index.php');
                    exit;
                }else{
                    $_SESSION['error'] = 'Contraseña incorrecta';
                    
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
        $user = mysqli_fetch_array($result);
        if($password == $user['password']){
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['id_users'] = $user['id_users'];
            return true;
        }else{
            return false;
        }
    }


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        logIn($connection, $username, $password);
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Iniciar sesión</title>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mt-5">
                        <div class="card-header text-center">
                            <h3>Iniciar sesión</h3>
                        </div>
                        <div class="card-body">
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
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="username">Usuario</label>
                                    <input type="text" name="username" id="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <small>&copy; Powered by Golden State Roleplay</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
?>
