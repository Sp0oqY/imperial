<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require './Db.php';

//Db::connect('sql.endora.cz:3313', 'imperial', 'imperialshoes', 'RLQ7Kroy2aYn1xDo');
Db::connect('localhost', 'imperial', 'root', '');
// $genres = Db::queryAll("SELECT * FROM `genres`;");

// if (isset($_GET['search']) || isset($_GET['category']) || isset($_GET['genre']) || isset($_GET['all'])) {
//   switch ($_GET) {
//     case !empty($_GET['search']):
//       $search = $_GET['search'];
//       $movies = Db::queryAll("SELECT movies.id,movies.name,movies.description,movies.image,GROUP_CONCAT(genres.name SEPARATOR ' / ') AS allGenres FROM `movies` LEFT JOIN `movie_genres` ON movies.id = movie_genres.movie_id LEFT JOIN `genres` ON movie_genres.genres_skr = genres.skr WHERE movies.name LIKE '%${search}%' GROUP BY movies.name  ORDER BY RAND();");
//       break;
//     case !empty($_GET['category']):
//       $category = $_GET['category'];
//       $movies = Db::queryAll("SELECT movies.id,movies.name,movies.description,movies.image,GROUP_CONCAT(genres.name SEPARATOR ' / ') AS allGenres FROM `movies` LEFT JOIN `movie_genres` ON movies.id = movie_genres.movie_id LEFT JOIN `genres` ON movie_genres.genres_skr = genres.skr WHERE `type` = '${category}'  GROUP BY movies.name ORDER BY RAND();");
//       break;
//     case !empty($_GET['genre']):
//       $genre = $_GET['genre'];
//       $movies = Db::queryAll("SELECT movies.id,movies.name,movies.description,movies.image,GROUP_CONCAT(genres.name SEPARATOR ' / ') AS allGenres FROM `movies` LEFT JOIN `movie_genres` ON movies.id = movie_genres.movie_id LEFT JOIN `genres` ON movie_genres.genres_skr = genres.skr WHERE movie_genres.genres_skr = '${genre}' GROUP BY movies.name ORDER BY RAND();");
//       break;
//     case isset($_GET['all']):
//       $movies = Db::queryAll("SELECT movies.id,movies.name,movies.description,movies.image,GROUP_CONCAT(genres.name SEPARATOR ' / ') AS allGenres FROM `movies` LEFT JOIN `movie_genres` ON movies.id = movie_genres.movie_id LEFT JOIN `genres` ON movie_genres.genres_skr = genres.skr GROUP BY movies.name ORDER BY RAND();");
//       break;
//   }
// } else {
//   $movies = Db::queryAll("SELECT movies.id,movies.name,movies.description,movies.image,GROUP_CONCAT(genres.name SEPARATOR ' / ') AS allGenres FROM `movies`LEFT JOIN `movie_genres` ON movies.id = movie_genres.movie_id LEFT JOIN `genres` ON movie_genres.genres_skr = genres.skr GROUP BY movies.name ORDER BY RAND() LIMIT 30;");
// }

$products = Db::queryAll("SELECT id, name, image, cost from catalog");

$count = Db::query("SELECT * FROM `catalog`");
if ($count % 12 == 0) {
    $count = $count / 12;
} else {
    $count = ($count / 12) + 1;
}

if (isset($_GET['category']) || isset($_GET['color'])) {
  switch ($_GET) {
      case !empty($_GET['category']):
          $category = $_GET['category'];
          $products = Db::queryAll("SELECT products.id, products.name, image, cost, description, category.category, color from products left join category on category.id = products.category_id left join colors on colors.id = products.color_id WHERE `category_id` = '${category}'");
          break;

      case !empty($_GET['color']):
          $color = $_GET['color'];
          $products = Db::queryAll("SELECT products.id, products.name, image, cost, description, category.category, color from products left join category on category.id = products.category_id left join colors on colors.id = products.color_id WHERE `color_id` = '${color}'");
          break;
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

  <!-- <div class="row">
    <div class="col-12">
      <section class="filter">
        <a href="/rocnikovy/list?category=s">Series</a>
        <a href="/rocnikovy/list?category=m">Movies</a>
        <form action="/rocnikovy/list" method="get" class="search-box">
          <button class="btn-search"><i class="fas fa-search"></i></button>
          <input type="search" class="input-search" name="search" placeholder="Type to Search...">
        </form>

        <form action="/rocnikovy/list">
          <select name="genre" id="genre" onchange="this.form.submit()">
            <option default selected disabled>Genres</option>
            <?php foreach ($genres as $item) : ?>
              <option <?= (!empty($genre) && $item['skr'] == $genre) ? 'selected' : '' ?> value="<?= $item['skr'] ?>"><?= $item['name'] ?></option>
            <?php endforeach ?>
          </select>
        </form>

        <a href="/list?all">All</a>

      </section>
    </div>
  </div> -->

  <section>
    
  <div class="small-container">
        <h2>Produkty</h2>
        <div class="row row-2">
            <select>
                <option>Všetky produkty</option>
                <option>Najvyššia cena</option>
                <option>Najnižšia cena</option>
                <option>Kategória</option>
                <option>Farba</option>
            </select>

            <form action="">
                <select name="category" onchange="this.form.submit()">
                    <option default selected disabled>Category</option>
                    <?php foreach ($category as $item) : ?>
                        <option value="<?= $item['id'] ?>"><?= $item['category'] ?></option>
                    <?php endforeach ?>
                </select>
            </form>

            <form action="">
                <select name="color" onchange="this.form.submit()">
                    <option default selected disabled>Colors</option>
                    <?php foreach ($color as $item) : ?>
                        <option value="<?= $item['id'] ?>"><?= $item['color'] ?></option>
                    <?php endforeach ?>
                </select>
            </form>
        </div>

        <div class="row">
            <div class="products">
                <?php foreach ($products as $product) : ?>
                    <div class="product" data-product="<?= $product['id'] ?>" method="POST">
                        <img class="product-img" src="<?= $product['image'] ?>">
                        <p class="product-title"><?= $product['name'] ?></p>
                        <p class="product-title"><?= $product['cost'] ?> €</p>
                    </div>
                <?php endforeach ?>
            </div>
        </div>



        <!-- <div class="page-btn">
            <?php for ($i = 1; $i <= $count; $i++) : ?>
                <a href="/imperial/catalog.php?page=<?= $i ?>"><span><?= $i ?></span></a>
            <?php endfor; ?>
        </div> -->

    </div>

  </section>



  <?php require_once "./includes/footer.php" ?>

  <script src="./js/list.js?ver=<?= time() ?>"></script>

</body>

</html>