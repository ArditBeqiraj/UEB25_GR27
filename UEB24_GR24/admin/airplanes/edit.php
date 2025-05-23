<?php
require "../db.php";


// Kqyre nese eshte dhene id, dhe nese id e dhene eshte numer
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID jo valid!");
}

// valido id permes ketij funksioni
$id = $_GET['id'];
$id = mysqli_real_escape_string($conn, $id);


$sql = "SELECT id, name, description, price, is_for_rent, image_url, category_id FROM airplanes WHERE id = $id";
$result = $conn->query($sql);

if (!$result || $result->num_rows === 0) {
    die("Aeroplani nuk u gjet!");
}

$row = $result->fetch_assoc();

if (!$row) {
    header("Location: index.php");
    exit();
}

// Përpunimi i formës
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $is_for_rent = $_POST['is_for_sale'];
    $category_id = $_POST['category_id'];
    $file_name = $_FILES['image']['name'];
    $folder = 'assetes/images/' . $file_name;

    $sql = "UPDATE airplanes SET name=?, description=?, price=?, is_for_rent=?, image_url=?, category_id=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $name, $description, $price, $is_for_rent, $file_name, $category_id, $id);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $folder)) {

        if ($stmt->execute()) {
            $success = "Aeroplani u përditësua me sukses!";
            $sql = "SELECT id, name, description, price, is_for_rent, image_url, category_id FROM airplanes WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
        } else {
            $error = "Gabim gjatë përditësimit: " . $conn->error;
        }
    } else {
        echo "file nuk eshte bere upload";
    }
}

?>

<!DOCTYPE html>
<html lang="sq">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ndrysho Përdoruesin</title>
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
        <h2>Edito Aeroplan</h2>
        <form action="edit.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <label for="image">Foto e Aeroplanit</label>
            <input type="file" name="image" id="image" accept="image/*" required>

            <label for="name">Emri</label>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>

            <label for="description">Përshkrimi</label>
            <textarea name="description" id="description" rows="4" value="<?php echo htmlspecialchars($row['description']); ?>" required></textarea>

            <label for="price">Çmimi (€)</label>
            <input type="number" name="price" id="price" value="<?php echo htmlspecialchars($row['price']); ?>" required>

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

            <button type="submit">Edito Aeroplanin</button>
        </form>

        <a href="index.php" class="back-link">← Kthehu te lista e aeroplanëve</a>
    </div>
</body>

</html>