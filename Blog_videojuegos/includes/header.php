<?php require_once 'conexion.php';?>
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Blog de videojuegos</title>
</head>
<body>
    <!-- CABECERA -->
    <header id="cabecera">
        <div id="logo">
            <a href="">
                Blog de Videojuegos
            </a>
        </div>


        <!-- MENU -->        
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>

                    <?php 
                        $categorias = conseguirCategorias($db);
                        if($categorias && mysqli_num_rows($categorias) > 0) : 
                    ?>
                        <?php while($categoria = mysqli_fetch_assoc($categorias)) : ?>
                            <li>
                                <a href="categoria.php?id=<?=$categoria['id'] ?>"><?=$categoria['nombre'] ?></a>
                            </li>
                        <?php endwhile; ?>           
                    <?php endif; ?>


                <li>
                    <a href="sobremi.php">sobre mí</a>
                </li>
                <li>
                    <a href="index.php">contacto</a>
                </li>
            </ul>
        </nav>

        <div class="clearfix"></div>
    </header>

    <div id="contenedor">
   