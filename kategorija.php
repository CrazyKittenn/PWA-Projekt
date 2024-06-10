<!DOCTYPE html>
<html lang="hr">
<?php
include "connect.php";
session_start();
$k = "popularno";
$naslov = "Popularno";
$id = 1;
$ids = [];
$count = 0;
if (isset($_GET["k"])) {
    $k = $_GET["k"];
}
$query = "SELECT id FROM $tablename WHERE arhiva = 0 AND kategorija='$k' ORDER BY id ASC";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_array($result)) {
    $ids[$count] = $row["id"];
    $count++;
}
if ($k == "retro") {
    $naslov = "Retro";
}
if ($count > 0) {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    } else {
        $id = $ids[0];
    }
}


$loginUspjeh = 0;
$kIme = "";
if (isset($_SESSION["login_uspjeh"])) {
    $loginUspjeh = $_SESSION["login_uspjeh"];
    $kIme = $_SESSION["kIme"];
}

$naslov = "";
$datum = "";
$slika = "";
$sadrzaj = "";
$query = "SELECT naslov, datum, slika, tekst FROM $tablename WHERE id = $id";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_array($result)) {
    $naslov = $row["naslov"];
    $datum = date("j.m.y", strtotime($row["datum"]));
    $slika = $row["slika"];
    $sadrzaj = $row["tekst"];
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

<body class="red">
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
    <div class="center">
        <div class="pagination">
            <?php
            if ($count > 0) {
                $position = array_search($id, $ids);
                if ($id == $ids[0]) {
                    echo "<a href='#' class='disabled' tabindex='-1'>&laquo;</a>";
                } else {
                    $prevoiusId = $ids[$position - 1];
                    echo "<a href='vijest.php?id=$prevoiusId'>&laquo;</a>";
                }
                $startIndex = 0;
                $endIndex = $count;
                if ($count > 5) {
                    if ($position > 2) {
                        $startIndex = $position - 2;
                        $endIndex = $position + 3;
                    } else {
                        $endIndex = 5;
                    }
                    if ($position > $count - 4) {
                        $startIndex = $count - 5;
                        $endIndex = $count;
                    }
                }
                for ($i = $startIndex; $i < $endIndex; $i++) {
                    $displayIndex = $i + 1;
                    if ($i == $position) {
                        echo "<a class='active' href='#'>$displayIndex</a>";
                    } else {
                        $linkId = $ids[$startIndex + $i];
                        echo "<a href='vijest.php?id=$linkId'>$displayIndex</a>";
                    }
                }
                if ($id == $ids[$count - 1]) {
                    echo "<a href='#' class='disabled' tabindex='-1'>&raquo;</a>";
                } else {
                    $nextId = $ids[$position + 1];
                    echo "<a href='vijest.php?id=$nextId'>&raquo;</a>";
                }
            }
            ?>
        </div>
    </div>
</body>
<footer class="bottom">
    <p>Filip Gredelj fgredelj@tvz.hr 2024</p>
</footer>

</html>