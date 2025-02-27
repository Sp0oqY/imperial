<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require './Db.php';

//Db::connect('sql.endora.cz:3313', 'imperial', 'imperialshoes', 'RLQ7Kroy2aYn1xDo');
Db::connect('localhost', 'imperial', 'root', '');

$category = Db::queryAll("SELECT id, category from category");
$colors = Db::queryAll("SELECT id, color from colors");
$brands = Db::queryAll("SELECT id, name from brand order by name");

$products = Db::queryAll("SELECT * FROM catalog");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once "./includes/head.php" ?>
</head>

<body>
  <?php require_once "./includes/header.php" ?>

  <div class="filter-container">

    <select name="category" onchange="this.form.submit()">
      <option default selected disabled>Kategória</option>
      <?php foreach ($category as $item) : ?>
        <option value="<?= $item['id'] ?>"><?= $item['category'] ?></option>
      <?php endforeach ?>
    </select>
    <!-- <div class="price-slider">
      <div class="price-inputs">
        <input type="text" id="min-price" value="15 €">
        <span>-</span>
        <input type="text" id="max-price" value="499 €">
      </div>
      <div class="slider-container">
        <input type="range" id="min-range" min="0" max="500" value="15">
        <input type="range" id="max-range" min="0" max="500" value="499">
      </div>
    </div> -->
    <select id="brand">
      <option default selected disabled>Značka</option>
      <?php foreach ($brands as $brand) : ?>
        <option value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>
      <?php endforeach ?>
    </select>
    <select id="color">
    <option default selected disabled>Farba</option>
      <option value="red">🔴 Červená</option>
      <option value="blue">🔵 Modrá</option>
      <option value="green">🟢 Zelená</option>
      <option value="yellow">🟡 Žltá</option>
      <option value="orange">🟠 Oranžová</option>
      <option value="purple">🟣 Fialová</option>
      <option value="white">⚪ Biela</option>
      <option value="black">⚫ Čierna</option>
      <option value="brown">🟤 Hnedá</option>
      <option value="pink">🌸 Ružová</option>
      <option value="gray">🔘 Sivá</option>
    </select>
    <select id="size">
    <option default selected disabled>Veľkosť</option>
      <option value="XS">XS</option>
      <option value="S">S</option>
      <option value="M">M</option>
      <option value="L">L</option>
      <option value="XL">XL</option>
      <option value="XXL">XXL</option>
    </select>
    <select id="filter">
    <option default selected disabled>Triedenie</option>
      <option value="vz">Najnižšia cena</option>
      <option value="z">Najvyššia cena</option>
    </select>


    <button class="btn" onclick="filterProducts()">Filter</button>
    <form action="/imperial/catalog.php" method="get" class="search-box">
      <button class="btn-search"><i class="fas fa-search"></i></button>
      <input type="search" class="input-search" name="search" placeholder="Type to Search...">
    </form>
  </div>

  <div class="products">
    <?php foreach ($products as $product) : ?>
      <div class="product" data-product="<?= $product['id'] ?>" method="POST">
        <img class="product-img" src="<?= $product['image'] ?>">
        <p class="product-title"><?= $product['name'] ?></p>
        <p class="product-title"><?= $product['cost'] ?> €</p>
      </div>
    <?php endforeach ?>
  </div>

  <?php require_once "./includes/footer.php" ?>

  <script src="./js/catalog.js"></script>

</body>

</html>