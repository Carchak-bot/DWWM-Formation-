<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>query</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <article class="bigtablo">
    <span class="tableau" >
<?php
    $dbh = new PDO('mysql:host=localhost;dbname=pays', 'root', '');
    print "<br>";
    print "<br>";
    print "Les Continents :";
    print "<br>";
    print "<br>";
    // Les continents
    // use the connection here
    $sthcontinents = $dbh->query('SELECT * FROM t_continents');
    // fetch all rows into array, by default PDO::FETCH_BOTH is used
    $rowscontinents = $sthcontinents->fetchAll();
    // iterate over array by index and by name
    foreach($rowscontinents as $rowcontinents) {
        print $rowcontinents["libelle_continent"];
        print "<br>";
    }
    print "<br>";
    print "<br>";
?>
    </span>
    <span class="tableau" >
<?php
    print "Les régions :";
    print "<br>";
    print "<br>";
    // Les régions
    // use the connection here
    $sthregions = $dbh->query('SELECT * FROM t_regions');
    // fetch all rows into array, by default PDO::FETCH_BOTH is used
    $rowsregions = $sthregions->fetchAll();
    // iterate over array by index and by name
    foreach($rowsregions as $rowregions) {
        print $rowregions["libelle_region"];
        print "<br>";
    }
    print "<br>";
    print "<br>";
?>
    </span>
    <span class="tableau" >
<?php
    //Les pays
    print "Les pays :";
    print "<br>";
    print "<br>";
    // use the connection here
    $sthpays = $dbh->query('SELECT * FROM t_pays');
    // fetch all rows into array, by default PDO::FETCH_BOTH is used
    $rowspays = $sthpays->fetchAll();
    // iterate over array by index and by name
    foreach($rowspays as $rowpays) {
        print $rowpays["libelle_pays"];
        print "<br>";
    }
?>
    </span>
    </article>
</body>
</html>