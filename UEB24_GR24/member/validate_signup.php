<?php
require_once 'functions.php';
require_once 'User.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? "";
    $surname = $_POST["surname"] ?? "";
    $username = $_POST["username"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    if (validateName($name) !== 1 || validateName($surname) !== 1) {
        echo "Name and Surname should only contain letters.";
        return;
    }

    if (validateUsername($username) !== 1) {
        echo "Username should be 5-15 characters.";
        return;
    }

    if (!validateEmail($email)) {
        echo "Invalid email format.";
        return;
    }

    if (validatePassword($password) !== 1) {
        echo "Password must be at least 8 characters and contain at least one number.";
        return;
    }

    $user = new User($name, $surname, $username, $email);
    $user->setPassword($password);

    var_dump($user);

    echo "Signup successful!";
}
?>
