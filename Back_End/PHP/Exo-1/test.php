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
    print " : ";
    $chiffreDepart=readline();
    $chiffre1=$chiffre1+$chiffreDepart;
    print "Avez vous terminé ?";
    $terminado=readline(" ");
}

print "Le prix total est : ";
print $chiffre1;
print PHP_EOL;
print "Go don l'argent que tu dois ! ";
print PHP_EOL;
$billet=readline("Entrez le total donné : ");
$prixAPAyer=$billet-$chiffre1;
print PHP_EOL;

if ($prixAPAyer<0){
    print " Pas assez de moulagah la ho ! Donne plus ! ";
} else {
    print "Caissière tu as besoin de rendre : ";
    print $prixAPAyer;
    print " euros donc : ";
    $billet10=floor($prixAPAyer/10);
    $rBillet10=$prixAPAyer%10;
    print $billet10;
    print " Billets de 10, reste ";
    print $rBillet10;
    print PHP_EOL;
    $billet5=floor($rBillet10/5);
    $rBillet5=$rBillet10%5;
    print $billet5;
    print " Billets de 5,reste ";
    print $rBillet5;
    print PHP_EOL;
    $billet1=floor($rBillet5/1);
    $rBillet1=$rBillet5%1;
    print $billet1;
    print " pièces de 1, reste ";
    print $rBillet1;
}




?>