<?php

$prenom="jerome";

print $prenom[0];
//nombre de caractères de la chaîne (non accentués)
print strlen($prenom);


$prenom1="Jérôme";
//nombre de caractères de la chaîne (accentués)
print iconv_strlen($prenom1);

//Mettre en majuscule la première lettre de la chaîne
print ucfirst($prenom);

//Mettre en majuscule (non accentués)
print strtoupper($prenom1);

//Mettre en majuscule (accentués)
print mb_strtoupper($prenom1);

//Mettre en minuscule (non accentués)
print strtolower($prenom);

//Mettre en minuscule (accentués)
print mb_strtolower($prenom1);

// trouver un caractère dans une chaîne
print strstr("toto@gmail.com","@");

//trouver la position d'un caractère dans une chaîne

print strpos("toto@gmail.com","@");
// variantes stripos (insensible à la casse) strripos (chercher à partir de la fin de la chaîne)

//découpe de la chaine en mettant la position de départ et la position de fin
print substr("toto@gmail.com",0,4);

print PHP_EOL;

// nettoie les espaces, tabulations, caractères vides en début et fin de chaîne
$chaine="       toto  ";
print trim($chaine);

print PHP_EOL;

// remplace un caractère dans une chaîne
print str_replace("@","-","toto@gmail.com");

// remplace plusieurs caractères dans une chaîne
print str_replace(array("@","g"),array("-","-"),"toto@gmail.com");

// explose une chaîne en morceau par rapport à un séparateur
$tableau=explode(", ","La vie est belle, il fait beau et chaud, vivement les tongues");
print_r($tableau);

print PHP_EOL;

// un tout petit peu de cryptage
print md5("test");

print PHP_EOL;

print sha1("test");

print PHP_EOL;

print password_hash("test", PASSWORD_BCRYPT);

print PHP_EOL;

print password_hash("test", PASSWORD_ARGON2I);


?>