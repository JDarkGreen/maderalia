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

<!-- Div contenedor o wrapper para emplear plugin mmenu -->
<div id="mmenu-container">

<!-- Contenedor Versión Desktop -->
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

<!-- Contenedor Versión Mobile - Nota: Agregar clase Fixed para evitar problemas 
con librería mmenu -->
<header class="mainHeader hidden-sm-up Fixed">
	
	<!-- Menú lateral izquierdo -->
	<a href="#" id="open-menu-mobile" class="pull-xs-left btnMobile__menu">
		<i class="fa fa-bars" aria-hidden="true"></i>
	</a> <!-- /. -->

	<!-- Menú lateral derecha -->
	<a href="#" id="open-menu-right-mobile" class="pull-xs-right btnMobile__menu">
		<i class="fa fa-bars" aria-hidden="true"></i>
	</a> <!-- /. -->

	<!-- Logo Centrado -->
	<h1 class="logo">
		<a href="<?= site_url(); ?>">
			<img src="<?= $logo_theme; ?>" alt="" class="img-fluid center-block" />
		</a>
	</h1>

</header> <!-- /.mainHeader hidden-sm-up -->

<!-- Menú oculto de navegación lateral izquierda -->
<nav id="js-menu-nav" class="mainNavigationMobile">
	<!-- Menu de Navegacion Izquierda -->
	<?php wp_nav_menu(
		array(
			'menu_class'     => 'main-menu',
			'theme_location' => 'main-menu'
		));
	?>
</nav>

<!-- Menú oculto de navegación lateral derecha -->
<div id="js-menu-productos" class="mainNavigationMobile">

	<ul>
	<?php  
		#Obtener el primer producto o servicio 
		$args = array(
			'order'          => 'ASC',
			'orderby'        => 'menu_order',
			'post_status'    => 'publish',
			'post_type'      => 'producto-maderalia',
			'posts_per_page' => -1,
		);
		$productos     = get_posts( $args );	
		foreach( $productos as $producto ):	
	?>	<li> <a href="<?= get_permalink( $producto->ID ); ?>"> <?= $producto->post_title; ?> </a></li>
	<?php endforeach; ?>
	</ul> <!-- /end of list of products -->
</div>

