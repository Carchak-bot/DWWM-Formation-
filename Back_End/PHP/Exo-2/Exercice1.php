<?php

$year=readline("Année ? ");
$tableau= [
    
        "01/01"
    ,
    
        easter_date($year)
    ,
    
        "05/01"
    ,
    
        "05/08"
    ,
    
        "05/18"
    ,
    
        "07/14"
    ,
    
        "08/15"
    ,
    
        "11/01"
    ,
    
        "11/11"
    ,
    
        "12/25"
    ,
];
$dateverif=" ";



print "Veuillez rentrer la date :  ";
$dateverif=readline("M / D ");

if (in_array($dateverif,$tableau)) {
    print "True";
} else {
    print "False";
}




?>