<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './Db.php';

Db::connect('sql.endora.cz:3313', 'rocnikovy', 'imperialshoes', 'RLQ7Kroy2aYn1xDo');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./includes/head.php" ?>
</head>
<body>
    <section>
        <?php require_once "./includes/header.php" ?>
        
    
        <?php require_once "./includes/footer.php" ?>
    </section>
</body>

</html>