<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Vijesti o video igricama">
    <meta name="keywords" content="Video igrice, Vijesti">
    <meta name="author" content="Filip Gredelj">
    <link rel="stylesheet" href="css/style.css">
    <title>Početna</title>
</head>

<body>
    <nav>
        <ul>
            <li>
                <a href="#">Game News</a>
            </li>
            <li><a href="#" id="nav_active">Početna</a></li>
            <li><a href="unos.html">Unos</a></li>
            <li><a href="vijest.php">Vijesti</a></li>
            <li><a href="kategorija.php?k=popularno">Popularno</a></li>
            <li><a href="kategorija.php?k=retro">Retro</a></li>
            <li><a href="administracija.php">Administracija</a></li>
            <li><a href="registracija.php">Registracija</a></li>
        </ul>
    </nav>
    <div id="black_line"></div>
    <div id="grey_line"></div>
    <main class="pocetna">
        <h1>Popularno</h1>
        <hr>
        <section>
            <?php
            include 'connect.php';
            $query = "SELECT id, sazetak, slika FROM $tablename WHERE arhiva=1 AND kategorija='popularno' LIMIT 3";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_array($result)) {
                $id = $row["id"];
                $sazetak = $row["sazetak"];
                $slika = $row["slika"];
                echo "<article>";
                echo "<a href='vijest.php?id=$id'>";
                echo "<img src='Images/$slika' alt='$slika'>";
                echo "<p>$sazetak</p>";
                echo "</a>";
                echo "</article>";
            }
            ?>
        </section>
        <h1>Retro</h1>
        <hr>
        <section>
            <?php
            $query = "SELECT id, sazetak, slika FROM $tablename WHERE arhiva=1 AND kategorija='retro' LIMIT 3";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_array($result)) {
                $id = $row["id"];
                $sazetak = $row["sazetak"];
                $slika = $row["slika"];
                echo "<article>";
                echo "<a href='vijest.php?id=$id'>";
                echo "<img src='Images/$slika' alt='$slika'>";
                echo "<p>$sazetak</p>";
                echo "</a>";
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