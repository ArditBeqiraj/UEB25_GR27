<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aerosales</title>
    <?php if (isset($customCSS)) : ?>
        <link rel="stylesheet" type="text/css" href="<?= htmlspecialchars($customCSS) ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="../footer/footer.css" />
    <link rel="stylesheet" href="../css/nav_footer.css" />
    <link rel="stylesheet" href="../member/popup.css" />

    <script src="../js/jquery-3.7.1.min.js"></script>

    <style>
    </style>
</head>

<body>
    <nav>
        <div class="logo">
            <a href="index.php">
                <img
                    src="../img/logo_and_icons/Untitled 2.svg"
                    alt="Site logo "
                    style="width: 15rem" />
            </a>
        </div>
        <div class="navigation">
            <a href="index.php" class="nav-text">Home</a>
            <a href="rent.php" class="nav-text">Rent</a>
            <a href="buy.php" class="nav-text">Buy</a>
            <a href="sell.php" class="nav-text">Sell</a>
            <a href="dashboard.php" class="nav-text">Dashboard</a>
            <a href="logout.php" class="nav-text">Logout</a>
        </div>
    </nav>

    <div id="popup"></div>