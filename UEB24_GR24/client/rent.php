<?php
session_start();
require_once 'partials/header.php';
include("db.php");

// Function to get visit count for an airplane
function getVisitCount($airplaneId) {
    $cookieName = "visit_count_" . $airplaneId;
    return isset($_COOKIE[$cookieName]) ? (int)$_COOKIE[$cookieName] : 0;
}

$sql = "SELECT * FROM airplanes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airplane Rentals</title>
    <link rel="stylesheet" href="./assets/style.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .card-visits {
            font-size: 14px;
            font-weight: 500;
            color: #4b5563;
            margin-top: 10px;
        }
    </style>
</head>

<body style="padding: 0;">
    <div class="forms-wrapper">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['is_for_rent'] == 0) {
                    $visitCount = getVisitCount($row['id']);
        ?>
                    <div class="card" data-airplane-id="<?= htmlspecialchars($row['id']) ?>">
                        <img src="../admin/airplanes/assetes/images/<?= htmlspecialchars($row['image_url']) ?>" alt="Foto e aeroplanit">
                        <div class="card-body">
                            <div class="card-title"><?= htmlspecialchars($row['name']) ?></div>
                            <div class="card-price">Çmimi: <?= htmlspecialchars($row['price']) ?></div>
                            <div class="card-description">
                                <?= htmlspecialchars($row['description']) ?>
                            </div>
                            <div class="card-type">Lloji: <?= $row['category_id'] == 1 ? "Komercial" : "Privat" ?></div>
                            <div class="card-visits" id="visit-count-<?= htmlspecialchars($row['id']) ?>">Vizita: <?= $visitCount ?></div>
                        </div>
                        <button class="btn see-more-btn" data-airplane-id="<?= htmlspecialchars($row['id']) ?>" data-href="./single-plane.php?id=<?= htmlspecialchars($row['id']) ?>">See More</button>
                    </div>
        <?php
                }
            }
        }
        ?>
    </div>

    <script>
        function toggleNavOnScroll() {
            const nav = document.querySelector('nav');
            window.addEventListener('DOMContentLoaded', () => {
                nav.classList.add('scrolled');
            });
        }

        document.addEventListener('DOMContentLoaded', toggleNavOnScroll);

        $(document).ready(function() {
            $('.see-more-btn').click(function(e) {
                e.preventDefault();
                const airplaneId = $(this).data('airplane-id');
                const href = $(this).data('href');

                $.ajax({
                    url: 'increment-visit.php',
                    type: 'POST',
                    data: { airplane_id: airplaneId },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $(`#visit-count-${airplaneId}`).text(`Vizita: ${response.visit_count}`);
                            window.location.href = href;
                        } else {
                            console.error('Error:', response.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error);
                        window.location.href = href; // Fallback navigation
                    }
                });
            });
        });
    </script>
</body>

</html>