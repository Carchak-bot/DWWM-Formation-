<?php

$tab=array();
$i=0;
$n=0;
$moy=0;
$som=0;
$nbEleves=0;

print "Combien d'élèves ?";
print PHP_EOL;
$nbEleves=readline(" ");
for($i=0;$i<($nbEleves);$i++) {
    print "Note numéro ";
    print ($i+1);
    print " : ";
    $tab[$i]=readline(" ");
    print PHP_EOL;
}
print PHP_EOL;
print "Les notes sont : ";
print PHP_EOL;
for($i=0;$i<($nbEleves);$i++) {
    print $tab[$i];
    print " / ";
}
print PHP_EOL;
for($i=0;$i<($nbEleves);$i++) {
    $som=$som+$tab[$i];
}
print PHP_EOL;
print "La moyenne de la classe est égale à : ";
$moy=$som/$nbEleves;
print $moy;
?>