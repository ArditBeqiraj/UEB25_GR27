<?php

if (!isset($_SESSION["logged_in"])) {
    header("Location: ../index.php");
    exit();
}

if ($_SESSION["role"] !== "admin") {
    header("Location: ../client/index.php");
    exit();
}
