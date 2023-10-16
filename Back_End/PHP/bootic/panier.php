<?php
session_start();
include './inc/header.inc.php';

$_SESSION['panier']=array();
$_SESSION['panier']['libelleProduit'] = array();
$_SESSION['panier']['qteProduit'] = array();
$_SESSION['panier']['prixProduit'] = array();


if ($_GET['action'] == 'C') {
    $id_Produit = $_GET['id'];
    try {

        $username = "root";
        $password = '';
        $dsn = 'mysql:host=localhost;dbname=dbbootic;port=3306;charset=utf8';
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $db->query('SELECT * FROM t_produit INNER JOIN t_categorie ON (t_produit.id_categorie = t_categorie.id_categorie) WHERE id_produit = ' . $id_Produit);
        $res = $req->fetchAll();
        foreach ($res as $key => $value) {

        echo '<table class="table table-bordered">
      <h5 class = "text-center py-3">' . $value[3] . '</h5>
      <tbody>
        <tr>
          <th scope="row">id_produit</th>
          <td>' . $value[0] . '</td>
        </tr>
        <tr>
          <th scope="row">reference</th>
          <td>' . $value[1] . '</td>
        </tr>
        <tr>
          <th scope="row">titre</th>
          <td>' . $value[3] . '</td>
        </tr>
        <tr>
          <th scope="row">Description</th>
          <td>' . $value[4] . '</td>
        </tr>
        <tr>
          <th scope="row">couleur</th>
          <td>' . $value[5] . '</td>
        </tr>
        <tr>
          <th scope="row">taille</th>
          <td>' . $value[6] . '</td>
        </tr>
        <tr>
          <th scope="row">photo</th>
          <td><img src="../bootic/inc/img/' . $value[12] . '/' . $value[8] . '" width="72rem" alt="Photo ' . $value[3] . '"></td>
        </tr>
        <tr>
          <th scope="row">prix</th>
          <td>' . $value[9] . '</td>
        </tr>
      </tbody>
    </table>';

            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
}

?>

<br><br>
<form method="post" action="checkout.php">
<table style="width: 400px">
    <tr>
        <td colspan="4">Votre panier</td>
    </tr>
    <tr>
        <td>Libellé</td>
        <td>Quantité</td>
        <td>Prix Unitaire</td>
        <td>Action</td>
    </tr>
</table>
</form>

<?php
include './inc/footer.inc.php';
?>