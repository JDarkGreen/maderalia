<?php  
/**
* Archivo partial - o template - incluye lista de productos
**/

?>

<section class="sectionProductList">
	<!-- Titulo --> 
	<h3 class="text-uppercase"><?php _e( "productos y servicios" , "LANG" ); ?></h3>
	<!-- Lista de productos -->
	<ul class="sectionProductList__menu">
		<?php  
			# Extraer productos
			$args = array(
				'order'          => 'ASC',
				'orderby'        => 'menu_order',
				'post_status'    => 'publish',
				'post_type'      => 'producto-maderalia',
				'posts_per_page' => -1,
			);
			$productos = get_posts( $args );
			foreach ( $productos as $producto ) :
		?> <li> <a href="<?= get_permalink( $producto->ID ); ?>"> <?= $producto->post_title; ?></a> </li>
		<?php endforeach; ?>
	</ul> <!-- /.sectionProductList__menu -->
</section> <!-- /. sectionProductList-->