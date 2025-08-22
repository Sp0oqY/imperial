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
    <div class="modal">
                <div class="modal-content">
                    <img src="/img/tick_icon.png">
                    <h2>Thank You!</h2>
                    <p>Your message has been sent successfully :)</p>
                    <button class="btn" onclick="closeModal()">OK</button>
                </div>
            </div>

            <div class="support-container">
                <div class="wrapper">
                    <form id="contact-form" class="contact-box">
                        <h3>Contact Form</h3>

                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter your username" required />
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email" required />
                        </div>

                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject"
                                placeholder="Enter a subject" required />
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea id="message" name="message" class="form-control area"
                                placeholder="Enter a message" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-form">Send a message</button>
                    </form>

                    <div class="support">
                        <h3>Frequently Asked Questions</h3>
                        <div class="accordion">
                            <div class="accordion-item">
                                <div class="accordion-item-header">
                                    <p>Question</p>
                                </div>
                                <div class="accordion-item-body">
                                    <div class="accordion-item-body-content">
                                        <p>Answer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php require_once "./includes/footer.php" ?> 
</body>

</html>