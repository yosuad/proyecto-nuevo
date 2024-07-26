<?php
//CONECTAR A LA BASE DE DATOS
$server = "localhost";
$username = "root";
$password = "";
$database = "blog_videojuegos";

$db = mysqli_connect($server, $username, $password, $database);

//CONSULTA PARA CONFIGURAR LA CODIFICACION DE CARATERES
mysqli_query($db, "SET NAMES 'utf8'");


// INICIAR LA SESIÓN
if (!isset($_SESSION)) {
    session_start();
}