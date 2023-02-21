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
// path desde la raiz del servidor hasta el la carpeta del tema

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
get_header('parametro - opcional');
// esta funcion incluira el contenido de header.php
// si le pasamos un parametro, WP buscara header-parametro.php

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
get_footer('parametro - opcional');
// funcion para incluir el archivo footer.php
// si le pasamos un parametro, WP buscara footer-parametro.php

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
    //titulos para SEO
}
add_action('after_setup_theme', 'nombreFuncion');

// ejecutando la funcion add_theme_support('title-tag'); en functions.php (en la funcion que se ejecute con el hook 'after_setup_theme'), y eliminando del <head> del <title> (en header.php), los titulos de las vistas van a cargarse dinamicamente y se imprimira el nombre del post type que se este renderizando (page, entrada, etc)

// ------------------------------------------------------------------------------------------------
// video 52

// en el plugin gymfitness_post_types 
if(!defined('ABSPATH')) die();
// funcion interna de WP para que no se pueda acceder al archivo desde la URL
// sin este if se podria acceder desde la URL con el siguiente path
// http://localhost/lp-2023-wordpress-gimnasio/wp-content/plugins/gymfitness-post-types/gymfitness_post_types.php
// probe de meter este if en archivos dentro de /theme y parece que la constante se define en alguna parte ya que para que muera el proceso tengo que quitar el "!" -> if(defined('ABSPATH')) die();


register_post_type( 'gymfitness_clases', $args );
// funcion para registrar un custom post type (lo implemente dentro del plugin 'gymfitness_post_types') 
// el primer parametro es el nombre que le doy al custom post type creado
// el 2do parametro es el array de configuracion

// ------------------------------------------------------------------------------------------------
// video 54
?>

<!-- archivo page-listado-clases (sera la pagina que renderize las distintas clases)  -->
<?php
    /*  
    * Template Name: Listado de clases
    */
    get_header(); 
?>
    <main class="contenedor seccion">

        <h1>Listado de clases</h1>
        <ul class="listado-grid">
            <?php
            $args= array(    
                "post_type" => "gymfitness_clases",
                // le pasamos el nombre del post type
            );
            $clases = new WP_Query($args);
            // instancia de la clase WP_Query (para crear consultas mas complejas a la BD)
            // esta clase nos va a permitir consultar la BD de WP cuando no se trata de consultas standard en WP
            // las consultas standard de WP se hacen por medio de los templates; cada template hace una consulta
            // cuando querramos modificar las consultas standard, podemos usar esta clase
            // forma de hacer una consulta al custom post type "gymfitness_clases", creado por nosotros

            while($clases->have_posts()):
                $clases->the_post();
            ?>
            <li class="card">
                <?php the_title(); ?>
            </li>
            <?php  
            endwhile;
            wp_reset_postdata();
            // resetamos la consulta de WP personalizada
            ?>
        </ul>
        

    </main>

<?php 
    get_footer();

// ------------------------------------------------------------------------------------------------
// video 55 

the_permalink();
// retorna la url a una entrada (dentro de un loop (?))
// en este caso, lo use en page-listado-clases.php, durante la iteracion de las clases
// http://localhost/lp-2023-wordpress-gimnasio/gymfitness_clases/primer-semana-de-gym/

//------------------------------------------------------------------------------------------------
// video 58 

// en page-listado-clases.php
the_field('hora_inicio');
// funcion del plugin Advanced Custom Fields
// imprime por pantalla el contenido de un campo (le pasamos el Name)

get_field('hora_inicio');
// funcion del plugin Advanced Custom Fields
// retorna (NO IMPRIME) el contenido de un campo (le pasamos el Name)

//------------------------------------------------------------------------------------------------
// video 65 

// en pagina.php
is_single();
// funcion de WP que devuelve TRUE si el loop de WP esta iterando sobre una entrada o un custom-post-type y FALSE si esta iterando sobre otro tipo de post (page)
// a esta funcion se la conoce en WP como conditionals_tags o etiquetas condicionales

is_page();
// igual que la anterior pero retorna TRUE si estamos iterando pages y FALSE si estamos iterando entradas o custom-post-types

// al final, crea un nuevo parcial (clase.php) para diferenciar el loop para el custom-post-type clases del parcial con el loop para paginas (pagina.php)

//------------------------------------------------------------------------------------------------
// video 66

// en functions.php 

// definir zona de widgets 
function gymfitness_widgets() {
    register_sidebar(array(
        'name' => 'Sidebar 1', // forma en la que podemos identificar un sidebar
        'id' => 'sidebar_1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center text-primary">',
        'after_title' => '</h3">'
    ));
    // registro 1 widwet de nombre Sidebar 1 (chequear en /Dashboard/Apariencia/Widgets)
    
    register_sidebar(array(
        'name' => 'Sidebar 2', // forma en la que podemos identificar un sidebar
        'id' => 'sidebar_2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center text-primary">',
        'after_title' => '</h3">'
    ));
    // registro 1 widwet de nombre Sidebar 1 (chequear en /Dashboard/Apariencia/Widgets)

    // register_sidebar() -> funcion de WP que nos permite añadir una zona de widgets
    // register_sidebar() -> funcion de WP que nos permite registrar un widget
}
add_action('widgets_init', 'gymfitness_widgets');
// al agregar este bloque, en el dashboard se agregara el item /Apariencia/Widgets

//------------------------------------------------------------------------------------------------
// video 67

// en single-gymfitness_clases.php 

dynamic_sidebar('sidebar_1');
// con esta funcion podemos incluir un widget que hayamos definido, en una vista 
// *** aunque el nombre de la funcion diga sidebar, podemos insertar un widget en cualquier parte del codigo
// debemos pasarle el id refinido a la hora de crear ek widget (en functions.php), es decir, el id de la zona de widgets que querramos agregar
// el widget 'sidebar 1' sera el siguiente bloque de codigo
/* 
<div class="widget">
    <h3 class="text-center text-primary">Título del Widget</h3>
    <form>
        <div>
            <label>Buscar:</label>
            <input type="text">
            <input type="submit" value="Buscar">
        </div>
    </form>
</div>
*/

// luego, crea el sidebar.php y pega el codigo con la funcion dynamic_sidebvar('sidebar_1');

get_sidebar();
// con esta funcion se agrega el contenido de sidebar.php


// luego, crea el sidebar-clases.php y pega el codigo de sidebar.php, y hace la siguiente modificacion 
// dynamic_sidebvar('sidebar_2');
// o sea, que sidebar-clases.php apuntara al widget sidebar_2

get_sidebar('clases');
// al pasarle este parametro a la funcion, esta funcion buscara el archivo sidebar-clases.php y renderizara su contenido

//------------------------------------------------------------------------------------------------
// video 68

// COMO CREAR UN WIDGET PROPIO 

// dentro del tema creamos /includes/widgets.php 
// dentro pegamos el codigo del gist que nos paso el profesor 
// con esto, creamos el widget GymFitness_Clases_Widget

// luego. en funcions.php
require get_template_directory() . "/includes/widgets.php";
// importamos en functions.php el widget recien creado, y con esto se incluira en /dashboard/Apariencia/Widgets, para que podamos seleccionarlo

//------------------------------------------------------------------------------------------------
// video 69

echo "<h2>Hola</h2>"; // Imprime una etiqueta <h2>Hola</h2>
echo esc_html("<h2>Hola</h2>"); // imprime el string "<h2>Hola</h2>"

// en este video explica como configurar el widget GymFitness_Clases_Widget, en /includes/widgets.php
// en esta configuracion usa unas cuantas funciones que no explica que hacen (repasar)

//------------------------------------------------------------------------------------------------
// video 71

// en /include/widgets
the_post_thumbnail('thumbnail');
// aca le pasamos 'thumbnail' como argumento para que renderize la version mas chica de cada imagen asociada a la clase que estamos iterando (la de 150*150)

// https://developer.wordpress.org/reference/functions/the_post_thumbnail/
//Default WordPress
the_post_thumbnail( 'thumbnail' );     // Thumbnail (150 x 150 hard cropped)
the_post_thumbnail( 'medium' );        // Medium resolution (300 x 300 max height 300px)
the_post_thumbnail( 'medium_large' );  // Medium Large (added in WP 4.4) resolution (768 x 0 infinite height)
the_post_thumbnail( 'large' );         // Large resolution (1024 x 1024 max height 1024px)
the_post_thumbnail( 'full' );          // Full resolution (original size uploaded)

//With WooCommerce
the_post_thumbnail( 'shop_thumbnail' ); // Shop thumbnail (180 x 180 hard cropped)
the_post_thumbnail( 'shop_catalog' );   // Shop catalog (300 x 300 hard cropped)
the_post_thumbnail( 'shop_single' );    // Shop single (600 x 600 hard cropped)

//------------------------------------------------------------------------------------------------
// video 74

// en page-galeria.php
$galeria = get_post_gallery( get_the_ID(), false );
// obtengo la galeria de imagenes de la pagina galeria (esta galeria la creamos desde el dashboard en el video 73) 

$imagenGrande = wp_get_attachment_image_src($id, "medium");
// a la funcion wp_get_attachment_image_src() le pasamos el id de una imagen y nos retornara un array con datos de esa imagen en el servidor, entre ellos el path donde esta ubicado

//------------------------------------------------------------------------------------------------
// video 76 

// en functions.php 
wp_enqueue_script('lightboxjs', get_template_directory_uri() . "/js/lightbox.min.js", array(), '2.11.3', true); 
// funcion para registrar en el documento HTML un archivo .js
// con el parametro true indicamos que queremos que este archivo se carge en el footer y no el head

