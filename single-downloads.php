<?php
/**
 * Single download post template.
 *
 * @package PlayPixelPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$prompt_prefix = get_theme_mod( 'playpixelpro_prompt_prefix', 'user@dev-root:~$' );
$enable_cursor = get_theme_mod( 'playpixelpro_enable_cursor', true );

while ( have_posts() ) :
	the_post();
	$file     = get_post_meta( get_the_ID(), '_ppp_file', true );
	$version  = get_post_meta( get_the_ID(), '_ppp_version', true );
	$size     = get_post_meta( get_the_ID(), '_ppp_size', true );
	$platform = get_post_meta( get_the_ID(), '_ppp_platform', true );
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>
		<div class="terminal-window">
			<div class="window-bar">
				<div class="window-dots">
					<span class="window-dot dot-red"></span>
					<span class="window-dot dot-yellow"></span>
					<span class="window-dot dot-green"></span>
				</div>
				<span class="window-title">APP_SHOWCASE // <?php echo esc_html( get_post_field( 'post_name' ) ); ?></span>
			</div>
			<div class="terminal-body">
				<p class="meta"><?php echo esc_html( $prompt_prefix ); ?> show --download-specs</p>

				<h1 class="section-title">
					[01] <?php the_title(); ?>
					<?php if ( $enable_cursor ) : ?>
						<span class="cli-cursor"></span>
					<?php endif; ?>
				</h1>

				<?php if ( $version || $size || $platform ) : ?>
					<div class="download-meta-grid">
						<?php if ( $version ) : ?>
							<div class="download-meta-item">
								<strong>Version</strong>
								<span style="color: var(--gold); font-weight: 700;"><?php echo esc_html( $version ); ?></span>
							</div>
						<?php endif; ?>

						<?php if ( $size ) : ?>
							<div class="download-meta-item">
								<strong>File Size</strong>
								<span><?php echo esc_html( $size ); ?></span>
							</div>
						<?php endif; ?>

						<?php if ( $platform ) : ?>
							<div class="download-meta-item">
								<strong>Platform</strong>
								<span><?php echo esc_html( $platform ); ?></span>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $file ) ) : ?>
					<div class="download-box">
						<p id="download-countdown" class="download-countdown">[ initializing download sequence... ]</p>
						<div class="progress-wrap">
							<span id="download-progress"></span>
						</div>
						<a id="download-button" class="heavy-btn" href="<?php echo esc_url( $file ); ?>" target="_blank" rel="noopener" hidden>
							INSTALL_APK / DOWNLOAD_NOW
						</a>
					</div>
				<?php else : ?>
					<div class="download-box" style="border-color: var(--line);">
						<p class="meta">[ status: download URL not configured ]</p>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<h2>game_info</h2>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>

		<?php
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		?>
	</article>
	<?php
endwhile;

get_footer();