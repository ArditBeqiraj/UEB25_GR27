<?php

$customCSS = "css/recources.css";
require_once 'partials/header.php';

?>


<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aerosales</title>
  <link rel="stylesheet" href="css/recources.css">
  <link rel="stylesheet" href="css/nav_footer.css">
  <link rel="stylesheet" href="footer/footer.css">
  <link rel="stylesheet" href="member/popup.css">

  <script src="js/jquery-3.7.1.min.js"></script>
</head>

<body>

  <nav style="background-color: #183251;  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
    <div class="logo">
      <a href="index.html">
        <img src="img/logo and icons/Untitled 2.svg" alt="Site logo " style="width: 15rem;">
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
  <div id="popup">
  </div> -->


<div class="popup">
  <img class="close" src="img/logo and icons/close-circle-svgrepo-com.svg" alt="close">

  <div class="container">

    <div class="buttons">
      <button class="button-login" id="button-login">Log In</button>
      <button class="button-signup" id="button-signup">Sign Up</button>
    </div>

    <div class="permbajtja">
      <div class="log-in" id="log-in">

      </div>
      <div class="sign-up" id="sign-up">

      </div>
    </div>
  </div>
</div>

<section class="Airports-space">
  <div class="content-wrapper">
    <div class="text.container1">
      <h2>Airports</h2>
      <hr />
      At Aerosales, we are proud to partner with a vast network of world-class
      airports across the globe, connecting travelers to their destinations with ease and efficiency.
      Whether it's facilitating faster connections, enhancing passenger comfort,
      or supporting sustainable airport operations, our commitment to excellence makes us the trusted
      choice in global aviation.Wherever you're headed,we're proud to be part of your journey.
    </div>
    <div class="slideshow-wrapper">
      <div class="slideshow-right">
        <img src="img/airports/210623180928-dubai-airport.jpg" class="slideshow-image">
        <img src="img/airports/Adolfo+Suarez+Madrid-Barajas+Airport+04.jpg" class="slideshow-image">
        <img src="img/airports/Canopy-ATL-illuminated-sky_-copy-900x500.jpg" class="slideshow-image">
        <img src="img/airports/china airport.jpg" class="slideshow-image">
        <img src="img/airports/frankfurt airport.webp" class="slideshow-image">
        <img src="img/airports/haneda.jpg" class="slideshow-image">
        <img src="img/airports/Navigating Charles de Gaulle.png" class="slideshow-image">
      </div>
    </div>
  </div>

</section>

<br>


<section class="Flights">
  <title>Live Flight Status</title>
  <div class="flight-status">
    <h1>Live Rented Flight Status</h1>
    <table>
      <thead>
        <tr>
          <th>Flight</th>
          <th>Airline</th>
          <th>Destination</th>
          <th>Departure Time</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>AA123</td>
          <td>American Airlines</td>
          <td>New York (JFK)</td>
          <td>12:45 PM</td>
          <td class="on-time">On Time</td>
        </tr>
        <tr>
          <td>DL456</td>
          <td>Delta Airlines</td>
          <td>Atlanta (ATL)</td>
          <td>1:30 PM</td>
          <td class="delayed">Delayed</td>
        </tr>
        <tr>
          <td>UA789</td>
          <td>United Airlines</td>
          <td>Chicago (ORD)</td>
          <td>2:15 PM</td>
          <td class="cancelled">Cancelled</td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

<br>

<section class="Finance">
  <title>Financing and Leasing</title>

  <div class="financing-leasing">
    <h1>Financing and Leasing Options</h1>
    <div class="tabs">
      <button class="tab-button active" onclick="openTab(event, 'financing')">Financing</button>
      <button class="tab-button" onclick="openTab(event, 'leasing')">Leasing</button>
    </div>
    <div class="tab-content" id="financing" style="display: block;">
      <h2>Financing Options</h2>
      <p>We offer competitive financing plans to make your aircraft purchase easier. Explore options tailored to your
        needs:</p>
      <ul>
        <li>Low-interest rates starting at 3.5% APR.</li>
        <li>Flexible loan terms up to 20 years.</li>
        <li>No prepayment penalties.</li>
        <li>Custom payment schedules to match your income flow.</li>
      </ul>
      <p><strong>Requirements:</strong> Financial statements, creditworthiness assessment, and down payment of 10%.
      </p>
      <p>For more details, <a href="contact.html">contact us</a> or speak with our financing specialists.</p>
    </div>
    <div class="tab-content" id="leasing">
      <h2>Leasing Options</h2>
      <p>Leasing is a great way to access high-quality aircraft without a full upfront investment. Our leasing plans
        include:</p>
      <ul>
        <li>Operating leases with flexible terms.</li>
        <li>Lease-to-own programs available.</li>
        <li>Minimal upfront costs and predictable monthly payments.</li>
        <li>Maintenance and support packages included.</li>
      </ul>
      <p><strong>Best for:</strong> Charter operators, businesses, or individuals who need short-term aircraft usage.
      </p>
      <p>To request a leasing quote, <a href="contact.html">get in touch</a>.</p>
    </div>
  </div>

</section>

<br>

<section class="Maintenance">

  <title>Maintenance and Support</title>

  <div class="maintenance-support">
    <h1>Maintenance and Support</h1>
    <p>We offer world-class maintenance and support services to keep your aircraft in top condition. Explore our
      services below:</p>
    <div class="accordion">
      <div class="accordion-item">
        <button class="accordion-header">Scheduled Maintenance</button>
        <div class="accordion-content">
          <p>Ensure your aircraft stays in compliance with regulatory standards. Our scheduled maintenance packages
            include:</p>
          <ul>
            <li>Routine inspections and servicing</li>
            <li>Compliance with FAA/EASA guidelines</li>
            <li>Parts replacement and performance tuning</li>
          </ul>
        </div>
      </div>
      <div class="accordion-item">
        <button class="accordion-header">On-Demand Repairs</button>
        <div class="accordion-content">
          <p>Our repair services are available 24/7 to address any unexpected issues. Services include:</p>
          <ul>
            <li>Engine diagnostics and repairs</li>
            <li>Avionics troubleshooting</li>
            <li>Structural damage repair</li>
          </ul>
        </div>
      </div>
      <div class="accordion-item">
        <button class="accordion-header">Upgrades and Customization</button>
        <div class="accordion-content">
          <p>Enhance your aircraft with the latest upgrades and features:</p>
          <ul>
            <li>Cabin interior redesign</li>
            <li>Avionics system upgrades</li>
            <li>Performance and safety enhancements</li>
          </ul>
        </div>
      </div>
      <div class="accordion-item">
        <button class="accordion-header">Global Support Network</button>
        <div class="accordion-content">
          <p>Access support anytime, anywhere through our global network:</p>
          <ul>
            <li>Over 100 certified maintenance centers worldwide</li>
            <li>Remote technical support via our mobile app</li>
            <li>Dedicated account managers for VIP clients</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

</section>

<br>

<section class="guide-section">

  <h1>Buying Guide</h1>
  <br>

  <h2>How to Choose the Right Aircraft</h2>
  <p>When choosing an aircraft, consider your intended use, budget, and maintenance costs. Common categories include
    private, business, and cargo planes. Each comes with unique features suited for specific needs.</p>
</section>
<section class="guide-section">
  <h2>New vs. Used Aircraft</h2>
  <p>
    <strong>New Aircraft:</strong> Benefit from warranties, the latest technology, and lower initial maintenance
    needs.
    <br>
    <strong>Used Aircraft:</strong> Lower upfront costs but may require more maintenance and inspections before
    purchase.
  </p>
</section>
<section class="guide-section">
  <h2>Cost Breakdown</h2>
  <ul>
    <li><strong>Purchase Price:</strong> Varies widely depending on the type and condition.</li>
    <li><strong>Maintenance:</strong> Regular inspections, part replacements, and unforeseen repairs.</li>
    <li><strong>Fuel Costs:</strong> Based on usage and engine type.</li>
    <li><strong>Insurance:</strong> Covers liability and potential damage.</li>
  </ul>
</section>

<br>

<section class="ownership-section">

  <h1>Ownership Resources:</h1>
  <br>

  <h2>Maintenance Guidelines</h2>
  <p>Owning an aircraft requires regular inspections, engine checks, and adherence to FAA or EASA maintenance
    schedules. Ensure you partner with certified technicians for all servicing needs.</p>
  <ul>
    <li>Annual inspections</li>
    <li>Engine overhauls</li>
    <li>Pre-flight safety checks</li>
    <li>Avionics updates</li>
  </ul>
</section>
<section class="ownership-section">
  <h2>Legal Requirements</h2>
  <p>Every aircraft owner must meet certain legal standards, including:</p>
  <ul>
    <li>Proper registration with aviation authorities.</li>
    <li>Carrying liability and hull insurance.</li>
    <li>Adhering to airworthiness certification requirements.</li>
  </ul>
</section>
<section class="ownership-section">
  <h2>Pilot Training Resources</h2>
  <p>If you plan to fly your aircraft, obtaining a proper pilot license is essential. Here's how you can get started:
  </p>
  <ul>
    <li>Enroll in an FAA-approved flight school.</li>
    <li>Complete ground school training for theory.</li>
    <li>Log flight hours with a certified instructor.</li>
    <li>Pass the practical and written exams.</li>
  </ul>
</section>

<br>

<section id="glossary-safety-resources" class="resource-section">
  <h2 class="section-title">Glossary & Safety Resources</h2>
  <div class="resource-tabs">
    <div class="resource-tab-buttons">
      <button class="resource-tab-button active" data-tab="glossary-tab">Glossary</button>
      <button class="resource-tab-button" data-tab="safety-tab">Safety Resources</button>
    </div>

    <div id="glossary-tab" class="resource-tab-content active">
      <h3>Glossary of Terms</h3>
      <p class="intro-text">Learn key terms and aviation jargon to enhance your knowledge.</p>
      <ul class="resource-list">
        <li>
          <strong>MTOW (Maximum Takeoff Weight):</strong>
          The highest weight an aircraft can safely take off with.
        </li>
        <li>
          <strong>FBO (Fixed-Base Operator):</strong>
          A service provider offering refueling, maintenance, and storage at airports.
        </li>
        <li>
          <strong>Hangar Rash:</strong>
          Minor damage to an aircraft caused by improper handling within a hangar.
        </li>
        <li>
          <strong>Airworthiness Certificate:</strong>
          A document proving an aircraft meets safety standards.
        </li>
      </ul>
    </div>

    <!-- Safety Resources Tab Content -->
    <div id="safety-tab" class="resource-tab-content">
      <h3>Safety Resources</h3>
      <p class="intro-text">Stay prepared with essential safety guidelines and tools.</p>
      <ul class="resource-list">
        <li>
          <strong>Pre-Flight Checklist:</strong>
          Conduct detailed inspections of fuel levels, controls, and systems before takeoff.
        </li>
        <li>
          <strong>Emergency Procedures:</strong>
          Learn protocols for engine failures, turbulence, and other emergencies.
        </li>
        <li>
          <strong>FAA Safety Guidelines:</strong>
          Regularly review updates from the <a href="https://www.faa.gov" target="_blank">FAA</a> to stay compliant.
        </li>
        <li>
          <strong>Weather Awareness:</strong>
          Use reliable weather tools to assess conditions before every flight.
        </li>
      </ul>
    </div>
  </div>
</section>




<div id="footer"></div>

<script type="text/javascript">
  $('#footer').load('footer/footer.html');
</script>

<script type="text/javascript">
  $('#popup').load('member/popup.html');
</script>


<script type="text/javascript" src="js/recources.js "></script>
<script type="text/javascript" src="js/nav_footer.js"></script>
<script type="text/javascript" src="js/popup.js"></script>
</body>

</html>