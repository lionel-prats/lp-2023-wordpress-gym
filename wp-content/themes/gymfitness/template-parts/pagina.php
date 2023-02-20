<?php 
    while(have_posts()): the_post();

        the_title('<h1 class="text-center text-primary">','</h1>');
        if (has_post_thumbnail()) {
            the_post_thumbnail('full', array(
                'class' => 'imagen-destacada',
                'alt' => 'Imagen Sobre Nosotros',
            ));
        }
        the_content();

    endwhile;

    /* 
    2050
    

    
    
    
    
    
    */