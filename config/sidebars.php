<?php
/**
 * Rejestrowanie sidebarów.
 *
 * @package WordPress
 * @subpackage Axel Lumberjack
 * @author Reddog Systems <p.bachorek@red-dog.pl>
 */

add_action( 'widgets_init', 'axel_sidebars' );

/**
 * Rejestruje sidebary.
 */
function axel_sidebars() {
	$args = array(
		'id'            => 'sidebar',
		'name'          => __( 'Pasek boczny', 'axel' ),
		'description'   => __( 'Tutaj możesz dodać widgety.', 'axel' ),
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
		'before_widget' => '<section>',
		'after_widget'  => '</section>',
	);
	register_sidebar( $args );
}
