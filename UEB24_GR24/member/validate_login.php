<?php

require '../admin/db.php';


session_start();
require '../admin/db.php'; // lidhja me databazën

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password) && !is_numeric($email)) {

        //read from database
        $query = "select * from users where email = '$email' limit 1";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {

                    $_SESSION['user_id'] = $user_data['user_id'];
                }
            }
        }
        header("Location: ../admin/dashboard.php");
        die;
    } else {
        echo "wrong username or password!";
    }
}