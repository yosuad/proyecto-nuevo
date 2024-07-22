<?php
require_once 'includes/conexion.php';

// INICIAR SESION
if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST)){
    // Recoger los valores del formulario de registro
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre'] ) : false;
    $apellidos = isset($_POST['apellidos']) ?  mysqli_real_escape_string($db, $_POST['apellidos'] ) : false;
    $email = isset($_POST['email']) ?  mysqli_real_escape_string($db, trim($_POST['email']) ) : false;
    $password = isset($_POST['password']) ?  mysqli_real_escape_string($db, $_POST['password'] ) : false;
    
    // ARRAY DE ERRORES 
    $errores = array();
    // VALIDAR LOS DATOS ANTES DE GUARDARLOS EN LA BASE DE DATOS
    // VALIDAR CAMPO NOMBRE
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
       $nombre_valido = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es válido";
    }
    // VALIDAR CAMPO APELLIDO
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
        $apellidos_valido = true;
     }else{
         $apellidos_validado = false;
         $errores['apellidos'] = "Los apellidos no son válido";
     }
     // VALIDAR CAMPO EMAIL
     if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_valido = true;
     }else{
         $email_validado = false;
         $errores['email'] = "El email no es válido";
     }
      // VALIDAR CAMPO PASSWORD
     if (!empty($password)) {
        $password_valido = true;
     }else{
         $password_validado = false;
         $errores['password'] = "la contraseña no es válido";
     }

     // VALIDAR QUE NO TENGA ERRORES
     $guardar_usuario = false;
     if (count($errores) == 0) {
        $guardar_usuario = true;

        //CIFRAR LA CONTRASEÑA
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
        // INSERTAR USUARIOS EN LA BASE DE DATOS
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE())";
        $guardar = mysqli_query($db, $sql);

        
        if($guardar) {
            $_SESSION['completado'] = "El registro se ha completado con Éxito";
        }else{
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario!!";
        }

     } else {
         $_SESSION['errores'] = $errores;         
     }    
}

header('Location: index.php');


