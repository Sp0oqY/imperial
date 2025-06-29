<?php
$name = explode('/', $_SERVER['SCRIPT_NAME']);
$name = substr(ucfirst(end($name)),0, -4);
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="./assets/css/bootstrap.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/62453b0bee.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
<link rel="stylesheet" href="./css/<?= $name ?>.css?ver=<?= time() ?>">
<link rel="stylesheet" href="./css/app.css?ver=<?= time() ?>">
<link rel="website icon" type="png" href="./img/logo_png.png">
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/8a3237e1e4.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./css/swiper-bundle.min.css">
<title>Imperial Shoes</title>