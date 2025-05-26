<?php
session_start();
include("db.php");
require_once 'partials/header.php';

$user_id = $_SESSION['user_id'];

// 1. Aeroplanë të marrë me qira
$qira = $conn->query("
    SELECT r.*, a.name AS airplane_name
    FROM rent r
    JOIN airplanes a ON r.airplane_id = a.id
    WHERE r.name_surname = (
        SELECT CONCAT(name, ' ', surname) FROM users WHERE id = $user_id
    )
");

$blerje = $conn->query("
    SELECT p.*, a.name AS airplane_name
    FROM airplane_purchase_requests p
    JOIN airplanes a ON p.airplane_id = a.id
    WHERE p.status = 'approved'
      AND p.buyer_email = (SELECT email FROM users WHERE id = $user_id)
");

// 3. Kërkesa për shitje të paraqitura nga ky user
$shitje = $conn->query("
    SELECT * FROM airplane_sale_requests
    WHERE user_id = $user_id
");



?>

<!DOCTYPE html>
<html lang="sq">

<head>
    <meta charset="UTF-8">
    <title>Dashboardi i Klientit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 40px;
        }

        h2 {
            color: #2c3e50;
            margin-top: 40px;
        }

        table {
            margin-top: 100px;
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>

    <h1>Mirësevini në Dashboardin Tuaj</h1>

    <h2>Aeroplanë të Marrë me Qira</h2>
    <table>
        <tr>
            <th>Aeroplani</th>
            <th>Data Fillimit</th>
            <th>Data Përfundimit</th>
        </tr>
        <?php while ($row = $qira->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['airplane_name']) ?></td>
                <td><?= $row['start_date'] ?></td>
                <td><?= $row['end_date'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Aeroplanë të Blerë</h2>
    <table>
        <tr>
            <th>Aeroplani</th>
            <th>Data e Kërkesës</th>
            <th>Statusi</th>
        </tr>
        <?php while ($row = $blerje->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['airplane_name']) ?></td>
                <td><?= $row['created_at'] ?></td>
                <td><?= ucfirst($row['status']) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Kërkesa për Shitje të Dërguara</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Statusi</th>
            <th>Data e Dërgimit</th>
        </tr>
        <?php while ($row = $shitje->fetch_assoc()): ?>
            <tr>
                <td>#<?= $row['id'] ?></td>
                <td><?= ucfirst($row['status']) ?></td>
                <td><?= $row['created_at'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <script>
        function toggleNavOnScroll() {
            const nav = document.querySelector('nav');

            window.addEventListener('DOMContentLoaded', () => {

                nav.classList.add('scrolled');
            });
        }

        document.addEventListener('DOMContentLoaded', toggleNavOnScroll);
    </script>

</body>

</html>