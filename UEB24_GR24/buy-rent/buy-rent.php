<?php
// ^ - start
// $ - end 
// [] - rules per nje karakter te vetem
// + - shto nje rule per te gjitha
// \s - lejo spaces
// \d - lejon te gjithe numrat
// . - allow all
// \. lejo piken
//{5} - rregullat e vendosura aplikoj tek 5 karakteret e rradhes
//

// $email_regex = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\.]{2,}+$/";
//

function validateFullName($name)
{
    $name = trim($name);
    //funksioni trim largon spaces ne input
    if (empty($name)) {
        return "Full name is required";
    }
    //empty() return true nese variabla nuk ekziston
    $eRegex = "/^[a-zA-ZëËçÇ\s]+$/";
    if (!preg_match($eRegex, $name)) {
        //preg_match shikon nese regex i dhene matches me stringun $name
        return "Full name is not valid.";
    }

    return true;
    //kthen true nese asnjeri nuk kushtet nuk plotesohet
}

function validateNumber($number)
{
    $number = trim($number);
    if (empty($number)) {
        return "Number is required";
    }
    $nRegex = "/^[0-9]{8,15}$/";
    //lejon 8 - 25 shifra
    if (!preg_match($nRegex, $number)) {
        return "Number should have 8 - 15 digits";
    }
    return true;
}

function validateEmail($email)
{
    $email = trim($email);
    if (empty($email)) {
        return "Email is required";
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        //filter_var() - filtron variablen me nje filter te specifikuar
        //FILTER_VALIDATE_EMAIL - filtron email
        return "Invalid e-mail adress";
    }

    return true;
}

function validateDate($date)
{
    if (strtotime($date) < time()) {
        //strtotime() - shnderron daten e shkruar ne formatin e dates ne unix system
        //time() - kthen kohen aktualue ne unix system
        return "Invalid date";
    }
    return true;
}

function validateArea($area)
{
    $area = trim($area);
    if (empty($area)) {
        return "This fiels should not be empty!";
    }

    $aRegex = "/^[a-zA-Z]$/";
    if (!preg_match($aRegex, $area)) {
        return "Invalid area";
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //$_SERVER["REQUEST_METHOD"] tregon metoden _GET OSE _POST
    //na po e kontrollojme nese metoda eshte _POST
    $fullName = $_POST['name'] ?? "";
    $number = $_POST['phone'] ?? "";
    $email = $_POST['email'] ?? "";
    $date = $_POST['date'] ?? "";
    $area = $_POST['area'] ?? "";
    //?? - tregon nese egziston
    //merr fjalen nga forma po nese nuk eshte dhene nuk kthen gabim po e kthen bosh
    $nameValidation = validateFullName($fullName);
    $numberValidation = validateNumber($number);
    $emailValidation = validateEmail($email);
    $dateValidation = validateDate($date);
    $areaValidation = validateArea($area);
    //funksionet per validim ja dergojme inputin qe e morrem nga useri
    if ($nameValidation === true) {
        $nameSuccessMessage = "Emri u pranua";
    } else {
        $nameError = $nameValidation;
    }

    if ($numberValidation === true) {
        $numberSuccessMessage = "Numri u pranua";
    } else {
        $numberError = $numberValidation;
    }

    if ($emailValidation === true) {
        $emailSuccessMessage = "Email u pranua";
    } else {
        $emailError = $emailValidation;
    }

    if ($dateValidation === true) {
        $dateSuccessMessage = "Email u pranua";
    } else {
        $dateError = $dateValidation;
    }

    if ($areaValidation === true) {
        $dateSuccessMessage = "Email u pranua";
    } else {
        $areaError = $areaValidation;
    }
}






?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="buy-rent.css">
</head>

<body>


    <div class="form-wrapper">
        <div class="form-box">
            <form action="buy-rent.php" method="post">
                <div class="form-field">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="name" id="name" placeholder="Full Name" class="form-input">
                </div>
                <?php if (!empty($nameError)): ?>
                    <!-- kontrollon nese ka mezash errori -->
                    <p class="errorMessage"><?php echo $nameError; ?></p>
                    <!-- nese ka e shfaq mrenda nje paragrafi -->
                <?php endif; ?>
                <div class="form-field">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" name="phone" id="phone" placeholder="Enter your phone number" class="form-input">
                </div>
                <?php if (!empty($numberError)): ?>
                    <!-- kontrollon nese ka mezash errori -->
                    <p class="errorMessage"><?php echo $numberError; ?></p>
                    <!-- nese ka e shfaq mrenda nje paragrafi -->
                <?php endif; ?>
                <div class="form-field">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" class="form-input">
                </div>
                <?php if (!empty($emailError)): ?>
                    <!-- kontrollon nese ka mezash errori -->
                    <p class="errorMessage"><?php echo $emailError; ?></p>
                    <!-- nese ka e shfaq mrenda nje paragrafi -->
                <?php endif; ?>
                <div class="form-field">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" name="date" id="date" class="form-input">
                </div>
                <?php if (!empty($dateError)): ?>
                    <!-- kontrollon nese ka mezash errori -->
                    <p class="errorMessage"><?php echo $dateError; ?></p>
                    <!-- nese ka e shfaq mrenda nje paragrafi -->
                <?php endif; ?>
                <div class="form-field">
                    <label class="form-label">Address Details</label>
                    <div class="address">
                        <input type="text" name="area" id="area" placeholder="Enter area" class="form-input">
                        <?php if (!empty($areaError)): ?>
                            <!-- kontrollon nese ka mezash errori -->
                            <p class="errorMessage"><?php echo $areaError; ?></p>
                            <!-- nese ka e shfaq mrenda nje paragrafi -->
                        <?php endif; ?>
                        <input type="text" name="city" id="city" placeholder="Enter city" class="form-input">
                        <input type="text" name="state" id="state" placeholder="Enter state" class="form-input">
                        <input type="text" name="post-code" id="post-code" placeholder="Post Code" class="form-input">
                    </div>
                </div>
                <div class="form-field" style="display: grid;grid-template-columns: 1fr 1fr;gap: 1rem;">
                    <label class="form-label" for="type">Plane Type:</label>
                    <label class="form-label" for="plane-name">Plane Name:</label>
                    <select class="form-input" id="type" name="type">
                        <option value="" disabled selected>Select a type</option>
                    </select>
                    <select class="form-input" id="plane-name" name="plane-name">
                        <option value="" disabled selected>Select a name</option>
                    </select>
                </div>
                <div>
                    <button class="form-btn">Book Appointment</button>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/buy-rent.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.addEventListener("keydown", function(event) {
                // Kontrollo ESC dhe sigurohu që fokusi të mos jetë në input/textarea
                if (
                    (event.key === "Escape" || event.keyCode === 27) &&
                    !["INPUT", "TEXTAREA", "SELECT"].includes(document.activeElement.tagName)
                ) {
                    console.log("ESC u shtyp - po kthehem mbrapa!");

                    if (window.history.length > 1) {
                        window.location.href = "/UEB25_GR27/UEB24_GR24/";
                    } else {
                        window.location.href = "/UEB25_GR27/UEB24_GR24/"; // Kthehu në faqen kryesore nëse nuk ka histor
                    }

                    event.preventDefault(); // Parandalon veprimet e parazgjedhura të ESC
                }
            });
        });
    </script>

</body>

</html>