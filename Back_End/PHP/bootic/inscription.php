<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inscription Bootic</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./inc/css/styles.css" />
  </head>
  <body>
    <?php
    include './inc/header.inc.php';
    ?>
    <header id="entete">
      <nav class="navbar">
        <div class="container">
          <img
            src="./inc/img/Trinkets_logo_1_page-00011.jpg"
            clasd="logo"
            alt="logo bootic"
            width="25%"
          />
          <a href="" class="navbar-brand"></a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"
                  >Acceuil</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Panier</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Profil et infos
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Profil</a></li>
                  <li>
                    <a class="dropdown-item" href="#">Retours et commandes</a>
                  </li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="#">Deconnexion</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">S'inscrire</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Se connecter</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input
                class="form-control me-2"
                type="search"
                placeholder="Rechercher sur Bootic"
                aria-label="Search"
              />
              <button class="btn btn-outline-success" type="submit">
                Search
              </button>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <form action="">
        <input type="text" placeholder="Nom" />
        <input type="text" placeholder="Prenom" />
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Addresse mail" aria-label="mail-address" aria-describedby="basic-addon2">
          <span class="input-group-text" id="basic-addon2">@exemple.com</span>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">Addresse de livraison</span>
          <input type="text" class="form-control" placeholder="1 rue de l'inconnu" aria-label="address" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
          <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Pays</button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">France </a></li>
            <li><a class="dropdown-item" href="#">Pays Cringe</a></li>
            <li><a class="dropdown-item" href="#">Angleterre (berk)</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Etats Unis (turbo-berk)</a></li>
          </ul>
          <input type="text" class="form-control" aria-label="Text input with dropdown button">
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Code Postal" aria-label="postalCode">
          <span class="input-group-text">/</span>
          <input type="text" class="form-control" placeholder="Ville" aria-label="city">
        </div>
        <input type="password" placeholder="Mot de passe" />
        <input type="password" placeholder="Confirmation du Mot de passe" />
        <button>S'inscrire</button>
      </form>
    </main>
    <?php
    include './inc/footer.inc.php';
    ?>
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
  ></script>
</html>
