<?php
include('settings.php');
/*
    Traigo los datos recibidos por HTTP POST
    y retorno el pin
*/

function get_post_data() {
    $pin = "";
    if(isset($_POST['pass'])) {
        $pin = $_POST['pass'];
    }
    return $pin;
}

/*
    Comparo pin insertado con el pin del sistema. Si coinciden retorno el nombre.
*/
function validar_user_y_pass() {
    $user_pin = get_post_data();
    global $system_pin;
    $name=$system_pin[$user_pin];  
    return $name;

}

/*
    Esta será la función principal, que será llamada tras enviar el
    formulario. Si los datos ingresados coinciden con los esperados,
    inicio la sesión del usuario.
    Finalmente, redirijo al usuario a la página restringida por defecto
    (posteriormente crearemos una función que se encargue de ello)
*/
function login() {
    $user_valido = validar_user_y_pass();
    if(!is_null($user_valido)) {
        $_SESSION['login_date'] = time();
        $_SESSION['name']=$user_valido;
        /*if (isset ($_SESSION['contador'])){
            $_SESSION['contador']++;
        }
        else{
            $_SESSION['contador']=1;
        }*/
        goto_page(PAGINA_RESTRINGIDA_POR_DEFECTO);
    }
    else{
        $_SESSION['error']=1;
        goto_page(PAGINA_LOGIN);
    }
    
}



function logout() {
    session_destroy();
    goto_page(PAGINA_LOGIN);
}

function obtener_ultimo_acceso() {
    $ultimo_acceso = 0;
    if(isset($_SESSION['login_date'])) {
        $ultimo_acceso = $_SESSION['login_date'];
    }
    return $ultimo_acceso;
}

function sesion_activa() {
    $estado_activo = False;
    $ultimo_acceso = obtener_ultimo_acceso();
    /*
        Establezco como límite máximo de inactividad (para mantener la
        sesión activa), media hora (o sea, 1800 segundos).
        De esta manera, sumando 1800 segundos a login_date, estoy definiendo
        cual es la marca de tiempo más alta, que puedo permitir al
        usuario para mantenerle su sesión activa.
    */
    $limite_ultimo_acceso = $ultimo_acceso + 5;
    /*
        Aquí realizo la comparación. Si el último acceso del usuario,
        más media hora de gracia que le otorgo para mantenerle activa
        la sesión, es mayor a la marca de hora actual, significa entonces
        que su sesión puede seguir activa. Entonces, le actualizo la marca
        de tiempo, renovándole la sesión
    */
    if($limite_ultimo_acceso > time()) {
        $estado_activo = True;
        # actualizo la marca de tiempo renovando la sesión 
        $_SESSION['login_date'] = time();
    }
    return $estado_activo;
}

function validar_sesion() {
    if(!sesion_activa()) {
        setcookie("reiniciar", "1", time()+60);//creo una cookie porque con el logout destruyo la sesion
        logout(); 
    }
}

function goto_page($pagina) {
    header("Location: $pagina");
}

?>