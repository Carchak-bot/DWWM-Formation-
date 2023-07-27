<?php
	$chaine="bonjour";
	
	//Mettre en majuscule une chaîne de caractères
	print strtoupper($chaine);
	//Mettre en minuscule une chaîne de caractères
	print strtolower($chaine);
	//Mettre la première la lettre en majuscule
	print ucfirst($chaine); 
	//Mettre la première lettre des mots en majuscule
	print ucwords($chaine);
	print PHP_EOL;
	//donne la position du mot dans la chaine dev
	print strpos("Le dev c'est super bien","dev");
	print PHP_EOL;
	//donne l'extrait de la phrase à partir du mot recherché
	print strstr("Le dev c'est super bien","dev");
	
	$chaine="Le dev c'est super bien";
	// explose la chaine en mettant dans un tableau et chaque case un des mots
	// cette explosion est réalisée par rapport au caractère espace
	$tableau=explode(" ",$chaine);
	
	print_r($tableau);
	
	$date="27/07/2023";
	
	$tableau=explode("/",$date);
	
	print_r($tableau);
	
	$chaine="Le dev c'est super bien";
	//remplace les espaces par une virgule dans une chaîne
	print str_replace(" ",",",$chaine);

	//enlève les espaces en début et fin de chaîne
	$chaine="      Le dev c'est super bien ";
	print trim($chaine);
	
	print PHP_EOL;
	/* cryptage */
	$password="Duf0-!Aub5";
	print md5($password);
	print PHP_EOL;
	print sha1($password);
	print PHP_EOL;
	print password_hash($password,PASSWORD_ARGON2I );
	print PHP_EOL;
	print password_hash($password,PASSWORD_BCRYPT  );
	
?>