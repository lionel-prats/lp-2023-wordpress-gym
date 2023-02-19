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
// inyectara algunas hojas de estilo internas de wordpress
// seteara el <head> cargando mucha data (chequear en las dev tools del navegador)
// entre otras cosas cargara los archivos que registremos en gymfitness_scripts_styles()

// ------------------------------------------------------------------------------------------------

// video 42
get_header();
// esta funcion incluira el contenido de header.php

the_title('<h1 class="text-center text-primary">','</h1>');
// esta funcion incluye el titulo de un post/entrada/etc, y le podemos pasar por parametro la/s etiquetas html contenedoras (opcional)

the_content();
// esta funcion incluye el contenido de un post/entrada/etc, por defecto va en envuelto en un <p></p> 
// podemos editar el formato html del content, desde el dashboard, con el panel de edicion de la entrada/post/etc (opciones Visual y HTML)

// ------------------------------------------------------------------------------------------------

// video 43

// en functions.php
function gymfitness_setup (){
    // imagenes destacadas 
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'gymfitness_setup');
// el hook after_setup_theme se ejecuta una vez que un tema ha sido activado (43)
// se activa el tema y se ejecuta automaticamente esta funcion
// todo este codigo habilitara una "caja" en el dashboard, cuando entremos a editar una pagina/entrada/etc, que estara en el panel lateral derecho, que nos permitira agregar una imagen destacada al post que estemos editando
// al agregar una imagen destacada, se creara una carpeta "uploads" en la raiz del proyecto, con una subcarpteta 2023 (corresponiente al año en que fue subida la imagen), y dentro una subcarpeta 02 (correspondiente al mes en que fue subida la imagen), que contendra 6 versiones de la imagen subida (la version original con el nombre original + 5 versiones de diferentes tamaños, para las distintas resoluciones de pantalla)
// default -> weight-lifting-1284616_1920.jpg                       -> 336KB
// 150px * 150px -> weight-lifting-1284616_1920-150x150.jpg         -> 7KB
// 300px * 200px -> weight-lifting-1284616_1920-300x200.jpg         -> 15KB
// 768px * 512px -> weight-lifting-1284616_1920-768x512.jpg         -> 52KB
// 1024px * 682px -> weight-lifting-1284616_1920-1024x682.jpg       -> 79KB
// 1536px * 1023px -> weight-lifting-1284616_1920-1536x1023.jpg     -> 145KB
// este codigo habilitara "la caja" de manera global (para entradas, pages, etc)

// en vistas
if (has_post_thumbnail()) {

    the_post_thumbnail('full', array(
        'class' => 'imagen-destacada',
        'alt' => 'Imagen Sobre Nosotros',
    ));
    // funcion encargada de incluir en una vista (page/entrada/etc) la imagen destacada asociada a dicho post

}
// la funcion has_post_thumbnail() retornara 1 si el post tiene imagen destacada y nada si no la tiene
// ejecutar the_post_thumbnail() dentro del if(has_post_thumbnail()) nos asegura que la funcion the_post_thumbnail() no se ejecute innecesariamente (no se ejecutara en posts sin imagen destacada)
// los parametros son opcionales - funciona sin pasarle ninguno
// 1er param == tamaño de la imagen
// 2do. param == arreglo de atributos HTML
// funcion encargada de incluir en una vista (page/entrada/etc) la imagen destacada asociada a dicho post
// lo hace con el siguiente formato
/* 
<img 
    width="1920" 
    height="1279" 
    src="http://localhost/lp-2023-wordpress-gimnasio/wp-content/uploads/2023/02/weight-lifting-1284616_1920.jpg" 
    class="attachment-post-thumbnail size-post-thumbnail wp-post-image" 
    alt="" 
    decoding="async" 
    srcset="
        http://localhost/lp-2023-wordpress-gimnasio/wp-content/uploads/2023/02/weight-lifting-1284616_1920.jpg 1920w, 
        http://localhost/lp-2023-wordpress-gimnasio/wp-content/uploads/2023/02/weight-lifting-1284616_1920-300x200.jpg 300w, 
        http://localhost/lp-2023-wordpress-gimnasio/wp-content/uploads/2023/02/weight-lifting-1284616_1920-1024x682.jpg 1024w, 
        http://localhost/lp-2023-wordpress-gimnasio/wp-content/uploads/2023/02/weight-lifting-1284616_1920-768x512.jpg 768w, 
        http://localhost/lp-2023-wordpress-gimnasio/wp-content/uploads/2023/02/weight-lifting-1284616_1920-1536x1023.jpg 1536w
    " 
    sizes="(max-width: 1920px) 100vw, 1920px" 
/>
*/

// ------------------------------------------------------------------------------------------------

// video 45

get_template_part('template-parts/pagina');
// con esta funcion podemos incluir parciales 
// pueden estar dentro de carpetas, como en este caso, o archivos directamente ubicados en la raiz
// la carpeta y/o el archivo pueden tener cualquier nombre, en este caso le puse template-parts a la carpeta, y pagina al archivo parcial

// ------------------------------------------------------------------------------------------------

// video 46
get_footer();
// funcion para incluir el archivo footer.php

// ------------------------------------------------------------------------------------------------

// video 47
get_bloginfo();
// funcion para acceder a informacion del sitio en dashboard/ajustes/generales

// ------------------------------------------------------------------------------------------------

// video 48
wp_footer();
// funcion para mostrar la barra de tareas de wp, en las vistas, arriba de todo, mientras estamos autenticados           
// va entre la etiqueta de cierre del <footer> y la etiqueta de cierre del <body> vvv
/* 
    </footer>
    <?php wp_footer(), ?>
</body>
*/

// ------------------------------------------------------------------------------------------------

// video 49

// en functions.php
function nombreFuncion (){
    add_theme_support('title-tag');
    // funcion para habilitar menus en dashboard/temas
}
add_action('after_setup_theme', 'nombreFuncion');

// ejecutando la funcion add_theme_support('title-tag'); en functions.php (en la funcion que se ejecute con el hook 'after_setup_theme'), y eliminando del <head> del <title> (en header.php), los titulos de las vistas van a cargarse dinamicamente y se imprimira el nombre del post que se este renderizando (page, entrada, etc)