<?php
# Dejaremos ya iniciada una sesión
session_start();
# aqui la base de datos con pin y usuario.
$system_pin = ["1234"=>"carlos", "4321"=>"david"];
# formulario.html será el que pida el ingreso de user y pass al usuario
const PAGINA_LOGIN = "formulario.php";
# esta será una página cualquiera, con acceso restringido, a la cual 
# redirigir al usuario después de iniciar su sesión en el sistema
const PAGINA_RESTRINGIDA_POR_DEFECTO = "pagina_de_muestra.php";
const OTRA_PAGINA = "lapagina.php";
?>