<?php

if (!isset($_SESSION["logged_in"])) {
    header("Location: ../index.php");
    exit();
}

if ($_SESSION["role"] !== "client") {
    header("Location: ../admin/dashboard.php");
    exit();
}
