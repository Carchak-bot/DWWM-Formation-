<?php
//____________________________________________________________________________________________
//Warding Bad Luck

function badOmens($moral, $leadership, $socCptn, $socSurnatCptn)
{
    $moralCheck = rand(1, 100);
    $moralCheckResult = ($moral - $moralCheck);
    if ($moralCheckResult >= 0) {
        echo "Avec un moral de <b>";
        echo $moral;
        echo "</b> l'équipage fait un résultat de ";
        echo $moralCheckResult;
        echo " et est donc suffisement en forme pour ne pas teinter le warp de mauvais présages.<br><br>";
    } else {
        $leadershipCheck1 = rand(1, 100);
        switch ($leadershipCheck1) {
            case ($leadership == "leadershipT"):
                $leadershipCheck1result = ($socCptn - $leadershipCheck1);
                if ($leadershipCheck1result >= 0) {
                    $leadershipCheck1resultfinal = (($leadershipCheck1result / 10) + (floor($socSurnatCptn / 2)));
                    echo "La mauvaise chance a bien été chassée. <br>";
                    echo "L'équipage est rassuré avec ";
                    echo $leadershipCheck1resultfinal;
                    echo " degrés de réussites. <br><br>";
                } else {
                    echo "L'équipage n'est pas rassuré et leur empreinte psychique amèneront certainement des ennuis..<br><br>";
                    $badOmens = 1;
                }
                break;
            case ($leadership == "leadership+10"):
                $leadershipCheck1result = (($socCptn + 10) - $leadershipCheck1);
                if ($leadershipCheck1result >= 0) {
                    $leadershipCheck1resultfinal = (($leadershipCheck1result / 10) + (floor($socSurnatCptn / 2)));
                    echo "La mauvaise chance a bien été chassée. <br>";
                    echo "L'équipage est rassuré avec ";
                    echo $leadershipCheck1resultfinal;
                    echo " degrés de réussites. <br><br>";
                } else {
                    echo "L'équipage n'est pas rassuré et leur empreinte psychique amèneront certainement des ennuis..<br><br>";
                    $badOmens = 1;
                }
                break;
            case ($leadership == "leadership+20"):
                $leadershipCheck1result = (($socCptn + 20) - $leadershipCheck1);
                if ($leadershipCheck1result >= 0) {
                    $leadershipCheck1resultfinal = (($leadershipCheck1result / 10) + (floor($socSurnatCptn / 2)));
                    echo "La mauvaise chance a bien été chassée. <br>";
                    echo "L'équipage est rassuré avec ";
                    echo $leadershipCheck1resultfinal;
                    echo " degrés de réussites. <br><br>";
                } else {
                    echo "L'équipage n'est pas rassuré et leur empreinte psychique amèneront certainement des ennuis..<br><br>";
                    $badOmens = 1;
                }
                break;
            case ($leadership == "leadership+30"):
                $leadershipCheck1result = (($socCptn + 30) - $leadershipCheck1);
                if ($leadershipCheck1result >= 0) {
                    $leadershipCheck1resultfinal = (($leadershipCheck1result / 10) + (floor($socSurnatCptn / 2)));
                    echo "La mauvaise chance a bien été chassée. <br>";
                    echo "L'équipage est rassuré avec ";
                    echo $leadershipCheck1resultfinal;
                    echo " degrés de réussites. <br><br>";
                } else {
                    echo "L'équipage n'est pas rassuré et leur empreinte psychique amèneront certainement des ennuis..<br><br>";
                    $badOmens = 1;
                }
                break;
        }
    }
}

// Fonction Rencontres Warp :

function rencontres($tempstrajetabsolu, $frequenceRencontre, $badOmens)
{
    $rencontresNombre = floor($tempstrajetabsolu / $frequenceRencontre);
    echo "Il y aura ";
    echo $rencontresNombre;
    echo " rencontres Warp durant ce voyage. <br> <br>";

    for ($i = 1; $i <= $rencontresNombre; $i++) {
        $rencontresTirage = rand(1, 100);
        echo "[";
        echo $rencontresTirage;
        echo "] ";
        if ($badOmens == 1) {
            if (
                ($rencontresTirage == 9) | ($rencontresTirage == 19) | ($rencontresTirage == 29) | ($rencontresTirage == 39) |
                ($rencontresTirage == 49) | ($rencontresTirage == 59) | ($rencontresTirage == 69) | ($rencontresTirage == 79) | ($rencontresTirage == 89)
                | ($rencontresTirage >= 91) && ($rencontresTirage <= 99)
            ) {
                $rencontresTirage = 35;
            }
        }
        if (($rencontresTirage >= 1) && ($rencontresTirage <= 20)) {
            echo "Tout va bien. Le navigateur peut tenter de localiser l'Astronomican à nouveau tandis que tout
             personnages souffrant d'halucinations warp peut essayer de s'en débarasser à nouveau. <br>";
        }
        if (($rencontresTirage >= 21) && ($rencontresTirage <= 30)) {
            echo "Mirage de désillusion. Chaque explorateur et PNJ importants à bord doivent faire un test de Force Mentale (+0) et le réussir.
             Sinon ils seront affectés par une hallucination warp choisie au hasard. Si le champs de Geller est opérationnel chaques personnages
             reçoivent un bonus de (+30) au test de Force Mentale. S'il ne l'est pas le test subit un malus de (-30) à la place. <br>";
        }
        if (($rencontresTirage >= 31) && ($rencontresTirage <= 40)) {
            echo "Prédateurs psychiques ! <br> Si cet effet se manifeste à bord d'un vaisseau, rouler une fois les dés sur la 
            <b>table 2-8 Incursions Warp</b> (voir page 33) et appliquez le résultat. Réduisez le résultat du lancé de dé par -30 si 
            le champs de Geller est complètement fonctionnel (jusqu'à un minimum de 01). Ajoutez +30 au résultat du jet si le champs 
            de Geller est éteins. <br>";
            echo incursion($_POST["gellarFieldOffline"], $_POST["gellarFieldDamaged"]);
        }
        if (($rencontresTirage >= 41) && ($rencontresTirage <= 50)) {
            echo "Stase ! <br> Si le navigateur ne peut pas guider le vaisseau pour éviter cette rencontre, le vaisseau se coince 
            dans une fissure Warp avant de dériver une fois libéré, ajoutant 1d5 jours au voyage. <br>";
        }
        if (($rencontresTirage >= 51) && ($rencontresTirage <= 60)) {
            echo "Combustion Inhumaine spontanée ! <br> Le MJ choisit un des composants du vaisseau lors de cette rencontre. Celui 
            ci prend immédiatement feu de manire inexpliquée. Voir les règles sur les incendies p.222 du livre de base. <br>";
        }
        if (($rencontresTirage >= 61) && ($rencontresTirage <= 70)) {
            echo "Tempête Warp ! <br> Si le Navigateur ne peut pas guider le vaisseau pour éviter cette rencontre, le vaisseau 
            est donc frappé de plein fouet par une tempête Warp. <br>";
            echo tempete($_POST["gellarFieldDamaged"], $_POST["gellarFieldOffline"]);
        }
        if (($rencontresTirage >= 71) && ($rencontresTirage <= 80)) {
            echo "Récifs Aethériques ! <br> Si le Navigateur ne peut pas guider ce vaisseau pour éviter cette rencontre, 
            la coque du vaisseau sera érraflée par des morceaux tordus et coupants de la fausse réalité. <br>";
            echo recifs($_POST["gellarFieldDamaged"], $_POST["gellarFieldOffline"]);
        }
        if (($rencontresTirage >= 81) && ($rencontresTirage <= 90)) {
            echo "Brèche Warp ! <br> Si le Navigateur ne peut pas contourner cette rencontre, le vaisseau s'enfonce dans 
            une nébuleuse de non-réalitée. <br>";
            echo breche();
        }
        if (($rencontresTirage >= 91) && ($rencontresTirage <= 100)) {
            echo "Trou temporel ! <br> Si le Navigateur ne peut pas diriger le vaisseau dans une autre direction que celle de cette 
            rencontre, le vaisseau est aspiré en dehors du Warp et reviens dans la réalité. Il faut se référer à <b>Sortir du Warp</b> page 34 <br>";
            $severlyOffCourse = 1;
        }
        if ($rencontresTirage >= 100) {
            echo "Trou temporel ! <br> Si le Navigateur ne peut pas diriger le vaisseau dans une autre direction que celle de cette 
            rencontre, le vaisseau est aspiré en dehors du Warp et reviens dans la réalité. Il faut se référer à <b>Sortir du Warp</b> page 34 <br>";
            $severlyOffCourse = 1;
        }
        echo "<br>";
    }
}


// Fonction Tempête Warp :

function tempete($gellarFieldDamaged, $gellarFieldOffline)
{
    if (($gellarFieldDamaged == 'yes')) {
        $dgtsCrits = rand(1, 10);
    } else {
        $dgtsCrits = rand(1, 10);
        $d10 = rand(1, 10);
        if ($dgtsCrits <= $d10) {
            $dgtsCrits = $d10;
        }
    }
    if (($gellarFieldOffline == 'yes')) {
        $dgtsCrits = rand(1, 10);
        $dgtsCrits = $dgtsCrits + 2;
    } else {
        $dgtsCrits = rand(1, 10);
        $d10 = rand(1, 10);
        if ($dgtsCrits <= $d10) {
            $dgtsCrits = $d10;
        }
    }
    $text = "Le vaisseau va subir ";
    $text .= "<b>";
    $text .= $dgtsCrits;
    $text .= "</b>";
    $text .= " de dégâts critiques. Il faut se référer à la page 222 du livre de base au tableau des dégâts critiques.";
    return $text;
}

// Fonction Récifs Aethériques ____________________________________________________

function recifs($gellarFieldDamaged, $gellarFieldOffline)
{
    if (($gellarFieldDamaged == 'yes')) {
        $dgts = (rand(2, 20) + 3);
    } else {
        $dgts = (rand(1, 10) + 2);
    }
    if (($gellarFieldOffline == 'yes')) {
        $dgts = (rand(4, 40) + 5);
    } else {
        $dgts = (rand(1, 10) + 2);
    }
    $text = "Le vaisseau va subir ";
    $text .= "<b>";
    $text .= $dgts;
    $text .= "</b>";
    $text .= " de dégâts à la coque ignorant les boucliers de vide.";
    return $text;
}

// Fonction Incursions Warp 
/* Si cet effet se manifeste à bord d'un vaisseau, 
            rouler une fois les dés sur la <b>table 2-8 Incursions Warp</b> (voir page 33)
            et appliquez le résultat. Réduisez le résultat du lancé de dé par -30 si le champs de 
            Geller est complètement fonctionnel (jusqu'à un minimum de 01). Ajoutez +30 au résultat
            du jet si le champs de Geller est éteins. */

function incursion($gellarFieldOffline, $gellarFieldDamaged)
{
    $incursionsWarp = rand(1, 100);
    if (
        (($gellarFieldDamaged == 'no')) &&
        (($gellarFieldOffline == 'no'))
    ) {
        $incursionsWarp = floor($incursionsWarp - 30);
    } else {
        if (($gellarFieldOffline == 'yes')) {
            $incursionsWarp = $incursionsWarp + 30;
        } else {
            $incursionsWarp = $incursionsWarp + 0;
        }
    }
    $text = "[";
    $text .= $incursionsWarp;
    $text .= "] ";
    if (($incursionsWarp >= 0) && ($incursionsWarp <= 20)) {
        $text .= "Essaim de Cruauté ! <br>";
    }
    if (($incursionsWarp >= 21) && ($incursionsWarp <= 40)) {
        $text .= "Possession ! <br>";
    }
    if (($incursionsWarp >= 41) && ($incursionsWarp <= 60)) {
        $text .= "Plague of Madness ! <br>";
    }
    if (($incursionsWarp >= 61) && ($incursionsWarp <= 80)) {
        $text .= "Daemonic Incursion ! <br>";
    }
    if (($incursionsWarp >= 81) && ($incursionsWarp <= 90)) {
        $text .= "Warp Sickness ! <br>";
    }
    if (($incursionsWarp >= 91) && ($incursionsWarp <= 100)) {
        $text .= "Warp Monster ! <br>";
    }
    if ($incursionsWarp >= 101) {
        $text .= "Warp Monster ! <br>";
    }
    return $text;
}

// Fonction brèche Warp

function breche()
{
    $d10 = rand(1, 10);
    $text = "Le vaisseau est perdu pendant ";
    $text .= "<b>";
    $text .= $d10;
    $text .= "</b>";
    $text .= " Jours et rencontrera autant d'incursions Warp que de jours perdus dans la nébuleuse. Voici la liste : <br>";
    for ($i = 1; $i <= $d10; $i++) {
        $text .= "   - ";
        $text .= incursion($_POST["gellarFieldOffline"], $_POST["gellarFieldDamaged"]);
        $text .= "<br>";
    }
    $text .= "<br>";
    return $text;
}

function psyniscienceNavFailed($psyniscienceCheckFailed, $dureeEronner, $tempstrajettheorique)
{
    switch ($psyniscienceCheckFailed) {
        case ($psyniscienceCheckFailed == 1):
            $dureeEronner = ($tempstrajettheorique * 1);
            echo "Le navigateur n'est pas sûr de la clareté de l'Astronomican pour cette route. Selon ses prédictions le voyage devrait prendre [";
            echo $dureeEronner;
            echo "] jours.";
            break;
        case ($psyniscienceCheckFailed == 2):
            $dureeEronner = ($tempstrajettheorique / 2);
            echo "Le navigateur n'est pas sûr de la clareté de l'Astronomican pour cette route. Selon ses prédictions le voyage devrait prendre [";
            echo $dureeEronner;
            echo "] jours.";
            break;
        case ($psyniscienceCheckFailed == 3):
            $dureeEronner = ($tempstrajettheorique * 2);
            echo "Le navigateur n'est pas sûr de la clareté de l'Astronomican pour cette route. Selon ses prédictions le voyage devrait prendre [";
            echo $dureeEronner;
            echo "] jours.";
            break;
        case ($psyniscienceCheckFailed == 4):
            $dureeEronner = ($tempstrajettheorique * 3);
            echo "Le navigateur croit que l'Astronomican est obscurcit pour cette route. Selon ses prédictions le voyage devrait prendre [";
            echo $dureeEronner;
            echo "] jours.";
            break;
        case ($psyniscienceCheckFailed == 5):
            $dureeEronner = ($tempstrajettheorique * 3);
            echo "Le navigateur croit que l'Astronomican est obscurcit pour cette route. Selon ses prédictions le voyage devrait prendre [";
            echo $dureeEronner;
            echo "] jours.";
            break;
    }
}

function psyniscienceNav($psyniscience, $per, $chartsFinished, $psyniscienceCheck1, $dureeEronner, $tempstrajettheorique)
{
    //Psyniscience pour les augures
    switch ($psyniscienceCheck1) {
        case ($psyniscience == "psyniscienceT"):
            $psyniscienceCheck1result = (($per + $chartsFinished) - $psyniscienceCheck1);
            if ($psyniscienceCheck1result >= 0) {
                $psyniscienceCheck1resultfinal = (($psyniscienceCheck1result / 10) + (floor($_POST["perSurnat"] / 2)));
                echo "Les augures sont bien interprêtés, le navigateur et sa suite peuvent avoir accès au résultat
                du calcul de la durée du voyage Warp. <br>";
                echo "Les augures sont interprêtés avec ";
                echo $psyniscienceCheck1resultfinal;
                echo " degrés de réussites. <br><br>";
            } else {
                $psyniscienceCheckFailed = rand(1, 5);
                psyniscienceNavFailed($psyniscienceCheckFailed, $dureeEronner, $tempstrajettheorique);
            }
            break;
        case ($psyniscience == "psyniscience+10"):
            $psyniscienceCheck1result = (($per + 10 + $chartsFinished) - $psyniscienceCheck1);
            if ($psyniscienceCheck1result >= 0) {
                $psyniscienceCheck1resultfinal = (($psyniscienceCheck1result / 10) + (floor($_POST["perSurnat"] / 2)));
                echo "Les augures sont bien interprêtés, le navigateur et sa suite peuvent avoir accès au résultat
                du calcul de la durée du voyage Warp. <br>";
                echo "Les augures sont interprêtés avec ";
                echo $psyniscienceCheck1resultfinal;
                echo " degrés de réussites. <br><br>";
            } else {
                $psyniscienceCheckFailed = rand(1, 5);
                psyniscienceNavFailed($psyniscienceCheckFailed, $dureeEronner, $tempstrajettheorique);
            }
            break;
        case ($psyniscience == "psyniscience+20"):
            $psyniscienceCheck1result = (($per + 20 + $chartsFinished) - $psyniscienceCheck1);
            if ($psyniscienceCheck1result >= 0) {
                $psyniscienceCheck1resultfinal = (($psyniscienceCheck1result / 10) + (floor($_POST["perSurnat"] / 2)));
                echo "Les augures sont bien interprêtés, le navigateur et sa suite peuvent avoir accès au résultat
                du calcul de la durée du voyage Warp. <br>";
                echo "Les augures sont interprêtés avec ";
                echo $psyniscienceCheck1resultfinal;
                echo " degrés de réussites. <br><br>";
            } else {
                $psyniscienceCheckFailed = rand(1, 5);
                psyniscienceNavFailed($psyniscienceCheckFailed, $dureeEronner, $tempstrajettheorique);
            }
            break;
        case ($psyniscience == "psyniscience+30"):
            $psyniscienceCheck1result = (($per + 30 + $chartsFinished) - $psyniscienceCheck1);
            if ($psyniscienceCheck1result >= 0) {
                $psyniscienceCheck1resultfinal = (($psyniscienceCheck1result / 10) + (floor($_POST["perSurnat"] / 2)));
                echo "Les augures sont bien interprêtés, le navigateur et sa suite peuvent avoir accès au résultat
                du calcul de la durée du voyage Warp. <br>";
                echo "Les augures sont interprêtés avec ";
                echo $psyniscienceCheck1resultfinal;
                echo " degrés de réussites. <br><br>";
            } else {
                $psyniscienceCheckFailed = rand(1, 5);
                psyniscienceNavFailed($psyniscienceCheckFailed, $dureeEronner, $tempstrajettheorique);
            }
            break;
    }
}

function psyniscienceAstro($psyniscience, $per, $psyniscienceCheck2, $psyniscienceCheck2Failed, $dureeEronner, $tempstrajettheorique, $bonus, $bonusNav)
{
    //Psyniscience pour l'astronomican
    switch ($psyniscienceCheck2) {
        case ($psyniscience == "psyniscienceT"):
            $psyniscienceCheck2result = (($per + $bonus) - $psyniscienceCheck2);
            if ($psyniscienceCheck2result >= 0) {
                $psyniscienceCheck2resultfinal = (($psyniscienceCheck2result / 10) + (floor($_POST["perSurnat"] / 2)));
                echo "L'astronomican est trouvé avec ";
                echo $psyniscienceCheck2resultfinal;
                echo " degrés de réussites. <br><br>";
                $bonusNav = 10;
            } else {
                $bonusNav = -20;
                $psyniscienceCheck2Failed = floor(($psyniscienceCheck2result) / 10);
                echo $psyniscienceCheck2;
                echo "<br>";
                echo $psyniscienceCheck2Failed;
                echo "<br>";
            }
            break;
        case ($psyniscience == "psyniscience+10"):
            $psyniscienceCheck2result = (($per + 10 + $bonus) - $psyniscienceCheck2);
            if ($psyniscienceCheck2result >= 0) {
                $psyniscienceCheck2resultfinal = (($psyniscienceCheck2result / 10) + (floor($_POST["perSurnat"] / 2)));
                echo "L'astronomican est trouvé avec ";
                echo $psyniscienceCheck2resultfinal;
                echo " degrés de réussites. <br><br>";
                $bonusNav = 10;
            } else {
                $bonusNav = -20;
                $psyniscienceCheck2Failed = floor(($psyniscienceCheck2 - $psyniscienceCheck2result) / 10);
            }
            break;
        case ($psyniscience == "psyniscience+20"):
            $psyniscienceCheck2result = (($per + 20 + $bonus) - $psyniscienceCheck2);
            if ($psyniscienceCheck2result >= 0) {
                $psyniscienceCheck2resultfinal = (($psyniscienceCheck2result / 10) + (floor($_POST["perSurnat"] / 2)));
                echo "L'astronomican est trouvé avec ";
                echo $psyniscienceCheck2resultfinal;
                echo " degrés de réussites. <br><br>";
                $bonusNav = 10;
            } else {
                $bonusNav = -20;
                $psyniscienceCheck2Failed = floor(($psyniscienceCheck2 - $psyniscienceCheck2result) / 10);
            }
            break;
        case ($psyniscience == "psyniscience+30"):
            $psyniscienceCheck2result = (($per + 30 + $bonus) - $psyniscienceCheck2);
            if ($psyniscienceCheck2result >= 0) {
                $psyniscienceCheck2resultfinal = (($psyniscienceCheck2result / 10) + (floor($_POST["perSurnat"] / 2)));
                echo "L'astronomican est trouvé avec ";
                echo $psyniscienceCheck2resultfinal;
                echo " degrés de réussites. <br><br>";
                $bonusNav = 10;
            } else {
                $bonusNav = -20;
                $psyniscienceCheck2Failed = floor(($psyniscienceCheck2 - $psyniscienceCheck2result) / 10);
            }
            break;
    }
}