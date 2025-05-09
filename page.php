<?php
/**
 * Kontroler szablonu stron.
 *
 * @package WordPress
 * @subpackage Axel Lumberjack
 * @author Reddog Systems <p.bachorek@red-dog.pl>
 */

$context = Timber::context(
	array(
		'page'      => Timber::get_post(),
		'revisions' => wp_get_post_revisions(),
		'title'     => get_title(),
	)
);

// Renderowanie.
Timber::render( 'templates/page.twig', $context );
