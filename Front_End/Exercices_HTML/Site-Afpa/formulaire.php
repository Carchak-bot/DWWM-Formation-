<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Give me DATA</title>
    <link rel="stylesheet" href="formulairestyle.css">
</head>
<body>
    <main>
        <header>
            <img
            src="media/LOGO-AFPA-VERT-PNG.png"
            alt="logo"
            width="240"
            height="120"
          />
        </header>
        <form class="wrapper" action="recupformulaire.php" method="POST">
            <div class="one">
                <input class="barrestranspa" type="text" minlength="5" title="Minimum trois caractères" name="nomPrenom" placeholder="NOM / Prénom" required><br>
                <br>
                <input class="barrestranspa" type="email" name="email" placeholder="Courriel" required><br>
                <br>
                <input class="barrestranspa" type="text" pattern="[0-9]{10}" title="Minimum 10 chiffres" name="telephone" placeholder="Téléphone" required><br>
                <br>
                <select class="barrestranspa" required>
                    <option name="poste" value="" selected disabled>Vous êtes...</option>
                    <option name="poste" value="dirsys">Directeur du Système d'Information</option>
                    <option name="poste" value="dev">Développeur</option>
                    <option name="poste" value="chefdeprojet">Chef de projet</option>
                    <option name="poste" value="autre">Un Pingouin</option>
                </select><br>
                <br>
                <textarea class="barrestranspa" name="commentaire" id="commentaires" cols="30" rows="5" placeholder="Vos Commentaires" value="commentaires"></textarea>
            </div>
            <div class="two">
                <h4>Quelles est la meilleure manière de vous contacter ?</h4>
                <label for="Telephone"></label><input id="tel" name="comPref" type="radio" value="Telephone" required> Téléphone<br>
                <label for="Courriel"></label><input id="courriel" name="comPref" type="radio" value="Courriel" required> Courriel<br>
                <br>
                <h4>Jours de la semaine ou vous êtes disponible :</h4>
                <input name="pref[]" type="checkbox" value="Lundi"> Lundi<br>
                <input name="pref[]" type="checkbox" value="Mardi"> Mardi<br>
                <input name="pref[]" type="checkbox" value="Mercredi"> Mercredi<br>
                <input name="pref[]" type="checkbox" value="Jeudi"> Jeudi<br>
                <input name="pref[]" type="checkbox" value="Vendredi"> Vendredi<br>
                <br>
                <h4>Heure appropriée pour un rendez-vous ?</h4>
                <input name="hpref" type="checkbox" value="matin"> Matin<br>
                <input name="hpref" type="checkbox" value="aprem"> Après-Midi<br>
            </div>
            <hr class="three">
            <button class="four" type="submit">Envoyer</button>
        </form>
    </main>    
</body>
</html>