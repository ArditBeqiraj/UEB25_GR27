<?php
require_once 'popup-functions.php';
require '../admin/db.php';

function random_num($length)
{
    $text = "";
    if ($length < 5) {
        $length = 5;
    }

    $len = rand(4, $length);

    for ($i = 0; $i < $len; $i++) {
        $text .= rand(0, 9);
    }

    return $text;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? "";
    $surname = $_POST["surname"] ?? "";
    $username = $_POST["username"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    $comfirm_password = $_POST["confirm-password"] ?? "";

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

    if ($password != $comfirm_password) {
        die("Password should match");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        die("Username ose email tashmë ekziston.");
    }

    $user_id = random_num(20);
    $sql = "INSERT INTO users (name, surname, user_id, username, email, password) 
            VALUES ('$name', '$surname', '$user_id', '$username', '$email', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
       
        header("Location: ../index.php#log-in");
        exit(); 
    } else {
        echo "Gabim: " . mysqli_error($conn);
    }
}