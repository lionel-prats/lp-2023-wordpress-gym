<?php 

// video 29
while(have_posts()): the_post();
    the_title();
    the_content();    
endwhile;
// el loop de wordpress
// sirve para iterar el contenido de la tabla wp_posts (?)

// ------------------------------------------------------------------------------------------------

// video 31
language_attributes(); 
// esta funcion imprimira el atributo lang="es-AR", que hara referencia al idioma que seleccionaste para tu proyecto, en la etiqueta <html> de los documentos html del proyecto 
// <html <php language_attributes(); >>
// <html lang="es-AR">

// ------------------------------------------------------------------------------------------------

// video 32
echo get_template_directory_uri();
// http://localhost/lp-2023-wordpress-gimnasio/wp-content/themes/gymfitness
// path desde la raiz del proyecto hasta el archivo donde la ubicacion del tema

// ------------------------------------------------------------------------------------------------

// video 33
function gymfitness_menus() {
    register_nav_menus(array(
        'menu-principal' => __('Menu Principal', 'gymfitness'),
        'redes-sociales' => __('Mono Loco', 'gymfitness')
        // register_nav_menus() -> funcion declarada en functions.php para registrar menus de navegacion
        // como parametro recibe un array asociativo con los diferentes menus que queremos registrar
    ));
}
add_action('hook', 'funcion_a_ejecutar');
add_filter();
// add_action() -> forma de ejecutar funciones en functions.php para agregar codigo 
// add_filter() -> forma de ejecutar funciones en functions.php para modificar la informacion 
// 'gymfitness' hace referencia al Text Domain del Gist en style.css
// esta funcion nos habilita la opcion "Menús" en el dashboard

// ------------------------------------------------------------------------------------------------

// video 34

wp_nav_menu([
    'theme_location => menu-principal',
    'container' => 'nav',
    'container_class' => 'menu-principal'
]);
// funcion para agregar un menu al documento html
// theme_location indica cual menu de los registrados en functions.php queremos agregar al html
// con container seteamos que etiqueta html sera el contenedor del menu (por defecto es un <div>)
// con container_class seteamos que clases tendra el contenedor

// ------------------------------------------------------------------------------------------------

// video 35

// en functions.php
// funcion para agregar archivos .css y .js a las vistas
function gymfitness_scripts_styles() {
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0.0');
    // wp_enqueue_style -> funcion para registrar una hoja de estilo (en functions.php)
    // el primer parametro es un nombre (debe ser unico por cada hoja de estilo o por cada script que querramos registrar)
    // 2° par -> get_stylesheet_uri() retorna el path al archivo style.css
    // http://localhost/lp-2023-wordpress-gimnasio/wp-content/themes/gymfitness/style.css
    // 3° par -> dependencias -> enviamos dentro de una array las hojas de estilo que necesitamos que se carguen previamente (si no hay dependencias enviamos un array vacio)
    // 4° par -> version
}
add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles');
// gymfitness_scripts_styles -> vamos a usar la misma funcion para registrar tanto archivos .js como .css
// usamos el hook 'wp_enqueue_scripts' para ejecutar la funcion que registrara stylesheets y scripts

// en <head></head>
wp_head();
// funcion que ejecutamos dentro del <head>
// seteara el <head> cargando mucha data (chequear en las dev tools del navegador)
// entre otras cosas cargara los archivos que registremos en gymfitness_scripts_styles()

// ------------------------------------------------------------------------------------------------

// video ?

