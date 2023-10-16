<?php
include '../bootic/inc/header.inc.php';
?>

<main class="bg-secondary">
    <?php

    if ($_GET['action'] == 'U' ){
        $id_Produit = $_GET['id_produit'];
    }

    try {
        if ($_GET['action'] == 'C') {
            echo ' <div class="container p-3">
    <div class="row text-start">
        <form method="POST" class="form" action="data.php?action=C" enctype="multipart/form-data">
            <div class="col-12 text-center">
                <h3>Affichage des produits</h3>
                <h4>Ajout des produits</h4>
            </div>
            <div class="col-12 col-lg-6 mt-5">
                <h3>Formulaire produit : Nouveau Produit </h3>
            </div>
            <div class="col-12 d-flex flex-column">
                <label for="">reference :</label>
                <textarea id="story" name="reference" rows="0" cols=""></textarea>            
            </div>
            <div class="col-12 d-flex flex-column">
                 <label for="">categorie : </label>
                 <select name="categorie" id="" rows="0" cols="">
                    <option value="0">Casquettes</option>
                    <option value="1">T-shirts</option>
                    <option value="2">Sweats</option>
                    <option value="3">Sacs</option>
                 </select>           
            </div>
            <div class="col-12 d-flex flex-column">
                <label for="">titre : </label>
                <textarea id="story" name="nom_produit" rows="0" cols=""></textarea>            
            </div>
            <div class="col-12 d-flex flex-column">
                <label for="">description :</label>
                <textarea name="description" id="" cols="30" rows="0" class="" placeholder="!"></textarea>
            </div>
            <div class="col-12 d-flex flex-column">
                <label for="">couleur :</label>
                <textarea id="story" name="couleur" rows="0" cols=""></textarea>            
            </div>
            <div class="col-12 d-flex flex-column mt-3 w-25">
                <select name="taille" id="">
                    <label for="taille">Taille : </label>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XLL">XXL</option>
                </select>
            </div>
            <div class="col-6">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexe" id="sexe1" value="m">
                    <label class="form-check-label" for="sexe1">
                    Homme
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexe" id="sexe2" value="f" checked>
                    <label class="form-check-label" for="sexe2">
                    Femme
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexe" id="sexe3" value="mixte" checked>
                    <label class="form-check-label" for="sexe3">
                    Mixte
                    </label>
                </div>
            </div>
            </div>
            <div class="col-6 ">
                 <label for="image">Sélectionnez une image :</label>
                 <input type="file" name="image" id="image" >
            </div>

            <div class="col-12 d-flex flex-column">
                <label for="">prix :</label>
                <textarea id="story" name="prix" rows="0" cols=""></textarea>
            </div>
            <div class="col-12 d-flex flex-column">
                <label for="">stock : </label>
                <textarea id="story" name="stock" rows="0" cols=""></textarea>            
            </div>
            <div class="col-6">
                <button class="btn btn-dark mt-3" type="submit">Soummettre</button>
            </div>
            
        </form>

    </div>
    </div>';
        } elseif ($_GET['action'] == 'U') {
        $username = "root";
        $password = '';
        $dsn = 'mysql:host=localhost;dbname=dbbootic;port=3306;charset=utf8';
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Ajout de WHERE id_produit = '.$idProduit pour filtrer les resultat par id_produit, comme nous récupérons l'id_produit dans l'url
        $req = $db->query('SELECT * FROM t_produit INNER JOIN t_categorie ON (t_produit.id_categorie = t_categorie.id_categorie) WHERE id_produit = ' . $id_Produit);


        $res = $req->fetchAll();
         foreach ($res as $key => $value) {
             echo ' <div class="container p-3">
        <div class="row text-start">
         <form method="post" class="form" action="data.php?action=U&id_produit='.$value[0].'" enctype="multipart/form-data">
             <div class="col-12 text-center">
                 <h3>Affichage des produits</h3>
                 <h4>Ajout des produits</h4>
             </div>
             <div class="col-12 col-lg-6 mt-5">
                 <h3>Formulaire produit : ' . $value[3] . '</h3>
             </div>
             <div class="col-12 d-flex flex-column">
                 <label for="">reference :</label>
                 <textarea id="story" name="reference" rows="0" cols="">' . $value[1] . '</textarea>            
             </div>
             <div class="col-12 d-flex flex-column">
                 <label for="">categorie : </label>
                 <select name="categorie" id="" rows="0" cols="">
                    <option value="0">Casquettes</option>
                    <option value="1">T-shirts</option>
                    <option value="2">Sweats</option>
                    <option value="3">Sacs</option>
                 </select>           
             </div>
             <div class="col-12 d-flex flex-column">
                 <label for="">titre : </label>
                 <textarea id="story" name="nom_produit" rows="0" cols="">' . $value[3] . '</textarea>            
             </div>
             <div class="col-12 d-flex flex-column">
                 <label for="">description :</label>
                 <textarea name="description" id="" cols="30" rows="0" class="" placeholder="!">' . $value[4] . '</textarea>
             </div>
             <div class="col-12 d-flex flex-column">
                 <label for="">couleur :</label>
                 <textarea id="story" name="couleur" rows="0" cols="">' . $value[5] . '</textarea>            
             </div>
             <div class="col-12 d-flex flex-column mt-3 w-25">
                <select name="taille" id="">
                    <label for="">Taille : </label>
                    <option value="'.$value[6].'">' . $value[6] . '</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XLL">XXL</option>
                </select>
             </div>
             <div class="col-6">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexe" id="sexe1" value="m">
                    <label class="form-check-label" for="sexe1">
                    Homme
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexe" id="sexe2" value="f" checked>
                    <label class="form-check-label" for="sexe2">
                    Femme
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexe" id="sexe3" value="mixte">
                    <label class="form-check-label" for="sexe3">
                    Mixte
                    </label>
                </div>
            </div>
                 <div class="col-6 d-flex flex-column">
                 <label class="" for="">Ancienne image :</label>
                 <img src="./inc/img/' . $value[12] . '/' . $value[8] . '.webp" width="72rem" alt="Photo ' . $value[3] . '">
             </div>
             </div>
             <div class="col-6 ">
                 <label for="image">Sélectionnez une image :</label>
                 <input type="file" name="image" id="image" >
             </div>

             <div class="col-12 d-flex flex-column">
                 <label for="">prix :</label>
                 <textarea id="story" name="prix" rows="0" cols="">' . $value[9] . '</textarea>
             </div>
             <div class="col-12 d-flex flex-column">
                 <label for="">stock : </label>
                 <textarea id="story" name="stock" rows="0" cols="">' . $value[10] . '</textarea>            
             </div>
             <div class="col-6">
                 <button class="btn btn-dark mt-3">Soummettre</button>
             </div>
             
         </form>

     </div>
     </div>';
    }
        }


    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }

    ?>
</main>

<?php include '../bootic/inc/footer.inc.php'; ?>

