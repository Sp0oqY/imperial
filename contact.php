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
                <div class="left">
                    <h2>Contact Form</h2>
                    <p>Username</p>
                    <input type="text" id="name" class="field" placeholder="Enter your name" required />
                    <p>E-mail</p>
                    <input type="email" id="email" class="field" placeholder="Enter your email" required />
                    <p>Subject</p>
                    <input type="text" id="subject" class="field" placeholder="Enter subject" required />
                    <p>Message</p>
                    <textarea id="message" class="field area" placeholder="Enter message" required></textarea>

                    <button class="btn" type="submit">Send</button>
                </div>

                <div class="right">
                    <h2>Contact Info</h2>
                    <ul>
                        <li>MK</li>
                        <li>mk@gmail.com <br /> +421 000 000 000</li>
                        <li>Masarykova Univerzita <br /> Fakulta Informatiky</li>
                        <li>Botanická 68A, 602 00 <br /> Královo Pole-Ponava, Brno</li>
                    </ul>

                    <div class="network">
                        <a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/profile.php?id=100008982675113">
                            <img class="net fb" src="https://image.similarpng.com/very-thumbnail/2020/04/Beautiful-Facebook-logo-icon-social-media-png.png" alt="Facebook" />
                        </a>
                        <a target="_blank" rel="noopener noreferrer" href="https://www.instagram.com/miroslavkastier/?hl=sk">
                            <img class="net ig" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Instagram-Icon.png/1025px-Instagram-Icon.png" alt="Instagram" />
                        </a>
                        <a target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/in/miroslav-ka%C5%A1tier-788a92310/">
                            <img class="net" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/81/LinkedIn_icon.svg/1200px-LinkedIn_icon.svg.png" alt="LinkedIn" />
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <?php require_once "./includes/footer.php" ?>
</body>

</html>