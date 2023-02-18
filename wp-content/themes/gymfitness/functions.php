<?php

// funcion para habilitar menus en dashboard/temas
function gymfitness_menus() {
    register_nav_menus([
        'menu-principal' => __('Menu Principal', 'gymfitness'),
        'redes-sociales' => __('Redes Sociales', 'gymfitness')
        // register_nav_menus() -> funcion para registrar menus de navegacion en dashboard/temas
        // como parametro recibe un array asociativo con los diferentes menus que queremos registrar
        // 'gymfitness' hace referencia al Text Domain del Gist en style.css
        // los menus creados se almacenan en la tabla wp_terms
    ]);
}
add_action('init', 'gymfitness_menus');
// el hook init se ejecuta una vez que arranca wordpress (33)

//----------------------------------------------------------------------------------------------

// funcion para agregar archivos .css y .js a las vistas
function gymfitness_scripts_styles() {
    wp_enqueue_style('normalize', 'https://necolas.github.io/normalize.css/8.0.1/normalize.css', array(), '8.0.1');
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize'), '1.0.0');
    // funcion de wp para agregar hojas de estilo
    // 1er parametro, identificador de la hoja de estilos (debe ser unico por cada hoja de estilo que querramos cargar)
    // 2do parametro, ubicacion del archivo (un echo devuelve http://localhost/lp-2023-wordpress-gimnasio/wp-content/themes/gymfitness/style.css)
    // 3er parametro, array de dependencias (las dependencias son las hojas de estilo que queremos que se cargen antes que esta - por ejemplo, normalize) 
    // 4to parametro, version
}
add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles');