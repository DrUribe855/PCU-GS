<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    require_once '../inc/config.php';
    require_once '../inc/func.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    $username = $_POST['username'];
    if(!$username){
        header('Location: login.php');
    }

    $sql = "SELECT * FROM users WHERE nombre = ?";
    $stmt = mysqli_prepare($connection, $sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    // var_dump($result->fetch_assoc());

    if($result -> num_rows > 0) {
        // echo "llego aca";
        $row = $result -> fetch_assoc();
        $mail = new PHPMailer(true);
        var_dump($row['email']);
        
        $userEmail = $row['email'];
        echo $userEmail;
        $newPassword = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"),0,8);

        function passwordHash($newPassword) {
            return hash('sha256', $newPassword);
        }

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'deathgun855@gmail.com';                     //SMTP username
            $mail->Password   = 'scdn eybs yqrt asau';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('deathgun855@gmail.com', 'Soporte Golden State');
            $mail->addAddress($userEmail, $username);     //Add a recipient

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Recuperación de cuenta - '.$username;
            $mail->Body    = '¡Hola! '. $username. ", Tu nueva contraseña es: ". passwordHash($newPassword) .".";
            $mail->AltBody = 'Sino solicitaste este email por favor haz caso omiso.';

            $mail->send();
            $passwordHash = passwordHash($newPassword);
            $updateSql = "UPDATE users SET password = ? WHERE email = ?";
            $stmt = mysqli_prepare($connection, $updateSql);
            $stmt->bind_param("ss", $passwordHash, $userEmail);
            $stmt->execute();
            $stmt->close();
            header("Location: login.php");
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }else{

    }
?>