<?php

session_start();
require '../admin/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);


        if (password_verify($password, $user["password"])) {

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_email"] = $user["email"];
            $_SESSION["role"] = $user["role"];
            $_SESSION["logged_in"] = true;

            if ($user["role"] == "admin") {
                header("Location: ../admin/dashboard.php");
            } else {
                header("Location: ../client/index.php");
            }
            exit();
        } else {
            $_SESSION["error"] = "Fjalëkalimi është i gabuar.";
            header("Location: ../index.php");
            exit();
        }
    } else {
        $_SESSION["error"] = "Përdoruesi me këtë email nuk ekziston.";
        header("Location: ../index.php");
        exit();
    }
}
?>