<?php
// INICIAR LA SESION Y LA CONEXION A BD
require_once 'includes/conexion.php';

//RECOGER DATOS DEL FORMULARIO
if (isset($_POST)) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];    
}

//CONSULTAR PARA COMPROBAR LAS CREDENCIALES DEL USUARIO
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$login = mysqli_query($db, $sql);
if ($login && mysqli_num_rows($login) == 1) {
    $usuario = mysqli_fetch_assoc($login);


    // COMPROBAR LA CONTRASEÑA / CIFRAR
    $verify = password_verify($password, $usuario['password']);

    if ($verify) {
       // UTILIZAR UNA SESIÓN PARA GUARDAR LOS DATOS DEL USUARIO LOGUEADO
       $_SESSION['usuario'] = $usuario;

       if (isset($_SESSION['error_login'])) {
           unset($_SESSION['error_login']);
       }


    }else{
        // SI ALGO FALLA ENVIAR UNA SESIÓN CON EL FALLO
        $_SESSION['error_login'] = "Login Incorrecto";
    }
    
}else {
    // MENSAJE DE ERROR
    $_SESSION['error_login'] = "Login Incorrecto";
}

// REDIRIGIR AL INDEX.PHP
header('Location: index.php');