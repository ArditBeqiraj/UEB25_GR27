<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic Cabin Illustrator</title>
  <link rel="stylesheet" href="css/airplane.css">
  <link rel="stylesheet" href="footer/footer.css">
  <link rel="stylesheet" href="css/nav_footer.css">
  <link rel="stylesheet" href="member/popup.css">
  <script src="js/jquery-3.7.1.min.js"></script>
  <style>
    html, body {
    height: 100%;
    margin: 0;
    display: flex;
    flex-direction: column;
  }

  .content-wrapper1 {
    flex: 1 0 auto;
    text-align: center;
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
    <nav style="background: #1b1b1b; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
      <div class="logo">
        <a href="index.html">
            <img src="img/logo and icons/Untitled 2.svg" alt="Site logo " style="width: 15rem;">
        </a>
      </div>
      <div class="navigation">
        <a href="index.html" class="nav-text">Home</a>
            <a href="about.html" class="nav-text">About</a>
            <a href="recources.html" class="nav-text">Resources</a>
            <a href="staff.html" class="nav-text">Staff</a>
            <a href="contact.html" class="nav-text">Contact</a>
            <a href="#log-in" id="log-inOrsign-up" class="nav-text">Log in/Sign up</a>
      </div>
    </nav>
    <br><br><br><br><br>

    <div id="popup">
        
    </div>
    <h1>Dynamic Cabin Illustrator</h1>
    <div class="container1">
      <img src="/UEB24_GR24/img/cabin.svg" alt="Cabin" class="cabin-image" />
      <img src="/UEB24_GR24/img/human.svg" alt="Human" class="human" id="human">
    </div>

    <div class="label">
      <label for="height">Enter your height (cm):</label>
      <input type="number" id="height" placeholder="Enter height" />
      <button class="button" onclick="adjustHeight()">Submit</button>
    </div>
  </div><br>

  <div id="footer"></div>

  <script type="text/javascript">
    $('#footer').load('footer/footer.html');
</script>

<script type="text/javascript">
    $('#popup').load('member/popup.html');
</script>
<script type="text/javascript" src="js/nav_footer.js"></script>
<script type="text/javascript" src="js/popup.js"></script>

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
        human.style.height = `${+formattedHeight+55}px`;
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
