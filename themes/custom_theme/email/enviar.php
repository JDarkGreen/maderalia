<?php
	
	//Obtenemos las valores enviados
	$from    = $_POST['email'];
	$message = $_POST['message'];
	$name    = $_POST['name'];
	$phone   = $_POST['phone'];

	$address = isset( $_POST['address'] ) ? $_POST['address']  : "";
	$subject = isset( $_POST['subject'] ) ? $_POST['subject']  : "";


	//Email A quien se le rinde cuentas
	#$webmaster_email1 = "jgomez@ingenioart.com";
	$webmaster_email2 = "ventas@maderaliaperu.com";

	include("class.phpmailer.php");
 	include("class.smtp.php");

	$mail = new PHPMailer();

	$mail->IsSMTP(); // send via SMTP
	$mail->SMTPSecure = 'ssl'; 
	$mail->Host      = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->Port      = 465;
	$mail->SMTPAuth  = true; // turn on SMTP authentication
	$mail->Username  = "ventas@maderaliaperu.com"; // Enter your SMTP username
	$mail->Password  = "madera2015"; // SMTP password */

	$mail->From     = $from;
	$mail->FromName = $name;
	#$mail->AddAddress( $webmaster_email1 );
	$mail->AddAddress( $webmaster_email2 );

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