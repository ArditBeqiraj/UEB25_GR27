<?php

include("../db.php");
session_start();

$id = $_GET['id'] ?? null;

if ($id && is_numeric($id)) {
    // Kontrollo nëse aeroplani është i lidhur me ndonjë tabelë
    $hasRent = mysqli_num_rows(mysqli_query($conn, "SELECT 1 FROM rent WHERE airplane_id = $id")) > 0;
    $hasBuy  = mysqli_num_rows(mysqli_query($conn, "SELECT 1 FROM airplane_purchase_requests WHERE airplane_id = $id")) > 0;
    $hasTrans = mysqli_num_rows(mysqli_query($conn, "SELECT 1 FROM transactions WHERE airplane_id = $id")) > 0;

    if ($hasRent || $hasBuy || $hasTrans) {
        echo "<script>
            alert('Ky aeroplan nuk mund të fshihet sepse është i lidhur me sistemin (qira, blerje ose transaksione).');
            window.location.href = 'index.php';
        </script>";
        exit;
    }

    // Nëse nuk ka lidhje, vazhdo me fshirjen
    $sql = "DELETE FROM airplanes WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?deleted=success");
    } else {
        echo "<script>
            alert('Gabim gjatë fshirjes: " . mysqli_error($conn) . "');
            window.location.href = 'index.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID e pavlefshme!');
        window.location.href = 'index.php';
    </script>";
}
