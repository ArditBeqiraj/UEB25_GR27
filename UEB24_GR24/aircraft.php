<?php
$customCSS = "css/sales.css";
require_once 'partials/header.php';

$aircrafts = [
    'learjet75' => [
        'main_image' => 'img/plane-images/Learjet 75/2015 LEARJET 75.webp',
        'name' => '2015 LEARJET 75',
        'registration' => '#XA-RSC',
        'year' => '2015',
        'condition' => 'used',
        'total-time' => '4500 hours',
        'program' => 'Recently overhauled Continental O-470 engine.',
        'notes' => 'Traditional red and white paint scheme with polished accents.',
        'manufacturer' => 'Learjet',
        'model' => '75',
        'price' => 8500000
    ]
];

$aircraftId = $_GET['id'] ?? null;
$aircraft = $aircrafts[$aircraftId] ?? null;
?>


<section class="jet-desc" style="margin-top: 6rem;">
    <div class="titull" id="cessna180">
        <h1><?= $aircraft['name'] ?></h1>
    </div>
    <div class="jet-desc-image">
        <div class="bottomimages">
            <img src="./img/plane-images/cessna/cessna1.jpg" alt="CESSNA 180" onclick="changeImage(this)">
            <img src="./img/plane-images/cessna/cessna2.jpg" alt="CESSNA 180" onclick="changeImage(this)">
            <img src="./img/plane-images/cessna/cessna3.webp" alt="CESSNA 180" onclick="changeImage(this)">
            <img src="./img/plane-images/cessna/cessna4.webp" alt="CESSNA 180" onclick="changeImage(this)">
        </div>
        <div class="topimage">
            <img class="mainImage" src="<?= $aircraft['main_image'] ?>" alt="CESSNA 180">
        </div>
    </div>

    <div class="data">

        <h2>Key Features:</h2>

        <ul>
            <li><strong>Year:</strong> <?= $aircraft['year'] ?></li>
            <li><strong>Manufacturer:</strong> <?= $aircraft['manufacturer'] ?></li>
            <li><strong>Condition:</strong> <?= $aircraft['condition'] ?></li>
            <li><strong>Total Time:</strong> <?= $aircraft['total-time'] ?></li>
            <li><strong>Engine Maintenance Program:</strong> <?= $aircraft['program'] ?></li>
            <li><strong>Exterior Notes:</strong> <?= $aircraft['notes'] ?> </li>

        </ul>
        <!-- 
        <div id="moreInfoModal" class="modal">
            <div class="modal-content">
                <span class="close"></span>
                <h1>More Information</h1>
                <br>
                <p><strong>Performance:</strong>
                    - Maximum Cruise Speed: 142 knots <br>
                    - Maximum Range: 720 nautical miles <br>
                    - Service Ceiling: 17,700 feet
                </p>
                <p><strong>Interior Features:</strong>
                    - Comfortable seating for up to 4 passengers <br>
                    - Classic leather upholstery with custom stitching <br>
                    - Optional rear-seat removal for additional cargo space <br>
                    - USB ports for charging devices in-flight
                </p>
                <p><strong>Exterior Details:</strong>
                    - Classic red and white paint scheme <br>
                    - LED landing and navigation lights <br>
                    - Well-maintained polished aluminum accents
                </p>
                <p><strong>Safety and Reliability:</strong>
                    - Modern avionics for situational awareness <br>
                    - Backup manual instruments <br>
                    - Upgraded fuel system for improved reliability
                </p>
                <p><strong>Maintenance Highlights:</strong>
                    - Complete maintenance history available <br>
                    - Recently overhauled engine and propeller <br>
                    - Always hangared, ensuring excellent condition
                </p>
                <p><strong>Special Features:</strong>
                    - Floatplane conversion-ready <br>
                    - Large cargo doors for easier loading <br>
                    - Tailwheel design for off-runway capabilities
                </p>
                <p id="modalDetails"></p>
            </div>
        </div> -->

        <div class="more-info">
            <button class="button1 height" class="open-form">View Height</button>
            <button class="button1 forma" data-type="Single engine" data-name="Cessna 180" class="open-form">Buy / Rent</button>
        </div>
    </div>
</section>


<!--------------------------------------------------------------------------------------------------------------------------->


<div id="footer"></div>

<script type="text/javascript">
    $('#footer').load('./footer/footer.html');
</script>
<style>
    footer {
        background-color: rgb(27, 27, 27);
    }

    .footer-div {
        background-color: rgb(27, 27, 27);
    }
</style>
<script type="text/javascript">
    $('#popup').load('./member/popup.php');
</script>



<script type="text/javascript" src="./js/nav_footer.js"></script>
<script type="text/javascript" src="./js/popup.js"></script>
<script src="./js/Sales.js"></script>
<script>
    document.querySelectorAll(".forma").forEach(button => {
        button.addEventListener("click", () => {
            const selectedType = button.getAttribute("data-type");
            const selectedName = button.getAttribute("data-name");

            // Ruaj te dhenat ne localStorage
            localStorage.setItem("selectedType", selectedType);
            localStorage.setItem("selectedName", selectedName);

            // Shko te site
            window.location.href = "./buy-rent/buy-rent.html";
        });
    });
    document.querySelectorAll(".height").forEach(button => {
        button.addEventListener("click", () => {

            // Redirect to the form page
            window.location.href = "./height.html";
        });
    });
</script>


</body>

</html>