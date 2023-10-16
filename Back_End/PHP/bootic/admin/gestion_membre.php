<?php
session_start();
echo $_POST['pseudo'];
echo '<br>';
echo $_POST['nom'];
echo '<br>';
echo $_POST['prenom'];
echo '<br>';
echo $_POST['mail-address'];
echo '<br>';
echo $_POST['address'];
echo '<br>';
echo $_POST['codepostal'];
echo '<br>';
echo $_POST['ville'];
echo '<br>';
echo $_POST['pays'];
echo '<br>';
echo $_POST['password'];
echo '<br>';
echo $_POST['passwordConfirmed'];
echo '<br>';

$mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);
echo $mdp;

if ($_GET['action'] == 'I') {
    try
    {
	    $username = "root";
	    $password = '';
	    $dsn = 'mysql:host=localhost;dbname=dbbootic;port=3306;charset=utf8';
	    $db = new PDO($dsn, $username, $password);
	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $db->prepare('INSERT INTO t_membre 
        (pseudo, mdp, nom, prenom, 
        email, civilite, ville, cp, 
        adresse) 
        VALUES (:pseudo, :mdp, :nom, 
        :prenom, :email, :civilite, 
        :ville, :cp, :adresse)');


        $req->bindValue(':pseudo',$_POST["pseudo"],PDO::PARAM_STR);
        $req->bindValue(':mdp',$mdp,PDO::PARAM_STR);
        $req->bindValue(':nom',$_POST["nom"],PDO::PARAM_STR);
        $req->bindValue(':prenom',$_POST["prenom"],PDO::PARAM_STR);
        $req->bindValue(':email',$_POST["mail-address"],PDO::PARAM_STR);
        $req->bindValue(':civilite',$_POST["civilite"],PDO::PARAM_STR);
        $req->bindValue(':ville',$_POST["ville"],PDO::PARAM_STR);
        $req->bindValue(':cp',$_POST["codepostal"],PDO::PARAM_STR);
        $req->bindValue(':adresse',$_POST["address"],PDO::PARAM_STR);

	    $req->execute();

    
	    $db = null;

        header('Location: ./../profil.php');
    } catch (Exception $e) {
	    echo ('Erreur : ' . $e->getMessage());
    }
}

if ($_GET['action'] == 'C') {
    try
    {
	    $username = "root";
	    $password = '';
	    $dsn = 'mysql:host=localhost;dbname=dbbootic;port=3306;charset=utf8';
	    $db = new PDO($dsn, $username, $password);
	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = htmlspecialchars($_POST['password']);


        // On regarde si le pseudo existe dans la base
        $sql = "SELECT * FROM t_membre WHERE pseudo = ?";
        $req = $db->prepare($sql);
        $req->bindValue(1, $pseudo, PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_BOTH);
        if ($result) {
            if (password_verify($mdp, $result['mdp'])) {
                //On définit des variables de session
                $_SESSION['pseudo'] = $result['pseudo'];
                header('Location: ./../profil.php');
            } else {
                echo "Vous n'êtes pas inscrit";
            }
        } else {
            echo "Vous devez d'abord vous inscrire";
        }

    
	    $db = null;

        //header('Location: gestion_produit.php');
    } catch (Exception $e) {
	    echo ('Erreur : ' . $e->getMessage());
    }
}