<?php

$route=0;
$routemultiple=0;
$duree=0;
$dureefinale=0;
$tempstrajet=0;
$tempstrajettheorique=0;

$route=rand(1, 10);
if ($route == 1 | $route == 2 | $route == 3)  {
    print "Route Stable. Dans le futur le navigateur aura un bonus de +10 pour tracer cette route. <br>";
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

print PHP_EOL;

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

if ((isset($_POST["warpEngineDamaged"])) &&
 ($_POST["warpEngineDamaged"]==true)) {
    print "Pour un total théorique de ";
    print $tempstrajettheorique;
    print " Jours. Dûs aux moteurs warp";
} else {
    print "Pour un total théorique de ";
    print $tempstrajettheorique;
    print " Jours.";
}


?>