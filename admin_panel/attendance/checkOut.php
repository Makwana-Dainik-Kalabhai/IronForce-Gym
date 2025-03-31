<?php
session_start();

include("C:/xampp/htdocs/php/IFS/admin_panel/links.php");

if (isset($_POST["submit"])) {
    $sel = $conn->prepare("SELECT EXISTS(SELECT 1 FROM member WHERE email = '" . $_POST["email"] . "') AS email_exists");
    $sel->execute();
    $sel = $sel->fetchAll();
    $sel = $sel[0];

    if ($sel["email_exists"]) {
        
        $up = $conn->prepare("UPDATE `attendance` SET `check_out_time`=NOW() WHERE `check_out_time`='0000-00-00 00:00:00'");
        $up->execute();
        $_SESSION["success"] = "Your Check-Out at <strong>INVIGOR FITNESS STUDIO</strong> has been Successfully Recorded.";
    } else {
        $_SESSION["error"] = "This Member is not Exist";
    }

    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}
