<!-- Header -->
<?php 
	get_header(); 
	# Extraer todas las opciones de personalización
	$options = get_option("theme_settings");
?>

<?php  
/**
* Incluir plantilla de Slider Home
**/
include( locate_template("partials/slider-home/slider-home.php") );
?>

<!-- Contenedor principal -->
<main class="mainContent">
	<!-- Wrapper LAYOUT -->
	<section class="pageWrapperLayout">
		<div class="row">

			<!-- ASIDE DE PRODUCTOS -->
			<div class="col-md-4">
				<!-- Sidebar -->
				<aside class="pageCommon__sidebar">
					<?php  
						# Incluir Template Productos
						include( locate_template("partials/common/sidebar-products.php") );
					?>

					<!-- Incluir Facebook -->
					<?php
						if( isset( $options['theme_social_fb_text'] ) && !empty( $options['theme_social_fb_text'] ) ) :
					?>
						<section class="container__facebook">
							<!-- Contebn -->
							<div id="fb-root" class=""></div>

							<!-- Script -->
							<script>(function(d, s, id) {
								var js, fjs = d.getElementsByTagName(s)[0];
								if (d.getElementById(id)) return;
								js = d.createElement(s); js.id = id;
								js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
								fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));</script>

							<div class="fb-page" data-href="<?= $options['theme_social_fb_text']; ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-width="313" data-height="395" data-hide-cover="false" data-show-facepile="true">
							</div> <!-- /. fb-page-->
						</section> <!-- /.container__facebook -->
					<?php else: ?>
						<p class="text-xs-center">Opcion no habilitada temporalmente</p>
					<?php endif; ?>					

				</aside> <!-- /.pageCommon__sidebar -->
			</div> <!-- /.col-md-4 -->

			<!-- PRESENTACION DE PRODUCTOS Y SERVICIOS -->
			<div class="col-md-8">

				<div class="row">
						
					<!-- PRESENTACION-->
					<article class="pageCommon__botonera containerRelative">
						<!-- TITULO --> <h2 class="title-bg--green text-uppercase"> <strong> <?php _e("presentación" , LANG ); ?> </strong> </h2>
						
						<!-- TEXTO O CONTENIDO -->
						<div class="container-text container-bg--gray">
							<?php  
								#Extraer presentacion nosotros
								echo isset($options['theme_meta_presentacion']) && !empty($options['theme_meta_presentacion']) ? apply_filters( "the_content" , $options['theme_meta_presentacion'] ) : "Actualizando Contenido"; 
							?>
						</div> <!-- /.container-bg--gray -->	

					</article> <!-- /.pageCommon__botonera -->

				</div> <!-- /.row -->
			 	
			</div> <!-- /.col-md-8 -->

		</div> <!-- /.row -->
	</section> <!-- /.pageWrapperLayout -->
</main> <!-- /. mainContent-->



<!-- Footer -->
<?php get_footer(); ?>