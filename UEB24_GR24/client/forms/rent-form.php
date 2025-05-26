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
    $name = trim($_POST['name']);
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $airplane_id = $_POST['id'];

    $insert_sql = "INSERT INTO rent (name_surname, start_date, end_date, airplane_id)
    VALUES ('$name', '$start_date', '$end_date', $airplane_id)";

    $check_query = mysqli_query($conn, $insert_sql);

    if ($check_query) {
        $message = "Kerkesa juaj per qira eshte derguar, se shpejti do te lajmeroheni ne email!";
        header("Location: ../rent.php");
    } else {
        $message = "Ka ndodhur nje gabim gjate plotesimit te formes";
        header("Location: ../rent-form.php");
    }
    exit();
}

?>

<!DOCTYPE html>
<html lang="sq">

<head>
    <meta charset="UTF-8">
    <title>Forma e Marrjes me Qira</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            padding: 40px;
            display: flex;
            justify-content: center;
        }



        .rental-form {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .rental-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #2c3e50;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            color: #34495e;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #3498db;
        }

        .submit-btn {
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

        .submit-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>

    <form class="rental-form" method="POST" action="rent-form.php">
        <h2>Marrje me Qira Aeroplani</h2>

        <?php
        if ($result->num_rows > 0) {
            //shkon ne qdo rresht te databazes dhe i shfaq ketu
            while ($row = $result->fetch_assoc()) {

        ?>

                <div class="form-group">
                    <label for="name"></label>
                    <input type="text" id="name" name="name" placeholder="Shkruani emrin tuaj" required
                        value="<?= htmlspecialchars($row['name']) . " " . htmlspecialchars($row['surname']) ?>">
                </div>

        <?php
            }
        }
        ?>

        <div class="form-group">
            <label for="start-date">Data e fillimit</label>
            <input type="date" id="start-date" name="start_date" required>
        </div>

        <div class="form-group">
            <label for="end-date">Data e përfundimit</label>
            <input type="date" id="end-date" name="end_date" required>
        </div>

        <input type="hidden" name="id" value="<?php echo htmlspecialchars($air_id); ?>">

        <?php
        if ($result_airplanes->num_rows > 0) {
            //shkon ne qdo rresht te databazes dhe i shfaq ketu
            while ($row = $result_airplanes->fetch_assoc()) {

        ?>
                <div class="form-group">
                    <label for="airplane">Aeroplani i zgjedhur</label>
                    <input type="text" name="airplane_name" value="<?= htmlspecialchars($row['name']) ?>">
                </div>

        <?php
            }
        }
        ?>



        <button type="submit" class="submit-btn">Rezervo</button>
    </form>

</body>

</html>