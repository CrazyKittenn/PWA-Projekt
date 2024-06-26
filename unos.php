<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Vijesti o video igricama">
    <meta name="keywords" content="Video igrice, Vijesti">
    <meta name="author" content="Filip Gredelj">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Unos</title>
</head>
<?php
session_start();
$loginUspjeh = 0;
$kIme = "";
if (isset($_SESSION["login_uspjeh"])) {
    $loginUspjeh = $_SESSION["login_uspjeh"];
    $kIme = $_SESSION["kIme"];
}
?>

<body>
    <nav>
        <ul>
            <li>
                <a href="index.php">Game News</a>
            </li>
            <li><a href="index.php">Početna</a></li>
            <li><a href="#" id="nav_active">Unos</a></li>
            <li><a href="vijest.php">Vijesti</a></li>
            <li><a href="kategorija.php?k=popularno">Popularno</a></li>
            <li><a href="kategorija.php?k=retro">Retro</a></li>
            <li><a href="administracija.php">Administracija</a></li>
            <li><a href="registracija.php">Registracija</a></li>
            <?php
            if ($loginUspjeh == 1) {
                echo "<li><a href='korisnik.php'>$kIme</a></li>";
            } else {
                echo "<li><a href='login.php'>Login</a></li>";
            }
            ?>
        </ul>
    </nav>
    <div id="black_line"></div>
    <div id="grey_line"></div>
    <main class="forma">
        <form name="forma" action="skripta.php" method="post" enctype="multipart/form-data">
            <label for="naslov">Naslov</label><br>
            <input type="text" name="naslov" id="naslov"><br>
            <span id="naslovError"></span>
            <br>
            <label for="sadrzaj">Kratak Sadržaj</label><br>
            <textarea rows="8" cols="50" name="sadrzaj" id="sadrzaj"></textarea><br>
            <span id="sadrzajError"></span>
            <br>
            <label for="tekst">Sadržaj</label><br>
            <textarea rows="16" cols="50" name="tekst" id="tekst"></textarea><br>
            <span id="tekstError"></span>
            <br>
            <label for="kategorija">Kategorija</label><br>
            <select name="kategorija" id="kategorija" size="1">
                <option value="popularno">Popularno</option>
                <option value="retro">Retro</option>
            </select>
            <br><br>
            <label for="slika">Slika</label><br>
            <input type="file" name="slika" id="slika"><br>
            <span id="slikaError"></span>
            <br>
            <label for="arhiva">Spremi u arhiv</label>
            <input type="checkbox" name="arhiva" id="arhiva">
            <br><br>
            <input type="submit" id="submit" value="Pošalji">
        </form>
    </main>
</body>
<script src="js/provjera_unos.js"></script>
<footer class="bottom">
    <p>Filip Gredelj fgredelj@tvz.hr 2024</p>
</footer>

</html>