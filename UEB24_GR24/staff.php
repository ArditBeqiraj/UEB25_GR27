<?php
$customCSS = "css/staff.css";
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
    <h1>Meet the Team Behind the Magic</h1>
    <h2>The Heart, Soul, and Brains of Aerosales
        Where Talent Meets Passion to Drive Excellence</h2>
</header>





<?php
$teamRoles = [
    "Pilot" => "Operates aircraft safely and efficiently, ensuring a smooth flight experience for passengers.",
    "Engineer" => "Maintains, repairs, and inspects aircraft systems to guarantee airworthiness.",
    "Flight Attendant" => "Provides customer service, ensures passenger safety, and manages in-flight operations.",
    "Sales" => "Assists clients in purchasing or leasing aircraft, offering guidance and support throughout the process.",
    "Ground Staff" => "Handles on-ground operations like baggage, logistics, and passenger boarding.",
    "Air Traffic Controller" => "Coordinates aircraft movements on the ground and in the air to maintain safe distances."
];
?>


<?php

$teamMembers = [
    "John Doe" => ["role" => "Sales", "img" => "img/Staff/sales2.jpg"],
    "James Smith" => ["role" => "Sales", "img" => "img/Staff/sales3.jpg"],
    "Bob Johnson" => ["role" => "Sales", "img" => "img/Staff/sales4.jpg"],
    "Emily Brown" => ["role" => "Technical", "img" => "img/Staff/technical1.jpg"],
    "Michael Lee" => ["role" => "Technical", "img" => "img/Staff/technical3.jpg"],
    "Alex Turner" => ["role" => "Flight Operations", "img" => "img/Staff/alex turner.jpg"],
    "David Johnson" => ["role" => "Finance", "img" => "img/Staff/finance1.webp"],
    "Laura Martinez" => ["role" => "Legal", "img" => "img/Staff/finance2.jpg"]
];


$selectedRole = isset($_GET['role']) ? $_GET['role'] : ''; 
?>


<form method="GET">
    <label for="role">Filter by Role:</label>
    <select name="role" id="role" onchange="this.form.submit()">
        <option value="">All</option>
        <option value="Sales" <?php echo ($selectedRole == 'Sales') ? 'selected' : ''; ?>>Sales</option>
        <option value="Technical" <?php echo ($selectedRole == 'Technical') ? 'selected' : ''; ?>>Technical</option>
        <option value="Flight Operations" <?php echo ($selectedRole == 'Flight Operations') ? 'selected' : ''; ?>>Flight Operations</option>
        <option value="Finance" <?php echo ($selectedRole == 'Finance') ? 'selected' : ''; ?>>Finance</option>
        <option value="Legal" <?php echo ($selectedRole == 'Legal') ? 'selected' : ''; ?>>Legal</option>
    </select>
</form>


<section class="team-section">
    <h1>Meet Some Of Our Team</h1>
    <div class="team-container">
        <?php
        foreach ($teamMembers as $name => $details) {
            if ($selectedRole == '' || $selectedRole == $details['role']) {
                echo "<div class='team-member'>
                        <img src='{$details['img']}' alt='$name' class='team-photo'>
                        <h2>$name</h2>
                        <p>{$details['role']}</p>
                    </div>";
            }
        }
        ?>
    </div>
</section>


<section class="team-section roles-section">
    <h1>Our Team Roles</h1>
    <div class="roles-container">
        <?php foreach ($teamRoles as $role => $description): ?>
            <div class="role-card">
                <h2><?= htmlspecialchars($role) ?></h2>
                <p class="hover-desc"><?= htmlspecialchars($description) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>


<section class="team-section">
    <h1>Meet Our Sales Team</h1>
    <div class="team-container">
        <div class="team-member">
            <img src="img/Staff/sales2.jpg" alt="John Doe" class="team-photo">
            <h2>John Doe</h2>
            <p>Aircraft Sales Representative</p>
            <p>John brings over 10 years of experience in helping clients find their perfect aircraft.</p>
        </div>
        <div class="team-member">
            <img src="img/Staff/sales3.jpg" alt="James Smith" class="team-photo">
            <h2>James Smith</h2>
            <p class="staff-text">Customer Success Manager</p>
            <p class="staff-text">Jane ensures a seamless buying process and supports our clients post-sale.</p>
        </div>
        <div class="team-member">
            <img src="img/Staff/sales4.jpg" alt="Bob Johnson" class="team-photo">
            <h2>Bob Johnson</h2>
            <p>Aviation Finance Specialist</p>
            <p>Bob specializes in making aircraft financing simple and hassle-free.</p>
        </div>
    </div>
</section>

<section class="team-section">
    <h1>Meet Our Technical Experts</h1>
    <div class="team-container">
        <div class="team-member">
            <img src="img/Staff/technical1.jpg" alt="Emily Brown" class="team-photo">
            <h2>Emily Brown</h2>
            <p>Aviation Engineer</p>
            <p>Emily specializes in aircraft inspections and technical evaluations, ensuring safety and performance.
            </p>
        </div>
        <div class="team-member">
            <img src="img/Staff/technical3.jpg" alt="Michael Lee" class="team-photo">
            <h2>Michael Lee</h2>
            <p>Maintenance Specialist</p>
            <p>With over 15 years of experience, Michael ensures our aircraft meet the highest maintenance
                standards.</p>
        </div>
    </div>
</section>

<section class="team-section">
    <h1>Meet Our Flight Operations Team</h1>
    <div class="team-container">
        <div class="team-member">
            <img src="img/Staff/alex turner.jpg" alt="Alex Turner" class="team-photo">
            <h2>Alex Turner</h2>
            <p>Test Pilot</p>
            <p>Alex is an experienced test pilot, ensuring every aircraft is ready to take
                to the skies with precision and safety.</p>
        </div>
    </div>
</section>

<section class="team-section">
    <h1>Meet Our Finance and Legal Team</h1>
    <div class="team-container">
        <div class="team-member">
            <img src="img/Staff/finance1.webp" alt="David Johnson" class="team-photo">
            <h2>David Johnson</h2>
            <p>Aviation Finance Specialist</p>
            <p>David simplifies aircraft financing, offering tailored solutions to fit client needs.</p>
        </div>
        <div class="team-member">
            <img src="img/Staff/finance2.jpg" alt="Laura Martinez" class="team-photo">
            <h2>Laura Martinez</h2>
            <p>Legal Advisor</p>
            <p>Laura ensures that all contracts and legal matters comply with aviation standards and client
                expectations.</p>
        </div>
    </div>
</section>

<section class="team-section">
    <h1>Meet Our Marketing and PR Team</h1>
    <div class="team-container">
        <div class="team-member">
            <img src="img/Staff/marketing2.jpg" alt="Sophia Wilson" class="team-photo">
            <h2>Sophia Wilson</h2>
            <p>Marketing Manager</p>
            <p>Sophia leads our marketing efforts, crafting campaigns that showcase the best of our aircraft fleet.
            </p>
        </div>
        <div class="team-member">
            <img src="img/Staff/marketing1.jpg" alt="James Taylor" class="team-photo">
            <h2>James Taylor</h2>
            <p>Social Media Specialist</p>
            <p>James creates engaging social media content, building excitement and trust among our clients.</p>
        </div>
    </div>
</section>

<section class="team-section">
    <h1>Meet Our Leadership Team</h1>
    <div class="team-container">
        <div class="team-member">
            <img src="img/Staff/leadership1.webp" alt="Chris Anderson" class="team-photo">
            <h2>Chris Anderson</h2>
            <p>Chief Executive Officer</p>
            <p>Chris founded the company with a vision to revolutionize aircraft sales, bringing decades of aviation
                experience.</p>
        </div>
        <div class="team-member">
            <img src="img/Staff/leadership2.jpg" alt="Rachel Green" class="team-photo">
            <h2>Rachel Green</h2>
            <p>VP of Sales & Business Development</p>
            <p>Rachel spearheads sales strategy, building strong partnerships with clients and industry leaders.</p>
        </div>
    </div>
</section>

<section class="team-section">
    <h1>Meet Our Customer Support Team</h1>
    <div class="team-container">
        <div class="team-member">
            <img src="img/Staff/customer2.webp" alt="Daniel Parker" class="team-photo">
            <h2>Daniel Parker</h2>
            <p>Support Specialist</p>
            <p>Daniel is dedicated to ensuring our clients have the answers they need, every step of the way.</p>
        </div>
        <div class="team-member">
            <img src="img/Staff/customer1.jpg" alt="Olivia Brown" class="team-photo">
            <h2>Olivia Brown</h2>
            <p>Support Specialist</p>
            <p>Olivia provides exceptional service to handle any post-sale questions or maintenance requests.</p>
        </div>
    </div>
</section>


<section class="team-section">
    <h1>Meet Our Specialists</h1>
    <div class="team-container">
        <div class="team-member">
            <img src="img/Staff/specialist1.jpg" alt="Liam Collins" class="team-photo">
            <h2>Liam Collins</h2>
            <p>Aircraft Customization Expert</p>
            <p>Liam works with clients to design bespoke interiors and modifications that fit their needs and style.
            </p>
        </div>
        <div class="team-member">
            <img src="img/Staff/specialist2.jpg" alt="Sophia Kim" class="team-photo">
            <h2>Sophia Kim</h2>
            <p>International Sales Specialist</p>
            <p>Sophia navigates global markets and ensures a seamless experience for international buyers.</p>
        </div>
    </div>
</section>

<?php include 'footer/footer.html'; ?>

<script type="text/javascript" src="js/nav_footer.js"></script>
<script type="text/javascript" src="js/popup.js"></script>
</body>
<script>
    document.querySelectorAll('.team-member').forEach(member => {
        member.addEventListener('mouseenter', () => {
            member.querySelectorAll('.staff-text').forEach(text => {
                text.style.display = 'block';
                text.style.opacity = '1';
            });
        });

        member.addEventListener('mouseleave', () => {
            member.querySelectorAll('.staff-text').forEach(text => {
                text.style.display = 'none';
                text.style.opacity = '0';
            });
        });
    });
</script>

</html>