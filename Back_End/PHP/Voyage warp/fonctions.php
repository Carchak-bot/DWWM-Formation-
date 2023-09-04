<?php
//____________________________________________________________________________________________
// Fonction Rencontres Warp :
/*
$rencontresNombre=floor($tempstrajetabsolu/$frequenceRencontre);
    print "Il y aura ";
    print $rencontresNombre;
    print " rencontres Warp durant ce voyage. <br> <br>";

    for ($i = 1; $i <= $rencontresNombre; $i++){
        $rencontresTirage=rand(1, 100);
        print "[";
        print $rencontresTirage;
        print "] ";
        if (($rencontresTirage >= 1) && ($rencontresTirage <= 20)) {
            print "Tout va bien. Le navigateur peut tenter de localiser l'Astronomican à nouveau tandis que tout
             personnages souffrant d'halucinations warp peut essayer de s'en débarasser à nouveau. <br>";
        }
        if (($rencontresTirage >= 21) && ($rencontresTirage <= 30)) {
            print "Mirage de désillusion. Chaque explorateur et PNJ importants à bord doivent faire un test de Force Mentale (+0) et le réussir.
             Sinon ils seront affectés par une hallucination warp choisie au hasard. Si le champs de Geller est opérationnel chaques personnages
             reçoivent un bonus de (+30) au test de Force Mentale. S'il ne l'est pas le test subit un malus de (-30) à la place. <br>";
        }
        if (($rencontresTirage >= 31) && ($rencontresTirage <= 40)) {
            print "Prédateurs psychiques ! <br> Si cet effet se manifeste à bord d'un vaisseau, rouler une fois les dés sur la 
            <b>table 2-8 Incursions Warp</b> (voir page 33) et appliquez le résultat. Réduisez le résultat du lancé de dé par -30 si 
            le champs de Geller est complètement fonctionnel (jusqu'à un minimum de 01). Ajoutez +30 au résultat du jet si le champs 
            de Geller est éteins. <br>";
            print incursion($_POST["gellarFieldOffline"],$_POST["gellarFieldDamaged"]);
        }
        if (($rencontresTirage >= 41) && ($rencontresTirage <= 50)) {
            print "Stase ! <br> Si le navigateur ne peut pas guider le vaisseau pour éviter cette rencontre, le vaisseau se coince 
            dans une fissure Warp avant de dériver une fois libéré, ajoutant 1d5 jours au voyage. <br>";
        }
        if (($rencontresTirage >= 51) && ($rencontresTirage <= 60)) {
            print "Combustion Inhumaine spontanée ! <br> Le MJ choisit un des composants du vaisseau lors de cette rencontre. Celui 
            ci prend immédiatement feu de manire inexpliquée. Voir les règles sur les incendies p.222 du livre de base. <br>";
        }
        if (($rencontresTirage >= 61) && ($rencontresTirage <= 70)) {
            print "Tempête Warp ! <br> Si le Navigateur ne peut pas guider le vaisseau pour éviter cette rencontre, le vaisseau 
            est donc frappé de plein fouet par une tempête Warp. <br>";
            print tempete($_POST["gellarFieldDamaged"],$_POST["gellarFieldOffline"]);
        }
        if (($rencontresTirage >= 71) && ($rencontresTirage <= 80)) {
            print "Récifs Aethériques ! <br> Si le Navigateur ne peut pas guider ce vaisseau pour éviter cette rencontre, 
            la coque du vaisseau sera érraflée par des morceaux tordus et coupants de la fausse réalité. <br>";
            print recifs($_POST["gellarFieldDamaged"],$_POST["gellarFieldOffline"]);
        }
        if (($rencontresTirage >= 81) && ($rencontresTirage <= 90)) {
            print "Brèche Warp ! <br> Si le Navigateur ne peut pas contourner cette rencontre, le vaisseau s'enfonce dans 
            une nébuleuse de non-réalitée. <br>";
            print breche();
        }
        if (($rencontresTirage >= 91) && ($rencontresTirage <= 100)) {
            print "Trou temporel ! <br> Si le Navigateur ne peut pas diriger le vaisseau dans une autre direction que celle de cette 
            rencontre, le vaisseau est aspiré en dehors du Warp et reviens dans la réalité. Il faut se référer à <b>Sortir du Warp</b> page 34 <br>";
            $severlyOffCourse=1;
        }
        if ($rencontresTirage >= 100) {
            print "Trou temporel ! <br> Si le Navigateur ne peut pas diriger le vaisseau dans une autre direction que celle de cette 
            rencontre, le vaisseau est aspiré en dehors du Warp et reviens dans la réalité. Il faut se référer à <b>Sortir du Warp</b> page 34 <br>";
            $severlyOffCourse=1;
        }
        print "<br>";
    }
   */ 
// Fonction Tempête Warp :

function tempete($gellarFieldDamaged,$gellarFieldOffline) {
    if ((isset($gellarFieldDamaged)) &&
    ($gellarFieldDamaged==true)) {
        $dgtsCrits=rand(1, 10);
    } else {
        $dgtsCrits=rand(1, 10);
        $d10=rand(1, 10);
        if ($dgtsCrits <= $d10) {
            $dgtsCrits=$d10;
        }
    }
    if ((isset($gellarFieldOffline)) &&
    ($gellarFieldOffline==true)) {
        $dgtsCrits=rand(1,10);
        $dgtsCrits=$dgtsCrits+2;
    } else {
        $dgtsCrits=rand(1, 10);
        $d10=rand(1, 10);
        if ($dgtsCrits <= $d10) {
            $dgtsCrits=$d10;
        }
    }
    $text= "Le vaisseau va subir ";
    $text.= "<b>";
    $text.= $dgtsCrits;
    $text.= "</b>";
    $text.= " de dégâts critiques. Il faut se référer à la page 222 du livre de base au tableau des dégâts critiques.";
    return $text;
}

// Fonction Récifs Aethériques ____________________________________________________

function recifs($gellarFieldDamaged,$gellarFieldOffline) {
    if ((isset($gellarFieldDamaged)) &&
    ($gellarFieldDamaged==true)) {
        $dgts=(rand(2, 20)+3);
    } else {
        $dgts=(rand(1, 10)+2);
    }
    if ((isset($gellarFieldOffline)) &&
    ($gellarFieldOffline==true)) {
        $dgts=(rand(4, 40)+5);
    } else {
        $dgts=(rand(1, 10)+2);
    }
    $text= "Le vaisseau va subir ";
    $text.= "<b>";
    $text.= $dgts;
    $text.= "</b>";
    $text.= " de dégâts à la coque ignorant les boucliers de vide.";
    return $text;
}

// Fonction Incursions Warp 
/* Si cet effet se manifeste à bord d'un vaisseau, 
            rouler une fois les dés sur la <b>table 2-8 Incursions Warp</b> (voir page 33)
            et appliquez le résultat. Réduisez le résultat du lancé de dé par -30 si le champs de 
            Geller est complètement fonctionnel (jusqu'à un minimum de 01). Ajoutez +30 au résultat
            du jet si le champs de Geller est éteins. */

function incursion($gellarFieldOffline,$gellarFieldDamaged) {
    $incursionsWarp=rand(1, 100);
    if (((isset($gellarFieldDamaged)) &&
    ($gellarFieldDamaged==false)) &&
        ((isset($gellarFieldOffline)) &&
    ($gellarFieldOffline==false))) {
        $incursionsWarp=floor($incursionsWarp-30);
    } else {
        if ((isset($gellarFieldOffline)) &&
        ($gellarFieldOffline==true)) {
            $incursionsWarp=$incursionsWarp+30;
        } else {
            $incursionsWarp=$incursionsWarp;
        }
    }
    $text= "[";
    $text.= $incursionsWarp;
    $text.= "] ";
    if (($incursionsWarp >= 0) && ($incursionsWarp <= 20)) {
        $text.= "Essaim de Cruauté ! <br>";
    }
    if (($incursionsWarp >= 21) && ($incursionsWarp <= 40)) {
        $text.= "Possession ! <br>";
    }
    if (($incursionsWarp >= 41) && ($incursionsWarp <= 60)) {
        $text.= "Plague of Madness ! <br>";
    }
    if (($incursionsWarp >= 61) && ($incursionsWarp <= 80)) {
        $text.= "Daemonic Incursion ! <br>";
    }
    if (($incursionsWarp >= 81) && ($incursionsWarp <= 90)) {
        $text.= "Warp Sickness ! <br>";
    }
    if (($incursionsWarp >= 91) && ($incursionsWarp <= 100)) {
        $text.= "Warp Monster ! <br>";
    }
    if ($incursionsWarp >= 101) {
        $text.= "Warp Monster ! <br>";
    }
    return $text;
}

// Fonction brèche Warp

function breche() {
    $d10=rand(1, 10);
    $text= "Le vaisseau est perdu pendant ";
    $text.= "<b>";
    $text.= $d10;
    $text.= "</b>";
    $text.= " Jours et rencontrera autant d'incursions Warp que de jours perdus dans la nébuleuse. Voici la liste : <br>";
    for ($i = 1; $i <= $d10; $i++) {
        $text.= "   - ";
        $text.= incursion($_POST["gellarFieldOffline"],$_POST["gellarFieldDamaged"]);
        $text.= "<br>";
    }
    $text.= "<br>";
    return $text;
}


?>