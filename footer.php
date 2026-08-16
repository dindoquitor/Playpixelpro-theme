<?php
/**
 * Footer template (with Copyright Icon before PlayPixelPro & lower-right Privacy Policy link).
 *
 * @package PlayPixelPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$privacy_url = get_privacy_policy_url();
if ( ! $privacy_url ) {
	$privacy_url = home_url( '/privacy-policy/' );
}
?>
	</div>
</main>

<footer class="site-footer">
	<div class="site-container">
		<?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
			<div class="footer-widgets">
				<?php dynamic_sidebar( 'footer-widgets' ); ?>
			</div>
		<?php endif; ?>

		<div class="site-info" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
			<p style="margin: 0;">
				&copy; <?php echo esc_html( get_bloginfo( 'name' ) ); ?> &mdash; <?php echo esc_html( gmdate( 'Y' ) ); ?>
				<span class="live">[ status: online ]</span>
			</p>

			<div class="privacy-policy-wrap" style="margin-left: auto;">
				<a href="<?php echo esc_url( $privacy_url ); ?>" style="color: var(--muted); text-decoration: none; font-family: var(--font-mono); font-size: 0.85rem;" onmouseover="this.style.color='var(--gold)';" onmouseout="this.style.color='var(--muted)';">
					[ PRIVACY_POLICY ]
				</a>
			</div>
		</div>

		<?php wp_footer(); ?>
	</div>
</footer>
</body>
</html>