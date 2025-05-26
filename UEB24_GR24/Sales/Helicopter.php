<?php

$customCSS = "../css/sales.css";
$footerCSS = "../footer/footer.css";
$navFooterCSS = "../css/nav_footer.css";
$popupCSS = "../member/popup.css";
$jqueryJS = "../js/jquery-3.7.1.min.js";
$logoSVG = "../img/logo_and_icons/Untitled 2.svg";
$popupPHP = "../member/popup.php";
$fontAwesomeCSS = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css";


$homeLink = "../index.php";
$aboutLink = "../about.php";
$resourcesLink = "../recources.php";
$staffLink = "../staff.php";
$contactLink = "../contact.php";
$loginLink = "#log-in";

$aircraft_data = file_get_contents('aircraft_data.txt');
$aircrafts = json_decode($aircraft_data, true);

$aircraft = null;
foreach ($aircrafts as $item) {
    if ($item['id'] === 'airbusAS355NP') {
        $aircraft = $item;
        break;
    }
}
if (!$aircraft) {
    die("Aircraft not found.");
}

require_once '../partials/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aerosales</title>
    <style>
        nav {
            background: rgb(27, 27, 27);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        footer {
            background-color: rgb(27, 27, 27);
        }
        .footer-div {
            background-color: rgb(27, 27, 27);
        }
    </style>
</head>

<body>
    <section class="jet-desc premium" style="margin-top: 6rem;">
        <div class="titull" id="<?php echo htmlspecialchars($aircraft['id']); ?>">
            <h1><?php echo htmlspecialchars($aircraft['title']); ?></h1>
        </div>
        <div class="jet-desc-image">
            <div class="bottomimages">
                <?php foreach ($aircraft['images']['thumbnails'] as $thumbnail): ?>
                    <img src="<?php echo htmlspecialchars($thumbnail); ?>" alt="<?php echo htmlspecialchars($aircraft['name']); ?>" onclick="changeImage(this)">
                <?php endforeach; ?>
            </div>
            <div class="topimage">
                <img class="mainImage" src="<?php echo htmlspecialchars($aircraft['images']['main']); ?>" alt="<?php echo htmlspecialchars($aircraft['name']); ?>">
            </div>
        </div>

        <div class="data">
            <h2>Key Features:</h2>
            <ul>
                <?php foreach ($aircraft['key_features'] as $key => $value): ?>
                    <li><strong><?php echo htmlspecialchars($key); ?>:</strong> <?php echo htmlspecialchars($value); ?>
                        <?php if ($key === 'Safety'): ?>
                            <button class="openModalBtn" data-modal="moreInfoModal"><u>More Info...</u></button>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div id="moreInfoModal" class="modal">
                <div class="modal-content">
                    <span class="close"></span>
                    <h1>More Information</h1>
                    <br>
                    <?php foreach ($aircraft['more_info'] as $section => $items): ?>
                        <p><strong><?php echo htmlspecialchars($section); ?>:</strong>
                            <?php foreach ($items as $item): ?>
                                - <?php echo htmlspecialchars($item); ?><br>
                            <?php endforeach; ?>
                        </p>
                    <?php endforeach; ?>
                    <p id="modalDetails"></p>
                </div>
            </div>

            <div class="more-info">
                <button class="button1 height">View Height</button>
                <button class="button1 forma" data-type="<?php echo htmlspecialchars($aircraft['type']); ?>" data-name="<?php echo htmlspecialchars($aircraft['name']); ?>">Buy / Rent</button>
            </div>
        </div>
    </section>

    <?php include '../footer/footer.html'; ?>

    <script src="../js/nav_footer.js"></script>
    <script src="../js/popup.js"></script>
    <script src="../js/Sales.js"></script>
    <script>
        document.querySelectorAll(".forma").forEach(button => {
            button.addEventListener("click", () => {
                const selectedType = button.getAttribute("data-type");
                const selectedName = button.getAttribute("data-name");
                localStorage.setItem("selectedType", selectedType);
                localStorage.setItem("selectedName", selectedName);
                window.location.href = "../buy-rent/buy-rent.html";
            });
        });
        document.querySelectorAll(".height").forEach(button => {
            button.addEventListener("click", () => {
                window.location.href = "../height.html";
            });
        });
    </script>
</body>
</html>