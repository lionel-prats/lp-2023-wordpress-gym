<!-- esta es la plantilla de la pagina Clases, y en el <main> vamos a mostrar los post-type gymfitness_clases  -->
    
<?php
    /*  
    * Template Name: Listado de clases
    */
    get_header(); 
?>

    <main class="contenedor seccion">

        <?php get_template_part('template-parts/pagina'); ?>

        <ul class="listado-grid">
            <?php
            // array con el post-type que nos interesa
            $args= array(    
                "post_type" => "gymfitness_clases",
            );
            // instancia de la clase WP_Query
            $clases = new WP_Query($args);

            // forma de iterar por por los posts del post-type gymfitness_clases
            while($clases->have_posts()):
                $clases->the_post();
            ?>
            <li class="card">
                <?php the_post_thumbnail(); ?>
                <div class="contenido">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                        <?php
                            $hora_inicio = get_field('hora_inicio'); 
                            $hora_fin = get_field('hora_fin'); 
                        ?>
                        <p>
                            <?php the_field('dias_clase'); ?> - <?php echo "$hora_inicio a $hora_fin"; ?>
                        </p>
                    </a>
                </div>
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
?>