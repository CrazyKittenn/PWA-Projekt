<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Vijesti o video igricama">
    <meta name="keywords" content="Video igrice, Vijesti">
    <meta name="author" content="Filip Gredelj">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Pregled unosa</title>
</head>

<body class="unos">
    <nav>
        <ul>
            <li>
                <a href="index.html">Game News</a>
            </li>
            <li><a href="index.html">Home</a></li>
            <li><a href="#" id="nav_active">Unos</a></li>
        </ul>
    </nav>
    <div id="black_line"></div>
    <div id="grey_line"></div>
    <div id="page-container">
        <div id="content-wrap">
            <main class="clanak">
                <?php
                $naslov = $_POST["naslov"];
                $kratakS = $_POST["kratakS"];
                $sadrzaj = $_POST["sadrzaj"];
                $kategorija = $_POST["k"];
                $slika = $_FILES["slika"]["name"];
                $target_dir = "Images/$slika";
                move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);
                $arhive = 0;
                if (isset($_POST["check"])) {
                    $arhive = 1;
                }
                ?>
                <article>
                    <section>
                        <h1><?php echo $naslov; ?></h1>
                        <hr>
                        <p>Autor</p>
                        <hr>
                        <p>Datum</p>
                        <hr>
                        <p><?php echo $kategorija; ?></p>
                    </section>
                    <?php echo "<img src='Images/$slika' alt='$slika'>"; ?>
                    <section>
                        <p><?php echo $sadrzaj; ?></p>
                    </section>
                </article>
                <hr>
            </main>
        </div>
        <footer id="footer">
            <p>Filip Gredelj fgredelj@tvz.hr 2024</p>
        </footer>
    </div>
</body>

</html>