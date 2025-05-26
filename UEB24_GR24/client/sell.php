<?php

session_start();

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function showPopupMessage($message, $redirectUrl = null)
{
    $redirectScript = $redirectUrl
        ? "window.location.href = '$redirectUrl';"
        : "window.history.back();";

    echo "<script>
        alert(" . json_encode($message) . ");
        $redirectScript
    </script>";
}


require_once 'partials/header.php';
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_sell'])) {

    if (!isset($_SESSION['user_id'])) {
        showPopupMessage("Duhet të jeni i kyçur për të vazhduar.");
        exit;
    }

    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO airplane_sale_requests (user_id) VALUES (?)");
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        // Merr emailin e përdoruesit
        $userQuery = $conn->query("SELECT email, name FROM users WHERE id = $user_id");
        $user = $userQuery->fetch_assoc();

        $userEmail = $user['email'];
        $userName = $user['name'];



        $mail = new PHPMailer(true);
        try {
            // Konfigurimi SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';  // SMTP host
            $mail->SMTPAuth   = true;
            $mail->Username   = 'aerosales.info@gmail.com';    // emaili yt
            $mail->Password   = 'fdicryckebgchkxn';      // fjalëkalimi yt
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            // Dërguesi & marrësi
            $mail->setFrom('aerosales.info@gmail.com', 'AeroSales');
            $mail->addAddress($userEmail, $userName);

            // Përmbajtja
            $mail->isHTML(true);
            $mail->Subject = 'Kerkesa juaj per shitje u pranua';
            $mail->Body    = "Pershendetje <strong>$userName</strong>,<br><br>
                          Kerkesa juaj për të shitur një aeroplan është pranuar.<br>
                          Ne do ta shqyrtojmë sa më shpejt që të jetë e mundur.<br><br>
                          Faleminderit,<br>
                          <em>Ekipa AeroSales</em>";

            $mail->send();
            showPopupMessage("Kërkesa për shitje u dërgua me sukses. Ju do të njoftoheni në email.", "index.php");
        } catch (Exception $e) {
            showPopupMessage("Kërkesa u ruajt, por dështoi dërgimi i emailit.");
        }
    } else {
        showPopupMessage("Gabim gjatë regjistrimit: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
    exit;
}
?>

<!DOCTYPE html>
<html lang="sq">

<head>
    <meta charset="UTF-8">
    <title>Rregullat për Shitje të Aeroplanit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 100px auto;
            background: #f4f6f8;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        .form-container {
            max-width: 800px;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        ul {
            line-height: 1.7;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            margin-top: 20px;
            cursor: pointer;
            border: none;
        }

        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Rregullat për Shitjen e Aeroplanit</h1>
        <p>Para se të paraqisni një kërkesë për shitje, ju lutemi lexoni me kujdes rregullat e mëposhtme:</p>
        <ul>
            <li>Aeroplani duhet të jetë në gjendje funksionale ose të qartësohet çdo defekt.</li>
            <li>Duhet të jepni informacion të saktë për modelin, prodhuesin dhe vitin e prodhimit.</li>
            <li>Fotografia duhet të jetë e qartë dhe reale e aeroplanit që ofroni.</li>
            <li>Çmimi duhet të jetë i arsyetuar dhe në përputhje me tregun.</li>
            <li>Kompania rezervon të drejtën të refuzojë kërkesën pa shpjegim të detajuar.</li>
        </ul>

        <form action="sell.php" method="post">
            <button type="submit" name="submit_sell" class="btn">Shes Aeroplanin Tim</button>
        </form>
    </div>

    <script>
        function toggleNavOnScroll() {
            const nav = document.querySelector('nav');
            window.addEventListener('DOMContentLoaded', () => {
                nav.classList.add('scrolled');
            });
        }

        document.addEventListener('DOMContentLoaded', toggleNavOnScroll);
    </script>
</body>

</html>