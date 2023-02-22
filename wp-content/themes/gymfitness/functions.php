<?php

// includes 
require get_template_directory() . "/includes/widgets.php";
require get_template_directory() . "/includes/queries.php";

function gymfitness_setup (){
    // imagenes destacadas 
    add_theme_support('post-thumbnails');
    //titulos para SEO (titulos en la pestaña del navegador)
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'gymfitness_setup');

// funcion para habilitar menus en dashboard/temas
function gymfitness_menus() {
    register_nav_menus([
        'menu-principal' => __('Menu Principal', 'gymfitness'),
        'redes-sociales' => __('Redes Sociales', 'gymfitness')
    ]);
}
add_action('init', 'gymfitness_menus');

// funcion para agregar archivos .css y .js a las vistas
function gymfitness_scripts_styles() {
    // archivos css
    wp_enqueue_style('normalize', 'https://necolas.github.io/normalize.css/8.0.1/normalize.css', array(), '8.0.1');
    wp_enqueue_style('lightboxcss', get_template_directory_uri() . "/css/lightbox.min.css", array(), '2.11.3');
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize'), '1.0.0');
    
    // archivos js
    wp_enqueue_script('jquery');
    wp_enqueue_script('lightboxjs', get_template_directory_uri() . "/js/lightbox.min.js", array(), '2.11.3', true); // con el parametro true indicamos que queremos que este archivo se carge en el footer y no el head
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
    register_sidebar(array(
        'name' => 'Sidebar 2', // forma en la que podemos identificar un sidebar
        'id' => 'sidebar_2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center text-primary">',
        'after_title' => '</h3>'
    ));
}
add_action('widgets_init', 'gymfitness_widgets');

// crear shortcuts (video 88 - Shortcode API en Wordpress)
// este shortcode lo renderizo en la pagina de contacto
// para eso, desde el dashboard, en el content de la pagina contacto, pego el shortcode con el siguiente formato vvv
// [gymfitness_ubicacion]
// gymfitness_ubicacion es el primer parametro que le pasamos a add_shortcode(), al final de esta funcion
function gymfitness_ubicacion_shortcode() {
    ?>
        <div class="mapa">
            <?php 
                if(is_page('contacto')){
                    the_field("ubicacion");
                };
            ?>
        </div>
        <h2 class="text-center text-primary">Formulario de contacto</h2>
    <?php
    echo do_shortcode('[contact-form-7 id="142" title="Contact form 1"]');
    // con la funcion do_shortcode() puedo renderizar un shortcode
    // en este caso, estamos renderizando el shortcode de Contact form 1 (Contact Form 7), que es el formulario de contacto, dentro de esta funcion (en functions.php), pero podemos renderizarlo desde cualquir parte del tema (en cualquier template)
}
add_shortcode('gymfitness_ubicacion', 'gymfitness_ubicacion_shortcode');
// usando la funcion add_shortcode() podemos crear nuestros propios shortcodes 