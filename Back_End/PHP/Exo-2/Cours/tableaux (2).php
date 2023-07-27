<?php

	$tableau=array("Jérôme","Mathilde","Eleonore");
	
	$tableau2=[
		"Léa",
		"Céline",
		"Winnie"
	];
	/* construire une chaîne de caractères à partir des éléments du tableau avec le séparateur virgule */
	print implode(",",$tableau2);
	
	$tableau3=array(3,6,5,8);
	
	$tableau2=[
		6,
		1,
		3
	];
	
	sort($tableau);
	rsort($tableau);
	print_r($tableau);
	/* renvoie true (1) ou false (0 ou rien)*/
	print in_array("Mathilde",$tableau);

	/* ajout de carole dans le tableau2 */
	array_push($tableau2,"Carole");
	$tableau2[]="Carole";


	/* tableaux associatifs ou tableaux clé valeur */
	$tableau4=array();
	$tableau4["Stagiaire1"]="Jérôme";
	$tableau4["Stagiaire2"]="Léa";
	
	print $tableau4["Stagiaire1"];
	
	foreach($tableau4 as $key=>$value) {
		print $key;
		print $value;
	}
	
	
	$stagiaires=[
		[
			"nom"=>"M",
			"prenom"=>"Léo",
			"matricule"=>"025454"
		],
		[
			"nom"=>"B",
			"prenom"=>"Charles",
			"matricule"=>"0566454"
		],
	];
	print PHP_EOL;
	$saisie=readline("");
	foreach($stagiaires as $stagiaire) {
		if ($stagiaire["prenom"]==$saisie) {
			print $stagiaire["matricule"];
		}
	}
	
	print_r($stagiaires);
	

?>