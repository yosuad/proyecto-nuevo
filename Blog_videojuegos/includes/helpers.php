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

    if (isset($_SESSION['errores_entrada'])) {
        // Reiniciar el array de errores en la sesión
        $_SESSION['errores_entrada'] = null;    
        // Eliminar la variable de errores de la sesión    
        unset($_SESSION['errores_entrada']);
    }


    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        unset($_SESSION['completado']);
    }
    

    return true; // Retornar true para indicar que la operación se realizó correctamente
}

function conseguirCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC";
    $categorias = mysqli_query($conexion, $sql);
    
    $result = array();
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $result = $categorias;
    }
    return $result;
}


function conseguirEntradas($conexion, $limit = null) {
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e " .
            "INNER JOIN categorias c ON e.categoria_id = c.id " .
            "ORDER BY e.id DESC ";
            
        if ($limit) {
            $sql .= "LIMIT 4";
        }
    
    $entradas = mysqli_query($conexion, $sql);
    $result = array();
    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $result = $entradas;
    }
    return $result;
}

