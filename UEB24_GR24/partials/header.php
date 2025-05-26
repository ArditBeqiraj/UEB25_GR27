<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Aerosales</title>
  <?php if (isset($customCSS)) : ?>
    <link rel="stylesheet" type="text/css" href="<?= htmlspecialchars($customCSS) ?>">
  <?php endif; ?>
  <?php if (isset($footerCSS)) : ?>
    <link rel="stylesheet" type="text/css" href="<?= htmlspecialchars($footerCSS) ?>">
  <?php endif; ?>
  <?php if (isset($navFooterCSS)) : ?>
    <link rel="stylesheet" type="text/css" href="<?= htmlspecialchars($navFooterCSS) ?>">
  <?php endif; ?>
  <?php if (isset($popupCSS)) : ?>
    <link rel="stylesheet" type="text/css" href="<?= htmlspecialchars($popupCSS) ?>">
  <?php endif; ?>
  <?php if (isset($fontAwesomeCSS)) : ?>
    <link rel="stylesheet" href="<?= htmlspecialchars($fontAwesomeCSS) ?>"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
  <?php endif; ?>
  <?php if (isset($jqueryJS)) : ?>
    <script src="<?= htmlspecialchars($jqueryJS) ?>"></script>
  <?php endif; ?>
</head>

<body>
  <nav>
    <div class="logo">
      <?php if (isset($homeLink)) : ?>
        <a href="<?= htmlspecialchars($homeLink) ?>">
          <?php if (isset($logoSVG)) : ?>
            <img src="<?= htmlspecialchars($logoSVG) ?>" alt="Site logo" style="width: 15rem" />
          <?php endif; ?>
        </a>
      <?php endif; ?>
    </div>
    <div class="navigation">
      <?php if (isset($homeLink)) : ?>
        <a href="<?= htmlspecialchars($homeLink) ?>" class="nav-text">Home</a>
      <?php endif; ?>
      <?php if (isset($aboutLink)) : ?>
        <a href="<?= htmlspecialchars($aboutLink) ?>" class="nav-text">About</a>
      <?php endif; ?>
      <?php if (isset($resourcesLink)) : ?>
        <a href="<?= htmlspecialchars($resourcesLink) ?>" class="nav-text">Resources</a>
      <?php endif; ?>
      <?php if (isset($staffLink)) : ?>
        <a href="<?= htmlspecialchars($staffLink) ?>" class="nav-text">Staff</a>
      <?php endif; ?>
      <?php if (isset($contactLink)) : ?>
        <a href="<?= htmlspecialchars($contactLink) ?>" class="nav-text">Contact</a>
      <?php endif; ?>
      <?php if (isset($loginLink)) : ?>
        <a href="<?= htmlspecialchars($loginLink) ?>" id="log-inOrsign-up" class="nav-text open-popup">Log in/Sign up</a>
      <?php endif; ?>
    </div>
  </nav>
  <?php if (isset($popupPHP)) : ?>
    <?php include htmlspecialchars($popupPHP); ?>
  <?php endif; ?>
</body>

</html>