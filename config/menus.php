<?php
/**
 * Rejestrowanie menu.
 *
 * @package WordPress
 * @subpackage Axel Lumberjack
 * @author Reddog Systems <p.bachorek@red-dog.pl>
 */

add_action( 'after_setup_theme', 'axel_menus' );

/**
 * Rejestruje wszystkie menu.
 */
function axel_menus() {
	$locations = array(
		'header_menu' => __( 'Górne menu', 'axel-twig' ),
		'footer_menu' => __( 'Dolne menu', 'axel-twig' ),
	);
	register_nav_menus( $locations );
}
