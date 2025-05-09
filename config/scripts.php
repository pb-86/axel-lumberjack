<?php
/**
 * Rejestrowanie i kolejkowanie skryptów JS.
 *
 * @package WordPress
 * @subpackage Axel Lumberjack
 * @author Reddog Systems <p.bachorek@red-dog.pl>
 */

add_action( 'wp_enqueue_scripts', 'axel_scripts' );

/**
 * Rejestruje i kolejkuje wszystkie pliki JS.
 */
function axel_scripts() {
	if ( ! is_admin() ) {
		wp_dequeue_script( 'jquery' );
		wp_deregister_script( 'jquery' );
	}

	wp_register_script( 'axel-hamburger', esc_url( THEME_SCRIPTS . 'hamburger.js' ), array(), THEME_VERSION, true );
	wp_register_script( 'axel-dropdown-menu', esc_url( THEME_SCRIPTS . 'dropdown-menu.js' ), array(), THEME_VERSION, true );
	wp_register_script( 'axel-print', esc_url( THEME_SCRIPTS . 'print.js' ), array(), THEME_VERSION, true );
	wp_register_script( 'axel-scroll-to-top', esc_url( THEME_SCRIPTS . 'scroll-to-top.js' ), array(), THEME_VERSION, true );

	wp_enqueue_script( 'axel-hamburger' );
	wp_enqueue_script( 'axel-dropdown-menu' );
	wp_enqueue_script( 'axel-print' );
	wp_enqueue_script( 'axel-scroll-to-top' );
}

/**
 * Rejestruje dodatkowe style blocków.
 */
function custom_block_styles() {
	wp_register_script( 'axel-block-styles', esc_url( THEME_SCRIPTS . 'costom-block-styles.js' ), array(), THEME_VERSION, true );
	wp_enqueue_script( 'axel-block-styles' );
}
add_action( 'enqueue_block_editor_assets', 'custom_block_styles' );
