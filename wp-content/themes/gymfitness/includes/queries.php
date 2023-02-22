<!-- creado en el video 97 - Mostrando el listado de clases (en front-page.php) - -->
<!-- surge por la necesidad de crear una funcion para reutilizar codigo en 2 templates distintos -->
<?php 

function gymfitness_lista_clases($cantidad = -1) {
    ?>
        <ul class="listado-grid">
            <?php
            // array con el post-type que nos interesa
            $args= array(    
                "post_type" => "gymfitness_clases",
                "posts_per_page" => $cantidad,
            );
            // instancia de la clase WP_Query
            $clases = new WP_Query($args);

            // forma de iterar por los posts del post-type gymfitness_clases
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
    <?php 
}