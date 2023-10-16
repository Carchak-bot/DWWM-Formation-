<?php


function truecarousel($db, $category)
{
    $req = $db->query('SELECT * FROM t_produit INNER JOIN t_categorie ON (t_produit.id_categorie = t_categorie.id_categorie) WHERE t_produit.id_categorie=' . $category);
    $res = $req->fetchAll();
    echo '<section id="carousel_' . $category . '" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <article id="aled" class="carousel-inner">';

    foreach ($res as $key => $value) {
        echo '<figure class="carousel-item">';
        echo '<a href="produit.php?id_produit=' . $value[0] . '">';
        echo '<img src="./inc/img/' . $value[12] . '/' . $value[8] . '" class="d-block w-100" alt="' . $value[3] . '" />';
        echo '</a>';
        echo '<div class="carousel-caption d-none d-md-block">';
        echo '<h5>' . $value[3] . '</h5>';
        echo '<p>' . $value[4] . '</p>';
        echo '</div>';
        echo '</figure>';
    }

    echo '</article>
    <h4>'.$value[12].'</h4>
    <caption> Cliquez pour en savoir plus sur un article</caption>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel_' . $category . '" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel_' . $category . '" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </section>';
}

function dbConnect()
{
    try {

        $db = new PDO("mysql:host=localhost; dbname=dbbootic; port=3306; charset=utf8", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}



function getProfile($pseudo)
{
    $getBdd = dbConnect();
    $sql = "SELECT * FROM t_membre WHERE pseudo = '$pseudo'";
    $profil = $getBdd->prepare($sql);
    $profil->execute();
    if ($profil->rowCount() == 1)
        return $profil->fetch(); // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun profil ne correspond au pseudo '$pseudo'");
}


function getAllProfiles()
{
    $getBdd = dbConnect();
    $sql = "SELECT pseudo FROM t_membre";
    $profils = $getBdd->prepare($sql);
    $profils->execute();

    return $profils->fetchAll();
}