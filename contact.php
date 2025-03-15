<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require './Db.php';

//Db::connect('sql.endora.cz:3313', 'imperial', 'imperialshoes', 'RLQ7Kroy2aYn1xDo');
Db::connect('localhost', 'imperial', 'root', '');

$questions = Db::queryAll("SELECT * FROM faq");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/contact.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <?php require_once "./includes/head.php" ?>
</head>

<body>
    <?php require_once "./includes/header.php" ?>
    <section>
        <div class="container">
            <div class="wrapper">
                <form class="contact-box" >
                    <h2>KONTAKTNÝ FORMULÁR</h2>
                    <p>Meno</p>
                    <input type="text" id="name" class="field" placeholder="Zadajte svoje meno" required />
                    <p>E-mail</p>
                    <input type="email" id="email" class="field" placeholder="Zadajte svoj e-mail" required />
                    <p>Predmet</p>
                    <input type="text" id="subject" class="field" placeholder="Zadajte predmet" required />
                    <p>Správa</p>
                    <textarea id="message" class="field area" placeholder="Zadajte správu" required></textarea>

                    <button class="btn" onsubmit="sendMail(event)" type="submit">ODOSLAŤ</button>
                </form>

                <div class="support">
                    <h2>NAJČASTEJŠIE OTÁZKY</h2>
                    <div class="accordion">
                        <?php foreach ($questions as $question) : ?>
                            <div class="accordion-item">
                                <div class="accordion-item-header">
                                    <p><?= $question['question'] ?></p>
                                </div>
                                <div class="accordion-item-body">
                                    <div class="accordion-item-body-content">
                                        <p><?= $question['answer'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once "./includes/footer.php" ?> 
    <script src="./js/support.js"></script>
    <script src="./js/contact.js"></script>
</body>

</html>