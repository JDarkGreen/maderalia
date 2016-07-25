<?php  
/**
* Archivo Footer 
**/

#Obtener las opciones de personalización
$options = get_option( 'theme_settings' );

?>	
	<footer class="mainFooter">
		<!-- Layout -->
		<div class="pageWrapperLayout">
			<div class="row">
				
				<!-- ITEM FOOTER -->
				<div class="col-md-4">
					<article class="mainFooter__item">
						<!-- Título --> 
						<h4 class="text-uppercase"><?php _e("maderalia perú" , LANG ); ?></h4>
						<!-- Texto -->
						<?php if( isset($options['theme_footer_text']) && !empty($options['theme_footer_text']) ) : echo apply_filters("the_content" , $options['theme_footer_text'] ); ?>
						<?php endif; ?>

						<!-- Copyright -->
						<div class="text-copyright">Copyright &copy; <?= date("Y") ." "; ?> Todos los derechos reservados</div>
						
					</article> <!-- /.mainFooter__item -->

				</div> <!-- /.col-md-4 -->	

				<!-- ITEM FOOTER -->
				<div class="col-md-4">
					<article class="mainFooter__item text-xs-center">
						<!-- Título --> 
						<h4 class=""><?php _e("Redes Sociales" , LANG ); ?></h4>
						<!-- Texto -->
						<ul class="sectionSocialLinks sectionSocialLinks--footer">
							<!-- Facebook -->
							<?php if( isset($options['theme_social_fb_text']) && !empty($options['theme_social_fb_text'] ) ) : ?>
								<li> 
									<a target="_blank" href="<?= $options['theme_social_fb_text']; ?>">
									<!-- Icono > <i class="fa fa-facebook" aria-hidden="true"></i-->
									<i><img src="<?= IMAGES ?>/icon/f-footer.png" alt="facebook-<?= get_bloginfo("name"); ?>" class="img-fluid" /></i>
								</a></li>
							<?php endif; ?>

							<!-- Youtube -->
							<?php if( isset($options['theme_social_youtube_text']) && !empty($options['theme_social_youtube_text'] ) ) : ?>
								<li> 
									<a target="_blank" href="<?= $options['theme_social_youtube_text']; ?>">
									<!-- Icono > <i class="fa fa-youtube" aria-hidden="true"></i-->
									<i><img src="<?= IMAGES ?>/icon/y-footer.png" alt="youtube-<?= get_bloginfo("name"); ?>" class="img-fluid" /></i>
								</a></li>
							<?php endif; ?>

							<!-- Twitter -->
							<?php if( isset($options['theme_social_twitter_text']) && !empty($options['theme_social_twitter_text'] ) ) : ?>
								<li> 
									<a target="_blank" href="<?= $options['theme_social_twitter_text']; ?>">
									<!-- Icono > <i class="fa fa-twitter" aria-hidden="true"></i-->
									<i><img src="<?= IMAGES ?>/icon/tw-footer.png" alt="twitter-<?= get_bloginfo("name"); ?>" class="img-fluid" /></i>
								</a></li>
							<?php endif; ?>
						</ul> <!-- /.sectionSocialLinks -->
					</article> <!-- /.mainFooter__item -->
				</div> <!-- /.col-md-4 -->

				<!-- ITEM FOOTER -->
				<div class="col-md-4">
					<article class="mainFooter__item text-xs-right">
						<!-- Título --> 
						<h4 class=""><?php _e("Más Información" , LANG ); ?></h4>
						<!-- Texto -->
						<div class="">
							<?php  
								if( isset($options['theme_footer_more_info']) && !empty($options['theme_footer_more_info']) ) :
									echo apply_filters("the_content" , $options['theme_footer_more_info'] );
								endif;
							?>
						</div> <!-- /.text-xs-right -->

						
					</article> <!-- /.mainFooter__item -->
				</div> <!-- /.col-md-4 -->		

			</div> <!-- /.row -->
			
			<!-- SECCION DESAROLLO -->
			<div class="mainFooter__develop text-xs-center">
				Desarrollado por <a href="http://ingenioart.com/" target="_blank">INGENIOART</a>
			</div>

		</div> <!-- &/.pageWrapperLayout -->

	</footer> <!-- /.mainFooter -->

	<?php wp_footer(); ?>

	<script> var url = "<?= THEMEROOT ?>"; </script>
</body>
</html>
