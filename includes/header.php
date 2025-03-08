<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <ul>
    <li><a href="/imperial/index.php" class="<?= ($_SERVER['PHP_SELF'] == "/imperial/index.php") ? "active" : ""; ?>">Domov</a></li>
    <li><a href="/imperial/about.php" class="<?= ($_SERVER['PHP_SELF'] == "/imperial/about.php") ? "active" : ""; ?>">O nás</a></li>
    <li><a href="/imperial/catalog.php" class="<?= ($_SERVER['PHP_SELF'] == "/imperial/catalog.php") ? "active" : ""; ?>">Katalóg</a></li>
    <li><a href="/imperial/reviews.php" class="<?= ($_SERVER['PHP_SELF'] == "/imperial/reviews.php") ? "active" : ""; ?>">Recenzie</a></li>
    <li><a href="/imperial/contact.php" class="<?= ($_SERVER['PHP_SELF'] == "/imperial/contact.php") ? "active" : ""; ?>">Kontakt</a></li>
</ul>

    <div class="logo">
        <a href="/imperial/index.php"><img src="./img/logo_png.png" alt=""></a>
        <label class="title">Imperial Shoes</label>
    </div>
</nav>