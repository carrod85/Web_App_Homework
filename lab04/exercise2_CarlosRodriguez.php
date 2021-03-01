<?php
include "./incl/phonics.php";
$file = './incl/data/text.txt';
$handle = fopen($file, "r") or die("Unable to open");
//echo fread($handle,filesize($file));


$newArrayCountVowels=array();
// $count =0;
foreach ($vowels as $valores){
    $newArrayCountVowels[$valores]=0;
}

while(!feof($handle)) {
    $cmp = fgetc($handle);
    foreach ($vowels as $valores){
        $val =strcmp(strtoupper($cmp."") , $valores);
        if($val == 0) {
            $newArrayCountVowels[$valores]++; //=++$count;
            break;
        }
        else{
            continue;
        }
    }
}
print_r($newArrayCountVowels);
?>