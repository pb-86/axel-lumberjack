<?php
/**
 * Kontroler szablonu kategorii.
 *
 * @package WordPress
 * @subpackage Axel Lumberjack
 * @author Reddog Systems <p.bachorek@red-dog.pl>
 */

$context = Timber::context(
	array(
		'category_title' => single_cat_title( '', false ),
		'posts'          => Timber::get_posts(),
		'title'          => get_title(),
		'excerpt_header' => get_header_level(),
	)
);

// Renderowanie.
Timber::render( 'templates/category.twig', $context );
