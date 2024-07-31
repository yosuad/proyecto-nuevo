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

function conseguirCategoria($conexion, $id){
    $sql = "SELECT * FROM categorias WHERE id = $id;";
    $categorias = mysqli_query($conexion, $sql);
    
    $result = array();
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $result = mysqli_fetch_assoc($categorias);
    }
    return $result;
}

function conseguirEntrada($conexion, $id){
    $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS usuario"
            ." FROM entradas e ".
            "INNER JOIN categorias c ON e.categoria_id = c.id ".
            "INNER JOIN usuarios u ON e.usuario_id = u.id ".
            "WHERE e.id = $id";
    $entrada = mysqli_query($conexion, $sql);
    $resultado =array();
    if ($entrada && mysqli_num_rows($entrada) >= 1) {
        $resultado = mysqli_fetch_assoc($entrada);
    }
    return $resultado;
}



function conseguirEntradas($conexion, $limit = null, $categoria = null) {
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e " .
            "INNER JOIN categorias c ON e.categoria_id = c.id ";
            
            
            if (!empty($categoria)) {
                $sql .= "WHERE e.categoria_id = $categoria ";
            }

            $sql .= "ORDER BY e.id DESC ";

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

