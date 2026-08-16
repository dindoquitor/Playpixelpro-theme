<?php
/**
 * Search Results Template File.
 *
 * @package PlayPixelPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$prompt_prefix = get_theme_mod( 'playpixelpro_prompt_prefix', 'user@dev-root:~$' );
$enable_cursor = get_theme_mod( 'playpixelpro_enable_cursor', true );
?>

<header style="margin-bottom: 32px;">
	<h1 style="font-size: 1.8rem; margin: 0 0 4px; color: var(--gold); text-transform: none;">
		<span style="color: var(--muted);"><?php echo esc_html( $prompt_prefix ); ?></span> grep -r "<?php echo esc_html( get_search_query() ); ?>" /blog
		<?php if ( $enable_cursor ) : ?>
			<span class="cli-cursor"></span>
		<?php endif; ?>
	</h1>
	<div class="meta" style="font-size: 0.85rem; color: var(--muted);">
		Search query executed against post contents... [OK]
	</div>
</header>

<div class="blog-layout-grid">
	<section class="blog-posts-column">
		<?php if ( have_posts() ) : ?>
			<div class="blog-entries-container">
				<?php
				$post_count = 0;
				$in_grid    = false;
				while ( have_posts() ) :
					the_post();
					$post_count++;
					$post_slug = get_post_field( 'post_name' );

					if ( 2 === $post_count ) {
						echo '<div class="blog-posts-2col-grid">';
						$in_grid = true;
					}
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 1 === $post_count ? 'blog-entry-card featured-latest-card' : 'blog-entry-card' ); ?>>
						<div class="blog-entry-header">
							<span class="blog-date">[<?php echo esc_html( get_the_date( 'Y-m-d' ) ); ?>]</span>
							<?php if ( 1 === $post_count ) : ?>
								<span class="meta-badge" style="background: var(--gold); color: #16130b; font-weight: 700;">LATEST_ENTRY</span>
							<?php endif; ?>
						</div>

						<?php if ( has_post_thumbnail() ) : ?>
							<div class="<?php echo ( 1 === $post_count ) ? 'blog-hero-thumbnail' : 'blog-entry-thumbnail'; ?>">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 1 === $post_count ? 'large' : 'medium', array( 'class' => 'blog-thumbnail-img', 'alt' => get_the_title() ) ); ?>
								</a>
							</div>
						<?php endif; ?>

						<h2 class="blog-entry-title">
							<a href="<?php the_permalink(); ?>"><?php echo esc_html( $post_slug ); ?>.md</a>
						</h2>

						<div class="blog-entry-excerpt">
							<p><?php echo wp_kses_post( playpixelpro_truncate( get_the_excerpt(), 1 === $post_count ? 30 : 15 ) ); ?></p>
						</div>

						<div class="blog-entry-footer">
							<div class="tag-badge-wrap">
								<?php
								$tags = get_the_tags();
								if ( $tags ) {
									foreach ( $tags as $tag ) {
										echo '<span class="tag-badge">#' . esc_html( strtolower( $tag->name ) ) . '</span>';
									}
								} else {
									$categories = get_the_category();
									if ( $categories ) {
										foreach ( $categories as $cat ) {
											echo '<span class="tag-badge">#' . esc_html( strtolower( $cat->name ) ) . '</span>';
										}
									}
								}
								?>
							</div>
							<a class="button" href="<?php the_permalink(); ?>">CONTINUE_READING &gt;</a>
						</div>
					</article>
				<?php endwhile; ?>

				<?php
				if ( $in_grid ) {
					echo '</div>'; // Close .blog-posts-2col-grid
				}
				?>
			</div>

			<div class="terminal-pagination">
				<?php
				echo paginate_links(
					array(
						'prev_text' => __( '&lt; PREV', 'playpixelpro' ),
						'next_text' => __( 'NEXT &gt;', 'playpixelpro' ),
					)
				);
				?>
			</div>

		<?php else : ?>
			<p><?php esc_html_e( 'No matching objects found for grep query.', 'playpixelpro' ); ?></p>
		<?php endif; ?>
	</section>

	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
