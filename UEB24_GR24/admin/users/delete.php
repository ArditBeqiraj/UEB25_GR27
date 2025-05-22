<?php


require "../db.php";

$id = $_GET['id'] ?? null;

if ($id && is_numeric($id)) {
    $sql = "DELETE FROM users WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "Gabim gjatë fshirjes: " . mysqli_error($conn);
    }
} else {
    echo "ID e pavlefshme!";
}
