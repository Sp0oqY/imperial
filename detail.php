<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require './Db.php';
require './app/controllers/DataController.php';

Db::connect('sql.endora.cz:3313', 'rocnikovy', 'imperialshoes', 'RLQ7Kroy2aYn1xDo');
if (isset($_GET['movie'])) {
  $movieid = $_GET['movie'];
  $movie = Db::queryOne("SELECT movies.id,movies.name,movies.description,movies.image,GROUP_CONCAT(genres.name SEPARATOR ' / ') AS allGenres FROM `movies` LEFT JOIN `movie_genres` ON movies.id = movie_genres.movie_id LEFT JOIN `genres` ON movie_genres.genres_skr = genres.skr WHERE movies.id = ${movieid} GROUP BY movies.name;");
  $comments = Db::queryAll("SELECT users.username, comments.id, comments.users_id, comments.movies_id, comments.comment, comments.rating FROM comments INNER JOIN users ON comments.users_id = users.id WHERE movies_id = '${movieid}';");
  if (!$movie) {
    header("Location: /rocnikovy/index");
  }
} else {
  header("Location: /rocnikovy/index");
}

if (isset($_SESSION['id'])) {
  $userid = $_SESSION['id'];
  $watchlist = Db::queryOne("SELECT * FROM `watchlist` WHERE `users_id`='${userid}' AND movies_id = ${movieid};");
}

if (isset($_POST['watchlist'])) {
  if (!isset($_SESSION['id'])) {
  }
  $userid = $_SESSION['id'];
  $watchlisted = Db::queryOne("SELECT * FROM `watchlist` WHERE `users_id` = '${userid}' AND `movies_id` = '${movieid}'");
  if (!$watchlisted) {
    Db::query('INSERT INTO `watchlist` (users_id, movies_id, category) VALUES (?, ?, ?)', $userid, $movieid, 'planned');
    header("Location: /rocnikovy/detail?movie=$movieid");
  }
}

if (isset($_POST['save'])) {
  if (!isset($_SESSION['id'])) {
  }
  $category = $_POST['category'];
  $rating = $_POST['rating'];
  Db::query("UPDATE `watchlist` SET `category`='${category}',`rating`='${rating}' WHERE `movies_id`='${movieid}'");
  header("Location: /rocnikovy/detail?movie=$movieid");
}
if (isset($_POST['delete'])) {
  if (!isset($_SESSION['id'])) {
  }
  Db::query("DELETE FROM `watchlist` WHERE `users_id`='${userid}' AND `movies_id` = '${movieid}';");
  header("Location: /rocnikovy/detail?movie=$movieid");
}
if (isset($_POST['commentadd'])) {
  if (!isset($_SESSION['id'])) {
  }
  $comment = $_POST['comment'];
  $rating = $_POST['rating'];
  Db::query('INSERT INTO `comments` (movies_id, users_id, comment, rating) VALUES (?, ?, ?, ?)', $movieid, $userid, $comment, $rating);
  header("Location: /rocnikovy/detail?movie=$movieid");
}
if (isset($_POST['commentedit'])) {
  if (!isset($_SESSION['id'])) {
  }
  $comment_id = $_POST['comment_id'];
  $comment = $_POST['comment'];
  $rating = $_POST['rating'];
  Db::query("UPDATE `comments` SET `comment`='${comment}',`rating`='${rating}' WHERE `users_id`='${userid}' AND `movies_id` = '${movieid}' AND id = '${comment_id}';");
  header("Location: /rocnikovy/detail?movie=$movieid");
}
if (isset($_POST['commentremove'])) {
  if (!isset($_SESSION['id'])) {
  }
  $comment_id = $_POST['comment_id'];
  Db::queryOne("DELETE FROM `comments` WHERE `users_id`='${userid}' AND `movies_id` = '${movieid}' AND id = '${comment_id}';");
  header("Location: /rocnikovy/detail?movie=$movieid");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once "./assets/includes/head.php" ?>
  <link href="./assets/css/star-rating.css" rel="stylesheet" />

</head>

<body>
  <section id="pic">
    <?php require_once "./assets/includes/header.php" ?>
    <div class="row">
      <div class="col-6 xd">
        <section class="container">
          <h2><?= $movie['name'] ?></h2>
          <p><strong>Genres: </strong> <?= $movie['allGenres'] ?></p>
          <img src="<?= $movie['image'] ?>" alt="">
          <h4>CONTENT:</h4>
          <p class="modal-description"><?= $movie['description'] ?></p>
          <?php
          $id = $movie['id'];
          if (isset($_SESSION['id'])) : ?>
            <?php if (!empty($watchlist)) : ?>
              <form action="/rocnikovy/detail?movie=<?= $movie['id'] ?>" method="post">
                <select name="rating" id='addBtn'>
                  <?php for ($i = 1; $i <= 10; $i++) : ?>
                    <option <?= $watchlist['rating'] == $i ? 'selected' : '' ?> value="<?= $i ?>"><?= $i ?></option>
                  <?php endfor; ?>
                </select>
                <select id='addBtn' name="category">
                  <option <?= $watchlist['category'] == 'watching' ? 'selected' : '' ?> value="watching">Watching</option>
                  <option <?= $watchlist['category'] == 'completed' ? 'selected' : '' ?> value="completed">Completed</option>
                  <option <?= $watchlist['category'] == 'dropped' ? 'selected' : '' ?> value="dropped">Dropped</option>
                  <option <?= $watchlist['category'] == 'planned' ? 'selected' : '' ?> value="planned">Plan to watch</option>
                </select>
                <button type="submit" id='addBtn' name="save">Save Changes</button>
                <button type="submit" id='addBtn' name="delete">Delete from your LIST</button>
              </form>
            <?php else : ?>
              <form action="/rocnikovy/detail?movie=<?= $movie['id'] ?>" method="post">
                <button type='submit' name='watchlist' id='addBtn'>ADD TO YOUR LIST</button>
              </form>
            <?php endif ?>
          <?php else : ?>
            <a href="/rocnikovy/login" id="addBtn">Please LOG IN before adding to your list </a>
          <?php endif ?>
        </section>
      </div>

      <div class="col-6 detail">
        <?php if (isset($_SESSION['id'])) : ?>
          <form class="com" action="/rocnikovy/detail?movie=<?= $movie['id'] ?>" method="post">
            <h2>Write a comment</h2>
            <section class="comCenter">
              <div class="ele">
              <textarea name="comment" id="comment" required cols="30" rows="10"></textarea>
              </div>
              <div class="rating">
                <p>Select rating : </p>
                <select name="rating" required class="star-rating">
                  <option value="5"></option>
                  <option value="4"></option>
                  <option value="3"></option>
                  <option value="2"></option>
                  <option value="1"></option>
                </select>
                <button type="submit" name="commentadd">Add comment</button>
              </div>
            </section>
          </form>
        <?php endif; ?>

        <?php foreach ($comments as $comment) :  ?>
          <section>
            
            <?php if (isset($_SESSION['id']) && $_SESSION['id'] == $comment['users_id']) : ?>
              <form action="/rocnikovy/detail?movie=<?= $movie['id'] ?>" method="post">
                <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                <h5>From: <?= ucfirst($comment['username']) ?></h5>
                <div class="ele">
                <textarea name="comment" id="comment" cols="30" required rows="10"><?= $comment['comment'] ?></textarea>
                </div>
                <div class="ele">
                  <p>Rating: </p>
                <select name="rating" required class="star-rating">
                  <option <?= $comment['rating'] == 5 ? 'selected' : '' ?> value="5"></option>
                  <option <?= $comment['rating'] == 4 ? 'selected' : '' ?> value="4"></option>
                  <option <?= $comment['rating'] == 3 ? 'selected' : '' ?> value="3"></option>
                  <option <?= $comment['rating'] == 2 ? 'selected' : '' ?> value="2"></option>
                  <option <?= $comment['rating'] == 1 ? 'selected' : '' ?> value="1"></option>
                </select>
                <button type="submit" name="commentedit">Save changes</button>
                <button type="submit" name="commentremove">Delete comment</button>
                </div>
              </form>
            <?php else : ?>
              <p><?= $comment['comment'] ?></p>
              <div class="rating d-flex flex-direction-row">
                <?php for ($i = 1; $i <= $comment['rating']; $i++) : ?>
                  <img src="./assets/images/star/star-full.svg" width="32px" height="32px" alt="">
                <?php endfor ?>
                <?php for ($i = 1; $i <= (5 - $comment['rating']); $i++) : ?>
                  <img src="./assets/images/star/star-empty.svg" width="32px" height="32px" alt="">
                <?php endfor ?>
              </div>
          </section>
        <?php endif ?>
      <?php endforeach ?>
      </div>
    </div>
    <?php require_once "./assets/includes/footer.php" ?>
    <script src="./assets/js/star-rating.js"></script>
    <script>
      var starRatingControl = new StarRating('.star-rating', { maxStars: 5});
    </script>
  </section>
</body>

</html>