<?php
$customCSS = "css/contact.css";
require_once 'partials/header.php';
?>
<br>

    <?xml version="1.0"?>
    <h1 style="text-align: center; text-decoration: underline; margin-top:100px;"><b>AeroSales Offices</b></h1><br>
    <div id="name">
        <p id="namep" style="margin: 2px; color:black">Name</p>
    </div>

    <section class="popup1">
    <div class="popup-new-york" id="popup1">
      <div id="popup-content">
          <h4>AeroSales New York</h4>
          <p>
              <strong>OPEN UNTIL 7:00 PM</strong><br>
              <address>
              85 North 3rd St<br>
              Suite 114<br>
              Brooklyn, NY 11249<br>
              United States<br>
              +1 718 384 3619<br>
              <button class="close1" id ="close-new-york" style="display: flex; justify-content: center;">Close</button>
            </address>
          </p>
      </div>
      </div>

      <div class="popup-london" id="popup1">
        <div id="popup-content">
            <h4>AeroSales London</h4>
            <p>
                <strong>OPEN UNTIL 7:00 PM</strong><br>
                <address></address>
                Promenade Level<br>
                Cabot Place<br>
                London E14 4QS<br>
                United Kingdom<br>
                +44 20 7519 1025<br>
                <button class="close1" id="close-london">Close</button>
            </address>
            </p>
        </div>
        </div>

        <div class="popup-sao-paulo" id="popup1">
          <div id="popup-content">
              <h4>AeroSales Sao Paulo</h4>
              <p>
                <address>
                  <strong>OPEN UNTIL 7:00 PM</strong><br>
                  Av. Brigadeiro Faria Lima, 2232<br>
                  Piso Terréo, Jardim Paulistano<br>
                  Sao Paulo 01489-900<br>
                  Brazil<br>
                  +55 11 3137-7399<br>
                  <button class="close1" id="close-sao-paulo">Close</button>
                </address>
              </p>
          </div>
          </div>

          <div class="popup-dubai" id="popup1">
            <div id="popup-content">
                <h4>AeroSales Dubai</h4>
                <p>
                    <strong>OPEN UNTIL 7:00 PM</strong><br>
                    <address>
                    The Dubai Mall, Unit 49, Ground Floor<br>
                    Financial Center Road<br>
                    Dubai<br>
                    <abbr title="United Arab Emirates">UAE</abbr><br>
                    +971 4 330 8005<br>
                    <button class="close1" id="close-dubai">Close</button>
                    </address>
                </p>
            </div>
            </div>

            <div class="popup-tokyo" id="popup1">
              <div id="popup-content">
                  <h4>AeroSales Tokyo</h4>
                  <p>
                      <strong>OPEN UNTIL 7:00 PM</strong><br>
                    <address>
                      4-25-15 Jingumae<br>
                      Shibuya-ku<br>
                      Tokyo<br>
                      Japan<br>
                      +81 3 6438 5800<br>
                      <button class="close1" id="close-tokyo">Close</button>
                    </address>
                  </p>
              </div>
              </div>

              <div class="popup-prishtina" id="popup1">
                <div id="popup-content">
                    <h4>AeroSales Prishtina</h4>
                    <p>
                        <strong>OPEN UNTIL 7:00 PM</strong><br>
                        <address>
                        Rr. Muharrem Fejza<br>
                        Rruga B<br>
                        Prishtin&#235;<br>
                        Kosovo<br>
                        +383 44 111 111<br>
                        <button class="close1" id="close-prishtina">Close</button>
                        </address>
                    </p>
                </div>
                </div>

                <div class="popup-none" id="popup1">
                  <div id="popup-content">
                      <h4>AeroSales</h4><br>
                      <p>
                          <strong>COMING SOON!</strong><br>
                          Sorry, unfortunately there are currently no<br> AeroSales offices near you!<br>
                          <button class="close1" id="close-none">Close</button>
                      </p>
                  </div>
                  </div>

    </section>
   <?php 
   require_once ('map.php');
   ?>
    <div id="popup">
    </div>
    <hero>
    </hero>
    <main class="contact-main">
        <section class="contact-form-section">
            <h2>Get in Touch</h2>
            <form id="contact-form">
                <label for="namee">Full Name</label>
                <input type="text" id="namee" name="namee" placeholder="Enter your name" >

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">

                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Write your message here..." rows="6"
                    ></textarea>

                <button type="submit" class="submit-button">Send Message</button>
            </form>
        </section>
        <section class="contact-details-section">
            <h2>Contact Information</h2>
            <ul>
                <li><i class="fas fa-envelope"></i> Email: <a href="mailto:contact@aerosales.com">contact@aerosales.com</a></li>
                <li><i class="fas fa-phone"></i> Phone: +38349123456</li>
                <li><i class="fas fa-map-marker-alt"></i><em>Sllatinë, Prishtina</em></li>
            </ul>
        </section>
    </main>
    <div id="footer"></div>

    <script type="text/javascript">
        $('#footer').load('footer/footer.html');
    </script>

    <script type="text/javascript">
        $('#popup').load('member/popup.html');
    </script>
    <script type="text/javascript" src="js/nav_footer.js"></script>
    <script type="text/javascript" src="js/popup.js"></script>
</body>
<script>
    document.querySelectorAll(".allPaths").forEach(e => {
    e.setAttribute('class', `allPaths ${e.id}`);
    e.addEventListener("mouseover", function () {
        window.onmousemove = function (j) {
            const x = j.clientX;
            const y = j.clientY;
            document.getElementById('name').style.top = y - 60 + 'px';
            document.getElementById('name').style.left = x + 10 + 'px';
        };

        const classes = e.className.baseVal.replace(/ /g, '.');

        [...document.querySelectorAll(`.${classes}`)].map(country => {
            country.style.fill = "#597f97";
        });

        document.getElementById("name").style.opacity = 1;
        document.getElementById("namep").innerText = e.id;
    });

    e.addEventListener("mouseleave", function () {
        const classes = e.className.baseVal.replace(/ /g, '.');

        [...document.querySelectorAll(`.${classes}`)].map(country => {
            country.style.fill = "#ececec";
        });

        document.getElementById("name").style.opacity = 0;
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const popupManager = {
        popupMap: {
            "United States": ".popup-new-york",
            "United Kingdom": ".popup-london",
            "Brazil": ".popup-sao-paulo",
            "Japan": ".popup-tokyo",
            "United Arab Emirates": ".popup-dubai",
            "Kosovo": ".popup-prishtina"
        },
        showPopup(id) {
            const popupClass = this.popupMap[id] || ".popup-none";
            document.querySelector(popupClass).style.display = "flex";
        },
        closePopup(city) {
            const popupSelector = `.popup-${city}`;
            document.querySelectorAll(".popup").forEach(popup => {
                popup.style.display = "none";
            });
            document.querySelector(popupSelector).style.display = "none";
        },
        closeAllPopups() {
            document.querySelectorAll(".popup").forEach(popup => {
                popup.style.display = "none";
            });
        }
    };

    [...document.querySelectorAll(".allPaths")].map(e => {
        e.addEventListener("click", () => {
            popupManager.showPopup(e.id);
        });
    });

    const cityManager = {
        cities: ["new-york", "london", "sao-paulo", "tokyo", "dubai", "prishtina"],
        attachCloseEvents() {
            this.cities.forEach(city => {
                document.querySelector(`#close-${city}`).addEventListener("click", () => {
                    popupManager.closePopup(city);
                });
            });

            $("#close-none").on("click", function () {
                $(".popup").hide();
                $(".popup-none").hide();
            });
        }
    };

    cityManager.attachCloseEvents();
});

function validateField(field, validationFn) {
    return validationFn(field);
}

function validateName(name) {
    if (!name.value.trim()) {
        alert('Please enter your full name.');
        name.focus();
        return false;
    }
    return true;
}

function validateEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!email.value.trim()) {
        alert('Please enter your email address.');
        email.focus();
        return false;
    }
    if (!emailPattern.test(email.value)) {
        alert('Please enter a valid email address.');
        email.focus();
        return false;
    }
    return true;
}

function validateMessage(message) {
    if (!message.value.trim()) {
        alert('Please write a message.');
        message.focus();
        return false;
    }
    return true;
}

document.getElementById('contact-form').addEventListener('submit', function (event) {
    event.preventDefault();

    const name = document.getElementById('namee');
    const email = document.getElementById('email');
    const message = document.getElementById('message');

    const isValid = [
        validateField(name, validateName),
        validateField(email, validateEmail),
        validateField(message, validateMessage)
    ].reduce((acc, valid) => acc && valid, true);

    if (isValid) {
        alert('Form submitted successfully!');
    }
});
</script>
</html>