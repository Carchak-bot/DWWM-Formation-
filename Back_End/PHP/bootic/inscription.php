<?php
include './inc/header.inc.php';
?>

<body>
  <br><br><br>
  <main>
    <form method="POST" action="./admin/gestion_membre.php?action=I">
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Pseudo</span>
        <input type="text" class="form-control" placeholder="De la ribautière" aria-label="nom"
          aria-describedby="basic-addon2" name="pseudo">
      </div><div class="input-group mb-3">
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nom de famille</span>
        <input type="text" class="form-control" placeholder="De la ribautière" aria-label="nom"
          aria-describedby="basic-addon2" name="nom">
      </div><div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Prénom</span>
        <input type="text" class="form-control" placeholder="Celestin" aria-label="prenom"
          aria-describedby="basic-addon2" name="prenom">
      </div>
      </div><div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Civilité</span>
        <select class="form-select" aria-label="Default select example" name="civilite">
          <option selected>Monsieur / Madame ?</option>
          <option value="m">Monsieur</option>
          <option value="f">Madame</option>
        </select>
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Addresse Mail</span>
        <input type="text" class="form-control" placeholder="blablabla@gmail.com" aria-label="mail-address"
          aria-describedby="basic-addon2" name="mail-address">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Addresse de livraison</span>
        <input type="text" class="form-control" placeholder="1 rue de l'inconnu" aria-label="address"
          aria-describedby="basic-addon1" name="address">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Code Postal</span>
        <input type="text" class="form-control" placeholder="XX XXX" aria-label="codepostal"
          aria-describedby="basic-addon1" name="codepostal">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Ville</span>
        <input type="text" class="form-control" placeholder="Versailles" aria-label="ville"
          aria-describedby="basic-addon1" name="ville">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Pays</span>
        <input type="text" class="form-control" placeholder="France" aria-label="pays"
          aria-describedby="basic-addon1" name="pays">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Mot de passe</span>
        <input type="password" class="form-control" placeholder="mot de passe" aria-label="password"
          aria-describedby="basic-addon2" name="password">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Confirmation du mot de passe</span>
        <input type="password" class="form-control" placeholder="confirmation du mot de passe" aria-label="passwordConfirmed"
          aria-describedby="basic-addon2" name="passwordConfirmed">
      </div>
      <button class="btn btn-outline-success" type="submit">S'inscrire</button>
    </form>
  </main>
  <br><br><br>
</body>

<?php
include './inc/footer.inc.php';
?>