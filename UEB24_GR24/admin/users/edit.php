<?php
require "../db.php";


// Kqyre nese eshte dhene id, dhe nese id e dhene eshte numer
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID jo valid!");
}

// valido id permes ketij funksioni
$id = $_GET['id'];
$id = mysqli_real_escape_string($conn, $id);


$sql = "SELECT id, name, surname, username, email, role FROM users WHERE id = $id";
$result = $conn->query($sql);

if (!$result || $result->num_rows === 0) {
    die("Përdoruesi nuk u gjet!");
}

$row = $result->fetch_assoc();

if (!$row) {
    header("Location: index.php");
    exit();
}

// Përpunimi i formës
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $surname = trim($_POST["surname"]);
    $username = trim($_POST["username"]);
    $role = trim($_POST["role"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($name) || empty($surname) || empty($username) || empty($role) || empty($email)) {
        $error = "Të gjitha fushat (përveç fjalëkalimit) janë të detyrueshme!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email jo valid!";
    } else {
        if (!empty($password)) {
            // Nëse ka fjalëkalim të ri
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET name=?, surname=?, username=?, role=?, email=?, password=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssi", $name, $surname, $username, $role, $email, $hashed_password, $id);
        } else {
            // Pa ndryshuar fjalëkalimin
            $sql = "UPDATE users SET name=?, surname=?, username=?, role=?, email=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $name, $surname, $username, $role, $email, $id);
        }


        if ($stmt->execute()) {
            $success = "Përdoruesi u përditësua me sukses!";
            $sql = "SELECT id, name, surname, username, email, role FROM users WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
        } else {
            $error = "Gabim gjatë përditësimit: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="sq">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ndrysho Përdoruesin</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <div class="form-container">
        <h2>Ndrysho përdoruesin</h2>


        <form action="edit.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="name">Emri</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="surname">Mbiemri</label>
                <input type="text" id="surname" name="surname" value="<?php echo htmlspecialchars($row['surname']); ?>" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            </div>

            <div class="form-group">
                <label for="role">Roli</label>
                <select id="role" name="role" required>
                    <option value="client" <?php echo ($row['role'] == 'client') ? 'selected' : ''; ?>>Client</option>
                    <option value="admin" <?php echo ($row['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="editor" <?php echo ($row['role'] == 'editor') ? 'selected' : ''; ?>>Editor</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Fjalëkalimi i ri (lëreni bosh për të mos e ndryshuar)</label>
                <input type="password" id="password" name="password">
                <small>Lëreni bosh nëse nuk doni të ndryshoni fjalëkalimin</small>
            </div>

            <button type="submit" class="btn">Ruaj Ndryshimet</button>
        </form>
    </div>
</body>

</html>