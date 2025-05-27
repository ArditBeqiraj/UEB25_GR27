<?php
session_start();
require_once 'partials/header.php';
include("db.php");

// Function to get visit count for an airplane
function getVisitCount($airplaneId) {
    $cookieName = "visit_count_" . $airplaneId;
    return isset($_COOKIE[$cookieName]) ? (int)$_COOKIE[$cookieName] : 0;
}

// Marrja e ID-së nga URL
$airplane_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$visitCount = 0;

if ($airplane_id > 0) {
    $visitCount = getVisitCount($airplane_id); // Only retrieve visit count, no increment

    $sql = "SELECT * FROM airplanes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $airplane_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $airplane = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            color: #333;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            width: 100%;
            max-width: 1300px;
            padding: 20px;
            margin-top: 100px;
            padding-bottom: 100px;
            height: auto;
        }

        .forms-wrapper {
            display: flex;
            justify-content: center;
            padding: 20px 0;
            margin-bottom: 100px;
        }

        .card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            max-width: 600px;
            width: 100%;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        }

        .card-image {
            width: 100%;
            min-height: 300px;
        }

        .card-image img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-bottom: 3px solid #e5e7eb;
            display: block;
        }

        .card-content {
            padding: 30px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .card-title {
            font-size: 28px;
            font-weight: 600;
            color: #1e3a8a;
            line-height: 1.3;
        }

        .card-price {
            font-size: 22px;
            font-weight: 500;
            color: #16a34a;
        }

        .card-description {
            font-size: 16px;
            color: #4b5563;
            line-height: 1.5;
            flex-grow: 1;
        }

        .card-type, .card-visits {
            font-size: 14px;
            font-weight: 500;
            color: #4b5563;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 14px;
            background: linear-gradient(90deg, #2563eb, #93c5fd);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn:hover {
            background: linear-gradient(90deg, #1e40af, #3b82f6);
            transform: scale(1.02);
        }

        .btn:active {
            transform: scale(0.98);
        }

        .btn a {
            color: white;
            text-decoration: none;
        }

        .no-results {
            text-align: center;
            font-size: 20px;
            font-weight: 500;
            color: #ffffff;
            background: linear-gradient(90deg, #dc2626, #f87171);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <main class="container">
        <div class="forms-wrapper">
            <?php if ($airplane): ?>
                <div class="card">
                    <div class="card-image">
                        <img src="../admin/airplanes/assetes/images/<?php echo htmlspecialchars($airplane['image_url']); ?>" alt="Foto e aeroplanit: <?php echo htmlspecialchars($airplane['name']); ?>">
                    </div>
                    <div class="card-content">
                        <h2 class="card-title"><?php echo htmlspecialchars($airplane['name']); ?></h2>
                        <p class="card-price">Çmimi: <?php echo htmlspecialchars($airplane['price']); ?></p>
                        <p class="card-description"><?php echo htmlspecialchars($airplane['description']); ?></p>
                        <span class="card-type">Lloji: <?php echo $airplane['category_id'] == 1 ? "Komercial" : "Privat"; ?></span>
                        <span class="card-visits">Vizita: <?php echo $visitCount; ?></span>
                        <?php if ($airplane['is_for_rent'] == 0): ?>
                            <button class="btn"><a href="./forms/rent-form.php?id=<?php echo htmlspecialchars($airplane['id']); ?>">Rent</a></button>
                        <?php else: ?>
                            <button class="btn"><a href="./forms/buy-form.php?id=<?php echo htmlspecialchars($airplane['id']); ?>">Buy</a></button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="no-results">Aeroplani i kërkuar nuk u gjet ose nuk është i disponueshëm për qira.</div>
            <?php endif; ?>
        </div>
    </main>

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