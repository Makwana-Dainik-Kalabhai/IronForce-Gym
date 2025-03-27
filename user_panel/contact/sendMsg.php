<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("C:/xampp/htdocs/php/IronForce-Gym/path.php");

include(DRIVE_PATH . "../database.php");


function send_email($name, $email, $message)
{

    require DRIVE_PATH . "/user_panel/class/phpmailer/src/Exception.php";
    require DRIVE_PATH . "/user_panel/class/phpmailer/src/PHPMailer.php";
    require DRIVE_PATH . "/user_panel/class/phpmailer/src/SMTP.php";

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "dainikmakwana31@gmail.com";
    $mail->Password = "kjhc tkbb hzcn ciep";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    $mail->setFrom($email);
    $mail->addAddress("dainikmakwana31@gmail.com");

    $mail->isHTML(true);
    $mail->Subject = "$name sended a Message!";

    $msg = $message;

    $mail->Body = $msg;
    if ($mail->send()) {
        $_SESSION["success"] = "Message sent Successfully";
    }
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER'] . "");
    }
}

send_email($_POST["name"], $_POST["email"], $_POST["message"]);
