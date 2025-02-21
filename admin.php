<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); // vypísanie chyb

require './Db.php';

Db::connect('localhost', 'imperial', 'root', '');

if (isset($_POST['sendPRODUCTS'])) {

    $name = $_POST['name'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $color_id = $_POST['color_id'];

    if (!empty($name) || !empty($image) || !empty($price) || !empty($description) || !empty($category_id) || !empty($color_id)) {
        Db::query("INSERT INTO `products` (name, image, cost , description , category_id, color_id) VALUES ('$name', '$image', '$price', '$description', '$category_id', '$color_id')");
    } else {
        echo "All fields must be field out";
        die();
    }
}

if (isset($_POST['sendNEWS'])) {

    $name = $_POST['name'];
    $image = $_POST['image'];
    $price = $_POST['price'];

    if (!empty($name) || !empty($image) || !empty($price)) {
        Db::query("INSERT INTO `products` (name, image, cost) VALUES ('$name', '$image', '$price')");
    } else {
        echo "All fields must be field out";
        die();
    }
}

if (isset($_POST['sendFAQ'])) {

    $question = $_POST['question'];
    $answer = $_POST['answer'];

    if (!empty($question) || !empty($answer)) {
        Db::query("INSERT INTO `faq` (questions, answers) VALUES ('$question', '$answer')");
    } else {
        echo "All fields must be field out";
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./includes/head.php" ?>
</head>

<body>
    <?php require_once "./includes/header.php" ?>

    <div class="slide-container swiper">
        <div class="slide-content">
            <div class="swiper-wrapper">
                <div class="adminForm swiper-slide">
                    <form class="admin-form" action="./admin.php" method="POST">
                        <div class="admin">
                            <div class="title">
                                <h1>Products form</h1>
                            </div>

                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Zadaj názov produktu" required>

                            <label for="image">Image</label>
                            <input type="text" name="image" id="image" placeholder="Zadaj obrázok produktu" required>

                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" placeholder="Zadaj cenu produktu" required>

                            <label for="description">Description</label>
                            <input type="text" name="description" id="description" placeholder="Zadaj popis produktu" required>

                            <label for="category">Category</label>
                            <select id="category" name="category_id" required>
                                <option value="" selected disabled>Zadaj kategóriu produktu</option>
                                <option value="1">Mikiny</option>
                                <option value="2">Tričká</option>
                                <option value="3">Nohavice</option>
                                <option value="4">Čiapky</option>
                                <option value="5">Ponožky</option>
                            </select>

                            <label for="color">Color</label>
                            <select id="color" name="color_id" required>
                                <option value="" selected disabled>Zadaj farbu produktu</option>
                                <option value="1">Zelená</option>
                                <option value="2">Modrá</option>
                                <option value="3">Čierna</option>
                                <option value="4">Biela</option>
                                <option value="5">Červená</option>
                                <option value="6">Žltá</option>
                                <option value="7">Oranžová</option>
                                <option value="8">Fialová</option>
                                <option value="9">Hnedá</option>
                                <option value="10">Sivá</option>
                            </select>

                            <button id="btn" type="submit" name="sendPRODUCTS">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
    </div>



    <?php require_once "./includes/footer.php" ?>
</body>
<!-- Toggle menu -->
<script src="./js/toggleMenu.js"></script>
<!-- Swiper -->
<script src=" https://cdn.jsdelivr.net/npm/swiper@9.0.1/swiper-bundle.min.js "></script>
<script src="./js/sliderAdmin.js"></script>

</html>