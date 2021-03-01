<?php
include "./incl/phonics.php";
$file = './incl/data/text.txt';
$handle = fopen($file, "r") or die("Unable to open");
//echo fread($handle,filesize($file));


$newArrayCountVowels=array();
//$count =0;


function phonicsCount($pointText, $arrVocal){
foreach ($arrVocal as $valores){
    $newArrayCountVowels[$valores]=0;
}
while(!feof($pointText)) {
    $cmp = fgetc($pointText);
    foreach ($arrVocal as $valores){
        $val =strcmp(strtoupper($cmp) , $valores);
        if($val == 0) {
            $newArrayCountVowels[$valores]++; //=++$count;
            break;
        }
        
    }
}
return $newArrayCountVowels;
}
print_r(phonicsCount($handle, $vowels));


function numberOfLines($pointText){
    $lineCount =0;
    rewind($pointText);
    while (!feof($pointText)) {
        $line = fgets($pointText);
        $lineCount++;
    }
return $lineCount;
}

printf("%d\n",numberOfLines($handle));


function numberOfCharacters($pointText){
    $spaceCount =0;
    rewind($pointText);
    while (!feof($pointText)) {
        $letter = fgetc($pointText);
        if (!ctype_space($letter)){
            $spaceCount++;
        }
    }
return $spaceCount;
}

printf("%d\n",numberOfCharacters($handle));
?>