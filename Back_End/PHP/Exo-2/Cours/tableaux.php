<?php 
	/* déclaration des tableaux */
	$tableau=array();
	
	/* ajout */
	$tableau[]="Marjorie";
	$tableau[]="Jérôme";
	$tableau[]="Alexis";
	
	//print_r($tableau);
	
	$tableau1=array(12,13,5,6);
	//print_r($tableau1);
	
	$tableau2=["Aveyron","Loire-Atlantique","Calvados"];

	/* ajout */
	array_push($tableau2,"Picardie");
		
	//print_r($tableau2);
	
	/* fonctions sur les tableaux */
	//tri croissant
	sort($tableau2);
	//print_r($tableau2);
	//tri décroissant
	rsort($tableau2);
	//print_r($tableau2);
	
	$saisie=readline();
	/* recherche de valeurs sur un tableau à une dimension */
	if (in_array($saisie,$tableau2)==true) {
		print "Gagné";
	} else {
		print "Perdu";
	}
	
	
	
	
	//print_r($tableau2);

	/* parcourir un tableau. pour chaque */
	foreach($tableau2 as $element) {
		//concaténation de la valeur du tableau et un retour à la ligne */
		print "Département : ".$element.PHP_EOL;
	}
	print $tableau2[0];
	/* tableau associatif tableau clé - valeur */
	$tab=array();
	
	$tab["Stagiaire1"]="Mélanie";
	$tab["Stagiaire2"]="Clément";
	$tab["Stagiaire3"]="Lucas";
	
	print $tab["Stagiaire1"];
	
	foreach($tab as $key=>$value) {
		print $key." ".$value;
	}
	
	if (array_key_exists("Stagiaire1",$tab)==true) {
		print "Stagiaire1 est dans tableau";
	}
	
	/* tableau multidimensionnel */
	$t=[
		[
			"prenom"=>"Jérôme",
			"emails" => [
				"toto@gmail.com",
				"jl@outlook.com"
			]
		],
		[
			"prenom"=>"Jérômina",
			"emails" => [
				"toto1@gmail.com",
				"jl1@outlook.com"
			]
		]
	
	];
	print_r($t);
	print $t[0]["emails"][0];
	print PHP_EOL;
	print implode(",",$t[0]["emails"]);
	print implode(",",$t[1]["emails"]);
	print PHP_EOL;
	foreach($t as $value) {
			print implode(",",$value["emails"]);
			print PHP_EOL;
	}
	
?>