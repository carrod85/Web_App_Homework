<?php
include("funciones.php");
if (isset($_POST['reset'])){
    $_SESSION['contador']=0;
}
if (isset($_POST['inc'])){
    $_SESSION['contador']++;
}

validar_sesion();
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

        <form class="primero" method="POST" action="pagina_de_muestra.php">
            <input class="color1" type="submit" name="reset" value="reset" />
        </form>

        <form class="segundo" method="POST" action="pagina_de_muestra.php">
            <input class= "color2" type="submit" name="inc" value="<?php echo $contador ?>" />
        </form>
    </body>
</html>