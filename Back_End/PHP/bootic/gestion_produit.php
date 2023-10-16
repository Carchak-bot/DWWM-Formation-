<?php
include '../bootic/inc/header.inc.php';
?>

<body>
    <main class="bg-secondary">
    <?php
    try {

        $username = "root";
        $password = '';
        $dsn = 'mysql:host=localhost;dbname=dbbootic;port=3306;charset=utf8';
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $db->query('SELECT * FROM t_produit INNER JOIN t_categorie ON (t_produit.id_categorie = t_categorie.id_categorie)');
        $idNew = $db->query('SELECT COUNT(id_produit) FROM t_produit');
        echo ('<button class="btn btn-succes"><a href="../bootic/ajout_produit.php?action=C">Ajouter un Produit</a></button>');

        $res = $req->fetchAll();
        foreach ($res as $key => $value) {

        echo '<table class="table table-bordered">
      <h5 class = "text-center py-3">Produit : ' . $value[3] . '</h5>
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
          <th scope="row">categorie</th>
          <td>' . $value[2] . '</td>

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
          <th scope="row">public</th>
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
        <tr>
          <th scope="row">stock</th>
          <td>' . $value[10] . '</td>
        </tr>
        <tr>
          <th scope="row">Suppression</th>
          <td><a href="data.php?action=D&id_produit=' . $value[0] . '" id="deleteBouton"><img src="../bootic/inc/img/trash-310219_640.png" width="72rem" alt="photo Poubelle"></a></td>
        </tr>
        <tr>
          <th scope="row">Modification</th>
          <td><a href="ajout_produit.php?action=U&id_produit=' . $value[0] . '"><img src="../bootic/inc/img/list-2389219_640.png" width="72rem" alt="photo bloc note"></a></td>
        </tr>
      </tbody>
    </table>';

            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }

        ?>
    </main>
</body>

<?php
include '../bootic/inc/footer.inc.php';
?>