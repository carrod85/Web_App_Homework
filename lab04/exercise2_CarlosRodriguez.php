<?php
include "./incl/phonics.php";
$file = './incl/data/text.txt';

try{
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
}



?>