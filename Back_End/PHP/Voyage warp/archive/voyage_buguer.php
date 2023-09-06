<?php

// Variables inclues

require "variables.php";
require "fonctions.php";

//______________________________________________________________________________________________
// Début Programme

print "<b>Coté MJ :</b> <br>";

//Prise en compte du champs de Geller endommagé

if ((isset($_POST["gellarFieldDamaged"])) &&
 ($_POST["gellarFieldDamaged"]==true)) {
    $route=rand(1, 10);
    $routegellarfieldDamaged=rand(1, 10);
    if ($routegellarfieldDamaged >= $route) {
        $route=$routegellarfieldDamaged;
    } 
 } else {
    $route=rand(1, 10);
}

//Calcul de la durée de voyage initiale
 // test switch
 switch ($route) {
    case 1:
    case 2:
    case 3:
        echo "Route Stable. Dans le futur le navigateur aura un bonus de +10 
        pour tracer cette route. <br>";
        $routemultiple = 1;
        break;
    case 4:
    case 5:
        echo "Chemin Indirect. <br>";
        $routemultiple = 2;
        break;
    case 6:
        echo "Passage Hanté. <br>";
        $routemultiple = 2;
        break;
    case 7:
        echo "Passage Hargneux. <br>";
        $routemultiple = 2;
        break;
    case 8:
        echo "Piste Intraçable. <br>";
        $routemultiple = 2;
        break;
    case 9:
        echo "Passage sans lumières. <br>";
        $routemultiple = 2;
        break;
    case 10:
        echo "Route Byzantine. <br>";
        $routemultiple = 3;
        break;
 }

$duree=rand(1, 10);

switch ($route) {
    case 1:
    case 2:
        $dureefinale=rand(1, 5);
        break;
    case 3:
    case 4:
        $dureefinale=(rand(1, 5)+5);
        break;
    case 5:
    case 6:
        $dureefinale=(rand(2, 20)+10);
        break;
    case 7:
    case 8:
        $dureefinale=(rand(3, 30)+50);
        break;
    case 9:
        $dureefinale=(rand(4, 40)+150);
        break;
    case 10:
        $dureefinale=(rand(5, 50)+250);
        break;
 }


//Prise en compte du type de route sur la durée du voyage basique

$tempstrajet=($dureefinale*$routemultiple);

if ((isset($_POST["warpEngineDamaged"])) &&
 ($_POST["warpEngineDamaged"]==true)) {
    $tempstrajettheorique=($tempstrajet*2);
} else {
    $tempstrajettheorique=$tempstrajet;
}

print "La durée de base était de ";
print $dureefinale;
print " Jours. <br>";

//Prise en compte du moteur warp endommagé

if ((isset($_POST["warpEngineDamaged"])) &&
 ($_POST["warpEngineDamaged"]==true)) {
    print "Pour un total théorique de ";
    print $tempstrajettheorique;
    print " Jours. Dûs aux moteurs warp endommagés. <br> <br>";
} else {
    print "Pour un total théorique de ";
    print $tempstrajettheorique;
    print " Jours. <br> <br>";
}

print "<b>Coté PJ :</b> <br>";

if ((isset($_POST["navigator"])) &&
($_POST["navigator"]==true)) {
    //Coté ou il y a un navigateur pour guider le vaisseau

    $psyniscienceCheck1=rand(1, 100);
    if ($_POST["psyniscience"]=="psyniscienceT") {
        $psyniscienceCheck1result=($_POST["per"]-$psyniscienceCheck1);
        if ($psyniscienceCheck1result>=0) {
            $psyniscienceCheck1resultfinal=(($psyniscienceCheck1result/10)+(floor($_POST["perSurnat"]/2)));
            print "Les augures sont bien interprêtés, le navigateur et sa suite peuvent avoir accès au résultat
             du calcul de la durée du voyage Warp. <br>";
            print "Les augures sont interprêtés avec ";
            print $psyniscienceCheck1resultfinal;
            print " degrés de réussites. <br><br>";
        }
    } else {
        $psyniscienceCheckFailed=rand(1, 5);
        if ($psyniscienceCheckFailed==1) {
            $dureeEronner=($tempstrajettheorique*2);

        }
    }

} else {
    // Coté ou il n'y a pas de Navigateurs pour guider le vaisseau

    $translationHardcore=rand(1, 10);
    if ($translationHardcore >= 6) {
        print "Vous entrez dans le warp en pleine tempête warp. <br>";
        print tempete($_POST["gellarFieldDamaged"],$_POST["gellarFieldOffline"]);
        print "<br>";
    }
    $tempstrajetabsolu=($tempstrajettheorique*4);
    print "De part le manque de navigateur le voyage va durer ";
    print $tempstrajetabsolu;
    print "jours. <br> <br>";

    // Calcul du nombre de rencontres Warp

    $rencontresNombre=floor($tempstrajetabsolu/$frequenceRencontre);
    print "Il y aura ";
    print $rencontresNombre;
    print " rencontres Warp durant ce voyage. <br> <br>";

    if (($handle3 = fopen("rencontresWarp.csv", "r")) !== FALSE) {
        while (($dataRencontres = fgetcsv($handle3, 50000, ";")) !== FALSE) {
            for ($i = 1; $i <= $rencontresNombre; $i++){
                $rencontresTirage=rand(1, 100);
                print "[";
                print $rencontresTirage;
                print "] ";
                if (($rencontresTirage >= $dataRencontres[1]) && ($rencontresTirage <= $dataRencontres[2])) {
                    print $dataRencontres[1];
                    print $dataRencontres[3];
                }
                if (($rencontresTirage >= $dataRencontres[1]) && ($rencontresTirage <= $dataRencontres[2])) {
                    print $dataRencontres[1];
                    print $dataRencontres[3];
                }
                if (($rencontresTirage >= $dataRencontres[1]) && ($rencontresTirage <= $dataRencontres[2])) {
                    print $dataRencontres[1];
                    print $dataRencontres[3];
                    print incursion($_POST["gellarFieldOffline"],$_POST["gellarFieldDamaged"]);
                }
                if (($rencontresTirage >= $dataRencontres[1]) && ($rencontresTirage <= $dataRencontres[2])) {
                    print $dataRencontres[3];
                }
                if (($rencontresTirage >= $dataRencontres[1]) && ($rencontresTirage <= $dataRencontres[2])) {
                    print $dataRencontres[3];
                }
                if (($rencontresTirage >= $dataRencontres[1]) && ($rencontresTirage <= $dataRencontres[2])) {
                    print $dataRencontres[3];
                    print tempete($_POST["gellarFieldDamaged"],$_POST["gellarFieldOffline"]);
                }
                if (($rencontresTirage >= $dataRencontres[1]) && ($rencontresTirage <= $dataRencontres[2])) {
                    print $dataRencontres[3];
                    print recifs($_POST["gellarFieldDamaged"],$_POST["gellarFieldOffline"]);
                }
                if (($rencontresTirage >= $dataRencontres[1]) && ($rencontresTirage <= $dataRencontres[2])) {
                    print $dataRencontres[3];
                    print breche();
                }
                if (($rencontresTirage >= $dataRencontres[1]) && ($rencontresTirage <= $dataRencontres[2])) {
                    print $dataRencontres[3];
                    $severlyOffCourse=1;
                }
                if ($rencontresTirage >= $dataRencontres[2]) {
                    print $dataRencontres[3];
                    $severlyOffCourse=1;
                }
                //_______________ test switch _______________________
                switch (true) {
                    case (($rencontresTirage>=$dataRencontres[1]) && ($rencontresTirage<=$dataRencontres[2])):
                        print $dataRencontres[1];
                        print $dataRencontres[3];
                        break;
                }
                print "<br>";
            }
        }
    }

    // Le vaisseau sort du Warp sans Navigateurs
    if ($severlyOffCourse==1) {
        $reEntry=(rand(1, 100)+40+75);
    } else {
        $reEntry=rand(1, 100)+75;
    }

    if (($reEntry >= 1) && ($reEntry <= 25)) {
        print "Vous sortez du Warp avec un décallage de ";
        $realSpaceDays=rand(1, 5);
        print " jours de voyage d'espace réel de votre destination.";
    }
    if (($reEntry >= 26) && ($reEntry <= 50)) {
        print "Vous sortez du Warp avec un décallage de ";
        $realSpaceDays=rand(1, 10);
        print " jours de voyage d'espace réel de votre destination.";
    }
    if (($reEntry >= 51) && ($reEntry <= 75)) {
        print "Vous sortez du Warp au niveau de la localisation la plus proche avoisinant la destination.";
    }
    if (($reEntry >= 76) && ($reEntry <= 100)) {
        print "Vous sortez du Warp au niveau d'une localisation choisie au hasard avoisinant la destination dans la même région.";
    }
    if (($reEntry >= 101) && ($reEntry <= 120)) {
        print "Vous sortez du Warp au niveau d'une localisation choisie au hasard dans une région choisie au hasard 
        avoisinant votre destination.";
    }
    if (($reEntry >= 121) && ($reEntry <= 140)) {
        print "Vous sortez du Warp au niveau d'une localisation choisie au hasard dans une région choisie au hasard 
        dans le même secteur. ";
        $realSpaceDays=rand(1, 5);
        $beforeAfter=rand(0, 1);
        if ($beforeAfter==1) {
            print $realSpaceDays;
            print " ans après votre départ.";
        }
        if ($beforeAfter==0) {
            print $realSpaceDays;
            print " ans avant votre départ.";
        }
    }
    if ($reEntry >= 141) {
        print "Le vaisseau est perdu dans le Warp ! L'option la plus facile est pour le MJ de statuer que le vaisseau soit disparu
        à tout jamais. Cependant s'il se sent capable de la tache, il peut dire qu'il réapparait dans un endroit complètement
        différent de la galaxie, peut être quelques centaines voir milliers d'années dans le passé ou le futur- même si celà pourrait
        dérailler sévèrement la campagne.";
    }
}

?>