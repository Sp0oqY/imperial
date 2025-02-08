<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;

require_once './app/controllers/phpmailer/PHPMailer.php';
require_once './app/controllers/phpmailer/Exception.php';
require_once './app/controllers/phpmailer/SMTP.php';

$chyba = '';

if(isset($_POST['contact'])){

  if($_POST['name'] && $_POST['email'] && $_POST['subject'] && $_POST['message']){

    $name = $_POST['name'];
    $email = trim($_POST['email']);
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

      $mail = new PHPMailer(true);
      try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '36f60e9d0a6714';
        $mail->Password = '65dfdf08af1106';      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('kastierm45@gmail.com');
        $mail->addReplyTo($email, $name);
    
    
        //Content
        $mail->isHTML(true);      
        $mail->CharSet = "UTF-8";                            //Set email format to HTML
        $mail->Subject = 'Nová Správa z webu: ' . $subject;
        $mail->Body    = "<h2>Subject: {$subject}</h2><span>From: {$email}</span><br><br><span>Username: {$name}</span><br><p>Message: {$message}</p>";
    
        $mail->send();
        $success =  'Your message has been sent successfully!';
    } catch (Exception $e) {
        $error = 'Error: ' . $e->getMessage();
    }


    } else {
      $chyba = 'E-mail is not valid';
    }

  } else {
    $chyba = 'All fields must be filled out';
  }
}

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
        <form class="container" action="./contact" method="POST">
          <div class="contact-box">  
            <div class="right">
              <h1>Contact Form</h1>
              <label for="name">Username</label>
              <input type="text" name="name" id="name" class="field" placeholder="Enter your username">
              <small class="error"></small>
  
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="field" placeholder="Enter your e-mail">
              <small class="error"></small>
  
              <label for="subject">Subject</label>
              <input type="text" name="subject" id="subject" class="field" placeholder="Enter subject">
              <small class="error"></small>
  
              <label for="message">Message</label>
              <textarea id="message" name="message" class="field" placeholder="Enter your message"></textarea>
              <small class="error"></small>
  
              <div class="center">  
                <input id="btn" type="submit" name="contact" value="SEND MESSAGE"> 
              </div>
            </div>
  
            <div class="left">
              <h1>Contact Info</h1>
              <ul>
                  <li>Miroslav Kaštier</li>
                  <li>Stredná Priemyselná Škola Jozefa Murgaša</li>
                  <li>Hurbanova 6, Banská Bystrica, 974 01</li>
                  <li>kastierm45@gmail.com</li>
                  <li>+421 904 021 045</li>
                </ul>
        
                  <a target="_blank" href="https://www.facebook.com/profile.php?id=100008982675113"><img class="net fb" src="https://image.similarpng.com/very-thumbnail/2020/04/Beautiful-Facebook-logo-icon-social-media-png.png" alt=""></a>
                  <a target="_blank" href="https://www.instagram.com/miroslavkastier/?hl=sk"><img class="net ig" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Instagram-Icon.png/1025px-Instagram-Icon.png" alt=""></a>
                  <a target="_blank" href=""><img class="net" src="https://toppng.com/uploads/preview/twitter-icon-logo-social-media-icon-png-and-vector-twitter-logo-pink-115629344286kzjqw2mow.png" alt=""></a>
  
                  <?= isset($success) ? "<p id='success'>{$success}</p>" : "" ?>
                  <?= isset($chyba) ? "<p id='error'>{$chyba}</p>" : "" ?>
            </div>
          </div>
        </form>
    </div>
  </div>
  <?php require_once "./assets/includes/footer.php" ?>
</section>
</body>

</html>