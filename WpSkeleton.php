<?php

/*
Plugin Name: Mi Plugin
Plugin URI:  https://github.com/ctala/wp-skeleton
Description: Base para la Creación de otros plugins
Version:     1.0
Author:      Cristian Tala Sánchez
Author URI:  http://www.cristiantala.cl
License:     MIT
License URI: http://opensource.org/licenses/MIT
Domain Path: /languages
Text Domain: ctala-text_domain
*/

// Register Navigation Menus
function custom_navigation_menus() {

	$locations = array(
		'Herramientas' => __( 'Herramientas Básicas', 'ctala-text_domain' ),
		'Configuración' => __( 'Configurar el plugin', 'ctala-text_domain' ),
	);
	register_nav_menus( $locations );

}

// Hook into the 'init' action
add_action( 'init', 'custom_navigation_menus' );


?>