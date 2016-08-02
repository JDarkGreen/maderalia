<?php /* Template Name: Página Contacto Template */ ?>
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option("theme_settings");

	global $post; //Objeto actual - Pagina 
	$banner = $post;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/common/banner-common-pages.php") ); 
?>

<!-- Contenedor Principal -->
<main class="">
	
	<!-- Contenedor Contenido -->
	<section class="pageWrapperLayout pageContacto">

		<!-- Título de Página --> <h2 class="pageSectionCommon__title pageSectionCommon__title--orange text-uppercase"> <?= __(  $post->post_title , LANG ); ?> </h2>

		<!-- Sección de Contenido  -->
		<section class="pageContacto__content containerRelative">
			
			<!-- MAPA -->
			<!--div id="canvas-map"></div-->

			<div class="row">
				
				<!-- Información de Contacto -->
				<div class="col-xs-12 col-md-6">
					<section class="pageContacto__item pageContacto__info">

						<!-- Título -->
						<h2 class="text-uppercase"><?php _e("atención al cliente" ); ?></h2>
					
						<!-- Lista de Datos -->
						<ul class="pageContacto__list-data">

							<!-- Telefono -->
							<?php if( isset($options['theme_phone_text']) && !empty($options['theme_phone_text']) ) : ?>
								<li> <!-- Icono --> <i class="fa fa-phone " aria-hidden="true"></i>
								<p>
								<?php 
									#control 
									$control = 0;
									#teléfonos
									$phones  = $options['theme_phone_text'];
									#recorrido
									foreach( $phones as $phone ) : 
										#separador
										$separator = $control === count($phones) - 1 ? "" : " - ";
										echo $phone . $separator;
									$control++; endforeach; 
								?>
								<p>
								</li>
							<?php endif; ?>

							<!-- Email -->
							<?php if( isset($options['theme_email_text']) && !empty($options['theme_email_text']) ) : ?>
								<li> <!-- Icono --> <i class="fa fa-envelope" aria-hidden="true"></i>
									<p class="text-green"><?= $options['theme_email_text']; ?> </p>
								</li>
							<?php endif; ?>

							<!-- Ubicación -->
							<?php if( isset($options['theme_address_text']) && !empty($options['theme_address_text']) ) : ?>
								<li> <!-- Icono --> <i class="fa fa-map-marker" aria-hidden="true"></i>
								<?= $options['theme_address_text']; ?> 
								</li>
							<?php endif; ?>								

						</ul> <!-- /.pageContacto__list-data -->

						<!-- Imagen Contacto -->
						<figure>
							<img src="<?= IMAGES ?>/contact/image_contacto_maderalia.jpg" alt="maderalia_contacto" class="img-fluid">
						</figure>

					</section> <!-- /.pageContacto__item pageContacto__info -->
				</div> <!-- /. -->
				
				<!-- Formulario de Contacto -->
				<div class="col-xs-12 col-md-6">
					<section class="pageContacto__item pageContacto__formulary">
						<!-- Titulo  -->
						<h2 class="text-uppercase"><?= __( "Formulario de Contacto" ,"LANG" ); ?></h2>

						<!-- Formulario -->
						<form id="form-contacto" method="post">

							<!-- Nombre -->
							<input id="input_name" type="text" class="text-form" name="txt_name" required="" placeholder="Nombre Completo">
							
							<!-- Direccion -->
							<input id="input_address" type="text" class="text-form" name="txt_direc" required="" placeholder="Dirección">
							
							<!-- Telefono -->
							<input id="input_phone" type="text" class="text-form" name="txt_telf" required="" placeholder="Teléfono">
							
							<!-- Email -->
							<input id="input_email" type="email" class="text-form" name="txt_correo" placeholder="Correo electronico" data-parsley-trigger="change" required="" data-parsley-type-message="Escribe un email válido">
							
							<!-- Consulta -->
							<textarea id="input_message" name="text_area" class="text_area" cols="" rows="" placeholder="Su mensaje"></textarea>
							
							<input type="submit" name="btn_enviar" class="btnCommon__show-more">

							<!-- Limpiar floats --> <div class="clearfix"></div>

						</form>						
					</section> <!-- /.pageContacto__item pageContacto__formulary -->
				</div> <!-- /. -->

			</div> <!-- /.row -->

		</section> <!-- /pageContacto__content -->

	</section> <!-- /.pageWrapper__content -->

</main> <!-- /.pageWrapper -->

<!-- Script Google Mapa -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNMUy9phyQwIbQgX3VujkkoV26-LxjbG0"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<!-- Scripts Solo para esta plantilla -->
<?php 
	if( isset($options['theme_lat_coord']) && isset($options['theme_long_coord']) ) : 
	$zoom_mapa = isset( $options['theme_zoom_mapa'] ) && !empty( $options['theme_zoom_mapa'] ) ? $options['theme_zoom_mapa'] : 16;
?>
	<script type="text/javascript">	
		<?php  
			$lat = $options['theme_lat_coord'];
			$lng = $options['theme_long_coord'];
		?>
	    var map;
	    var lat = <?= $lat ?>;
	    var lng = <?= $lng ?>;
	    function initialize() {
	      //crear mapa
	      map = new google.maps.Map(document.getElementById('canvas-map'), {
	        center: {lat: lat, lng: lng},
	        zoom  : <?= $zoom_mapa; ?>,
	      });
	      //infowindow
	      <?php  
	      	$contenido_markup = "";
	      	if ( isset($options['theme_text_markup_map']) )
	      	{
	      		$contenido_markup = apply_filters("the_content" , $options['theme_text_markup_map']  );
	      	}
	      ?>

	      var contenido_markup = <?= json_encode( $contenido_markup ) ?>;

	      var infowindow  = new google.maps.InfoWindow({
	        content: contenido_markup
	      });
	      //icono
	      //var icono = "<?= IMAGES ?>/icon/contacto_icono_mapa.jpg";
	      //crear marcador
	      marker = new google.maps.Marker({
	        map      : map,
	        draggable: false,
	        animation: google.maps.Animation.DROP,
	        position : {lat: lat, lng: lng},
	        title    : "<?php _e(bloginfo('name') , LANG )?>",
	        //icon     : "<?= IMAGES . '/icon/icon_map.png' ?>",
	      });
	      //marker.addListener('click', toggleBounce);
	      marker.addListener('click', function() {
	        infowindow.open( map, marker);
	      });
	    }
	    google.maps.event.addDomListener(window, "load", initialize);
	</script>
<?php endif; ?>

<!-- Footer -->
<?php get_footer(); ?>