<?php
$departement=readline("Chiffre du département : ");
if (($handle = fopen("departement.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if ($departement == $data[1]) {
            print_r($data[3]);
        }
    }
    fclose($handle);
} 
?>