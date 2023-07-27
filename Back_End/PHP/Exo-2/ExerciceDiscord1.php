<?php
$passeport=readline('Entrez votre numéro de passeport sous cette forme (XXYYXXXXX) : ');
function valideNir($nir){
 $regexp = '/^
 ([0-9]{2})
 ([A-Z]{2})
 ([0-9]{5})
 $/x';
 return preg_match($regexp, $nir) > 0;
}
$verif=valideNir($passeport);
if ($verif==true) {
print "bien";
} else {
print "pas bien";
}
?>