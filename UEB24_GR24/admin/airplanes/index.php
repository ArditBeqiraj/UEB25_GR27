<?php

require "../db.php";

$sql = "SELECT * FROM airplanes";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="sq">

<head>
    <meta charset="UTF-8">
    <title>Menaxho Aeroplanët</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .add-plane-btn {
            display: inline-block;
            padding: 10px 16px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .add-plane-btn:hover {
            background-color: #218838;
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f0f0f0;
        }

        img {
            width: 100px;
            height: auto;
            border-radius: 6px;
        }

        .actions button {
            padding: 6px 12px;
            margin-right: 5px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .edit {
            background-color: #ffc107;
            color: white;
        }

        .delete {
            background-color: #dc3545;
            color: white;
        }

        .edit:hover {
            background-color: #e0a800;
        }

        .delete:hover {
            background-color: #c82333;
        }

        .actions a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Menaxho Aeroplanët</h1>

        <a href="create.php" class="add-plane-btn">+ Shto Aeroplan</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Emri</th>
                    <th>Përshkrimi</th>
                    <th>Çmimi (€)</th>
                    <th>Për Shitje?</th>
                    <th>Veprimet</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo '<td><img src="assetes/images/' . htmlspecialchars($row['image_url']) . '" alt="Foto Aeroplani"></td>';
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                        echo "<td>" . ($row['is_for_rent'] == 0 ? "Rent" : "Sale") . "</td>";
                        echo '<td class="actions">
                                <button class="edit"><a href="edit.php?id=' . htmlspecialchars($row['id']) . '">Edit</a></button>
                                <button class="delete"><a href="delete.php?id=' . htmlspecialchars($row['id']) . '">Delete</a></button>
                              </td>';
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>

        <a href="../dashboard.php" class="back-link">&larr; Kthehu në Dashboard</a>
    </div>
</body>

</html>