<?php
include "./incl/phonics.php";
$file = './incl/data/text.txt';


$string = file_get_contents("./incl/data/text.txt", 1, NULL, 0);
echo $string;

$length = strlen($string);
print($length);

$bites = $length - 836;//bites to move forward

print($bites);

print strlen(mb_substr($string, 0, 1, "utf-8"));

?>