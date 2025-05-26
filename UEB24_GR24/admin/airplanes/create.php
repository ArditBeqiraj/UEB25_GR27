<?php

require "../db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $file_name = $_FILES['image']['name'];
    $folder = 'assetes/images/' . $file_name;
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $is_for_sale = $_POST['is_for_sale'];
    $category_id = $_POST['category_id'];

    echo $category_id;


    $query = "Insert into 
    airplanes(image_url, name, description, price, is_for_rent, category_id) 
    values ('$file_name', '$name', '$description', '$price', '$is_for_sale', '$category_id')";
    $check_query = mysqli_query($conn, $query);



    if ($check_query) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $folder)) {
            if ($category_id == 1) {
                mysqli_query($conn, "INSERT INTO categories(name) values('Komercial')"); //kthen nje vlere
            } else if ($category_id == 2) {
                mysqli_query($conn, "INSERT INTO categories(name) values('Privat')"); //kthen nje vlere
            } else {
                echo "Lloji i aeroplanit qe keni zgjedhur nuk ekziston";
            }
        } else {
            echo "fotoja nuk eshte bere upload";
        }
    } else {
        echo "diqka ndodhi gabim";
    }
}


?>


<!DOCTYPE html>
<html lang="sq">

<head>
    <meta charset="UTF-8">
    <title>Shto Aeroplan</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #eef2f5;
            padding: 40px;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #555;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Shto Aeroplan</h2>
        <form action="create.php" method="POST" enctype="multipart/form-data">
            <label for="image">Foto e Aeroplanit</label>
            <input type="file" name="image" id="image" accept="image/*" required>

            <label for="name">Emri</label>
            <input type="text" name="name" id="name" placeholder="Shembull: Boeing 737" required>

            <label for="description">Përshkrimi</label>
            <textarea name="description" id="description" rows="4" placeholder="Përshkruani aeroplanin..." required></textarea>

            <label for="price">Çmimi (€)</label>
            <input type="number" name="price" id="price" placeholder="Shembull: 10000000" required>

            <label for="is_for_sale">Për Shitje?</label>
            <select name="is_for_sale" id="is_for_sale" required>
                <option value="1">Po</option>
                <option value="0">Jo</option>
            </select>

            <label for="category_id">Kategoria:</label>
            <select id="category_id" name="category_id" required>
                <option value="">Zgjedh një kategori</option>
                <option value="1">Komercial</option>
                <option value="2">Privat</option>
            </select>

            <button type="submit">Shto Aeroplanin</button>
        </form>

        <a href="index.php" class="back-link">← Kthehu te lista e aeroplanëve</a>
    </div>

</body>

</html>