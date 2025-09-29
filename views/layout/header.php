<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOVA Studio | Ropa de Tendencia y Estilo Urbano</title>
    <link rel="shortcut icon" href="<?=base_url?>assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css">
</head>

<body>

    <!-- Cabezera -->
    <div id="container">
        <header id="header">
            <div id="logo">
                <img src="<?= base_url ?>assets/img/logo.png" alt="Logo de la tienda de camisetas">
                <a href="<?= base_url ?>">
                    NOVA Studio
                </a>
            </div>
        </header>

        <!-- Menu -->
        <?php require_once 'helpers/Utils.php'; ?>

        <?php $categorias = Utils::showCategorias() ?>
        <nav id="menu" role="navigation" aria-label="Navegación principal">
            <ul>
                <li>
                    <a href="<?= base_url ?>">Inicio</a>
                </li>
                <?php while ($cat = $categorias->fetch_object()): ?>
                    <li>
                        <a href="<?= base_url ?>categorias/ver&id=<?= $cat->id ?>"><?= $cat->nombre ?></a>
                    </li>

                <?php endwhile; ?>
            </ul>
        </nav>

        <div id="content">