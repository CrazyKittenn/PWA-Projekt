<!DOCTYPE html>
<html lang="hr">
<?php
include "connect.php";
if (isset($_POST["delete"])) {
    $id = $_POST["id"];
    $query = "DELETE FROM $tablename WHERE id=$id ";
    $result = mysqli_query($connection, $query);
}
if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $slika = $_FILES["photo"]["name"];
    $naslov = $_POST["naslov"];
    $sazetak = $_POST["sazetak"];
    $tekst = $_POST["tekst"];
    $kategorija = $_POST["kategorija"];
    $arhiva = 0;
    if (isset($_POST["arhiva"])) {
        $arhiva = 1;
    }
    if ($slika == "") {
        $slika = $_POST["slika"];
    }
    $target_dir = "Images/$slika";
    move_uploaded_file($_FILES["photo"]["tmp_name"], $slika);
    $query = "UPDATE vijesti SET naslov='$naslov', sazetak='$sazetak', tekst='$tekst',
    slika='$slika', kategorija='$kategorija', arhiva='$arhiva' WHERE id=$id ";
    $result = mysqli_query($connection, $query);
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Vijesti o video igricama">
    <meta name="keywords" content="Video igrice, Vijesti">
    <meta name="author" content="Filip Gredelj">
    <link rel="stylesheet" href="css/style.css">
    <title>Administracija</title>
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
            <li><a href="#" id="nav_active">Administracija</a></li>
        </ul>
    </nav>
    <div id="black_line"></div>
    <div id="grey_line"></div>
    <main>
        <?php
        include "connect.php";
        $query = "SELECT * FROM $tablename";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($result)) {
            $naslov = $row["naslov"];
            $sazetak = $row["sazetak"];
            $tekst = $row["tekst"];
            $slika = $row["slika"];
            $kategorija = $row["kategorija"];
            $arhiva = $row["arhiva"];
            $id = $row["id"];
            echo "<form enctype='multipart/form-data' action='' method='POST'>
            <label for='naslov'>Naslov vjesti:</label><br>
            <input type='text' name='naslov' id='naslov' value='$naslov'>
            <br>
            <label for='sazetak'>Kratki sadržaj vijesti (do 50 znakova):</label><br>
            <textarea name='sazetak' id='sazetak' cols='30' rows='10'>$sazetak</textarea>
            <br>
            <label for='tekst'>Sadržaj vijesti:</label><br>
            <textarea name='tekst' id='tekst' cols='30' rows='10'>$tekst</textarea>
            <br>
            <label for='photo'>Slika:</label><br>
            <input type='hidden' name='slika' id='slika' value='$slika'>
            <input type='file' id='photo' value='$slika' name='photo'/> <br>
            <img src='Images/$slika' width=100px>
            <br>
            <label for='kategorija'>Kategorija vijesti:</label><br>
            <select name='kategorija' id='kategorija' value='$kategorija'>";
            if ($kategorija == "popularno") {
                echo "<option value='popularno' selected>Popularno</option>";
                echo " <option value='retro'>Retro</option>";
            } else {
                echo "<option value='popularno'>Popularno</option>";
                echo " <option value='retro' selected>Retro</option>";
            }
            echo "</select>
            <br>
            <label>Spremiti u arhivu:<br>";
            if ($arhiva == 0) {
                echo "<input type='checkbox' name='arhiva' id='arhiva'/> Arhiviraj?";
            } else {
                echo "<input type='checkbox' name='arhiva' id='arhiva' checked/> Arhiviraj?";
            }
            echo "</label>
            <br>
            <input type='hidden' name='id' value='$id'>
            <button type='reset' value='Poništi'>Poništi</button>
            <button type='submit' name='update' value='Prihvati'>Izmjeni</button>
            <button type='submit' name='delete' value='Izbriši'>Izbriši</button>
            <hr>
            </form>";
        }
        ?>
    </main>
</body>
<footer>
    <p>Filip Gredelj fgredelj@tvz.hr 2024</p>
</footer>

</html>