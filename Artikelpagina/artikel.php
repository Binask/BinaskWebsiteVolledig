<?php

$servername = "localhost";
$username = "student";
$password = "student";
$dbname = "BinaskDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Artikeltitel en artikeltekst uit Artikelendatabase ophalen
$result = mysqli_query($conn, "SELECT ArtikelTitel, ArtikelTekst FROM Artikelen WHERE id=1 ");
if (!$result) {
    echo 'Could not run query: ' . mysqli_error();
    exit;
}
$row = mysqli_fetch_row($result);

$titel = $row[0]; // Artikeltitel
$tekst = $row[1]; // Artikeltekst

$conn = null;
?>

<!-- ?php
$result = mysql_query("SELECT id,email FROM people WHERE id = '42'");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysql_fetch_row($result);

echo $row[0]; // 42
echo $row[1]; // the email value
? -->

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Binask | Artikel</title>
    <link rel="stylesheet" href="./css/bootstrap_4-4-1.min.css" />
    <link rel="stylesheet" href="./css/fontawesome-free_5-13-0_all.min.css" />
    <link rel="stylesheet" href="./css/fontawesome_4-7-0.min.css" />
    <link rel="stylesheet" href="./css/custom.css" />
    <script src="./hamburger.js"></script>
</head>

<!-- Load an icon library to show a hamburger menu (bars) on small screens -->

<!-- Top Navigation Menu -->
<div class="topnav">
    <a id="brand" href="#home" class="active">BiNaSk</a>
    <!-- Navigation links (hidden by default) -->
    <div id="hamburgerItems">
        <a href="#item1">Item 1</a>
        <a href="#item2">Item 2</a>
        <a href="#item3">Item 3</a>
    </div>
    <!-- "Hamburgermenu script aanroepen -->
    <a href="javascript:void(0);" class="icon" onclick="expandHamburger()">
        <i class="fa fa-bars"></i>
    </a>
</div>

<!-- De zoekbalk -->
<div class="input col-md-12">
    <div id="zoekdiv" class="form-group">
        <form action="./search.php">
            <input type="text" placeholder="Zoeken..."><button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    <!-- Div met artikeltekst -->
    <div id="artikeldiv">
        <h3><?php echo $titel ?></h3>
        <p><?php echo $tekst ?></p>
    </div>

</div>

</html>
