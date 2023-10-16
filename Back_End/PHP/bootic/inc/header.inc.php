<?php
// on vérifie que la variable de session pseudo existe
if (isset($_SESSION['pseudo'])) {
    $pseudo = $_SESSION['pseudo'];
} else {
    $pseudo = null; 
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootic</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="./inc/css/styles.css" />
</head>

<body>
  <header id="entete">
    <nav class="navbar">
      <div class="container">
        <img src="./inc/img/Trinkets_logo_1_page-00011.jpg" clasd="logo" alt="logo bootic" width="25%" />
        <a href="" class="navbar-brand"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../bootic/index.php">Acceuil</a>
            </li>
            <li class="nav-item">
            <?php
                if ($pseudo) {
                  echo '<a class="nav-link" href="panier.php">Panier</a>';
                }
              ?>
            </li>
            <li class="nav-item dropdown">
              <?php
                if ($pseudo) {
                  echo '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Profil et infos
                  </a>';
                }
              ?>
              <ul class="dropdown-menu">
                <li>
                  <?php
                    if ($pseudo) {
                      echo '<a class="dropdown-item" href="profil.php">Profil</a>';
                    }
                  ?>
                </li>
                <li>
                <?php
                    if ($pseudo) {
                      echo '<a class="dropdown-item" href="#">Retours et commandes</a>';
                    }
                  ?>
                </li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li>
                  <?php
                    if ($pseudo) {
                      echo '<a class="dropdown-item" href="../bootic/gestion_produit.php">Ajouter un produit</a>';
                    }
                  ?>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <?php
                if ($pseudo) {
                  echo ' ';
                } else {
                  echo '<a class="nav-link" href="../bootic/inscription.php">Inscription</a>';
                }
              ?>
            </li>
            <li class="nav-item">
              <?php
                if ($pseudo) {
                  echo ' ';
                } else {
                  echo '<a class="nav-link" href="../bootic/connexion.php">Se connecter</a>';
                }
              ?>
            </li>
            <li class="nav-item">
              <?php
                if ($pseudo) {
                  echo '<a class="nav-link" href="../bootic/deconnexion.php">Deconnexion</a>';
                }
              ?>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Rechercher sur Bootic" aria-label="Search" />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </form>
        </div>
      </div>
    </nav>
  </header>