<!DOCTYPE html>
<html lang="hr">
<?php
$k = "popularno";
$naslov = "Popularno";
if (isset($_GET["k"])) {
    $k = $_GET["k"];
}
if ($k == "retro") {
    $naslov = "Retro";
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Vijesti o video igricama">
    <meta name="keywords" content="Video igrice, Vijesti">
    <meta name="author" content="Filip Gredelj">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $naslov ?></title>
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
            <?php
            if ($k == "popularno") {
                echo "<li><a href='kategorija.php?k=popularno' id='nav_active'>Popularno</a></li>";
                echo "<li><a href='kategorija.php?k=retro'>Retro</a></li>";
            } else {
                echo "<li><a href='kategorija.php?k=popularno'>Popularno</a></li>";
                echo "<li><a href='kategorija.php?k=retro' id='nav_active'>Retro</a></li>";
            }
            ?>
            <li><a href="administracija.php">Administracija</a></li>
        </ul>
    </nav>
    <div id="black_line"></div>
    <div id="grey_line"></div>
    <main class="pocetna">
        <h1><?php echo $naslov ?></h1>
        <hr>
        <section>
            <?php
            include 'connect.php';
            $query = "SELECT id, sazetak, slika FROM $tablename WHERE arhiva=0 AND kategorija='$k'";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_array($result)) {
                $id = $row["id"];
                $sazetak = $row["sazetak"];
                $slika = $row["slika"];
                echo "<article>";
                echo "<img src='Images/$slika' alt='$slika'>";
                echo "<p>$sazetak</p>";
                echo "</article>";
            }
            ?>
        </section>
    </main>
</body>
<footer>
    <p>Filip Gredelj fgredelj@tvz.hr 2024</p>
</footer>

</html>