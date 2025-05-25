<?php
$customCSS = "css/airplane.css";
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

<header>
  <video
    autoplay
    muted
    loop
    playsinline
    class="background-video"
    id="background-video">
    <source src="./img/background-video.mp4" type="video/mp4" />
  </video>
  <div class="hero">
    <hgroup>
      <h1>Find Aircraft for Sale & Rent</h1>
      <p style="padding-top: 1rem; font-weight: 700">
        Buy, Trade & Sell with Aerosales
      </p>
    </hgroup>
    <div style="padding-top: 1rem">
      <button class="buy open-popup">Buy an Aircraft</button>
      <button class="Sell open-popup">Sell an Aircraft</button>
    </div>
  </div>
</header>

<div class="search-bar">
  <h2>Find your Aircraft</h2>
  <form method="post" action="index.php">
    <div class="search">
      <label for="query">Search</label>
      <input
        type="text"
        name="query"
        id="query"
        style="max-height: fit-content; background-color: #f1f0e8"
        autocomplete="off" />
      <hr />
    </div>
    <select
      name="category"
      style="max-height: fit-content; background-color: #f1f0e8">
      <option value="all">All Categories</option>
      <option value="sale">For Sale</option>
      <option value="rent">For Rent</option>
      <option value="trade">For Trade</option>
    </select>
    <div class="slider">
      <label for="slider" style="text-align: start">Price range: </label>
      <span id="rangeValue" style="text-align: start">1000000</span>
      <input
        id="slider"
        type="range"
        min="0"
        max="50000000"
        value="1000000"
        step="25000" />
    </div>
    <button type="submit" style="max-height: fit-content">Search</button>
  </form>
</div>

<div class="showcase">
  <div class="imagecontainer">
    <a href="aircraft.php?id=learjet75">
      <figure>
        <img
          src="img/plane-images/Learjet 75/2015 LEARJET 75.webp"
          alt="2015 LEARJET 75" />
        <p>#XA-RSC</p>
        <figcaption>2015 LEARJET 75</figcaption>
      </figure>
    </a>
  </div>

  <div class="imagecontainer">
    <a href="aircraft.php?id=helicopter">
      <figure>
        <img
          src="img/plane-images/beechcraft 58/beechcraft.webp"
          alt="beechcraft" />
        <p>#N4380W</p>
        <figcaption>1974 BEECHCRAFT 588</figcaption>
      </figure>
    </a>
  </div>

  <div class="imagecontainer">
    <a href="aircraft.php?id=jet">
      <figure>
        <img
          src="img/plane-images/gulfstream gv/N1120G - 2000 GULFSTREAM GV.webp"
          alt="2000 GULFSTREAM GV" />
        <p>#N1120G</p>
        <figcaption>2000 GULFSTREAM GV</figcaption>
      </figure>
    </a>
  </div>
  <div class="imagecontainer">
    <a href="aircraft.php?single-engine">
      <figure>
        <img
          src="img/plane-images/cessna/cessna.jpg"
          alt="1959 CESSNA 180" />
        <p>#N9202T</p>
        <figcaption>1959 CESSNA 180</figcaption>
      </figure>
    </a>
  </div>
</div>
<section class="planetypes-slideshow">
  <section class="planetypes-slideshow-1">
    <div class="plane-types">
      <h1>Explore by type</h1>
      <div>
        <a href="Sales/Jet.php">
          <img
            src="img/planeTypes/businessjet-gulfstream190x132.png"
            alt="Jet" />
          <h3>Jet</h3>
        </a>
      </div>
      <div>
        <a href="Sales/Single-engine.php">
          <img src="img/planeTypes/piston.svg" alt="SingleEngine" />
          <h3>Single Engine</h3>
        </a>
      </div>
      <div>
        <a href="Sales/Multi engine.php">
          <img src="img/planeTypes/image.svg" alt="Multiengine" />
          <h3>Multi-Engine</h3>
        </a>
      </div>
      <div>
        <a href="Sales/Helicopter.php">
          <img
            src="img/planeTypes/turbine_helcopter.svg"
            alt="Helicopter" />
          <h3>Helicopter</h3>
        </a>
      </div>
      <div>
        <a href="">
          <img src="img/planeTypes/tuboprop.svg" alt="tuboprop" />
          <h3>Commercial Aircraft</h3>
        </a>
      </div>
      <div>
        <a href="">
          <img src="img/planeTypes/telebingo.png" alt="TurboProp" />
          <h3>TurboProp</h3>
        </a>
      </div>
    </div>
  </section>

  <section class="planetypes-slideshow-2">
    <div class="slideshow">
      <div>
        <img
          id="slideshow-image"
          src="/UEB24_GR24/img/slideshow/sidle-show-plane5.jpg"
          alt="Slideshow" />
      </div>
      <div>
        <h2>Our work</h2>
      </div>
    </div>
  </section>
</section>

<section class="jet-charter-luxury">
  <div class="image-container-luxury">
    <img src="./img/luxury.jpg" alt="Private Jet" />
  </div>
  <div class="text-container-luxury">
    <h2>Unparalleled Luxury</h2>
    <hr />
    <p>
      Our private planes set the standard for luxury, offering an unmatched
      experience of comfort, sophistication, and exclusivity. Enjoy gourmet
      catering tailored to your preferences, cutting-edge entertainment
      systems, and personalized service from our dedicated crew. Whether
      you're traveling for business or leisure, our planes provide a
      seamless and indulgent journey, allowing you to arrive refreshed,
      focused, and in absolute style.
    </p>
    <a href="buy-rent/buy-rent.html">Rent in style</a>
  </div>
</section>
<br />
<section class="jet-charter-space">
  <div class="image-container-space">
    <img src="./img/space.jpg" alt="Private Jet" />
  </div>
  <div class="text-container-space">
    <h2>Unmatched Spaciousness in the Sky</h2>
    <hr />
    <p>
      Our private planes are designed with spaciousness in mind, providing
      an environment where you can truly stretch out and unwind. With
      generous legroom, wide aisles, and carefully planned layouts, you’ll
      have ample space to relax, work, or even hold meetings while in the
      air. Whether you need a cozy lounge area, a fully reclining seat for
      rest, or a dedicated workspace, our aircraft ensure you never feel
      confined. Experience the freedom of travel with unmatched comfort and
      room to move, making every journey as productive or restful as you
      desire.
    </p>
    <a href="buy-rent/buy-rent.html">Rent in style</a>
  </div>
</section>
<div class="popular">
  <table cellpadding="10">
    <tr>
      <th colspan="4">
        <h2>Popular Brands</h2>
      </th>
    </tr>
    <tr>
      <td>
        <a href="https://bombardier.com/en" target="_blank">
          <figure>
            <img src="img/PopularBrands/Bombardier.png" alt="BOMBARDIER" />
          </figure>
        </a>
      </td>
      <td>
        <a href="https://www.airbus.com/en" target="_blank">
          <figure>
            <img src="img/PopularBrands/Airbus.png" alt="AIRBUS" />
          </figure>
        </a>
      </td>
      <td>
        <a href="https://www.boeingdistribution.com/" target="_blank">
          <figure>
            <img src="img/PopularBrands/Boeing.png" alt="BOEING" />
          </figure>
        </a>
      </td>
      <td>
        <a href="https://gulfstream.com/en/" target="_blank">
          <figure>
            <img
              src="img/PopularBrands/Gulfstream Aerospace.png"
              alt="GULFSTREAM" />
          </figure>
        </a>
      </td>
    </tr>
    <tr>
      <td>
        <a href="https://www.dassault-aviation.com/en/" target="_blank">
          <figure>
            <img src="img/PopularBrands/Dassault.png" alt="DASSAULT" />
          </figure>
        </a>
      </td>
      <td>
        <a href="https://pilatus-aircraft.com/" target="_blank">
          <figure>
            <img src="img/PopularBrands/Pilatus.png" alt="Pilatus" />
          </figure>
        </a>
      </td>
      <td>
        <a href="https://www.hondajet.com/" target="_blank">
          <figure>
            <img src="img/PopularBrands/HondaJet.png" alt="HONDAJET" />
          </figure>
        </a>
      </td>
      <td>
        <a href="https://www.nextantaerospace.com/" target="_blank">
          <figure>
            <img src="img/PopularBrands/Nextant.png" alt="Nextant" />
          </figure>
        </a>
      </td>
    </tr>
    <tr>
      <td>
        <a href="https://cessna.txtav.com/" target="_blank">
          <figure>
            <img src="img/PopularBrands/Cessna.png" alt="Cessna" />
          </figure>
        </a>
      </td>
      <td>
        <a href="https://defense.embraer.com/" target="_blank">
          <figure>
            <img src="img/PopularBrands/Embraer.png" alt="Embraer" />
          </figure>
        </a>
      </td>
      <td>
        <a href="https://piaggioaerospace.it/" target="_blank">
          <figure>
            <img src="img/PopularBrands/Piaggio.png" alt="Piaggio" />
          </figure>
        </a>
      </td>
      <td>
        <a href="https://beechcraft.txtav.com/" target="_blank">
          <figure>
            <img src="img/PopularBrands/beechcraft.svg" alt="beechcraft" />
          </figure>
        </a>
      </td>
    </tr>
  </table>
</div>

<?php include 'footer/footer.html'; ?>

<script type="text/javascript" src="js/hapsiraPunes.js"></script>
<script type="text/javascript" src="js/nav_footer.js"></script>
<script type="text/javascript" src="js/popup.js"></script>
</body>

</html>