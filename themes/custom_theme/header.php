<?php  
/**
* Plantilla Archivo: Header
**/
?>
<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

<?php
	# Extraer todas las opciones de personalización
	$options   = get_option("theme_settings");
	# Comprobar si esta desplegada la barra de Navegación
	$admin_bar = is_admin_bar_showing() ? 'mainHeader__active' : '';
?>

<!-- Contenedor Version Desktop -->
<header class="mainHeader hidden-xs-down relative">

	<!-- Primera sección Contenedor de Información y Pedido -->
	<?php  
		# Extraemos el logo de las opciones del tema
		$logo_theme = isset($options['theme_meta_logo_text']) && !empty($options['theme_meta_logo_text']) ? $options['theme_meta_logo_text'] : IMAGES . 'logo.png';
	?>

	<!-- Contenedor 1.ra sección Información Header -->
	<section class="pageWrapperLayout">
		<div class="row containerFlex containerAlignContent">

			<!-- 1.- SLOGAN  -->
			<div class="col-md-4">
			<!-- Texto meta datos en personalización -->
				<div class="mainHeader__slogan">
					<?php if(isset($options['theme_meta_slogan_text']) && !empty($options['theme_meta_slogan_text']) ) : 
							$texto = utf8_decode( $options['theme_meta_slogan_text'] ); 
							$texto = str_replace( " ", "&nbsp;" , $texto ) ;
							echo $texto;
						else: echo "" ; endif; ?>
				</div> <!-- / -->
			</div> <!-- /.col-md-4 -->

			<!-- Logo -->
			<div class="col-md-4">
				<h1 class="logo text-xs-center">
					<a href="<?= site_url(); ?>">
						<img src="<?= $logo_theme; ?>" alt="maderelia-website" class="img-fluid imgNotBlur center-block" />
					</a>
				</h1> <!-- /.logo -->
			</div> <!-- /.col-md-6 col-md-offset-3 -->

			<!-- 3.- Sección de información -->
			<div class="col-md-4">
				<section class="text-xs-right">
					<!-- Incluir plantilla - Sección Redes sociales -->
					<?php  
						#clase variación
						#plantilla
						include( locate_template("partials/social-network/social-links.php") );
					?> <br />

					<!-- Texto meta datos en personalización -->
					<div class="mainHeader__metadata ">
						<?= isset($options['theme_meta_header_text']) && !empty($options['theme_meta_header_text']) ? apply_filters("the_content", $options['theme_meta_header_text'] ) : "" ;?>
					</div> <!-- /.text-xs-right -->

				</section> <!-- /. -->
			</div> <!-- /.col-md-4 -->

		</div> <!-- /.row -->
	</section> <!-- /.pageWrapperLayout -->

	<!-- Navegación Principal -->
	<nav class="mainNavigation text-uppercase text-xs-center">
		<!-- Menu de Navegacion Izquierda -->
		<?php wp_nav_menu(
			array(
				'menu_class'     => 'main-menu',
				'theme_location' => 'main-menu'
			));
		?>
	</nav>

</header> <!-- /.mainHeader  -->

</body> <!-- /-.body -->