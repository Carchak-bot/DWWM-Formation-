<?php
$departement=readline("Chiffre du département : ");
$tableau=array();
if (($handle = fopen("villes_france.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 2000, ",")) !== FALSE) {
        if ($departement == $data[1]) {
            array_push($tableau, $data[3]);
        }
    }
    fclose($handle);
} 
sort($tableau);
print_r($tableau);
?>