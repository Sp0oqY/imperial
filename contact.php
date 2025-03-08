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
        <form class="container" onsubmit="sendMail(event)">
            <div class="contact-box">
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

                <div class="network">
                    <a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/profile.php?id=100008982675113">
                        <img class="net fb" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/2023_Facebook_icon.svg/2048px-2023_Facebook_icon.svg.png" alt="Facebook" />
                    </a>
                    <a target="_blank" rel="noopener noreferrer" href="https://www.instagram.com/miroslavkastier/?hl=sk">
                        <img class="net ig" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Instagram-Icon.png/1025px-Instagram-Icon.png" alt="Instagram" />
                    </a>
                    <a target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/in/miroslav-ka%C5%A1tier-788a92310/">
                        <img class="net" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/81/LinkedIn_icon.svg/1200px-LinkedIn_icon.svg.png" alt="LinkedIn" />
                    </a>
                </div>
            </div>
            <div class="support">
                <h1>FREQUENTLY ASKED QUESTIONS</h1>
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            <p>Otázka</p>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                <p>Odpoveď</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <?php require_once "./includes/footer.php" ?>
    <script src="./js/support.js"></script>
</body>

</html>