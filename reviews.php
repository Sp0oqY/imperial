<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './Db.php';

//Db::connect('sql.endora.cz:3313', 'rocnikovy', 'imperialshoes', 'RLQ7Kroy2aYn1xDo');

Db::connect('localhost', 'imperial', 'root', '');

$reviews = Db::queryAll("SELECT id, nickname, text from reviews");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./includes/head.php" ?>
</head>

<body>
<?php require_once "./includes/header.php" ?>
    <section class="review-form">
        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                    <?php foreach ($reviews as $review) : ?>
                        <div class="card swiper-slide">
                            <div class="image-content">
                                <span class="overlay"></span>

                                <div class="card-image">
                                    <img src="./img/logo_png.png" class="card-img">
                                </div>
                            </div>

                            <div class="card-content">
                                <h2 class="name"><?= $review['nickname'] ?></h2>
                                <p class="description"><?= $review['text'] ?></p>

                                <!-- <button class="button">View More</button> -->
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="swiper-button-next swiper-navBtn custom-next"></div>
            <div class="swiper-button-prev swiper-navBtn custom-prev"></div>
            <div class="swiper-pagination custom-pagination"></div>
        </div>

        <?php require_once "./includes/footer.php" ?>
    </section>
</body>
<script src="js/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

</html>