<?php

session_start();
require_once 'partials/header.php';
include("db.php");


$sql = "SELECT * FROM airplanes";
$result = $conn->query($sql);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/style.css" />
</head>

<body>

    <div class="forms-wrapper">
        <?php
        if ($result->num_rows > 0) {
            //shkon ne qdo rresht te databazes dhe i shfaq ketu
            while ($row = $result->fetch_assoc()) {
                if ($row['is_for_rent'] == 0) {

        ?>
                    <div class="card">
                        <img src="../admin/airplanes/assetes/images/<?= htmlspecialchars($row['image_url']) ?>" alt="Foto e aeroplanit">
                        <div class="card-body">
                            <div class="card-title"><?= htmlspecialchars($row['name']) ?></div>
                            <div class="card-price">Çmimi: <?= htmlspecialchars($row['price']) ?></div>
                            <div class="card-description">
                                <?= htmlspecialchars($row['description']) ?>
                            </div>
                            <div class="card-type">Lloji: <?= $row['category_id'] == 1 ? "Komercial" : "Privat" ?></div>
                        </div>

                        <button class="btn"><a href="./single-plane.php?id=<?= htmlspecialchars($row['id']); ?>">See More</a></button>

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
    </script>


</body>

</html>