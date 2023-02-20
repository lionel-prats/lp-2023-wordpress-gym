<?php
/*
    Plugin Name: Gym Fitness - Post Types
    Plugin URI: http://twitter.com/codigoconjuan
    Description: Añade Post Types al sitio Gym Fitness
    Version: 1.0.0
    Author: Juan Pablo De la torre Valdez
    Author URI: http://twitter.com/codigoconjuan
    Text Domain: gymfitness
*/

if(!defined('ABSPATH')) die();

// Registrar Custom Post Type
function gymfitness_clases_post_type() {

	$labels = array(
		'name'                  => _x( 'Clases', 'Post Type General Name', 'gymfitness' ),
		'singular_name'         => _x( 'Clase', 'Post Type Singular Name', 'gymfitness' ),

		'menu_name'             => __( 'Clases', 'gymfitness' ), 
        // nombre del item en el panel izquierdo del dashboard
		
        'name_admin_bar'        => __( 'Clase', 'gymfitness' ),
		'archives'              => __( 'Archivo', 'gymfitness' ),
		'attributes'            => __( 'Atributos', 'gymfitness' ),
		'parent_item_colon'     => __( 'Clase Padre', 'gymfitness' ),
		'all_items'             => __( 'Todas Las Clases', 'gymfitness' ), // subitem
		'add_new_item'          => __( 'Agregar Clase', 'gymfitness' ),
		'add_new'               => __( 'Agregar Clase', 'gymfitness' ), // subitem
		'new_item'              => __( 'Nueva Clase', 'gymfitness' ),
		'edit_item'             => __( 'Editar Clase', 'gymfitness' ),
		'update_item'           => __( 'Actualizar Clase', 'gymfitness' ),
		'view_item'             => __( 'Ver Clase', 'gymfitness' ),
		'view_items'            => __( 'Ver Clases', 'gymfitness' ),
		'search_items'          => __( 'Buscar Clase', 'gymfitness' ),
		'not_found'             => __( 'No Encontrado', 'gymfitness' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'gymfitness' ),

        // imagen destacada
		'featured_image'        => __( 'Imagen Destacada', 'gymfitness' ), // nombre
        'set_featured_image'    => __( 'Guardar Imagen destacada', 'gymfitness' ), // click seleccionar imagen
		'remove_featured_image' => __( 'Eliminar Imagen destacada', 'gymfitness' ), // click eliminar imagen destacada (si existe)
		'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'gymfitness' ),
		'insert_into_item'      => __( 'Insertar en Clase', 'gymfitness' ),
		'uploaded_to_this_item' => __( 'Agregado en Clase', 'gymfitness' ),
		'items_list'            => __( 'Lista de Clases', 'gymfitness' ),
		'items_list_navigation' => __( 'Navegación de Clases', 'gymfitness' ),
		'filter_items_list'     => __( 'Filtrar Clases', 'gymfitness' ),
	);

	$args = array(
		'label'                 => __( 'Clase', 'gymfitness' ),
		'description'           => __( 'Clases para el Sitio Web', 'gymfitness' ),
		'labels'                => $labels,

		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ), 
        // habilito ediciion de titulo, contenido e imagen destacada para este post type
		
        'hierarchical'          => true, // true = posts , false = paginas
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 6, // ubicacion en el panel izquierdo del dashboard
        'menu_icon'             => 'dashicons-welcome-learn-more',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'gymfitness_clases', $args );
	// el primer parametro es el nombre que le doy al custom post type creado
}
add_action( 'init', 'gymfitness_clases_post_type', 0 );