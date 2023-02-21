<?php

// includes 
require get_template_directory() . "/includes/widgets.php";

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