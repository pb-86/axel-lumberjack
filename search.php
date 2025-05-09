<?php
/**
 * Kontroler szablonu wyników wyszukiwania.
 *
 * @package WordPress
 * @subpackage Axel Lumberjack
 * @author Reddog Systems <p.bachorek@red-dog.pl>
 */

$context = Timber::context(
	array(
		'title'          => get_title(),
		'search_query'   => get_search_query(),
		'posts'          => Timber::get_posts(),
		'excerpt_header' => get_header_level(),
	)
);

// Renderowanie.
Timber::render( 'templates/search.twig', $context );
