<?php
print "Votre nom est : ". "<br>";
print $_POST["nomPrenom"]. "<br>";
print PHP_EOL. "<br>";
print "Votre e-mail est : ". "<br>";
print $_POST["email"]. "<br>";
print PHP_EOL. "<br>";
print "Votre numéro de téléphone est : ". "<br>";
print $_POST["telephone"]. "<br>";
print PHP_EOL. "<br>";
print "Vous avez commenté : ". "<br>";
print $_POST["commentaire"]. "<br>";
print PHP_EOL. "<br>";
print "Vous souhaitez être contacté par : ". "<br>";
print $_POST["comPref"]. "<br>";
print PHP_EOL. "<br>";
print "De préférence le / les : ". "<br>";
if (isset($_POST['pref'])) {          
    foreach ($_POST['pref'] as $valeur) {         
        echo $valeur . "<br>";     } }
print $_POST["hpref"]. "<br>";
?>