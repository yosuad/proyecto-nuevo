<?php

function mostrarErrores($errores, $campo){
    $alerta = '';
    if (isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta alerta-error'>". $errores[$campo]. '</div>';
    }
    return $alerta;
}

function borrarErrores(){
    $borrado = false;
    if (isset($_SESSION['errores'])) {
        // Reiniciar el array de errores en la sesión
        $_SESSION['errores'] = null;    
        // Eliminar la variable de errores de la sesión    
        unset($_SESSION['errores']);
    }

    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        unset($_SESSION['completado']);
    }
    

    return true; // Retornar true para indicar que la operación se realizó correctamente
}
