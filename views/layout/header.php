<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Camisetas - Las mejores camisetas online</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/styles2.css">
</head>
<body>

<!-- Cabezera -->
    <div id="container">
        <header id="header">
            <div id="logo">
                <img src="<?=base_url?>assets/img/camiseta.png" alt="Logo de la tienda de camisetas">
                <a href="index.php">
                    Tienda de camisetas
                </a>
            </div>
        </header>

        <!-- Menu -->
         <?php require_once 'helpers/Utils.php';?>

         <?php $categorias = Utils::showCategorias() ?>
        <nav id="menu" role="navigation" aria-label="Navegación principal">
            <ul>
                <li>
                    <a href="#">Inicio</a>
                </li>
                <?php  while($cat = $categorias->fetch_object()):?>
                <li>
                    <a href="#"><?=$cat->nombre?></a>
                </li>
                 
                <?php endwhile; ?>
            </ul>
        </nav>

        <div id="content">