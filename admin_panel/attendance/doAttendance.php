<?php
session_start();

include("C:/xampp/htdocs/php/IFS/admin_panel/links.php");

if (isset($_POST["submit"])) {
    $sel = $conn->prepare("SELECT EXISTS(SELECT 1 FROM member WHERE email = '" . $_POST["email"] . "') AS email_exists");
    $sel->execute();
    $sel = $sel->fetchAll();
    $sel = $sel[0];

    if ($sel["email_exists"]) {

        if ($_POST["attendance_status"] != "Absent") {
            $in = $conn->prepare("INSERT INTO `attendance` VALUES ('', '" . $_POST["email"] . "', NOW(), NOW(), '0000-00-00 00:00:00', " . $_POST["session_duration"] . ", '" . $_POST["attendance_status"] . "')");

            $in->execute();
            $_SESSION["success"] = "Your Check-In at <strong>INVIGOR FITNESS STUDIO</strong> has been Successfully Recorded.";
        }
        else {
            $in = $conn->prepare("INSERT INTO `attendance` VALUES ('', '" . $_POST["email"] . "', NOW(), '0000-00-00 00:00:00', '0000-00-00 00:00:00', " . $_POST["session_duration"] . ", '" . $_POST["attendance_status"] . "')");
    
            $in->execute();
        }
    } else {
        $_SESSION["error"] = "This Member is not Exist";
    }

    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}
