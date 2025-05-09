<?php
/**
 * Kontroler szablonu strony błędu 404.
 *
 * @package WordPress
 * @subpackage Axel Lumberjack
 * @author Reddog Systems <p.bachorek@red-dog.pl>
 */

$context = Timber::context(
	array(
		'title' => get_title(),
	)
);

// Renderowanie.
Timber::render( 'templates/404.twig', $context );
