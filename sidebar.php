<?php
/**
 * Terminal Sidebar Template (with Dynamic Metadata: Posts Count, System Clock & Memory).
 *
 * @package PlayPixelPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$count_posts     = wp_count_posts( 'post' );
$published_posts = isset( $count_posts->publish ) ? absint( $count_posts->publish ) : 0;
$posts_percent   = min( 100, max( 10, round( ( $published_posts / 50 ) * 100 ) ) );

$current_time = date_i18n( 'Y-m-d H:i:s' );
$mem_usage    = round( memory_get_usage() / 1024 / 1024, 1 );
$mem_percent  = min( 100, round( ( memory_get_usage() / ( 128 * 1024 * 1024 ) ) * 100, 1 ) );
?>
<aside class="sidebar-area">
	<!-- 1. Search Box -->
	<?php get_search_form(); ?>

	<!-- 2. Categories Tree Structure -->
	<fieldset class="brutalist-card" style="padding: 16px; margin-bottom: 24px;">
		<legend style="padding: 0 8px; font-weight: 700; color: var(--gold); text-transform: uppercase; font-size: 0.88rem;">
			ls -R /categories
		</legend>
		<div class="category-tree">
			<p style="margin: 0 0 8px; color: var(--gold); font-weight: bold;">.</p>
			<?php
			$categories = get_categories( array( 'hide_empty' => false ) );
			if ( ! empty( $categories ) ) :
				echo '<ul style="list-style: none; padding-left: 12px; margin: 0;">';
				$count = count( $categories );
				$i     = 0;
				foreach ( $categories as $category ) {
					$i++;
					$prefix = ( $i === $count ) ? '└──' : '├──';
					echo '<li style="margin-bottom: 6px;">';
					echo '<span style="color: var(--gold); margin-right: 6px;">' . esc_html( $prefix ) . '</span>';
					echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( strtolower( $category->name ) ) . '/</a>';
					echo '</li>';
				}
				echo '</ul>';
			else :
				echo '<p style="color: var(--muted); margin: 0;">[ empty ]</p>';
			endif;
			?>
		</div>
	</fieldset>

	<!-- 3. Dynamic Server Status Mini-Widget -->
	<div class="brutalist-card" style="padding: 16px; margin-bottom: 24px; font-size: 0.82rem; font-family: var(--font-mono);">
		<div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
			<span class="material-symbols-outlined" style="color: var(--gold); font-size: 1.2rem;">terminal</span>
			<span style="font-weight: 700; color: var(--gold); text-transform: uppercase; font-size: 0.88rem;">SYS_STATUS</span>
		</div>

		<div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
			<span>TOTAL_POSTS:</span>
			<span style="color: var(--gold); font-weight: 700;"><?php echo esc_html( $published_posts ); ?> posts</span>
		</div>
		<div class="progress-wrap" style="height: 6px; margin-bottom: 12px;">
			<span style="width: <?php echo esc_attr( $posts_percent ); ?>%;"></span>
		</div>

		<div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
			<span>SYS_CLOCK:</span>
			<span style="color: var(--gold); font-weight: 700;"><?php echo esc_html( $current_time ); ?></span>
		</div>

		<div style="display: flex; justify-content: space-between; margin-bottom: 6px; margin-top: 10px;">
			<span>MEM_USAGE:</span>
			<span style="color: var(--gold); font-weight: 700;"><?php echo esc_html( $mem_usage ); ?> MB</span>
		</div>
		<div class="progress-wrap" style="height: 6px; margin: 0;">
			<span style="width: <?php echo esc_attr( $mem_percent ); ?>%; background: var(--gold);"></span>
		</div>
	</div>

	<?php
	$show_sidebar_img  = playpixelpro_is_option_enabled( 'playpixelpro_show_sidebar_image', true );
	$sidebar_img_title = get_theme_mod( 'playpixelpro_sidebar_image_title', 'MAINFRAME // PDP-11' );
	$sidebar_img_url   = get_theme_mod( 'playpixelpro_sidebar_image', '' );

	if ( empty( $sidebar_img_url ) ) {
		$sidebar_img_url = get_template_directory_uri() . '/assets/images/vintage-mainframe.jpg';
	}
	?>

	<?php if ( $show_sidebar_img ) : ?>
		<!-- 4. Vintage Mainframe Image Box -->
		<div class="terminal-window" style="margin-bottom: 0;">
			<div class="window-bar">
				<div class="window-dots">
					<span class="window-dot dot-red"></span>
					<span class="window-dot dot-yellow"></span>
					<span class="window-dot dot-green"></span>
				</div>
				<span class="window-title"><?php echo esc_html( $sidebar_img_title ); ?></span>
			</div>
			<div style="position: relative; overflow: hidden;">
				<img src="<?php echo esc_url( $sidebar_img_url ); ?>" alt="<?php echo esc_attr( $sidebar_img_title ); ?>" style="width: 100%; display: block; border: 0; filter: grayscale(40%); transition: filter 0.3s ease;">
			</div>
		</div>
	<?php endif; ?>
</aside>
