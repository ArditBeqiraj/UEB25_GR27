<?php
// Define variables for header.php
$customCSS = 'css/airplane.css';
$footerCSS = 'footer/footer.css';
$navFooterCSS = 'css/nav_footer.css';
$popupCSS = 'member/popup.css';
$fontAwesomeCSS = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css';
$jqueryJS = 'js/jquery-3.7.1.min.js';
$logoSVG = 'img/logo_and_icons/Untitled 2.svg';
$popupPHP = 'member/popup.php';

// Navigation links
$homeLink = 'index.php';
$aboutLink = 'about.php';
$resourcesLink = 'recources.php';
$staffLink = 'staff.php';
$contactLink = 'contact.php';
$loginLink = '#log-in';

require_once 'partials/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic Cabin Illustrator</title>
  <style>
    html,
    body {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
    }

    .content-wrapper1 {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      height: 100%;
    }

    .container1 {
      position: relative;
      width: 510px;
      height: 255px;
      margin: 20px auto;
      overflow: hidden;
    }

    .cabin-image {
      position: relative;
      width: 100%;
      height: auto;
    }

    .human {
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      max-width: 100%;
      height: auto;
      visibility: hidden;
      transition: height 0.3s ease, width 0.3s ease, visibility 0s ease-in-out 0.3s;
    }

    .label {
      margin-top: 20px;
    }

    .button {
      background-color: white;
      color: black;
      border-radius: 10em;
      font-size: 17px;
      font-weight: 600;
      padding: 5px 20px;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
      border: 1px solid black;
      box-shadow: 2px 5px 0 0 black;
    }

    .button:hover {
      box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3);
    }

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
  <div class="content-wrapper1">
    <h1>Dynamic Cabin Illustrator</h1>
    <div class="container1">
      <img src="img/cabin.svg" alt="Cabin" class="cabin-image" />
      <img src="img/human.svg" alt="Human" class="human" id="human">
    </div>

    <div class="label">
      <label for="height">Enter your height (cm):</label>
      <input type="number" id="height" placeholder="Enter height" />
      <button class="button" onclick="adjustHeight()">Submit</button>
    </div>
  </div>

  <?php include 'footer/footer.html'; ?>

  <script src="js/nav_footer.js"></script>
  <script src="js/popup.js"></script>
  <script>
    function adjustHeight() {
      const heightInput = +document.getElementById('height').value;
      const human = document.getElementById('human');
      const cabinImage = document.querySelector('.cabin-image');
      const cabinImageHeight = cabinImage.offsetHeight;

      if (isNaN(heightInput)) {
        alert('Invalid input! Please enter a number.');
        return;
      }

      if (heightInput < Number.MAX_VALUE && heightInput > 0) {
        const formattedHeight = heightInput.toFixed(2);
        human.style.height = `${+formattedHeight + 55}px`;
        human.style.visibility = 'visible';
        human.style.width = 'auto';
        console.log(heightInput);
      } else if (heightInput >= Number.MAX_VALUE) {
        alert('The number is too large!');
      } else {
        alert('Please enter a valid positive number!');
      }
    }
  </script>
</body>

</html>