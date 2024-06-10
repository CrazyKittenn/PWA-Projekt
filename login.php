<!DOCTYPE html>
<html lang="hr">
<?php
include "connect.php";
session_start();
$loginUspjeh = 0;
$ime = "";
$prezime = "";
$kIme = "";
$razina = 0;
if (isset($_SESSION["login_uspjeh"])) {
    $loginUspjeh = $_SESSION["login_uspjeh"];
    $ime = $_SESSION["ime"];
    $prezime = $_SESSION["prezime"];
    $kIme = $_SESSION["kIme"];
    $razina = $_SESSION["razina"];
}

if (isset($_POST["submit"])) {
    $kIme = $_POST["kIme"];
    $lozinka = $_POST["lozinka"];
    $hash = "";
    $query = "SELECT ime, prezime, korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($connection);
    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 's', $kIme);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
    mysqli_stmt_bind_result($stmt, $ime, $prezime, $kIme, $hash, $razina);
    mysqli_stmt_fetch($stmt);

    if (password_verify($lozinka, $hash)) {
        $loginUspjeh = 1;
        $_SESSION["login_uspjeh"] = $loginUspjeh;
        $_SESSION["ime"] = $ime;
        $_SESSION["prezime"] = $prezime;
        $_SESSION["kIme"] = $kIme;
        $_SESSION["razina"] = $razina;
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Vijesti o video igricama">
    <meta name="keywords" content="Video igrice, Vijesti">
    <meta name="author" content="Filip Gredelj">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
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
                echo "<li><a href='korisnik.php'>$kIme</a></li>";
            } else {
                echo "<li><a href='login.php' id='nav_active'>Login</a></li>";
            }
            ?>
        </ul>
    </nav>
    <div id="black_line"></div>
    <div id="grey_line"></div>
    <main class="forma">
        <?php
        if ($loginUspjeh == 0) {
            echo "<form name='forma' action='' method='post'>
            <label for='kIme'>Korisničko Ime</label><br>
            <input type='text' name='kIme' id='kIme'><br>
            <span id='kImeError'></span>
            <br>
            <label for='lozinka'>Lozinka</label><br>
            <input type='password' name='lozinka' id='lozinka'><br>
            <span id='lozinkaError'></span>
            <br><br>
            <input type='submit' id='submit' name='submit' value='Prijavi se'>
            </form>";
        } else {
            echo "<p class='center'>Prijavljeni kao $ime $prezime, $kIme</p>";
        }
        ?>
    </main>
</body>
<script src="js/provjera_login.js"></script>
<footer class="bottom">
    <p>Filip Gredelj fgredelj@tvz.hr 2024</p>
</footer>

</html>