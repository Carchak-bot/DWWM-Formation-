<?php
print "<b> Votre nom est : </b>". "<br>";
print $_POST["nomPrenom"]. "<br>";
print "<br>";
print "<b> Votre e-mail est : </b>". "<br>";
print $_POST["email"]. "<br>";
print "<br>";
print "<b> Votre numéro de téléphone est : </b>". "<br>";
print $_POST["telephone"]. "<br>";
print "<br>";
print "<b> Vous avez commenté : </b>". "<br>";
print $_POST["commentaire"]. "<br>";
print "<br>";
print "<b> Vous souhaitez être contacté par : </b>". "<br>";
print $_POST["comPref"]. "<br>";
print "<br>";
print "<b> De préférence le / les : </b>". "<br>";
if (isset($_POST['pref'])) {          
    foreach ($_POST['pref'] as $valeur) {         
        echo $valeur . "<br>";     } }
print $_POST["hpref"]. "<br>";
?>