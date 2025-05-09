<?php
/**
 * Kontroler szablonu strony o autorze.
 *
 * @package WordPress
 * @subpackage Axel Lumberjack
 * @author Reddog Systems <p.bachorek@red-dog.pl>
 */

$context = Timber::context(
	array(
		'title'          => get_title(),
		'current_author' => Timber::get_user(),
		'excerpt_header' => get_header_level(),
		'posts'          => Timber::get_posts(),
		'other_authors'  => Timber::get_users(
			array(
				'has_published_posts' => array( 'post' ),
				'exclude'             => array( get_queried_object()->ID ),
			)
		),
	)
);

// Renderowanie.
Timber::render( 'templates/author.twig', $context );
