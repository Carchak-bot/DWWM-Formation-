<?php
session_start();

// on vérifie que la variable de session pseudo existe

include './inc/header.inc.php';
require './inc/fonctions.php';

if (isset($_SESSION['pseudo'])) {
  $pseudo = $_SESSION['pseudo'];
} else {
  $pseudo = null;
}
?>
<main>
<?php
    if (isset($pseudo)) {
        echo "<h1>Bienvenue $pseudo</h1>";
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
    } else {
        echo "<H1>Vous ne vous êtes pas encore authentifié</H1>";
    }
    ?>
</main>
<?php include './inc/footer.inc.php'; ?>