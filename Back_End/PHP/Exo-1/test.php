<?php

$chiffreDepart=1;
$i=0;
$chiffre1=0;
$terminado="";
$prixAPAyer=0;
$billet=0;
$billet10=0;
$billet5=0;
$billet1=0;
$rBillet10=0;
$rBillet5=0;
$rBillet1=0;

while($terminado!="Y") {
    $i=$i+1;
    print "Prix du produit numéro ";
    print $i;
    print " : "
    $chiffreDepart=readline();
    $chiffre1=$chiffre1+$chiffreDepart;
    print "Avez vous terminé ?";
    $terminado=readline("Saisir du texte");
}

print "Le prix total est : ";
print $chiffre1;
print "Go don l'argent que tu dois !";
$billet=readline("Entrez le total donné");

?>