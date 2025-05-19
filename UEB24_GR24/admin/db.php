<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "aerosales";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("lidhja me db deshtoi" . $conn->connect_error);
}