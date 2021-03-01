<?php
include "./incl/phonics.php";
$file = './incl/data/text.txt';
$handle = fopen($file, "r");
//echo fread($handle,filesize($file));
echo fread($handle, 1);
echo filesize($file);

$i=1;
$count =0;
$newArrayCountVowels=array();
for ($i=1; $i<filesize($file);$i++) {
    foreach ($vowels as $valores){
        if (fread($handle,$i)==$valores){
            $newArrayCountVowels[$valores]=++$count;
        }
    }
++$i;
fseek($handle,$i);
}

print_r($newArrayCountVowels);
/*try{
    if (file_exists($file)) { 
        $handle = fopen($file, "r");
        print("thats ok");
        echo fread($handle,filesize($file));
// operate with the file contents
        fclose($handle); } 
    else {
        throw new Exception("File not found!"); }
    } 
    catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}*/



?>