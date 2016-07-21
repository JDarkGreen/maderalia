<?php  

/***********************************************************************************************/
/* 	Define Constantes */
/***********************************************************************************************/
define('THEMEROOT', get_stylesheet_directory_uri() );
define('IMAGES', THEMEROOT.'/assets/images');
define('LANG', 'this-theme-framework');

/***********************************************************************************************/
/* 	Archivos de Condiguración en el Administrador */
/***********************************************************************************************/

/**
* Setear scripts archvos css y javascript de la administracion del tema
**/
//css
require_once("admin/custom-styles.php");
//javascript
require_once("admin/custom-scripts.php");

/**
* Opciones del tema
**/
require_once('functions/admin/options/theme-customizer.php');

/***********************************************************************************************/
/* 	Archivos de Condiguración en el Tema  */
/***********************************************************************************************/

/***********************************************************************************************/
/* Registrar Menus */
/***********************************************************************************************/
include_once("functions/menu-register.php");


?>