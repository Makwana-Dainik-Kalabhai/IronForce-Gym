<?php

session_start();
require("C:/xampp/htdocs/php/IFS/path.php");
include(DRIVE_PATH . "../database.php");

if (isset($_POST["save"])) {

    if (isset($_FILES["img"]["name"]) && $_FILES["img"]["name"] != null) {
        if (str_contains($_FILES["img"]["name"], "'")) {
            $_FILES["img"]["name"] = explode("'", $_FILES["img"]["name"]);
            $_FILES["img"]["name"] = $_FILES["img"]["name"][0] . $_FILES["img"]["name"][1];
        }
    }

    $address = array(
        "house-number" => $_POST["house-number"],
        "apartment" => $_POST["apartment"],
        "suite" => $_POST["suite"],
        "city" => $_POST["city"],
        "pincode" => $_POST["pincode"]
    );

    $up = $conn->prepare("UPDATE member SET `img`='" . $_FILES["img"]["name"] . "', `FirstName`='" . $_POST["FirstName"] . "', `LastName`='" . $_POST["LastName"] . "', `phone`='" . $_POST["phone"] . "', `gender`='" . $_POST["gender"] . "', `dob`='" . $_POST["dob"] . "', `address`='" . serialize($address) . "'");

    if ($up->execute()) {
        move_uploaded_file($_FILES["img"]["tmp_name"], DRIVE_PATH . "/img/profile/" . $_FILES["img"]["name"] . "");

        $_SESSION["success"] = "Profile Details Updated Successfully";
    }

    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}
