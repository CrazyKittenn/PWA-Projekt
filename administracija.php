<!DOCTYPE html>
<html lang="hr">

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
            <li><a href="#">Početna</a></li>
            <li><a href="unos.html">Unos</a></li>
            <li><a href="clanak.php">Članci</a></li>
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
            echo '<form enctype="multipart/form-data" action="" method="POST">
            <div class="form-item">
                <label for="title">Naslov vjesti:</label>
                <div class="form-field">
                    <input type="text" name="title" class="form-field-textual" value="' . $row['naslov'] . '">
                </div>
            </div>
            <div class="form-item">
                <label for="about">Kratki sadržaj vijesti (do 50
                    znakova):</label>
                <div class="form-field">
                    <textarea name="about" id="" cols="30" rows="10" class="formfield-textual">' . $row['sazetak'] . '</textarea>
                </div>
            </div>
            <div class="form-item">
                <label for="content">Sadržaj vijesti:</label>
                <div class="form-field">
                    <textarea name="content" id="" cols="30" rows="10" class="formfield-textual">' . $row['tekst'] . '</textarea>
                </div>
            </div>
            <div class="form-item">
                <label for="pphoto">Slika:</label>
                <div class="form-field">
                <input type="file" class="input-text" id="pphoto"
                value="' . $row['slika'] . '" name="pphoto"/> <br><img src="Images/' . $row['slika'] . '" width=100px>
                // pokraj gumba za odabir slike pojavljuje se umanjeni prikaz postojeće slike
                 </div>
                 </div>
                 <div class="form-item">
                 <label for="category">Kategorija vijesti:</label>
                 <div class="form-field">
                 <select name="category" id="" class="form-field-textual"
                value="' . $row['kategorija'] . '">
                 <option value="sport">Sport</option>
                 <option value="kultura">Kultura</option>
                 </select>
                 </div>
                 </div>
                 <div class="form-item">
                 <label>Spremiti u arhivu:
                 <div class="form-field">';
            if ($row['arhiva'] == 0) {
                echo '<input type="checkbox" name="archive" id="archive"/>
                Arhiviraj?';
            } else {
                echo '<input type="checkbox" name="archive" id="archive"
                checked/> Arhiviraj?';
            }
            echo '</div>
                 </label>
                 </div>
                 </div>
                 <div class="form-item">
                 <input type="hidden" name="id" class="form-field-textual"
                value="' . $row['id'] . '">
                 <button type="reset" value="Poništi">Poništi</button>
                 <button type="submit" name="update" value="Prihvati">
                Izmjeni</button>
                 <button type="submit" name="delete" value="Izbriši">
                Izbriši</button>
                 </div>
                 </form>';
        }
        ?>
    </main>
</body>
<footer>
    <p>Filip Gredelj fgredelj@tvz.hr 2024</p>
</footer>

</html>