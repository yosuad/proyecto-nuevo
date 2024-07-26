<?php

if (isset($_POST)) {
    // CONEXION A LA BASE DE DATOS
    require_once 'includes/conexion.php';

  $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

      // ARRAY DE ERRORES 
      $errores = array();
      // VALIDAR LOS DATOS ANTES DE GUARDARLOS EN LA BASE DE DATOS
      // VALIDAR CAMPO NOMBRE
      if (!empty($nombre) && !is_numeric($nombre) ) {
         $nombre_valido = true;
      }else{
          $nombre_validado = false;
          $errores['nombre'] = "El nombre no es válido";
      }

      if (count($errores) == 0) {
        $sql = "INSERT INTO categorias VALUES(NULL, '$nombre')";
        $guardar = mysqli_query($db, $sql);
      }   
}

header("Location: index.php");