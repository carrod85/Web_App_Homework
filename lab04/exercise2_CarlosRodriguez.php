<?php
include "./incl/phonics.php";
$file = './incl/data/text.txt';
$handle = fopen($file, "r") or die("Unable to open");
//echo fread($handle,filesize($file));


$newArrayCountVowels=array();
$count =0;

while(!feof($handle)) {
    $cmp = fgetc($handle);
    foreach ($vowels as $valores){
        $val =strcmp($cmp , $valores);
        if($val == 0) {
            $newArrayCountVowels[$valores]=++$count;

        }
        else{
            continue;
        }
    }
}
print_r($newArrayCountVowels);
?>