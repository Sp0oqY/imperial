<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './Db.php';

Db::connect('sql.endora.cz:3313', 'rocnikovy', 'imperialshoes', 'Sp0oqY159753');

// try 
// {
//     $pdo = new PDO("mysql:host=localhost;dbname=imperial;charset=utf8", "root", "");
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } 
// catch (PDOException $e) 
// {
//     die("Chyba pripojenia: " . $e->getMessage());
// }

if (isset($_GET['page'])) 
{
    $page = $_GET['page'];
    if (is_int($page) || $page != 1) 
    {
        $offset = ($page - 1) * 3;
        $news = Db::queryAll("SELECT * FROM `news` ORDER BY `date` DESC LIMIT 3 OFFSET ${offset};");
    } 

    else 
    {
        header("Location: /imperial/");
    }
} 
else 
{
    $news = Db::queryAll("SELECT * FROM `news` ORDER BY `date` DESC LIMIT 3;");
}

$count = Db::query("SELECT * FROM `news`");
if ($count % 2 == 0) 
{
    $count = ($count / 2) - 1;
} 

else 
{
    $count = $count / 2;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./includes/head.php" ?>
</head>
<body>
    <section id="pic">
        <?php require_once "./includes/header.php" ?>
        <div class="row">
            <div class="col-12 content">
            <div class="content-news">
                    <h1>News</h1>

                    <?php foreach ($news as $item) : ?>
                        <h4><?= $item['title'] ?></h4>
                        <img id="imgLeft" src="<?= $item['image'] ?>" alt="">
                        <p> <?= $item['description'] ?> </p>
                        <small><?= date("d.m.Y", strtotime($item['date'])) ?></small>
                    <?php endforeach; ?>

                    <section class="page">
                        <?php for ($i = 1; $i <= $count; $i++) : ?>
                            <a href="/rocnikovy?page=<?= $i ?>"><?= $i ?></a>
                        <?php endfor; ?>
                    </section>
        </div>
            </div>
        </div>
        

        <?php require_once "./includes/footer.php" ?>
    </section>
</body>

</html>