<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require './Db.php';

//Db::connect('sql.endora.cz:3313', 'imperial', 'imperialshoes', 'RLQ7Kroy2aYn1xDo');
Db::connect('localhost', 'imperial', 'root', '');

$questions = Db::queryAll("SELECT * FROM faq LIMIT 6");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/contact.css">
    <title>Contact Form</title>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script src="./js/contact.js"></script>

    <?php require_once "./includes/head.php" ?>
</head>

<body>
    <?php require_once "./includes/header.php" ?>
    <section>
        <div class="container">
            <div class="wrapper">
                <form class="contact-box" onsubmit="sendMail(event)">
                    <h2>Kontaktný Formulár</h2>
                    <p>Meno</p>
                    <input type="text" id="name" class="field" placeholder="Zadajte svoje meno" required />
                    <p>E-mail</p>
                    <input type="email" id="email" class="field" placeholder="Zadajte svoj e-mail" required />
                    <p>Predmet</p>
                    <input type="text" id="subject" class="field" placeholder="Zadajte predmet" required />
                    <p>Správa</p>
                    <textarea id="message" class="field area" placeholder="Zadajte správu" required></textarea>

                    <button class="btn" type="submit">Odoslať</button>

                    <!-- <div class="network">
                    <a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/profile.php?id=100008982675113">
                        <img class="net fb" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/2023_Facebook_icon.svg/2048px-2023_Facebook_icon.svg.png" alt="Facebook" />
                    </a>
                    <a target="_blank" rel="noopener noreferrer" href="https://www.instagram.com/miroslavkastier/?hl=sk">
                        <img class="net ig" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Instagram-Icon.png/1025px-Instagram-Icon.png" alt="Instagram" />
                    </a>
                    <a target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/in/miroslav-ka%C5%A1tier-788a92310/">
                        <img class="net" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/81/LinkedIn_icon.svg/1200px-LinkedIn_icon.svg.png" alt="LinkedIn" />
                    </a>
                </div> -->
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

    <!-- <?php require_once "./includes/footer.php" ?> -->
    <script src="./js/support.js"></script>
</body>

</html>