<?php
/**
 * Rejestrowanie i kolejkowanie styli CSS.
 *
 * @package WordPress
 * @subpackage Axel Lumberjack
 * @author Reddog Systems <p.bachorek@red-dog.pl>
 */

add_action( 'wp_enqueue_scripts', 'axel_styles' );

/**
 * Rejestruje i kolejkuje wszystkie pliki CSS.
 */
function axel_styles() {
	if ( ! is_admin() || ! is_customize_preview() ) {
		wp_enqueue_style( 'axel-master', esc_url( THEME_STYLES . 'master.css' ), array(), THEME_VERSION, 'all' );
	}

	// Wyłącza style CSS bloków.
	wp_dequeue_style( 'wp-block-library' );
	wp_deregister_style( 'wp-block-library' );

	// Wyłącza domyślne style.
	wp_dequeue_style( 'global-styles' );
	wp_deregister_style( 'global-styles' );
}
