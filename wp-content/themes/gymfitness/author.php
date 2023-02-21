<!-- template para ver las entradas asociadas a un autor en particular -->

<?php 
    get_header(); 
?>
    <main class="seccion contenedor">
        <?php 
            $autor = get_queried_object();
            // esta funcion retorna info acerca de la consulta interna que hace WP a la BD cuando refresacamos la vista donde esta incluida esta funcion (video 82)
            // es un object(WP_Term)
            /* echo "<pre>";
            print_r($autor);
            echo "</pre>"; */
        ?>
        <div class="author-page-heading">
            <h2 class="text-center">
                <span class="text-primary">Autor:</span> 
                <?php 
                    // echo $autor->data->display_name;
                    // el profesor uso esta forma para imprimir el nombre del autor...
                    // yo use la de abajo y funciono perfecto (video 83)
                    echo get_the_author_meta('display_name');
                ?>
            </h2>
            <p class="text-center">
                <span>Sobre mí:</span>   
                <?php
                    // echo get_the_author_meta('description', $autor->data->ID);
                    // el profesor uso esta forma para imprimir la informacion biogragica del autor (editable en el dashboard)...
                    // yo use la de abajo, sin pasar el id del autor como 2do. parametro, y funciono perfecto (video 83)
                    echo get_the_author_meta('description');
                ?>
            </p>
        </div>
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