<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Aerosales</title>
  <?php if (isset($customCSS)) : ?>
    <link rel="stylesheet" type="text/css" href="<?= htmlspecialchars($customCSS) ?>">
  <?php endif; ?>
  <link rel="stylesheet" href="footer/footer.css" />
  <link rel="stylesheet" href="css/nav_footer.css" />
  <link rel="stylesheet" href="member/popup.css" />

  <script src="js/jquery-3.7.1.min.js"></script>
</head>

<body>
  <nav>
    <div class="logo">
      <a href="index.php">
        <img
          src="./img/logo_and_icons/Untitled 2.svg"
          alt="Site logo "
          style="width: 15rem" />
      </a>
    </div>
    <div class="navigation">
      <a href="index.php" class="nav-text">Home</a>
      <a href="about.php" class="nav-text">About</a>
      <a href="recources.php" class="nav-text">Resources</a>
      <a href="staff.php" class="nav-text">Staff</a>
      <a href="contact.php" class="nav-text">Contact</a>
      <a href="#log-in" id="log-inOrsign-up" class="nav-text">Log in/Sign up</a>
    </div>
  </nav>

  <div id="popup"></div>