<?php
session_start();

unset($_SESSION["email"]);
if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
}
