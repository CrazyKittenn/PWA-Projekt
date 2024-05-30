<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Vijesti o video igricama">
    <meta name="keywords" content="Video igrice, Vijesti">
    <meta name="author" content="Filip Gredelj">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/zajednici.css">
    <link rel="stylesheet" href="css/skripta.css">
    <title>Document</title>
</head>

<body>
    <nav>
        <ul>
            <li>
                <a href="index.html">MOPO</a>
            </li>
            <li><a href="index.html">Home</a></li>
            <li><a href="#" id="nav_active">Unos</a></li>
        </ul>
    </nav>
    <div id="black_line"></div>
    <div id="grey_line"></div>
    <div id="page-container">
        <div id="content-wrap">
            <main>
                <?php
                $naslov = "";
                $kratakS = "";
                $sadrzaj = "";
                $kategorija = "";
                $slikaPath = "";
                $slikaIme = "";
                $arhive = false;
                if (isset($_POST["naslov"])) {
                    $naslov = $_POST["naslov"];
                }
                if (isset($_POST["kratakS"])) {
                    $kratakS = $_POST["kratakS"];
                }
                if (isset($_POST["sadrzaj"])) {
                    $sadrzaj = $_POST["sadrzaj"];
                }
                if (isset($_POST["k"])) {
                    $kategorija = $_POST["k"];
                }
                if (isset($_FILES["slika"])) {
                    $slikaPath = base64_encode(file_get_contents($_FILES["slika"]["tmp_name"]));
                    $slikaIme = $_FILES["slika"]["name"];
                }
                if (isset($_POST["check"])) {
                    $arhive = $_POST["check"];
                }
                echo "<h1>$naslov</h1>";
                echo "<p>$kratakS</p>";
                echo "<p>$sadrzaj</p>";
                echo "<p>$kategorija</p>";
                echo "<img src='$slikaPath' alt='$slikaIme'>";
                echo "<p>$arhive</p>";
                ?>
            </main>
        </div>
        <footer id="footer">
            <p>Filip Gredelj fgredelj@tvz.hr 2024</p>
        </footer>
    </div>
</body>

</html>