<?php
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    if (!validateEmail($email)) {
        echo "Invalid email format.";
        return;
    }

    if (!validatePassword($password)) {
        echo "Password must be at least 8 characters and contain at least one number.";
        return;
    }
 }
?>