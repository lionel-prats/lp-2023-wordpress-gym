<!-- esta es la plantilla de la pagina Clases, y en el <main> vamos a mostrar los post-type gymfitness_clases  -->
    
<?php
    /*  
    * Template Name: Listado de clases
    */
    get_header(); 
?>
    <main class="contenedor seccion">
        <?php get_template_part('template-parts/pagina'); ?>
        <?php 
            gymfitness_lista_clases(); 
            // funcion creada en /includes y puesta a disposicion globalmente al requerirla en functions.php
        ?>
    </main>
<?php 
    get_footer();
?>