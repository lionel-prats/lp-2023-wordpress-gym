<!-- template para ver las entradas asociadas a una categoria en particular -->

<?php 
    get_header(); 
?>
    <main class="seccion contenedor">
        <?php 
            $categoria = get_queried_object();
            // esta funcion retorna info acerca de la consulta interna que hace WP a la BD cuando refresacamos la vista donde esta incluida esta funcion (video 82)
            // es un object(WP_Term)
        ?>
        <h2 class="text-center"><span class="text-primary">Categoría:</span> <?php echo $categoria->name; ?></h2>
        <ul class="listado-grid">
            <?php
                while(have_posts()) { 
                    the_post();
                    get_template_part('template-parts/blog');
                };
            ?>
        </ul>
    </main>
<?php
    get_footer();
?>