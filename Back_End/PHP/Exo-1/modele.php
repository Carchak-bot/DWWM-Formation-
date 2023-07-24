<?php
//AFFECTER valeur à variable et DECLARER
$i=0;
$prenom="Jérôme";
$tableau=array();

$tableau[]="Mehdi";
$tableau[]="Benoit";

print_r($tableau);

for($j=0;$j<10;$j++) {
    //AFFICHER variable
    print $j;
    print PHP_EOL; //retour à la ligne
}
//LIRE
$saisie=readline("Saisie d'un prénom");

if ($saisie!="Jérôme") {
    print "tu es un stagiaire";
} else {
    print "tu es un formateur";
}

while($saisie!="test") {
    print "Perdu";
    $saisie=readline("Saisie d'un texte");
}
print "Gagné";
?>