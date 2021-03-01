<?php

error_reporting(-1);
const KM_TO_MILES = 1.60934;
$numOfDistances = (rand(5,20));
$arrDistances = array();

for ($i=0; $i<$numOfDistances; $i++){
    array_push($arrDistances,rand(1,100));
}
print $numOfDistances;
print_r($arrDistances);
sort($arrDistances);
print($arrDistances[1]);
print_r($arrDistances);

$copyArrDist= $arrDistances;
for ($i=0; $i<sizeof($copyArrDist); $i++){
    $letter= 'A';
    for ($j=1; $j<sizeof($copyArrDist); $j++){
        if($copyArrDist[$i]==$copyArrDist[$i+$j]){
            $copyArrDist[$i+$j]=$copyArrDist[$i+$j].$letter++;
        }
    }
}
        

print_r($copyArrDist);


$arrMiles=array();
for ($i=0; $i<sizeof($arrDistances); $i++){
    $arrMiles[$copyArrDist[$i]]=$arrDistances[$i]*KM_TO_MILES;
}

print_r($arrMiles);
?>