<?php 
    get_header(); 
?>
    <?php if(is_page('inicio')) { ?>

        <section class="bienvenida seccion contenedor text-center">
                <h2 class="text-primary"><?php  the_field("encabezado_bienvenida"); ?></h2>
                <p><?php  the_field("texto_bienvenida"); ?></p>
        </section>

        <section class="areas">    
            <div class="area">
                <?php 
                    $area = get_field('area_1');
                    $imagen_area = $area['imagen']['sizes']['medium_large'];
                    $texto_area = $area["texto"];
                ?>
                <img src="<?php echo esc_attr($imagen_area); ?>" alt="imagen <?php echo esc_attr($texto_area); ?>">
                <p><?php echo esc_html($texto_area); ?></p>
            </div>
            
            <div class="area">
                <?php 
                    $area = get_field('area_2');
                    $imagen_area = $area['imagen']['sizes']['medium_large'];
                    $texto_area = $area["texto"];
                ?>
                <img src="<?php echo esc_attr($imagen_area); ?>" alt="imagen <?php echo esc_attr($texto_area); ?>">
                <p><?php echo esc_html($texto_area); ?></p>
            </div>
            
            <div class="area">
                <?php 
                    $area = get_field('area_3');
                    $imagen_area = $area['imagen']['sizes']['medium_large'];
                    $texto_area = $area["texto"];
                ?>
                <img src="<?php echo esc_attr($imagen_area); ?>" alt="imagen <?php echo esc_attr($texto_area); ?>">
                <p><?php echo esc_html($texto_area); ?></p>
            </div>

            <div class="area">
                <?php 
                    $area2 = get_field('area_4');
                    $imagen_area = $area2['imagen']['sizes']['medium_large'];
                    $texto_area = $area2["texto"];
                ?>
                <img src="<?php echo esc_attr($imagen_area); ?>" alt="imagen <?php echo esc_attr($texto_area); ?>">
                <p><?php echo esc_html($texto_area); ?></p>
            </div>
        </section>

        <main class="contenedor seccion">
            <h2 class="text-center text-primary">Nuestras Clases</h2>
            <?php 
                gymfitness_lista_clases(4); 
                // funcion creada en /includes y puesta a disposicion globalmente al requerirla en functions.php
            ?>
        </main>


        










    <?php }; ?>
<?php 
    get_footer();
?>