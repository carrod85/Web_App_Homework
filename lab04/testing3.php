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









function getKey($testKey, &$arr)
{
    if (!array_key_exists($testKey, $arr)){
        return $testKey;
    }
    $testKey =$testKey.'A';
    while (array_key_exists($testKey,$arr)){
        ++$testKey;
    }
    return $testKey;
}



foreach ($arrDistances as $values){
    $arrMiles[getKey($values, $arrMiles)]=$arrDistances[getKey($values, $arrMiles)]/KM_TO_MILES;
}

print_r($arrMiles);
?>