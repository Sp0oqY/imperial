<header>
  <nav class="main-nav">
    <div class="nav-left">
      <a href="/imperial/index.php" class="logo-link">
        <img src="./img/logo_png.png" alt="Imperial Shoes Logo">
        <span class="brand-name">Imperial Shoes</span>
      </a>
    </div>

    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>

    <ul class="nav-links">
      <li><a href="/imperial/index.php" class="<?= ($_SERVER['PHP_SELF'] == "/imperial/index.php") ? "active" : "navHover"; ?>">Domov</a></li>
      <li><a href="/imperial/about.php" class="<?= ($_SERVER['PHP_SELF'] == "/imperial/about.php") ? "active" : "navHover"; ?>">O nás</a></li>
      <li><a href="/imperial/catalog.php" class="<?= ($_SERVER['PHP_SELF'] == "/imperial/catalog.php") ? "active" : "navHover"; ?>">Katalóg</a></li>
      <li><a href="/imperial/reviews.php" class="<?= ($_SERVER['PHP_SELF'] == "/imperial/reviews.php") ? "active" : "navHover"; ?>">Recenzie</a></li>
      <li><a href="/imperial/contact.php" class="<?= ($_SERVER['PHP_SELF'] == "/imperial/contact.php") ? "active" : "navHover"; ?>">Kontakt</a></li>
    </ul>
  </nav>
</header>
