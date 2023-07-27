<?php
$secusoc=readline('Entrez votre numéro de sécuritée sociale sous cette forme (XXXXXXXXXXXXXXX) : ');
function valideNir($nir){
 $regexp = '/^
 ([1-37-8])
 ([0-9]{2})
 (0[0-9]|[2-35-9][0-9]|[14][0-2])
 ((0[1-9]|[1-8][0-9]|9[0-69]|2[abAB])(00[1-9]|0[1-9][0-9]|[1-8][0-9]{2}|9[0-8][0-9]|990)|(9[78][0-9])(0[1-9]|[1-8][0-9]|90))
 (00[1-9]|0[1-9][0-9]|[1-9][0-9]{2})
 (0[1-9]|[1-8][0-9]|9[0-7])
 $/x';
 return preg_match($regexp, $nir) > 0;
}
$verif=valideNir($secusoc);
if ($verif==true) {
print "bien";
} else {
print "pas bien";
}
?>