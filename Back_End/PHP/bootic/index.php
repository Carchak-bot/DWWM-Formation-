<?php
include './inc/header.inc.php';
require './inc/fonctions.php';
?>
<main>
  <?php
  try {
    $username = "root";
    $password = '';
    $dsn = 'mysql:host=localhost;dbname=dbbootic;port=3306;charset=utf8';
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    truecarousel($db, 0);
    truecarousel($db, 1);
    truecarousel($db, 2);
    truecarousel($db, 3);
    
    // Pour fermer la connexion
    $maBase = null;
  } catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
  }
  ?>
</main>
<?php include './inc/footer.inc.php'; ?>