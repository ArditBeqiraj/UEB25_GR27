<?php

include("../db.php");
session_start();

$id = $_GET['id'] ?? null;

if ($id && is_numeric($id)) {
    // Kontrollo nëse ka të dhëna të lidhura në rent, buy apo sell
    $hasRent = mysqli_num_rows(mysqli_query($conn, "SELECT 1 FROM rent WHERE name_surname IN (SELECT CONCAT(name, ' ', surname) FROM users WHERE id = $id)")) > 0;
    $hasBuy  = mysqli_num_rows(mysqli_query($conn, "SELECT 1 FROM airplane_purchase_requests WHERE buyer_email = (SELECT email FROM users WHERE id = $id)")) > 0;
    $hasSell = mysqli_num_rows(mysqli_query($conn, "SELECT 1 FROM airplane_sale_requests WHERE user_id = $id")) > 0;

    if ($hasRent || $hasBuy || $hasSell) {
        echo "<script>
            alert('Ky përdorues nuk mund të fshihet sepse ka të dhëna të lidhura me sistemin (qira, blerje ose shitje).');
            window.location.href = 'index.php';
        </script>";
        exit;
    }

    // Nëse nuk ka lidhje, vazhdo me fshirjen
    $sql = "DELETE FROM users WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "Gabim gjatë fshirjes: " . mysqli_error($conn);
    }
} else {
    echo "ID e pavlefshme!";
}
