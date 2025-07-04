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

  <style>
    header {
      background: #222;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
      padding: 10px 0;
      z-index: 1000;
      position: sticky;
      top: 0;
    }

    .main-nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 30px;
      max-width: 1200px;
      margin: auto;
      position: relative;
    }

    .logo-link {
      display: flex;
      align-items: center;
      text-decoration: none;
    }

    .logo-link img {
      height: 60px;
      border-radius: 10px;
      margin-right: 12px;
      box-shadow: 0 0 10px #ff007f;
    }

    .brand-name {
      font-size: 1.8rem;
      font-weight: 700;
      color: white;
      font-family: 'Poppins', sans-serif;
      
    }

    .nav-links {
      list-style: none;
      display: flex;
      gap: 25px;
    }

    .nav-links li a {
      color: white;
      text-decoration: none;
      font-size: 1.1rem;
      position: relative;
      padding: 6px 8px;
      transition: color 0.3s ease;
    }

    .nav-links li a::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: -2px;
      width: 0%;
      height: 2px;
      background: #ff007f;
      transition: width 0.3s ease;
    }

    .nav-links li a:hover,
    .nav-links li a.active {
      color: #ff007f;
    }

    .nav-links li a:hover::after,
    .nav-links li a.active::after {
      width: 100%;
    }

    /* Mobile nav */
    .checkbtn {
      font-size: 2rem;
      color: white;
      display: none;
      cursor: pointer;
    }

    #check {
      display: none;
    }

    @media (max-width: 768px) {
      .nav-links {
        position: absolute;
        top: 70px;
        left: 0;
        background-color: #1a001a;
        width: 100%;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        padding: 20px 0;
        display: none;
      }

      .nav-links li {
        width: 100%;
        text-align: center;
      }

      #check:checked ~ .nav-links {
        display: flex;
      }

      .checkbtn {
        display: block;
      }
    }
  </style>
</header>
