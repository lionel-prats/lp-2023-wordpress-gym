<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>  
    <!-- funcion de wp que agrega muscha informacion interna de wp al <head>, muchos <scripts> y <links> (entre ellos los <scripts> y <links> que hayamos definido en functions.php) -->
</head>
<body>

    <header class="header">
        <div class="contenedor barra-navegacion">
            <div class="logo">
                <a href="<?php echo site_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="logotipo">
                </a>
            </div>
            <?php 
                wp_nav_menu([
                    'theme_location => menu-principal',
                    'container' => 'nav',
                    'container_class' => 'menu-principal'
                ]);
                // theme_location == identificador del menu
                // container == elemento html contenedor del menu (por defecto es un <div>)
                // container_class == agregar clases al container 'clase1 clase2 clase3'
            ?>
        </div>
    </header>