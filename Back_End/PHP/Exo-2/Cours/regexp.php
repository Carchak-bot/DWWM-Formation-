<?php
/* expression régulière */
/*
	AL-999-MP
	1600 SG 49

*/



$saisie=readline();

print preg_match('/^([A-Z]{2})-([0-9]{3})-([A-Z]{2})$/', $saisie);
print PHP_EOL;
print preg_match('/^([0-9]{4}) ([A-Z]{2,3}) ([0-9]{2,3})$/', $saisie);


?>