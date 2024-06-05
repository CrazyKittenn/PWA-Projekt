<!DOCTYPE html>
<html lang="hr">

<?php
include "connect.php";
$uspjeh = 0;
if (isset($_POST["submit"])) {
    $uspjeh = 1;
    $kIme = $_POST["kIme"];
    $query = "SELECT korisnicko_ime FROM korisnik";
    $result = mysqli_query($connection, $query);
    while ($row =  mysqli_fetch_array($result)) {
        if (strtolower($row["korisnicko_ime"]) == strtolower($kIme)) {
            $uspjeh = 2;
        }
    }
    if ($uspjeh == 1) {
        $ime = $_POST["ime"];
        $prezime = $_POST["prezime"];
        $lozinka = $_POST["lozinka"];
        $razina = $_POST["razina"];
        $hash = password_hash($lozinka, CRYPT_BLOWFISH);
        $query = "INSERT INTO korisnik(ime, prezime, korisnicko_ime, lozinka, razina) VALUES(?,?,?,?,?)";
        $stmt = mysqli_stmt_init($connection);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, 'ssssi', $ime, $prezime, $kIme, $hash, $razina);
            mysqli_stmt_execute($stmt);
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Vijesti o video igricama">
    <meta name="keywords" content="Video igrice, Vijesti">
    <meta name="author" content="Filip Gredelj">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Registracija</title>
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
            <li><a href="#" id="nav_active">Registracija</a></li>
        </ul>
    </nav>
    <div id="black_line"></div>
    <div id="grey_line"></div>
    <main class="forma">
        <form name="forma" action="" method="post">
            <label for="ime">Ime</label><br>
            <input type="text" name="ime" id="ime"><br>
            <span id="imeError"></span>
            <br>
            <label for="prezime">Prezime</label><br>
            <input type="text" name="prezime" id="prezime"><br>
            <span id="prezimeError"></span>
            <br>
            <label for="kIme">Korisničko Ime</label><br>
            <input type="text" name="kIme" id="kIme"><br>
            <span id="kImeError"></span>
            <br>
            <label for="lozinka">Lozinka</label><br>
            <input type="password" name="lozinka" id="lozinka"><br>
            <span id="lozinkaError"></span>
            <br>
            <label for="lozinkaP">Ponovite lozinku</label><br>
            <input type="password" name="lozinkaP" id="lozinkaP"><br>
            <span id="lozinkaPError"></span>
            <br>
            <input type="hidden" name="razina" value="0">
            <br><br>
            <input type="submit" id="submit" name="submit" value="Registriraj">
        </form>
        <?php
        if ($uspjeh != 0) {
            echo "<div class='center'>";
            if ($uspjeh == 1) {
                echo "<p>Registracija je uspješna</p>";
            } else if ($uspjeh == 2) {
                echo "<p>Registracija nije uspjela, korisničko ime već postoji!</p>";
            }
            echo "</div>";
        }
        ?>
    </main>
</body>
<script src="js/provjera_reg.js"></script>
<footer class="bottom">
    <p>Filip Gredelj fgredelj@tvz.hr 2024</p>
</footer>

</html>