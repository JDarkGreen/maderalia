<?php
	
	#Incluir wp load
	include '../../../../wp-load.php';
	$options = get_option("theme_settings");

	#Email soportado
	$admin_email = isset($options['theme_email_cuenta']) && !empty($options['theme_email_cuenta']) ? $options['theme_email_cuenta'] : 'ventas@maderaliaperu.com';

	#Password
	$admin_email_password = isset($options['theme_email_password']) && !empty($options['theme_email_password']) ? $options['theme_email_password'] : '';

	#Copias
	$admin_email_copias = isset($options['theme_email_copias']) && !empty($options['theme_email_copias']) ? $options['theme_email_copias'] : '';
	$admin_email_copias = explode( "," , trim( $admin_email_copias ) );

	#var_dump($admin_email_copias);exit;


	//Obtenemos las valores enviados
	$from    = $_POST['email'];
	$message = $_POST['message'];
	$name    = $_POST['name'];
	$phone   = $_POST['phone'];

	$address = isset( $_POST['address'] ) ? $_POST['address']  : "";
	$subject = isset( $_POST['subject'] ) ? $_POST['subject']  : "";


	//Email A quien se le rinde cuentas
	$webmaster_email1 = $admin_email;

	include("class.phpmailer.php");
 	include("class.smtp.php");

	$mail = new PHPMailer();

	$mail->IsSMTP(); // send via SMTP
	$mail->SMTPSecure = 'ssl'; 
	$mail->Host      = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->Port      = 465;
	$mail->SMTPAuth  = true; // turn on SMTP authentication
	$mail->Username  = $admin_email; // Enter your SMTP username
	$mail->Password  = $admin_email_password; // SMTP password */

	$mail->From     = $from;
	$mail->FromName = $name;

	$mail->AddAddress( $webmaster_email1 );

	#Enviar las copias
	foreach( $admin_email_copias as $copia ):

		#Quitar espacios en blanco
		$copia = str_replace(' ', '', $copia);

		$mail->AddAddress( $copia );

	endforeach;


	$mail->IsHTML(true); // send as HTML

	// Activo condificacción utf-8

	$mail->Subject = "Formulario Web Maderalia";

	// Activar el almacenamiento en búfer de la salida
	ob_start();
		//Incluir Plantilla de Email
		include("template.php");
	//Devolver el contenido del búfer de salida
	$template_email = ob_get_contents();	
	//Limpiar (eliminar) el búfer de salida
	ob_clean();

	//Customizar el mensaje
	$mail->Body = $template_email;


	if($mail->Send()){
		echo "Su mensaje a sido enviado con éxito, estaremos respondiendo a la brevedad."; 
	} else {
		echo "Mailer Error: " . $mail->ErrorInfo ; 
	}

?>