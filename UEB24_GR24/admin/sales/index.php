<?php
include("../db.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';
require '../../phpmailer/src/Exception.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && isset($_POST['request_id'])) {
    $request_id = (int)$_POST['request_id'];
    $new_status = $_POST['action'] === 'approve' ? 'approved' : 'rejected';

    $update_sql = "UPDATE airplane_purchase_requests SET status = '$new_status' WHERE id = $request_id";
    $conn->query($update_sql);
}

$sql = "SELECT apr.id, a.name AS airplane_name, apr.buyer_name, apr.buyer_email, apr.message, apr.status 
        FROM airplane_purchase_requests apr
        JOIN airplanes a ON apr.airplane_id = a.id
        ORDER BY apr.id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="sq">

<head>
    <meta charset="UTF-8">
    <title>Kërkesat për Blerje</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            padding: 30px;
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

        .top-bar {
            margin-bottom: 20px;
        }

        .top-bar a {
            background-color: #6c757d;
            color: #fff;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.2s ease;
        }

        .top-bar a:hover {
            background-color: #5a6268;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
        }

        th,
        td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .status {
            font-weight: bold;
            text-transform: capitalize;
        }

        .approved {
            color: green;
        }

        .rejected {
            color: red;
        }

        .pending {
            color: orange;
        }

        form {
            display: inline-block;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            color: white;
            margin: 2px;
        }

        .btn-approve {
            background-color: #28a745;
        }

        .btn-reject {
            background-color: #dc3545;
        }

        .btn-disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Kërkesat për Blerje</h1>

        <div class="top-bar">
            <a href="../dashboard.php">← Kthehu mbrapa</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Aeroplani</th>
                    <th>Emri Blerësit</th>
                    <th>Email</th>
                    <th>Mesazhi</th>
                    <th>Statusi</th>
                    <th>Veprime</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['airplane_name']) ?></td>
                        <td><?= htmlspecialchars($row['buyer_name']) ?></td>
                        <td><?= htmlspecialchars($row['buyer_email']) ?></td>
                        <td><?= htmlspecialchars($row['message']) ?></td>
                        <td class="status <?= htmlspecialchars($row['status']) ?>"><?= htmlspecialchars($row['status']) ?></td>
                        <td>
                            <?php if ($row['status'] === 'pending') { ?>
                                <form method="POST">
                                    <input type="hidden" name="request_id" value="<?= $row['id'] ?>">
                                    <button type="submit" name="action" value="approve" class="btn btn-approve">Aprovo</button>
                                    <button type="submit" name="action" value="reject" class="btn btn-reject">Refuzo</button>
                                </form>
                            <?php } else { ?>
                                <button class="btn btn-disabled" disabled>Vendim i Marrë</button>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>