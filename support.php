<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require './app/controllers/Db.php';
require './app/controllers/DataController.php';

Db::connect('127.0.0.1', 'rocnikovy', 'root', '');

$support = Db::queryAll("SELECT * FROM `faq`;");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./assets/includes/head.php" ?>
</head>

<body>
    <section id="pic">
        <?php require_once "./assets/includes/header.php" ?>
        <div class="row">
            <div class="col-12">
            <h1>FREQUENTLY ASKED QUESTIONS</h1>
                <div class="accordion">
                    <?php foreach ($support as $item) : ?>
                        <div class="accordion-item">
                            <div class="accordion-item-header">
                                <p><?= $item['question'] ?></p>
                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content">
                                    <p><?= $item['answer'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="accordion-item2">
                        <div class="accordion-item-header2">
                            <p>Don't you found an answer to your problem? Write us your problem using contact form and we will write back to you as soon as possible. <a href="/rocnikovy/contact">(Click here)</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php require_once "./assets/includes/footer.php" ?>
    </section>

<script src="./assets/js/support.js?ver=<?= time() ?>"></script>
</body>

</html>