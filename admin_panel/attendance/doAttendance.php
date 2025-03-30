<?php
session_start();

include("C:/xampp/htdocs/php/IronForce-Gym/admin_panel/links.php");

if (isset($_POST["submit"])) {
    $in = $conn->prepare("INSERT INTO `attendance` VALUES ('', '" . $_POST["email"] . "', NOW(), NOW(), '" . $_POST["check_out_time"] . "', " . $_POST["session_duration"] . ", '" . $_POST["attendance_status"] . "')");

    if ($in->execute()) {
        $_SESSION["success"] = "Your check-in at <strong>INVIGOR FITNESS STUDIO</strong> has been successfully recorded.";
    }
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}
