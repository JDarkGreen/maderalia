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

			<!-- Separador solo visible en mobile -->
			<p class="hidden-sm-up"></p>

			<!-- PRESENTACION DE PRODUCTOS Y SERVICIOS -->
			<div class="col-md-8">

				<div class="row">
						
					<!-- PRESENTACION-->
					<div class="col-xs-12">
						<article class="pageCommon__botonera containerRelative">
							<!-- TITULO --> <h2 class="title-bg--green text-uppercase"> <strong> <?php _e("presentación" , LANG ); ?> </strong> </h2>
							
							<!-- TEXTO O CONTENIDO -->
							<div class="container-text container-bg--gray text-justify text-md-left">
								<?php  
									#Extraer presentacion nosotros
									echo isset($options['theme_meta_presentacion']) && !empty($options['theme_meta_presentacion']) ? apply_filters( "the_content" , $options['theme_meta_presentacion'] ) : "Actualizando Contenido"; 
								?>

								<!-- Separar --> <p></p>

								<!-- Boton de ver más -->
								<a href="" id="" class="btnCommon__show-more pull-xs-right">
									<?php _e( "Ver más" , LANG ); ?>						
								</a>

								<!-- Limpiar floats --> <div class="clearfix"></div>

							</div> <!-- /.container-bg--gray -->	

						</article> <!-- /.pageCommon__botonera -->
					</div> <!-- /.col-xs-12 -->

					<!-- NUESTROS PROYECTOS -->
					<div class="col-xs-12">
						<article class="pageCommon__botonera containerRelative">
							<!-- TITULO --> <h2 class="title-bg--green text-uppercase"> <strong> <?php _e("nuestros proyectos" , LANG ); ?> </strong> </h2>
							
							<!-- TEXTO O CONTENIDO -->
							<div class="container-text container-bg--lemon">

								<!-- Wrapper para sliders de Productos -->
								<?php  
									/*
									*  Attributos disponibles 
									* data-items = number , data-items-responsive = number_mobile ,
									* data-margins = margin_in_pixels , data-dots = true or false
									*/
								?>
								<div id="carousel-products" class="carouselProductos js-carousel-gallery" data-items="3" data-items-responsive="1" data-margins="14" data-autoplay="true" data-timeautoplay="2000">
									
									<?php  
										#Extraemos productos
										$args = array(
											'order'          => 'ASC',
											'orderby'        => 'menu_order',
											'post_status'    => 'publish',
											'post_type'      => 'proyecto-maderalia',
											'posts_per_page' => -1,
										);
										$productos = get_posts( $args );
										foreach( $productos as $producto ) :
									?> <!-- Item o artículos  -->
									<articulos class="itemProducto text-xs-center">
										<!-- Imagen -->
											<?php  
												$feat_img = wp_get_attachment_url( get_post_thumbnail_id($producto->ID) );
											?>
										<a href="<?= $feat_img; ?>" class="gallery-prettyphoto" rel="galeria-productos" title="<?= $producto->post_title; ?>">
											<figure style='background-image: url(<?= $feat_img; ?>)'>
											</figure> <!-- /fin imagen -->
										</a>
										<!-- Nombre o título -->
										<h3> <?= $producto->post_title; ?> </h3>
									</articulos> <!-- /.itemProducto -->
									<?php endforeach; ?>
			
								</div> <!-- /#carousel-products. -->

								<!-- Separar --> <p></p>

								<!-- Boton de ver más -->
								<?php  
									#Página especies
									$page_proyectos = get_page_by_title("Proyectos");
								?>
								<a href="<?= get_permalink( $page_proyectos->ID ); ?>" id="" class="btnCommon__show-more pull-xs-right">
									<?php _e( "Ver más" , LANG ); ?>						
								</a>

								<!-- Limpiar floats --> <div class="clearfix"></div>

							</div> <!-- /.container-bg--gray -->	

						</article> <!-- /.pageCommon__botonera -->
					</div> <!-- /.col-xs-12 -->

				</div> <!-- /.row -->

				<div class="row">

					<!-- BOTONERA BLOG -->
					<div class="col-xs-12 col-md-6">
						
						<article class="pageCommon__botonera containerRelative">
						<!-- TITULO --> <h2 class="title-bg--lemon text-uppercase"> <strong> <?php _e("blog" , LANG ); ?> </strong> </h2>
						
							<!-- TEXTO O CONTENIDO -->
							<div class="container-text">
								<?php  
									#Extraer un blog ramdon para redirigir a página de blog
									$args = array(
										'orderby'        => 'rand',
										'post_status'    => 'publish',
										'post_type'      => 'post',
										'posts_per_page' => 1,
									);
									$blogs = get_posts( $args );
									$blog  = $blogs[0];
									if( !empty( $blog ) ) :
								?> <!-- ARTICLE BLOG  -->
								<article class="itemArticlePreview">

									<?php  
									#Página especies
									$page_blog = get_page_by_title("blog");
									?>
									
									<a href="<?= get_permalink( $page_blog->ID ); ?>" >
										<!-- Imagen -->
										<figure> 
											<?php if( has_post_thumbnail($blog->ID) ) : 
											?>
												<img src="<?= IMAGES ?>/blog-img-especies-maderalia.jpg" alt="blog-img-especies-maderalia" class="img-fluid center-block" />
											<? else : ?>  
												<img src="<?= IMAGES ?>/blog-img-especies-maderalia.jpg" alt="blog-img-especies-maderalia" class="img-fluid center-block" />
											<?php endif; ?>
										</figure> <!-- /fin imagen -->
									</a> <!-- /. -->

								</article> <!-- /.itemArticlePreview -->
								<?php endif; ?>

								<!-- Boton de ver más -->
								<a href="<?= get_permalink( $page_blog->ID ); ?>" class="btnCommon__show-more btnCommon__show-more--absolute">
									<?php _e( "Ver más" , LANG ); ?>						
								</a>
								<!-- Limpiar floats --> <div class="clearfix"></div>

							</div> <!-- /.container-bg--gray -->	

						</article> <!-- /.pageCommon__botonera -->
					</div> <!-- /.col-xs-12 col-md-6 -->

					<!-- BOTONERA ESPECIES -->
					<div class="col-xs-12 col-md-6">

						<article class="pageCommon__botonera containerRelative">
						<!-- TITULO --> <h2 class="title-bg--lemon text-uppercase"> <strong> <?php _e("especies" , LANG ); ?> </strong> </h2>

							<?php  
							#Página especies
							$page_especies = get_page_by_title("especies");
							?>
						
							<!-- TEXTO O CONTENIDO -->
							<div class="container-text">
								<a href="<?= get_permalink($page_especies->ID); ?>">
									<!-- Imagen -->
									<figure>
										<img src="<?= IMAGES ?>/img-especies-maderalia.jpg" alt="especies-maderalia-" class="img-fluid center-block" />
									</figure>
								</a> <!-- /. -->

								<!-- Boton de ver más -->
								<a href="<?= get_permalink($page_especies->ID); ?>" class="btnCommon__show-more btnCommon__show-more--absolute">
									<?php _e( "Ver más" , LANG ); ?>						
								</a>
								<!-- Limpiar floats --> <div class="clearfix"></div>

							</div> <!-- /.container-bg--gray -->	

						</article> <!-- /.pageCommon__botonera -->						
					</div>  <!-- /.col-xs-12 col-md-6 -->

				</div> <!-- /.row -->
			 	
			</div> <!-- /.col-md-8 -->

		</div> <!-- /.row -->
	</section> <!-- /.pageWrapperLayout -->
</main> <!-- /. mainContent-->



<!-- Footer -->
<?php get_footer(); ?>