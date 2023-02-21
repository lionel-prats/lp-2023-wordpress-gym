<!-- pagina galeria -->

<?php
    /*  
    * Template Name: Galería
    */
    get_header(); 
?>
    <main class="contenedor seccion">
        <?php 
            while(have_posts()): the_post();
                the_title('<h1 class="text-center text-primary">','</h1>');

                $galeria = get_post_gallery( get_the_ID(), false );
                // obtengo la galeria de imagenes de la pagina galeria (esta galeria la creamos desde el dashboard en el video 73) 

                $galeria_imagenes_id = explode(',', $galeria['ids']);
                // obtengo un array con los id de las imagenes de la galeria de imagenes, de la pagina galeria
                ?>
                <ul class="galeria-imagenes">
                    <?php 
                        foreach($galeria_imagenes_id as $id){
                            $imagen_grande = wp_get_attachment_image_src($id, "large")[0];
                            // obtenemos el path en el servidor de version de la imagen, 1024*682
                            // esta imagen la usaremos en la galeria
                            
                            $imagen_full = wp_get_attachment_image_src($id, "full")[0];
                            // obtenemos el path en el servidor de version de la imagen, maxima resolucion
                            // esta imagen se renderizara cuando el usuario haga click sobre una imagen
                            ?>
                                <li>
                                    <a href="<?php echo $imagen_full; ?>" data-lightbox="galeria">
                                        <img src="<?php echo $imagen_grande; ?>" alt="imagen galeria">
                                    </a>
                                </li>
                            <?php
                        }
                    ?>
                </ul>
                <?php
            endwhile;
        ?>
    </main>
<?php 
    get_footer();
?>