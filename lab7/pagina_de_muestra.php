<?php
include("funciones.php");



if (isset($_POST['reset'])){
    $_SESSION['valor']=0;
    $_SESSION['valor2']=0;
}
if (isset($_POST['inc'])){
    if (isset($_COOKIE["ShortTimeCount"])) 
    {
    $_SESSION['valor'] =$_COOKIE["ShortTimeCount"]+1;
    } 
    else 
    {   
    $_SESSION['valor']=1;
    }

    if (isset($_COOKIE["LongTimeCount"])) 
    {
    $_SESSION['valor2'] =$_COOKIE["LongTimeCount"]+1;
    } 
    else 
    {
    $_SESSION['valor2']=1;
    }
}

setcookie("ShortTimeCount", $_SESSION['valor'],time()+120, "/~carrod",false, true );
setcookie("LongTimeCount", $_SESSION['valor2'],time()+3600, "/~carrod",false, true );
setcookie("ctransient","CARLOS",0 ,"/~carrod", false, true );

echo "ShortTimeCount","=","0" + $_SESSION['valor'];
echo "<br>";
echo "LongTimeCount","=", "0" + $_SESSION['valor2'];

validar_sesion();
/*
if (isset($_SESSION)){
    $link=OTRA_PAGINA;
}

*/

$nombre = $_SESSION['name'];
$contador = "";
if ($_SESSION['contador']==0){
    $contador= "contador";
}
else{
    $contador= $_SESSION['contador'];
}


?>

<!Doctype html>
<html>
    <head>
        <style>
            .primero {
                position:relative;
                margin:20px 30px 20px 0px;
                
            }
            .segundo{
                position:relative;
                width: 20%;
                margin-top: -40px;
                margin-left: 60px;
                
            }
            .color1{
                background-color: red;
            }
            .color2{
                background-color: yellow;
            }
        </style>
    </head>
    <body>
    <!-- contenido de ejemplo -->
        <b>Bienvenido <?php echo $nombre ?>!</b> 
        (<a href="salir.php">Desconectarse</a>)
        <a href="lapagina.php">otrapagina</a>
        

        <!--<form class="primero" method="POST" action="otro.php">
            <input class="color1" type="submit" name="otro" value="otra pagina" />
        </form>-->

        <form class="primero" method="POST" action="pagina_de_muestra.php">
            <input class="color1" type="submit" name="reset" value="reset" />
        </form>

        <form class="segundo" method="POST" action="pagina_de_muestra.php">
            <input class= "color2" type="submit" name="inc" value="<?php echo $contador ?>" />
        </form>
    </body>
</html>