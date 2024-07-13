<?php
//CONECTAR A LA BASE DE DATOS
$conexion = mysqli_connect("localhost", "root", "", "phpmysql");

//REVISAR CONEXION
if (mysqli_connect_errno()) {
    echo "la conexion a base de datos a fallado:".mysqli_connect_error();
}else{
    echo"conexion exitosa";
}

//CONSULTA PARA CONFIGURAR LA CODIFICACION DE CARATERES
mysqli_query($conexion, "SET NAMES 'utf8'");

//CONSULTA SELECT DESDE PHP
$query = mysqli_query($conexion, "SELECT * FROM notas");

while($notas = mysqli_fetch_assoc($query)){
    echo "<pre>";
    var_dump($notas);
    echo "</pre>";
}

// INSERTAR EN LA BASE DE DATOS
$sql = "INSERT INTO notas VALUES (null, 'Nota deede php', 'Esto es una nota desde php', 'green')";
$insert = mysqli_query($conexion, $sql);

if($insert){
    echo "Datos Insertados Correctamente";
} else {
    echo "Error:.mysqli_error($conexion)";
}