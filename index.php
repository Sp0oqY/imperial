<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './Db.php';

Db::connect('sql.endora.cz:3313', 'rocnikovy', 'imperialshoes', 'RLQ7Kroy2aYn1xDo');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./includes/head.php" ?>
</head>

<body>
    <section>
        <?php require_once "./includes/header.php" ?>
        <div class="intro">
            <div class="introWrapper">
                <div class="introContent">
                    <h1>Dajte svojmu oblečeniu emóciu</h1>
                    <p>Oblečenie môže byť pre veľa z nás prostriedkom vyjadrenia svojich <br> myšlienok , ak to cítiš
                        tak aj ty my ti pomôžeme sa vyjadriť</p>
                    <a href="catalog.php" class="btn btn_2">Preskúmaj teraz &#10144;</a>
                </div>
                <div class="introImg">
                    <img src="img/logo_png.png" alt="">
                </div>
            </div>
        </div>
<h2 class="title">Novinky</h2>
        <div class="news">
            
            <div class="newsWrapper">
                <div class="newsContent">
                    <img src="img/tricko1.jpeg" alt="">
                    <h4>Levis Tričko</h4>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <p>50€</p>
                </div>
                <div class="newsContent">
                    <img src="img/tricko1.jpeg" alt="">
                    <h4>Levis Tričko</h4>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <p>50€</p>
                </div>
                <div class="newsContent">
                    <img src="img/tricko1.jpeg" alt="">
                    <h4>Levis Tričko</h4>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <p>50€</p>
                </div>
            </div>
        </div>
<h2 class="title">Top produkt</h2>
        <div class="best">
            <div class="bestWrapper">
                <div class="bestContent">
                    <img src="./img/mikina6.png" class="offer-img">
                </div>
                <div class="bestContent">
                    <p>Mikina, ktorá je fakt naložená</p>
                    <h1>Nike mikina</h1>
                    <p>Limitovaná edícia mikiny Nike <b>x</b> Michudaa</p>
                    <a class="btn btn_2" href="products.php">Kúp Teraz &#8594;</a>
                </div>
            </div>
        </div>

        <?php require_once "./includes/footer.php" ?>
    </section>
</body>

</html>