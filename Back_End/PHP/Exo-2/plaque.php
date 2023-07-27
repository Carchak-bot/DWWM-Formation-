<?php

// Plaques d'imatriculations

$plaque=readline("Plaque d'immatriculation tout attaché : ");

function valideNir($nir){
$regexp = '/^([a-zA-Z]{2})-([0-9]{3})-([a-zA-Z]{2})
$/';
return preg_match($regexp, $nir) > 0;
}

$verif=valideNir($plaque);
if ($verif==true) {
print "bien";
} else {
print "pas bien";
}

?>