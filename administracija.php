<!DOCTYPE html>
<html lang="hr">
<?php
include "connect.php";
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM $tablename WHERE id=$id ";
    $result = mysqli_query($connection, $query);
}
if (isset($_POST['update'])) {
    $picture = $_FILES['photo']['name'];
    $title = $_POST['title'];
    $about = $_POST['about'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    if (isset($_POST['archive'])) {
        $archive = 1;
    } else {
        $archive = 0;
    }
    $target_dir = 'Images/' . $picture;
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir);
    $id = $_POST['id'];
    $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content',
    slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
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
                <a href="#">Game News</a>
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
            <div>
                <label for='title'>Naslov vjesti:</label>
                <div>
                    <input type='text' name='title' value='$naslov'>
                </div>
            </div>
            <div class='form-item'>
                <label for='about'>Kratki sadržaj vijesti (do 50 znakova):</label>
                <div class='form-field'>
                    <textarea name='about' id='' cols='30' rows='10'>$sazetak</textarea>
                </div>
            </div>
            <div>
                <label for='content'>Sadržaj vijesti:</label>
                <div class='form-field'>
                    <textarea name='content' id='' cols='30' rows='10'>$tekst</textarea>
                </div>
            </div>
            <div>
                <label for='photo'>Slika:</label>
                <div>
                <input type='file' id='photo' value='$slika' name='photo'/> <br>
                <img src='Images/$slika' width=100px>
                </div>
                 </div>
                 <div>
                 <label for='category'>Kategorija vijesti:</label>
                 <div>
                 <select name='category' id='' value='$kategorija'>
                 <option value='popularno'>Popularno</option>
                 <option value='retro'>Retro</option>
                 </select>
                 </div>
                 </div>
                 <div>
                 <label>Spremiti u arhivu:
                 <div>";
            if ($arhiva == 0) {
                echo "<input type='checkbox' name='archive' id='archive'/> Arhiviraj?";
            } else {
                echo "<input type='checkbox' name='archive' id='archive' checked/> Arhiviraj?";
            }
            echo "</div>
                 </label>
                 </div>
                 </div>
                 <div>
                 <input type='hidden' name='id' value='$id'>
                 <button type='reset' value='Poništi'>Poništi</button>
                 <button type='submit' name='update' value='Prihvati'>Izmjeni</button>
                 <button type='submit' name='delete' value='Izbriši'>Izbriši</button>
                 </div>
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