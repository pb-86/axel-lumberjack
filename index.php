<?php
/**
 * Kontroler głównego szablonu.
 *
 * @package WordPress
 * @subpackage Axel Lumberjack
 * @author Reddog Systems <p.bachorek@red-dog.pl>
 */

$context = Timber::context(
	array(
		'posts'          => Timber::get_posts(),
		'excerpt_header' => get_header_level(),
	)
);

// Renderowanie.
Timber::render( 'templates/index.twig', $context );
