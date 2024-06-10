<!DOCTYPE html>
<html lang="hr">
<?php
include "connect.php";
session_start();
$loginUspjeh = 0;
$ime = "";
$prezime = "";
$kIme = "korisnik";
$razina = 0;

if (isset($_POST["submit"])) {
    session_unset();
    session_destroy();
}

if (isset($_SESSION["login_uspjeh"])) {
    $loginUspjeh = $_SESSION["login_uspjeh"];
    $ime = $_SESSION["ime"];
    $prezime = $_SESSION["prezime"];
    $kIme = $_SESSION["kIme"];
    $razina = $_SESSION["razina"];
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Vijesti o video igricama">
    <meta name="keywords" content="Video igrice, Vijesti">
    <meta name="author" content="Filip Gredelj">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo "$kIme" ?>
    </title>
</head>

<body>
    <nav>
        <ul>
            <li>
                <a href="index.php">Game News</a>
            </li>
            <li><a href="index.php">Početna</a></li>
            <li><a href="unos.html">Unos</a></li>
            <li><a href="vijest.php">Vijesti</a></li>
            <li><a href="kategorija.php?k=popularno">Popularno</a></li>
            <li><a href="kategorija.php?k=retro">Retro</a></li>
            <li><a href="administracija.php">Administracija</a></li>
            <li><a href="registracija.php">Registracija</a></li>
            <?php
            if ($loginUspjeh == 1) {
                echo "<li><a href='#' id='nav_active'>$kIme</a></li>";
            } else {
                echo "<li><a href='login.php'>Login</a></li>";
            }
            ?>
        </ul>
    </nav>
    <div id="black_line"></div>
    <div id="grey_line"></div>
    <main class="forma">
        <?php
        if ($loginUspjeh == 0) {
            $footerClass = "bottom";
            echo "<p class='center'>Niste prijavljeni</p>";
            echo "<div class='center'>";
            echo "<a href='login.php'>Link na login</a>";
            echo "</div>";
        } else {
            echo "
                <div class='center'>
                <p>Ime: $ime</p>
                <p>Prezime: $prezime</p>  
                <p>Korisnicko ime: $kIme</p>      
                ";
            if ($razina == 1) {
                echo "<p>Razina: administrator</p>";
            } else {
                echo "<p>Razina: ostalo</p>";
            }
            echo "</div>";
            echo "<form name='forma' action='' method='post'>
            <input type='submit' id='submit' name='submit' value='Odjava'>
            </form>";
        }
        ?>
    </main>
</body>
<script src="js/provjera_login.js"></script>
<footer class="bottom">
    <p>Filip Gredelj fgredelj@tvz.hr 2024</p>
</footer>

</html>