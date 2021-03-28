<?php

session_start();
if (isset ($_SESSION['error'])){
    $errorLogin = "login incorrecto- intenta de nuevo";
}



if (isset($_COOKIE['reiniciar'])){
    $errorTiempo=  "tiempo de conexion superado, identifiquese de nuevo";
    unset($_COOKIE["reiniciar"]);
    setcookie("reiniciar", "1", time()-100000);
    
}



?>

<!Doctype html>
<html>
<h1>Ingreso al sistema</h1>
<form method="POST" action="iniciar.php">
    Pin: <input type="password" name="pass" /><b style="color:red"><?php echo "*",$errorLogin, $errorTiempo?></b><br/>
    <input type="submit" value="Ingresar" />
</form>
</html>