<?php

function gymfitness_setup (){
    // imagenes destacadas 
    add_theme_support('post-thumbnails');
    //titulos para SEO
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'gymfitness_setup');
// el hook after_setup_theme se ejecuta una vez que un tema ha sido activado (43)
// se activa el tema y se ejecuta automaticamente esta funcion
// todo este codigo habilitara una "caja" en el dashboard, cuando entremos a editar una pagina/entrada/etc, que estara en el panel lateral derecho, que nos permitira agregar una imagen destacada al post que estemos editando
// al agregar una imagen destacada, se creara una carpeta "uploads" en la raiz del proyecto, con una subcarpteta 2023 (corresponiente al año en que fue subida la imagen), y dentro una subcarpeta 02 (correspondiente al mes en que fue subida la imagen), que contendra 6 versiones de la imagen subida (la version original con el nombre original + 5 versiones de diferentes tamaños, para las distintas resoluciones de pantalla)
// default -> weight-lifting-1284616_1920.jpg
// 150px * 150px -> weight-lifting-1284616_1920-150x150.jpg
// 300px * 200px -> weight-lifting-1284616_1920-300x200.jpg 
// 768px * 512px -> weight-lifting-1284616_1920-768x512.jpg 
// 1024px * 682px -> weight-lifting-1284616_1920-1024x682.jpg 
// 1536px * 1023px -> weight-lifting-1284616_1920-1536x1023.jpg 


//----------------------------------------------------------------------------------------------

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