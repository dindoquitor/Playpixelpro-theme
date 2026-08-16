<?php
/**
 * 404 Error template.
 *
 * @package PlayPixelPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
$enable_cursor = get_theme_mod( 'playpixelpro_enable_cursor', true );
?>

<div class="terminal-window">
	<div class="window-bar">
		<div class="window-dots">
			<span class="window-dot dot-red"></span>
			<span class="window-dot dot-yellow"></span>
			<span class="window-dot dot-green"></span>
		</div>
		<span class="window-title">ERROR 404</span>
	</div>
	<div class="terminal-body">
		<h1 style="color: var(--danger);">
			404_NOT_FOUND
			<?php if ( $enable_cursor ) : ?>
				<span class="cli-cursor" style="background: var(--danger);"></span>
			<?php endif; ?>
		</h1>
		<p><?php esc_html_e( 'The requested path does not exist on this terminal server.', 'playpixelpro' ); ?></p>
		<p style="margin-top: 28px;">
			<a class="heavy-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>">&lt; RETURN_ROOT</a>
		</p>
	</div>
</div>

<?php
get_footer();