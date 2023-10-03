<?php
try {
$username = "root";
$password = "";
$dsn = "mysql:host=localhost;dbname=dbbootic;port=3306;charset=utf8";

$maBase = new PDO($dsn, $username, $password);

$req = $maBase->query('SELECT * FROM personne');
$res=$req->fetchAll();
foreach ($res as $key => $value) {
    //echo '$value[0]$value[1]$value[2]<br>';
    echo("$value[0] $value[1] $value[2]<br>");
}

//var_dump($res);

} catch (PDOException$e) {
    echo 'Erreur : '.$e->getMessage();
}?>

