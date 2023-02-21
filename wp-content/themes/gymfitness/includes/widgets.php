<?php

// CUSTOM WIDGET


if(!defined('ABSPATH')) die();

class GymFitness_Clases_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'gymfitness_widget',
			esc_html__( 'GymFitness Clases', 'gymfitness' ), 
			array( 'description' => esc_html( 'Agrega las Clases como Widget', 'gymfitness' ), )
		);
	}

    // aca va lo que se imprimira por pantalla, en las vistas, referido al widget GymFitness_Clases_Widget
	public function widget( $args, $instance ) {
		?>
			<ul class="clases-sidebar">
				<?php 
					$args= array(    
						"post_type" => "gymfitness_clases",
						"posts_per_page" => $instance["cantidad"],
						/*
						'orderby' => 'title',
						'order'   => 'ASC',
						*/
						'orderby' => 'rand'
					);
					$clases = new WP_Query($args);


					while($clases->have_posts()){
						$clases->the_post();
						?>
							<li>
								<div class="imagen">
									<?php the_post_thumbnail('thumbnail'); ?>
								</div>
								<div class="contenido-clase">
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
					};
					wp_reset_postdata();



				?>
			</ul>
		<?php
	}

    // aca podemos agregarle un form al widget (lo cisualizamos en el dashboard/Apariencia/Widget, en el widget GymFitness_Clases_Widget)
    public function form( $instance ) {
		$cantidad = !empty($instance['cantidad']) ? $instance['cantidad'] : esc_html('¿Cuantas clases deseas mostrar?'); 
		?>
		<label for="<?php echo esc_attr($this->get_field_id('cantidad')); ?>">
			<?php echo esc_attr_e('¿Cuantas clases deseas mostrar?'); ?>
		</label>
		<input
			class="widefat"
			id = "<?php echo esc_attr($this->get_field_id('cantidad')); ?>"
			name = "<?php echo esc_attr($this->get_field_name('cantidad')); ?>"
			type = "number"
			value = "<?php echo esc_attr($cantidad); ?>" 
		> 
		<?php
   	}

    // metodo para que la edicion que hagamos del widget GymFitness_Clases_Widget en el back (en el dashboard, en el back) se guarde e impacte correctamente en el front
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance["cantidad"] = (!empty($new_instance['cantidad'])) ? sanitize_text_field($new_instance['cantidad']) : "";
		return $instance;
	}
} 

function gymfitness_registrar_widget() {
    register_widget( 'GymFitness_Clases_Widget' );
}
add_action( 'widgets_init', 'gymfitness_registrar_widget' );