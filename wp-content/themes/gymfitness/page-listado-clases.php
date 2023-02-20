<?php
    /*  
    * Template Name: Listado de clases
    */
    get_header(); 
?>
    <main class="contenedor seccion" style="background-color: salmon;">
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
                        <?php the_permalink(); ?>
                        <h3><?php the_title(); ?></h3>
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
