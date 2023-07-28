<?php
$parking=readline("Nom du Parking ? ");
if (($handle = fopen("occupation-parkings-temps-reel.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        if ($parking == $data[0]) {
            print_r($data[4]);
        }
    }
    fclose($handle);
}
?>