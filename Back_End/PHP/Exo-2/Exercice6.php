<?php
$date= date_create(readline("Y-m-d "));
$jour=date_format($date, 'N');
if (($handle = fopen("nik.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if ($jour == $data[0]) {
            print_r($data[1]);
        }
    }
    fclose($handle);
}
?>