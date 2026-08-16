<?php
/**
 * PlayPixelPro functions and definitions.
 *
 * @package PlayPixelPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Require ClassicPress Customizer settings.
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Theme Setup.
 */
function playpixelpro_setup() {
	load_theme_textdomain( 'playpixelpro', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'playpixelpro' ),
		)
	);
}
add_action( 'after_setup_theme', 'playpixelpro_setup' );

/**
 * Register Widget Areas.
 */
function playpixelpro_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer Widgets', 'playpixelpro' ),
			'id'            => 'footer-widgets',
			'description'   => __( 'Widgets added here will appear in the footer.', 'playpixelpro' ),
			'before_widget' => '<div id="%1$s" class="widget brutalist-card %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'playpixelpro_widgets_init' );

/**
 * Enqueue Scripts and Styles.
 */
function playpixelpro_assets() {
	// Enqueue JetBrains Mono & Material Symbols
	wp_enqueue_style(
		'playpixelpro-font',
		'https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap',
		array(),
		null
	);

	// Enqueue Main Theme Stylesheet
	wp_enqueue_style(
		'playpixelpro',
		get_stylesheet_uri(),
		array(),
		'1.2.0'
	);

	// Enqueue Site JS
	wp_enqueue_script(
		'playpixelpro',
		get_template_directory_uri() . '/assets/js/site.js',
		array(),
		'1.2.0',
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular( 'downloads' ) ) {
		wp_localize_script(
			'playpixelpro',
			'pppDownload',
			array(
				'isSingle' => true,
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'playpixelpro_assets' );

/**
 * Fallback Navigation Menu.
 */
function playpixelpro_fallback_menu() {
	echo '<ul class="nav-menu">';
	echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/blog/' ) ) . '">Blog</a></li>';
	if ( get_post_type_archive_link( 'downloads' ) ) {
		echo '<li><a href="' . esc_url( get_post_type_archive_link( 'downloads' ) ) . '">Downloads</a></li>';
	}
	echo '</ul>';
}

/**
 * Helper function to safely strip tags and truncate text to a set word length.
 * Appends a blinking CLI cursor after the ellipsis when enabled.
 *
 * @param string $text Raw text.
 * @param int    $words Max word count.
 * @param string $more Append string.
 * @return string Truncated text with optional CLI cursor.
 */
function playpixelpro_truncate( $text, $words = 15, $more = '...' ) {
	$clean   = wp_strip_all_tags( $text );
	$trimmed = wp_trim_words( $clean, $words, $more );

	$enable_cursor = get_theme_mod( 'playpixelpro_enable_cursor', true );
	if ( $enable_cursor && ( substr( $trimmed, -3 ) === '...' ) ) {
		$trimmed .= '<span class="cli-cursor"></span>';
	}

	return $trimmed;
}

/**
 * Check if a theme mod feature is enabled (defaults to true if not explicitly disabled).
 *
 * @param string $mod_name Setting name.
 * @param bool   $default  Default status.
 * @return bool Enabled status.
 */
function playpixelpro_is_option_enabled( $mod_name, $default = true ) {
	$val = get_theme_mod( $mod_name, null );
	if ( null === $val ) {
		return (bool) $default;
	}
	if ( false === $val || 0 === $val || '0' === (string) $val || 'false' === (string) $val || 'off' === (string) $val ) {
		return false;
	}
	return true;
}