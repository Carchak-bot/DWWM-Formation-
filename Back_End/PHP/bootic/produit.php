<?php
include './inc/header.inc.php';
require './inc/fonctions.php';
?>
<?php


$id_produit = $_GET['id_produit'];
try {
    $username = "root";
    $password = '';
    $dsn = 'mysql:host=localhost;dbname=dbbootic;port=3306;charset=utf8';
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $db->query("SELECT * FROM t_produit INNER JOIN t_categorie ON (t_produit.id_categorie = t_categorie.id_categorie) WHERE id_produit = $id_produit");
    $res = $req->fetchAll();
    foreach ($res as $key => $value) {
    echo '
    <main class="produitUnite">
    <figure>
    <img src="./inc/img/' . $value[12] . '/' . $value[8] . '.webp" class="d-block w-100" alt="' . $value[3] . '" />
    <h5>' . $value[3] . '</h5>
    <p>' . $value[4] . '</p>
    </figure>
    <button>Ajouter au panier</button>
    </main>';
    }
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}

?>
<?php
include './inc/footer.inc.php';
?>

