<!DOCTYPE html>
<html lang="hr">
<?php
include "connect.php";
session_start();
$naslov = $_POST["naslov"];
$sadrzaj = $_POST["sadrzaj"];
$tekst = $_POST["tekst"];
$kategorija = $_POST["kategorija"];
if (!is_dir("Images/")) {
    mkdir("Images/");
}
$slika = $_FILES["slika"]["name"];
$target_dir = "Images/$slika";
move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);
$arhiva = 0;
if (isset($_POST["arhiva"])) {
    $arhiva = 1;
}
$date = date('Y-m-d');
$query = "INSERT INTO $tablename (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) 
          VALUES ('$date', '$naslov','$sadrzaj', '$tekst', '$slika', '$kategorija', '$arhiva')";
$result = mysqli_query($connection, $query) or die('Error querying databese.');

$loginUspjeh = 0;
$kIme = "";
if (isset($_SESSION["login_uspjeh"])) {
    $loginUspjeh = $_SESSION["login_uspjeh"];
    $kIme = $_SESSION["kIme"];
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="description" content="Vijesti o video igricama">
    <meta name="keywords" content="Video igrice, Vijesti">
    <meta name="author" content="Filip Gredelj">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo "Pregled unosa - $naslov" ?></title>
</head>

<body class="unos">
    <nav>
        <ul>
            <li>
                <a href="index.php">Game News</a>
            </li>
            <li><a href="index.php">Početna</a></li>
            <li><a href="unos.php" id="nav_active">Unos</a></li>
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
    <main class="vijest">
        <article>
            <section>
                <h1><?php echo $naslov ?></h1>
                <hr>
                <p><?php echo $datum ?></p>
            </section>
            <div>
                <?php echo "<img src='Images/$slika' alt='$slika'>"; ?>
            </div>
            <section>
                <p><?php echo $sadrzaj ?></p>
            </section>
        </article>
        <hr>
    </main>
</body>
<footer id="footer">
    <p>Filip Gredelj fgredelj@tvz.hr 2024</p>
</footer>

</html>