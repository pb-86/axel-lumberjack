<?php
/**
 * Ustawienia motywu
 *
 * @package WordPress
 * @subpackage Axel Lumberjack
 * @author Reddog Systems <p.bachorek@red-dog.pl>
 */

// Lista stałych do dalszego użycia.
define( 'THEME_VERSION', wp_get_theme()->get( 'Version' ) );
define( 'THEME_SCRIPTS', get_template_directory_uri() . '/assets/js/' );
define( 'THEME_STYLES', get_template_directory_uri() . '/assets/css/' );
define( 'THEME_IMAGES', get_template_directory_uri() . '/assets/img/' );
define( 'THEME_VENDOR', get_template_directory_uri() . '/assets/vendor/' );

// Główna konfiguracja motywu.
require_once 'config/setup.php';

// Rejestrowanie i kolejkowanie styli CSS.
require_once 'config/styles.php';

// Rejestrowanie i kolejkowanie skryptów JS.
require_once 'config/scripts.php';

// Rejestrowanie menu.
require_once 'config/menus.php';

// Rejestrowanie sidebarów.
require_once 'config/sidebars.php';

// Przyspieszanie działania strony.
require_once 'config/optimisation.php';

// Uruchomienie Timbera.
require_once 'assets/vendor/autoload.php';
Timber\Timber::init();

/**
 * Dodaje dane do głównego kotekstu Timbera.
 *
 * @param array $context Timber context.
 * @return $array $context Timber context.
 */
function add_to_context( $context ) {
	$context['header_menu'] = Timber::get_menu( 'header_menu' );
	$context['footer_menu'] = Timber::get_menu( 'footer_menu' );

	if ( ! is_404() ) {
		$context['sidebar'] = Timber::get_widgets( 'sidebar' );
	}

	return $context;
}
add_filter( 'timber/context', 'add_to_context' );

/**
 * Ustala i zwraca odpowiedni poziom nagłówka
 *
 * $return $string Poziom nagłówka.
 */
function get_header_level() {
	if ( is_home() || is_front_page() ) {
		return 'h3';
	} else {
		return 'h2';
	}
}

/**
 * Pobiera i zwraca tytuł odpowiedni dla danego szablonu.
 *
 * @return string $title Tytuł.
 */
function get_title() {
	if ( is_404() ) {
		$main_title = __( 'Nie znaleziono strony', 'axel' );
	} elseif ( is_author() ) {
		$main_title = get_the_author();
	} elseif ( is_category() ) {
		$main_title = single_cat_title( '', false );
	} elseif ( is_search() ) {
		$main_title = __( 'Wyniki wyszukiwania', 'axel' );
	} else {
		$main_title = get_the_title();
	}

	return $main_title;
}

/**
 * Wyświetla klasę jeśli został dodany obrazek nagłówka.
 */
function axel_custom_header_class() {
	if ( ! has_custom_header() ) {
		return false;
	}

	return 'has-background';
}

/**
 * Dodaje obrazek w tle nagłówka strony jeśli jest dostępny.
 */
function axel_custom_header() {
	if ( ! has_custom_header() ) {
		return false;
	}

	return 'style="background-image: url(' . get_custom_header()->url . ')"';
}

/**
 * Podmienia nazyw klas customowego loga.
 *
 * @param {string} $html Kod HTML loga.
 * @return {string} $html Kod HTML loga po zmianach.
 */
function axel_custom_logo_classes( $html ) {
	$html = str_replace( 'custom-logo-link', 'site-logo__link', $html );
	$html = str_replace( 'custom-logo', 'site-logo__image', $html );
	return $html;
}
add_filter( 'get_custom_logo', 'axel_custom_logo_classes' );
