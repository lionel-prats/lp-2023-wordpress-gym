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
    // agregamos normalize al <head>

    wp_enqueue_style('lightboxcss',  get_template_directory_uri() . "/css/lightbox.min.css", array(), '2.11.3');
    // agregamos lightbox al <head>
    
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize'), '1.0.0');
    // agregamos style.css al <head>
    //  wp_enqueue_style() -> funcion de wp para agregar hojas de estilo
    // 1er parametro, identificador de la hoja de estilos (debe ser unico por cada hoja de estilo que querramos cargar)
    // 2do parametro, ubicacion del archivo (un echo devuelve http://localhost/lp-2023-wordpress-gimnasio/wp-content/themes/gymfitness/style.css)
    // 3er parametro, array de dependencias (las dependencias son las hojas de estilo que queremos que se cargen antes que esta - por ejemplo, normalize) 
    // 4to parametro, version

    // archivos js
    wp_enqueue_script('jquery');
    // agregamos jquery al <head> (no hace falta nada mas que esto ya que WP trae jquery incorporado)
    // otra forma valida de incorporarlo, en este caso, seria agregarlo al array de dependencias de lightbox (abajo), en lugar de escribir esta linea

    wp_enqueue_script('lightboxjs', get_template_directory_uri() . "/js/lightbox.min.js", array(), '2.11.3', true); 
    // con el parametro true indicamos que queremos que este archivo se carge en el footer y no el head
    // agregamos lightbox al footer (video 76)
}
add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles');

// definir zona de widgets 
function gymfitness_widgets() {
    register_sidebar(array(
        'name' => 'Sidebar 1', // forma en la que podemos identificar un sidebar
        'id' => 'sidebar_1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center text-primary">',
        'after_title' => '</h3>'
    ));
    // registro 1 widwet de nombre Sidebar 1 (chequear en /Dashboard/Apariencia/Widgets)
    
    register_sidebar(array(
        'name' => 'Sidebar 2', // forma en la que podemos identificar un sidebar
        'id' => 'sidebar_2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center text-primary">',
        'after_title' => '</h3>'
    ));
    // registro 1 widwet de nombre Sidebar 1 (chequear en /Dashboard/Apariencia/Widgets)
    
    // register_sidebar() -> funcion de WP que nos permite añadir una zona de widgets
    // register_sidebar() -> funcion de WP que nos permite registrar un widget
}
add_action('widgets_init', 'gymfitness_widgets');
// al agregar este bloque, en el dashboard se agregara el item /Apariencia/Widgets