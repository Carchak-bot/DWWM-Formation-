<?php

/*DD-MM-YY

timestamp temps UNIX nombre de secondes écoulées depuis le 01/01/1970

https://www.php.net/manual/fr/datetime.format.php

*/
/*print time();
print PHP_EOL;
print date("W d-m-Y");*/




/* Déclaration de la fonction age */
/* Le code qui est dedans est plutôt pour les versions 4, 5, 6 de PHP*/
/* qui prend en paramètre une date de naissance et qui retourne l'âge en nombre d'années */
function age($datenaissance) {
	$diff=time()-strtotime($datenaissance);
	return intval(($diff/(3600*24*365.25)));	
}

/* Déclaration de la fonction age */
/* Le code qui est dedans est plutôt pour les versions 7 et après de PHP*/
/* qui prend en paramètre une date de naissance et qui retourne l'âge en nombre d'années */

function age2($datenaissance) {
	$date = DateTimeImmutable::createFromFormat("d/m/Y", $datenaissance);
	$today=new DateTime('now');
	$interval = $today->diff($date);
	return $interval->format("%Y");
}

// date de naissance
$saisie=readline("Date de naissance (Y-m-d)");
print age($saisie);
$saisie=readline("Date de naissance (d/m/Y)");
print age2($saisie);
?>