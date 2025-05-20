 <?php

require "../db.php";

$sql = "SELECT id, name, surname, email, role FROM users";
$result = $conn->query($sql);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menaxhimi i Përdoruesve</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
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

        .add-user-btn {
            display: inline-block;
            padding: 10px 16px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .add-user-btn:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f0f0f0;
        }

        .actions button {
            padding: 6px 12px;
            margin-right: 5px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #28a745;
            color: white;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .edit-btn:hover {
            background-color: #218838;
        }

        a {
            text-decoration: none;
            color: white;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Menaxhimi i Përdoruesve</h1>
        <a href="./create.php" class="add-user-btn">+ Shto Përdorues</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Emri</th>
                    <th>Email</th>
                    <th>Roli</th>
                    <th>Veprime</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    //shkon ne qdo rresht te databazes dhe i shfaq ketu
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . " " . htmlspecialchars($row['surname']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['role']) . "</td>";

                ?>

                        <td class="actions">
                            <button class="edit-btn">

                                <a href="edit.php?id=<?= htmlspecialchars($row['id']); ?>">Edit</a>
                            </button>
                            <button class="delete-btn">
                                <a href="delete.php?id=<?= htmlspecialchars($row['id']); ?>">Delete</a>
                            </button>
                        </td>
                        </tr>
                <?php
                    }
                }

                ?>

            </tbody>
        </table>
    </div>
</body>

</html>  