<?php

$dbh = new PDO('mysql:host=localhost;dbname=pays', 'root', '');

// use the connection here
$sth = $dbh->query('SELECT * FROM t_pays');

// fetch all rows into array, by default PDO::FETCH_BOTH is used
$rows = $sth->fetchAll();

// iterate over array by index and by name
foreach($rows as $row) {

    print $row["libelle_pays"];
    print PHP_EOL;

}
?>