<?php
if (session_status() === 1) {
    session_start();
}

?>
<header class="header">
    <!--responsive navbar-->
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>

    <!--Title / logo-->
    <div class="title">
        <h2>My Netflix List</h2>

        <div class="buttons">

            <?php if (isset($_SESSION['id'])) : ?>
                <a href="/rocnikovy/logout"><button class="Login">Logout</button></a>
            <?php else : ?>
                <a href="/rocnikovy/login"><button class="Login">Login</button></a>
                <a href="/rocnikovy/signup"><button class="SignUp">Sign Up</button></a>
            <?php endif; ?>

            <div class="dropdown">
                <a class="settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://freesvg.org/storage/img/thumb/gearRed.png" alt="">
                </a>

                <div class="dropdown-menu dropdown-menu-right mt-10" aria-labelledby="dropdownMenuButton" style="top: 15px;">
                    <a class="dropdown-item" href="/rocnikovy/settings">Zmnena údajov</a>
                    <a class="dropdown-item" href="/rocnikovy/settings">Zmena hesla</a>
                </div>
            </div>
        </div>
    </div>

    <!--login / logout buttons -->
    <!--navbar-->
    <ul class="navigation">
        <li><a id="activeH" class="navBtn" href="/rocnikovy/index">Home</a></li>
        <li><a id="activeA" class="navBtn" href="/rocnikovy/about">About</a></li>
        <li><a id="activeP" class="navBtn" href="/rocnikovy/profile">Profile</a></li>
        <li><a id="activeL" class="navBtn" href="/rocnikovy/list">List</a></li>
        <li><a id="activeS" class="navBtn" href="/rocnikovy/support">Support</a></li>
        <li><a id="activeC" class="navBtn" href="/rocnikovy/contact">Contact</a></li>
    </ul>
</header>