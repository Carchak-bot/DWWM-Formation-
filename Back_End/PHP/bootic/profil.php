<?php
session_start();
include './inc/header.inc.php';
include './inc/fonctions.php';


// on vérifie que la variable de session pseudo existe
if (isset($_SESSION['pseudo'])) {
    $pseudo = $_SESSION['pseudo'];
}
?>



<body>
    <main class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 offset-md-3 my-5">
                <div class="card">
                    <h5 class="card-header">Voici vos informations de profil</h5>
                    <div class="card-body">
                        <?php
                        if ($pseudo) {
                            $membre = getProfile($pseudo);
                        ?>
                            <h5 class="card-title">Bonjour <?= $_SESSION['pseudo']; ?></h5>
                            <p class="card-text">Votre email est : <?= $membre[5]; ?></p>
                            <p class="card-text">Votre ville est : <?= $membre[7]; ?></p>
                            <p class="card-text">Votre cp est : <?= $membre[8]; ?></p>
                            <p class="card-text">Votre adresse est : <?= $membre[9]; ?></p>
                        <?php
                        } else {
                            echo 'non';
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

<?php
include './inc/footer.inc.php';
?>