<?php

require "../db.php";

$sql = "SELECT * FROM rent";
$result = $conn->query($sql);

$sql_plane = "SELECT * FROM airplanes";
$result_plane = $conn->query($sql_plane);

$airplanes = [];
if ($result_plane->num_rows > 0) {
    while ($row_plane = $result_plane->fetch_assoc()) {
        $airplanes[$row_plane['id']] = $row_plane['name'];
    }
}

?>

<!DOCTYPE html>
<html lang="sq">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Përmbledhje e Qirave</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
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

        .status {
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }

        .pending {
            background-color: #ffc107;
            color: #212529;
        }

        .active {
            background-color: #28a745;
            color: white;
        }

        .completed {
            background-color: #17a2b8;
            color: white;
        }

        .coming-soon {
            background-color: #2faf7c;
            color: white;
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Përmbledhje e Qirave</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Klienti</th>
                    <th>Aeroplani</th>
                    <th>Data e Fillimit</th>
                    <th>Data e Mbarimit</th>
                    <th>Statusi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['name_surname']) ?></td>
                            <td><?= htmlspecialchars($airplanes[$row['airplane_id']] ?? 'Nuk u gjet') ?></td>
                            <td><?= htmlspecialchars($row['start_date']) ?></td>
                            <td><?= htmlspecialchars($row['end_date']) ?></td>
                            <td>
                                <?php
                                $today = new DateTime();
                                $endDate = new DateTime($row['end_date']);
                                $interval = $today->diff($endDate);

                                if ($endDate < $today) {
                                    echo "<span class='status completed'>E përfunduar</span>";
                                } elseif ($interval->days <= 3) {
                                    echo "<span class='status coming-soon'>Së shpejti</span>";
                                } else {
                                    echo "<span class='status active'>Aktive</span>";
                                }
                                ?>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>

        <a href="../dashboard.php" class="back-link">&larr; Kthehu në Dashboard</a>
    </div>
</body>

</html>