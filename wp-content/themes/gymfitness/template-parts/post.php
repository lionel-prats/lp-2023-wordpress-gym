<!-- parcial (template part) para las vistas de una entrada en particular -->
<?php 
    while(have_posts()): the_post();

        the_title('<h1 class="text-center text-primary">','</h1>');
        if (has_post_thumbnail()) {
            the_post_thumbnail('full', array(
                'class' => 'imagen-destacada',
                'alt' => 'Imagen Sobre Nosotros',
            ));
        }
        ?>
        <div class="meta-info">
            <p class="meta">
                <span>Por: </span>
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                    <?php echo get_the_author_meta('display_name'); ?>    
                </a>
            </p>
            <div class="categorias">
                <p class="meta">
                    <span>Categorías: </span>
                </p>
                <?php the_category(); ?>
            </div>
            <p class="meta">
                <span>Fecha: </span>
                <?php the_time( get_option('date_format') ); ?>
            </p>
        </div>

        <?php

        the_content();

       

    endwhile;
