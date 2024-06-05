<!DOCTYPE html>
<html lang="hr">
<?php
include "connect.php";
$id = 1;
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    $query = "SELECT id FROM $tablename ORDER BY id ASC LIMIT 1";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {
        $id = $row["id"];
    }
}
$naslov = "";
$datum = "";
$slika = "";
$sadrzaj = "";
$query = "SELECT naslov, datum, slika, tekst FROM $tablename WHERE id = $id";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_array($result)) {
    $naslov = $row["naslov"];
    $datum = $row["datum"];
    $slika = $row["slika"];
    $sadrzaj = $row["tekst"];
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Vijesti o video igricama">
    <meta name="keywords" content="Video igrice, Vijesti">
    <meta name="author" content="Filip Gredelj">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo "Vijest - $naslov" ?></title>
</head>

<body>
    <nav>
        <ul>
            <li>
                <a href="index.php">Game News</a>
            </li>
            <li><a href="index.php">Početna</a></li>
            <li><a href="unos.html">Unos</a></li>
            <li><a href="vijest.php" id="nav_active">Vijesti</a></li>
            <li><a href="kategorija.php?k=popularno">Popularno</a></li>
            <li><a href="kategorija.php?k=retro">Retro</a></li>
            <li><a href="administracija.php">Administracija</a></li>
        </ul>
    </nav>
    <div id="black_line"></div>
    <div id="grey_line"></div>
    <main>
        <article>
            <section>
                <h1><?php echo $naslov ?></h1>
                <hr>
                <p><?php echo $datum ?></p>
            </section>
            <?php echo "<img src='Images/$slika' alt='$slika' width='60%'>"; ?>
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