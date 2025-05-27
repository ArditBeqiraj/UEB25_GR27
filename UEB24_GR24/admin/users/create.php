<?php

require "../functions/functions.php";
require "../db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST["name"] ?? "";
  $surname = $_POST["surname"] ?? "";
  $username = $_POST["username"] ?? "";
  $email = $_POST["email"] ?? "";
  $password = $_POST["password"] ?? "";

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);


  $check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
  $check_result = mysqli_query($conn, $check_query);

  if (mysqli_num_rows($check_result) > 0) {
    die("Username ose email tashmë ekziston.");
  }



  $user_id = random_num(20);
  $sql = "INSERT INTO users (name, surname, user_id, username, email, password) 
            VALUES ('$name', '$surname', '$user_id', '$username', '$email', '$hashed_password')";

  if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
  } else {
    echo "Gabim: " . mysqli_error($conn);
  }
}


?>


<!DOCTYPE html>
<html lang="sq">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shto Përdorues</title>
  <link rel="stylesheet" href="assets/style.css" />
  <link>
</head>

<body>

  <div class="form-container">
    <h2>Shto Përdorues të Ri</h2>
    <form action="create.php" method="POST">
      <label for="name">Emri</label>
      <input type="text" id="name" name="name" required>

      <label for="surname">Mbiemri</label>
      <input type="text" id="surname" name="surname" required>

      <label for="username">Username</label>
      <input type="text" id="username" name="username" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Fjalëkalimi</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">Shto Përdoruesin</button>
    </form>
  </div>

</body>

</html>