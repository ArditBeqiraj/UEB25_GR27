<?php
$customCSS = "css/about.css";
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
$titulli = "Aerosales";
define("Viti", 2025);

$faqBuyers = [
    "What are the Fees for a Buyer on AeroSales?" => "Buyer upfront costs amount to 10% of total aircraft cost...",
    "Can I purchase a plane internationally?" => "Yes, AeroSales allows international buyers, subject to verification.",
];
?>
<header style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(./img/about/sea.jpg);">
    <div class="hero">
        <hgroup>
        <h1><?= $titulli ?></h1>
            <p >Buy, Trade & Sell with <?= $titulli ?></p>
        </hgroup>
    </div>
</header>
<div class="showcase">

    <section class="jet-charter-luxury">
        <div class="image-container-luxury">
            <img src="./img/about/how-to-become-a-private-jet-pilot.jpg" alt="Private Jet">
        </div>
        <div class="text-container-luxury">
            <h2>Who are we?</h2>
            <hr />
            <p>
                At Aerosales, we are dedicated to providing our clients with unparalleled luxury and convenience
                through
                the sale and rental of private aircraft.Whether
                you're looking to purchase your own private plane or simply need to rent one for a specific journey,
                we ensure a
                seamless, stress-free experience from start to finish. Our team of aviation experts is here to help
                you select
                the perfect aircraft tailored to your preferences, ensuring that every flight is smooth,
                comfortable, and private.
            </p>
        </div>
    </section>
    <br>
    <section class="jet-charter-luxury">
        <div class="image-container-space">
            <img src="./img/about/niklas-jonasson-kEUqqARSlrw-unsplash.jpg" alt="Private Jet">
        </div>
        <div class="text-container-space">
            <h2>Our mission</h2>
            <hr />
            <ul>
                <li>Provide unparalleled private air travel experiences with the highest standards of safety,
                    comfort, and luxury.</li>
                <li>Offer a diverse fleet of private jets for sale and rent, catering to both personal and business
                    needs.</li>
                <li>Ensure personalized, seamless service with a dedicated team of aviation experts available around
                    the clock.</li>
                <li>Lead the aviation industry in innovative solutions that make private air travel more accessible
                    and convenient.</li>
            </ul>
        </div>
    </section>
    <br>

    <section class="jet-charter-luxury" >
        <div class="carbon" style = "background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(./img/about/carbon.jpg);">
            <h2>We are carbon neutral</h2><br><br>
            <p>
                Each year we offset 100% of our annual business emissions, while investing in a variety of
                projects that deliver positive, environmental, developmental and social change around the globe.
            </p>
        </div>
    </section>
    <br>

    <section>
        <h1 style="text-align: center;">FAQ for buyers</h1><br>
        <div class="faq-container">
            <div class="faq-item">
                <button class="faq-question-buyers" id="faq-question">What are the Fees for a Buyer on AeroSales?</button>
                <div class="faq-answer">
                    <p>Buyer upfront costs amount to 10% of total aircraft cost. Half of this value goes to
                        AeroSales and the other half to the seller once the transaction has been confirmed.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question-buyers" id="faq-question">Can I purchase a plane if I live outside the United States or
                    Canada?</button>
                <div class="faq-answer">
                    <p>Yes, AeroSales allows international buyers, subject to verification and approval by the
                        seller.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question-buyers" id="faq-question">How Do I Contact A Seller?</button>
                <div class="faq-answer">
                    <p>You can contact a seller through our platform's messaging system after registering and
                        verifying your account.</p>
                </div>
            </div>
        </div>
    </section><br><br>

    <section>
        <h1 style="text-align: center;">FAQ for sellers</h1><br>
        <div class="faq-container">
            <div class="faq-item">
                <button class="faq-question-sellers" id="faq-question">What fees or commissions are charged for selling on this
                    platform?</button>
                <div class="faq-answer">
                    <p>The platform charges a commission of 10% on every successful sale.
                        Additional processing fees may apply depending on the payment method used.
                        Earnings from sales will be transferred to your registered payment account
                        within 7 days after the booking is completed.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question-sellers" id="faq-question">How do I ensure my listings attract more buyers?</button>
                <div class="faq-answer">
                    <h4>To make your listings stand out:</h4><br>
                    <p>
                    <ul style="padding-left: 5%;">
                        <li>Provide detailed and accurate information about your tickets or services (e.g., routes,
                            times, and pricing).</li>
                        <li>Use high-quality images or official documents if applicable.</li>
                        <li>Offer competitive pricing and clear terms for cancellations or refunds.</li>
                        <li>Respond promptly to buyer inquiries to build trust and improve your ratings.</li>
                        <li>Consistently maintaining a positive rating increases your visibility on the platform.
                        </li>
                    </ul>
                    </p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question-sellers" id="faq-question">What documents do I need to sell airplane tickets or services?</button>
                <div class="faq-answer">
                    <h4>The required documents depend on the type of services you’re selling.
                        Commonly needed documents include:</h4><br>
                    <p>
                    <ol style="padding-left: 5%; list-style-type: disc;">
                        <li>Proof of authorization to sell tickets (e.g., airline partnership agreement).</li>
                        <li>Business registration or license if you’re operating as a company.</li>
                        <li>Identification documents for verification purposes.</li>
                    </ol>
                    </p>
                </div>
            </div>
        </div>
    </section><br><br>

    <section>
        <h1 style="text-align: center;">FAQ for renters</h1><br>
        <div class="faq-container">
            <div class="faq-item">
                <button class="faq-question-renters" id="faq-question">How do I find the right airplane to rent?</button>
                <div class="faq-answer">
                    <h4>To find the perfect airplane for your needs:</h4>
                    <p>
                    <ol style="padding-left: 5%;">
                        <li>Use the search filters to specify criteria such as:
                            <ul style="padding-left: 5%; list-style-type: circle;">
                                <li>Type of airplane (e.g., private jet, commercial, cargo).</li>
                                <li>Rental duration.</li>
                                <li>Departure and arrival locations.</li>
                            </ul>
                        </li>
                        <li>Compare the listed options by reading descriptions, viewing photos, and checking user
                            reviews.</li>
                        <li>Contact the seller for any additional details or clarifications before making a booking.
                        </li>
                    </ol>
                    </p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question-renters" id="faq-question">What is included in the rental price?</button>
                <div class="faq-answer">
                    <h4>The rental price typically covers:</h4><br>
                    <p>
                    <ul style="padding-left: 5%;">
                        <li>Base rental fee for the airplane.</li>
                        <li>Standard operational costs such as fuel (unless specified otherwise).</li>
                        <li>Basic insurance.</li><br>
                    </ul> Additional costs, like extended insurance, pilot fees, or catering services, may not be
                    included. Check the listing details or ask the renter for specifics.
                    </p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question-renters" id="faq-question">What documents are required to rent an airplane?</button>
                <div class="faq-answer">
                    <h4>To rent an airplane, you may need to provide:</h4>
                    <p>
                    <ul style="padding-left: 5%;">
                        <li>Personal Identification</li>
                        <li>Flight-Related Credentials (if you intend to operate the aircraft)</li>
                        <li>Financial Assurance</li><br>
                    </ul>Ensure you upload all required documents during the booking process to avoid delays.
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>



<?php
function showFaqs($faqArray)
{
    foreach ($faqArray as $question => $answer) {
        echo "<div class='faq-item'>";
        echo "<button class='faq-question-buyers'>$question</button>";
        echo "<div class='faq-answer'><p>$answer</p></div>";
        echo "</div>";
    }
}

$cmimi = 1500000;
$interncaional = true;

var_dump($cmimi);

if ($cmimi > 1000000) {
    echo "<p>This is a high-value aircraft.</p>";
} else {
    echo "<p>Affordable option!</p>";
}

ksort($faqBuyers);

class Aeroplani
{
    public $modeli;
    private $cmimi;

    function __construct($modeli, $cmimi)
    {
        $this->modeli = $modeli;
        $this->cmimi = $cmimi;
    }

    function getCmimi()
    {
        return $this->cmimi;
    }

    function setCmimi($value)
    {
        if ($value > 0) $this->cmimi = $value;
    }
}

$jet = new Aeroplani("Gulfstream G700", 75000000);
echo "<p>Modeli: {$jet->modeli}, Cmimi: {$jet->getCmimi()} EURO</p>";


?>


<?php include 'footer/footer.html'; ?>

<script type="text/javascript" src="js/about.js"></script>
<script type="text/javascript" src="js/nav_footer.js"></script>
<script type="text/javascript" src="js/popup.js"></script>
</body>

</html>