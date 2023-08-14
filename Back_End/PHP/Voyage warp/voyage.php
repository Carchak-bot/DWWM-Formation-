<?php

$route=0;
$routegellarfieldDamaged=0;
$routemultiple=0;
$duree=0;
$dureefinale=0;

$tempstrajet=0;
$tempstrajettheorique=0;
$tempstrajetabsolu=0;

$psyniscienceCheck1=0;
$psyniscienceCheck1result=0;
$psyniscienceCheck1resultfinal=0;

$frequenceRencontre=5;
$rencontresNombre=0;
$rencontres=array();
$rencontresTirage=0;
$incursionsWarp=0;
$hallucinationsWarp=0;
$rencontresDescription=" ";

$translationHardcore=0;

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

if ($route == 1 | $route == 2 | $route == 3)  {
print "Route Stable. Dans le futur le navigateur aura un bonus de +10 
pour tracer cette route. <br>";
$routemultiple = 1;
} 

if ($route == 4 | $route == 5) {
print "Chemin Indirect. <br>";
$routemultiple = 2;
}

if ($route == 6) {
print "Passage Hanté. <br>";
$routemultiple = 2;
}

if ($route == 7) {
print "Passage Hargneux. <br>";
$routemultiple = 2;
}

if ($route == 8) {
print "Piste Intraçable. <br>";
$routemultiple = 2;
}

if ($route == 9) {
print "Passage sans lumières. <br>";
$routemultiple = 2;
}

if ($route == 10) {
print "Route Byzantine. <br>";
$routemultiple = 3;
}



$duree=rand(1, 10);
if ($duree == 1 | $duree == 2) {
    $dureefinale=rand(1, 5);
}

if ($duree == 3 | $duree == 4) {
    $dureefinale=(rand(1, 5)+5);
}

if ($duree == 5 | $duree == 6) {
    $dureefinale=(rand(2, 20)+10);
}

if ($duree == 7 | $duree == 8) {
    $dureefinale=(rand(3, 30)+50);
}

if ($duree == 9 ) {
    $dureefinale=(rand(4, 40)+150);
}

if ($duree == 10 ) {
    $dureefinale=(rand(5, 50)+250);
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
    }





} else {
    // Coté ou il n'y a pas de Navigateurs pour guider le vaisseau

    $translationHardcore=rand(1, 10);
    if ($translationHardcore >= 6) {
        print "Vous entrez dans le warp en pleine tempête warp. <br>";
    }
    $tempstrajetabsolu=($tempstrajettheorique*4);
    print "De part le manque de navigateur le voyage va durer ";
    print $tempstrajetabsolu;
    print "jours. <br> <br>";

    $rencontresNombre=floor($tempstrajetabsolu/$frequenceRencontre);
    print "Il y aura ";
    print $rencontresNombre;
    print " rencontres Warp durant ce voyage. <br> <br>";

    for ($i = 1; $i <= $rencontresNombre; $i++){
        $rencontresTirage=rand(1, 100);
        print $rencontresTirage;
        if (($rencontresTirage >= 31) && ($rencontresTirage <= 40)) {
            print "Prédateurs psychiques ! <br>";
            /* Si cet effet se manifeste à bord d'un vaisseau, 
            rouler une fois les dés sur la <b>table 2-8 Incursions Warp</b> (voir page 33)
            et appliquez le résultat. Réduisez le résultat du lancé de dé par -30 si le champs de 
            Geller est complètement fonctionnel (jusqu'à un minimum de 01). Ajoutez +30 au résultat
            du jet si le champs de Geller est éteins. */
            $incursionsWarp=rand(1, 100);
            if ((isset($_POST["gellarFieldOffline"])) &&
            ($_POST["gellarFieldOffline"]==true)) {
                $incursionsWarp=$incursionsWarp+30;
            }

            if ((isset($_POST["gellarFieldDamaged"])) &&
            ($_POST["gellarFieldDamaged"]==false)) {
                $incursionsWarp=floor($incursionsWarp-30);
            }
            print $incursionsWarp;

            if (($incursionsWarp >= 0) && ($incursionsWarp <= 20)) {
                print "Swarming Malice !";
            }
            if (($incursionsWarp >= 21) && ($incursionsWarp <= 40)) {
                print "Possession !";
            }
            if (($incursionsWarp >= 41) && ($incursionsWarp <= 60)) {
                print "Plague of Madness !";
            }
            if (($incursionsWarp >= 61) && ($incursionsWarp <= 80)) {
                print "Daemonic Incursion !";
            }
            if (($incursionsWarp >= 81) && ($incursionsWarp <= 90)) {
                print "Warp Sickness !";
            }
            if (($incursionsWarp >= 91) && ($incursionsWarp <= 100)) {
                print "Warp Monster !";
            }
        }
        print "<br>";
    }
}

?>