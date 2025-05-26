<?php

include("../db.php");

session_start();

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = $conn->query($sql);




$air_id = $_GET['id'] ?? "";


$sql = "SELECT * FROM airplanes WHERE id = '$air_id'";
$result_airplanes = $conn->query($sql);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $buyer_name = $_POST['buyer_name'];
    $buyer_email = trim($_POST['buyer_email']);
    $message = $_POST['message'];
    $airplane_id = $_POST['airplane_id'];

    $sql_insert = "INSERT INTO airplane_purchase_requests(airplane_id, buyer_name, buyer_email, message, status)
                    VALUES('$airplane_id', '$buyer_name', '$buyer_email', '$message', 'pending')";

    $check_query = mysqli_query($conn, $sql_insert);

    echo $airplane_id;

    if ($check_query) {
        $message = "Kerkesa juaj per te blere eshte derguar, ju do te njoftoheni ne email";
        header("Location: ../buy.php");
    } else {
        $message = "Ka ndodhur nje gabim gjate plotesimit te formes";
        header("Location: ../rent-form.php");
    }
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forma e Blerjes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        .purchase-form {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .purchase-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #2c3e50;
        }

        .purchase-form label {
            display: block;
            margin-bottom: 6px;
            color: #34495e;
            font-weight: bold;
        }

        .purchase-form input,
        .purchase-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .purchase-form input:focus,
        .purchase-form textarea:focus {
            outline: none;
            border-color: #3498db;
        }

        .purchase-form button {
            background-color: #3498db;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .purchase-form button:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>

    <form action="buy-form.php" method="post" class="purchase-form">
        <?php
        if ($result_airplanes->num_rows > 0) {
            while ($row = $result_airplanes->fetch_assoc()) {
        ?>
                <h2>Blerje Aeroplani: <?php echo htmlspecialchars($row['name']); ?></h2>
        <?php
            }
        }
        ?>

        <input type="hidden" name="airplane_id" value="<?= htmlspecialchars($air_id) ?>">


        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>

                <label for="buyer_name">Emri juaj:</label>
                <input type="text" id="buyer_name" name="buyer_name" required value="<?= htmlspecialchars($row['name']) . " " . $row['surname'] ?>">

                <label for="buyer_email">Emaili juaj:</label>
                <input type="email" id="buyer_email" name="buyer_email" required value="<?= htmlspecialchars($row['email'])  ?>">
        <?php
            }
        }
        ?>

        <label for="message">Mesazhi juaj (opsionale):</label>
        <textarea id="message" name="message" rows="4" placeholder="Shto ndonjë mesazh për shitësin..."></textarea>

        <button type="submit">Dërgo Kërkesën për Blerje</button>
    </form>

</body>

</html>