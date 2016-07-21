<?php  
/**
* Plantilla Configuración del Tema
**/
?>
<?php  

/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* SECCION REDES SOCIALES

//Inputs
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_section_social" , __( 'Redes Sociales:' , 'LANG' ), 'custom_settings_section_callback', 'customThemePage' );

function custom_settings_section_callback()
{ 
	echo __( 'Coloca los links de redes sociales correspondientes', 'LANG' );
}

//FACEBOOK
add_settings_field( 'theme_social_fb_text', __( 'Link Facebook', 'LANG' ), 'custom_social_fb_render', 'customThemePage', PREFIX."_themePage_section_social" );
//Renderizado 
function custom_social_fb_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' style="width:400px;" name='theme_settings[theme_social_fb_text]' value='<?= !empty($options['theme_social_fb_text']) ? $options['theme_social_fb_text'] : "" ; ?>'>
	<?php
}

//TWITTER
add_settings_field( 'theme_social_twitter_text', __( 'Link Twitter', 'LANG' ), 'custom_social_tw_render', 'customThemePage', PREFIX."_themePage_section_social" );
//Renderizado 
function custom_social_tw_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' style="width:400px;" name='theme_settings[theme_social_twitter_text]' value='<?= !empty($options['theme_social_twitter_text']) ? $options['theme_social_twitter_text'] : "" ; ?>'>
	<?php
}

//TWITTER
add_settings_field( 'theme_social_youtube_text', __( 'Link Youtube', 'LANG' ), 'custom_social_yt_render', 'customThemePage', PREFIX."_themePage_section_social" );
//Renderizado 
function custom_social_yt_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' style="width:400px;" name='theme_settings[theme_social_youtube_text]' value='<?= !empty($options['theme_social_youtube_text']) ? $options['theme_social_youtube_text'] : "" ; ?>'>
	<?php
}



/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* SECCION TELEFONOS

//Inputs
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_section_phone" , __( 'Personalizar Teléfonos:' , 'LANG' ), 'custom_settings_section_phone_callback', 'customThemePagePhone' );

function custom_settings_section_phone_callback()
{ 
	echo __( 'Coloca los números correspondientes', 'LANG' );
}

//TELEFONOS
add_settings_field( 'theme_phone_text', __( 'Numero Telefono', 'LANG' ), 'custom_phone_render', 'customThemePagePhone', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_phone_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' name='theme_settings[theme_phone_text][0]' value='<?= !empty($options['theme_phone_text'][0]) ? $options['theme_phone_text'][0] : "" ; ?>'>
	<?php
}

//TELEFONOS
add_settings_field( 'theme_phone_text2', __( 'Numero Telefono 2', 'LANG' ), 'custom_phone2_render', 'customThemePagePhone', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_phone2_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' name='theme_settings[theme_phone_text][1]' value='<?= !empty($options['theme_phone_text'][1]) ? $options['theme_phone_text'][1] : "" ; ?>'>
	<?php
}

//CELULAR
add_settings_field( 'theme_cel_text', __( 'Numero Celular', 'LANG' ), 'custom_cel_render', 'customThemePagePhone', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_cel_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' name='theme_settings[theme_cel_text]' value='<?= !empty($options['theme_cel_text']) ? $options['theme_cel_text'] : "" ; ?>'>
	<?php
}


/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* SECCION HEADER

//Inputs
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_section_header" , __( 'Personalizar Información Header:' , 'LANG' ), 'custom_settings_section_header_callback', 'customThemePageHeader' );

function custom_settings_section_header_callback()
{ 
	echo __( 'Personaliza los campos correspondientes:', 'LANG' );
}

//META LOGO
add_settings_field( 'theme_meta_logo_text', __( 'Personalizar Logo', 'LANG' ), 'custom_logo_render', 'customThemePageHeader', PREFIX."_themePage_section_header" );
//Renderizado 
function custom_logo_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>
	
    <!-- Contenedor de Imagen -->
    <section class="customize-img-container">

        <!-- Input oculto guarda imagen -->
        <input type="hidden" id="theme_meta_logo_text" class="" name="theme_settings[theme_meta_logo_text]" size="25" value="<?= !empty($options['theme_meta_logo_text']) ? $options['theme_meta_logo_text'] : "" ; ?>" />

        <!-- Contenedor Agregar Imagen Previa -->
        <div class="container-preview">
            <?php if( !empty($options['theme_meta_logo_text']) && !is_null($options['theme_meta_logo_text']) ) : ?>
            <img src="<?= $options['theme_meta_logo_text']; ?>" style="width:100px; height:100px;" />
            <?php endif ?>
        </div> 
        
        <!-- Botón agregar imágen --> 
        <br/><button class="js-add-custom-img button button-primary" data-input="theme_meta_logo_text" >
            <?php empty($options['theme_meta_logo_text']) || is_null($options['theme_meta_logo_text']) ? _e( 'Agregar Imagen' , LANG ) : _e( 'Cambiar Imagen' , LANG ) ; ?>
        </button> 

        <!-- Botón remover Imagen Oculto -->
        <button class="js-remove-custom-img button button-primary" data-input="theme_meta_logo_text">
            <?php _e( 'Remover Imagen' , LANG ); ?>
        </button>

        <!-- Descripcion -->
        <br/><p class="description"><?php _e('Subir una imagen para este campo'); ?></p>

    </section> <!-- /.customize-img-container -->
		
	<?php
}

//META SLOGAN
add_settings_field( 'theme_meta_slogan_text', __( 'Slogan en Header', 'LANG' ), 'custom_slogan_render', 'customThemePageHeader', PREFIX."_themePage_section_header" );
//Renderizado 
function custom_slogan_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<textarea name="theme_settings[theme_meta_slogan_text]" id="" style="width:350px;height:120px;max-height:120px;"><?= !empty($options['theme_meta_slogan_text']) ? $options['theme_meta_slogan_text'] : "" ; ?> </textarea>
	<?php
}


//META INFO HEADER
add_settings_field( 'theme_meta_header_text', __( 'Data Información en Header', 'LANG' ), 'custom_header_render', 'customThemePageHeader', PREFIX."_themePage_section_header" );
//Renderizado 
function custom_header_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<textarea name="theme_settings[theme_meta_header_text]" id="" style="width:350px;height:120px;max-height:120px;"><?= !empty($options['theme_meta_header_text']) ? $options['theme_meta_header_text'] : "" ; ?> </textarea>
	<?php
}










?>


