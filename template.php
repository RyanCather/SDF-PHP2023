<?php session_start(); ?>

    <!doctype html>
    <html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<nav class="navbar navbar-expand-sm bg-info">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>

                <?php
                if (isset($_SESSION["FirstName"])) {
                    echo '<li class="nav-item" ><a class="nav-link" href = "orderForm.php"> Order Form </a ></li >';
                    echo '<li class="nav-item" ><a class="nav-link" href = "invoiceList.php"> Invoice list</a ></li >';
                } else {
                    echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>';
                }
                ?>
            </ul>
        </div>
        <?php
        if (isset($_SESSION["FirstName"])) {
            echo '<div class="bg-light">Welcome, ' . $_SESSION["FirstName"] . '!<a class="nav-link" href="logout.php">Logout</a></div>';
        }
        ?>
    </div>
</nav>

<?php


$conn = new SQLite3("db") or die("Unable to open database");


$productNames = array("product1" => "Darth Vader Helmet", "product2" => "Grogu Plush", "product3" => "ROTJ Jigsaw", "product4" => "Aftermath", "product5" => "Alphabet Squadron");
$productPrices = array("product1" => 299.0, "product2" => 32.95, "product3" => 219.95, "product4" => 24.95, "product5" => 25.95);
function footer(): string
{
    date_default_timezone_set('Australia/Canberra');
    $filename = basename($_SERVER["SCRIPT_FILENAME"]);
    $footer = "This page was last modified: " . date("F d Y H:i:s.", filemtime($filename));
    return $footer;
}

function sanitiseData($unsanitisedData): string
{
    $unsanitisedData = trim($unsanitisedData);
    $unsanitisedData = stripslashes($unsanitisedData);
    $sanitisedData = htmlspecialchars($unsanitisedData);
    return $sanitisedData;
}