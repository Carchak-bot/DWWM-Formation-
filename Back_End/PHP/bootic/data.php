<?php

echo $_POST["reference"];
echo "<br>";
echo $_POST["categorie"];
echo "<br>";
echo $_POST["nom_produit"];
echo "<br>";
echo $_POST["description"];
echo "<br>";
echo $_POST["couleur"];
echo "<br>";
echo $_POST["taille"];
echo "<br>";
echo $_POST["sexe"];
echo "<br>";
echo $_POST["image"];
echo "<br>";
echo $_POST["prix"];
echo "<br>";
echo $_POST["stock"];
echo "<br><br>";
echo var_dump($_FILES);
echo "<br><br>";


if ($_GET['action'] == 'C') {
    try
    {
	    $username = "root";
	    $password = '';
	    $dsn = 'mysql:host=localhost;dbname=dbbootic;port=3306;charset=utf8';
	    $db = new PDO($dsn, $username, $password);
	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $req = $db->query('SELECT * FROM t_produit INNER JOIN t_categorie ON (t_produit.id_categorie = t_categorie.id_categorie)');
        $res = $req->fetchAll();
        foreach ($res as $key => $value) {
            if (isset($_FILES['image'])) {
                $tmpName = $_FILES['image']['tmp_name'];
                $name = $_FILES['image']['name'];
                $size = $_FILES['image']['size'];
                $error = $_FILES['image']['error'];
            } 
            
            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));
            
            //Tableau des extensions que l'on accepte
            $extensions = ['jpg', 'png', 'jpeg', 'gif', 'webp'];
            
            //Taille max que l'on accepte
            $maxSize = 4000000;
            
            if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
                move_uploaded_file($tmpName, './inc/img/'.$value[12].'/' . $name);
            } else {
                echo "Une erreur est survenue";
            }
        }

	    $req = $db->prepare('INSERT INTO t_produit (reference, id_categorie, titre, description, couleur, taille, public, photo, prix, stock) 
        VALUES (:reference, :categorie, :nom_produit, :description, :couleur, :taille, :sexe, :image, :prix, :stock)');


        $req->bindValue(':reference',$_POST["reference"],PDO::PARAM_STR);
        $req->bindValue(':categorie',$_POST["categorie"],PDO::PARAM_STR);
        $req->bindValue(':nom_produit',$_POST["nom_produit"],PDO::PARAM_STR);
        $req->bindValue(':description',$_POST["description"],PDO::PARAM_STR);
        $req->bindValue(':couleur',$_POST["couleur"],PDO::PARAM_STR);
        $req->bindValue(':taille',$_POST["taille"],PDO::PARAM_STR);
        $req->bindValue(':sexe',$_POST["sexe"],PDO::PARAM_STR);
        $req->bindValue(':image',$name,PDO::PARAM_STR);
        $req->bindValue(':prix',$_POST["prix"],PDO::PARAM_STR);
        $req->bindValue(':stock',$_POST["stock"],PDO::PARAM_STR);

	    $req->execute();

    
	    $db = null;

        header('Location: gestion_produit.php');
    } catch (Exception $e) {
	    echo ('Erreur : ' . $e->getMessage());
    }
}


if ($_GET['action'] == 'U') {
    try {
        $username = "root";
        $password = '';
	    $dsn = 'mysql:host=localhost;dbname=dbbootic;port=3306;charset=utf8';
	    $db = new PDO($dsn, $username, $password);
	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $req = $db->query('SELECT * FROM t_produit INNER JOIN t_categorie ON (t_produit.id_categorie = t_categorie.id_categorie) WHERE id_produit = ' . $_GET['id_produit']);
        $res = $req->fetchAll();
        foreach ($res as $key => $value) {
            if (isset($_FILES['image'])) {
                $tmpName = $_FILES['image']['tmp_name'];
                $name = $_FILES['image']['name'];
                $size = $_FILES['image']['size'];
                $error = $_FILES['image']['error'];
            } 
            
            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));
            
            //Tableau des extensions que l'on accepte
            $extensions = ['jpg', 'png', 'jpeg', 'gif', 'webp'];
            
            //Taille max que l'on accepte
            $maxSize = 10000000;
            
            if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
                move_uploaded_file($tmpName, './inc/img/'.$value[12].'/' . $name);
            } else {
                echo "Une erreur est survenue";
            }
        }

	    $req = $db->prepare('UPDATE t_produit  
        SET 
        reference = :reference, 
        id_categorie = :categorie, 
        titre = :nom_produit, 
        description = :description, 
        couleur = :couleur,
        taille = :taille,
        public = :sexe,
        photo = :image,
        prix = :prix,
        stock = :stock
        WHERE id_produit = :id_produit LIMIT 1 ');

        $req->bindValue(':id_produit', $_GET['id_produit'], PDO::PARAM_INT);
        $req->bindValue(':reference',$_POST["reference"],PDO::PARAM_STR);
        $req->bindValue(':categorie',$_POST["categorie"],PDO::PARAM_STR);
        $req->bindValue(':nom_produit',$_POST["nom_produit"],PDO::PARAM_STR);
        $req->bindValue(':description',$_POST["description"],PDO::PARAM_STR);
        $req->bindValue(':couleur',$_POST["couleur"],PDO::PARAM_STR);
        $req->bindValue(':taille',$_POST["taille"],PDO::PARAM_STR);
        $req->bindValue(':sexe',$_POST["sexe"],PDO::PARAM_STR);
        $req->bindValue(':image',$name,PDO::PARAM_STR);
        $req->bindValue(':prix',$_POST["prix"],PDO::PARAM_STR);
        $req->bindValue(':stock',$_POST["stock"],PDO::PARAM_STR);

        $req->execute();

	    $db = null;

        header('Location: gestion_produit.php');
    } catch (Exception $e) {
	    echo ('Erreur : ' . $e->getMessage());
    }
}


if ($_GET['action'] == 'D') {
    try {
        $username = "root";
        $password = '';
	    $dsn = 'mysql:host=localhost;dbname=dbbootic;port=3306;charset=utf8';
	    $db = new PDO($dsn, $username, $password);
	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $req = $db->prepare('DELETE FROM t_produit WHERE id_produit ='.$_GET['id_produit']);
        

        $req->execute();

    
	    $db = null;

        header('Location: gestion_produit.php');
    } catch (Exception $e) {
	    echo ('Erreur : ' . $e->getMessage());
    }
}

