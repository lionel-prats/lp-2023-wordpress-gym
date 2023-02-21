<!-- vista de una entrada en particular -->
<?php 
    get_header(); 
?>
    <main class="contenedor seccion">
        <!-- requerimos el template part post.php -->
        <?php get_template_part('template-parts/post'); ?>
    </main>
<?php 
    get_footer();
?>