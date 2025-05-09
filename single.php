<?php
/**
 * Kontroler szablonu wpisów.
 *
 * @package WordPress
 * @subpackage Axel Lumberjack
 * @author Reddog Systems <p.bachorek@red-dog.pl>
 */

$context = Timber::context(
	array(
		'post'      => Timber::get_post(),
		'revisions' => wp_get_post_revisions(),
		'title'     => get_title(),
	)
);

// Renderowanie.
Timber::render( 'templates/single.twig', $context );
