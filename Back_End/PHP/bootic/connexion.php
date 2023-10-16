<?php
session_start();
include './inc/header.inc.php';


// on vérifie que la variable de session pseudo existe
if (isset($_SESSION['pseudo'])) {
    $pseudo = $_SESSION['pseudo'];
}
?>

<body>
    <br><br><br>
    <main>
        <form method="POST" action="./admin/gestion_membre.php?action=C">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Pseudo</span>
                <input type="text" class="form-control" placeholder="oO-d4rk-s4suk3-Oo" aria-label="nom"
                    aria-describedby="basic-addon2" name="pseudo">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Mot de passe</span>
                <input type="text" class="form-control" placeholder="&é(-è_çà)" aria-label="nom"
                    aria-describedby="basic-addon2" name="password">
            </div>
            <button class="btn btn-outline-success" type="submit">Connecter</button>
        </form>
    </main>
    <br><br><br>
</body>

<?php
include './inc/footer.inc.php';
?>