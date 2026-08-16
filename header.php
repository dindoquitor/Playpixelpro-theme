<?php
/**
 * Header template.
 *
 * @package PlayPixelPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$enable_scanline = get_theme_mod( 'playpixelpro_enable_scanline', true );
$logo_text       = get_theme_mod( 'playpixelpro_logo_text', 'DEV_ROOT' );
$cta_text        = get_theme_mod( 'playpixelpro_cta_text', 'ssh_connect' );
$cta_url         = get_theme_mod( 'playpixelpro_cta_url', '' );

if ( empty( $cta_url ) ) {
	$cta_url = get_post_type_archive_link( 'downloads' ) ? get_post_type_archive_link( 'downloads' ) : home_url( '/' );
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php if ( $enable_scanline ) : ?>
	<div class="scanline"></div>
<?php endif; ?>

<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>
<a class="screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'playpixelpro' ); ?></a>

<header class="site-header">
	<div class="site-container header-inner">
		<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php echo esc_html( $logo_text ); ?>
		</a>

		<button class="menu-toggle" aria-expanded="false" aria-controls="site-navigation" aria-label="<?php esc_attr_e( 'Toggle menu', 'playpixelpro' ); ?>">☰</button>

		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'playpixelpro' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'fallback_cb'     => 'playpixelpro_fallback_menu',
					'container'       => false,
				)
			);
			?>
		</nav>

		<a class="heavy-btn" href="<?php echo esc_url( $cta_url ); ?>">
			<?php echo esc_html( $cta_text ); ?>
		</a>
	</div>
</header>

<main id="content" class="site-main">
	<div class="site-container">