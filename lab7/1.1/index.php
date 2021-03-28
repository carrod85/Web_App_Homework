<?php

//setting multiple cookies


//setcookie("ctransient","CARLOS",0 ,"/" );//transient
//setcookie("ShortTimeCount", $valor,time()+3600, "/"); // persistant
//setcookie("LongTimeCount", 1, time() + 3600, "/");



if (isset($_COOKIE["ShortTimeCount"])) 
    {
    $valor =$_COOKIE["ShortTimeCount"]+1;
} 
else 
    {
    $valor=1;
}

if (isset($_COOKIE["LongTimeCount"])) 
    {
    $valor2 =$_COOKIE["LongTimeCount"]+1;
} 
else 
    {
    $valor2=1;
}


setcookie("ShortTimeCount", $valor,time()+120, "/",false, true );
setcookie("LongTimeCount", $valor2,time()+3600, "/",false, true );
setcookie("ctransient","CARLOS",0 ,"/", false, true );

echo "ctransient","=", $_COOKIE["ctransient"];
echo "<br>";
echo "ShortTimeCount"."=". $valor;
echo "<br>";
echo "LongTimeCount","=", $valor2;

?>