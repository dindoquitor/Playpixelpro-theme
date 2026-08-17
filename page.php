<?php
/**
 * Static Page Template (matching new_design/developer_portfolio_legal_protocol/code.html 8:4 column layout).
 *
 * @package PlayPixelPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$about_page_id   = (int) get_theme_mod( 'playpixelpro_about_page', 0 );
$contact_page_id = (int) get_theme_mod( 'playpixelpro_contact_page', 0 );
$current_page_id = get_the_ID();
$template_slug   = get_page_template_slug( $current_page_id );

if ( ( $about_page_id > 0 && $about_page_id === $current_page_id ) || 'page-templates/template-about.php' === $template_slug ) {
	get_template_part( 'page-templates/content', 'about' );
	get_footer();
	return;
}

if ( ( $contact_page_id > 0 && $contact_page_id === $current_page_id ) || 'page-templates/template-contact.php' === $template_slug ) {
	get_template_part( 'page-templates/content', 'contact' );
	get_footer();
	return;
}

$prompt_prefix = get_theme_mod( 'playpixelpro_prompt_prefix', 'user@dev-root:~$' );
$site_name     = get_bloginfo( 'name' );

while ( have_posts() ) :
	the_post();

	$slug       = sanitize_title( get_the_title() );
	$mod_date   = get_the_modified_date( 'Y-m-d\TH:i:s\Z' );
	$checksum   = substr( hash( 'sha256', get_the_ID() . get_the_title() ), 0, 12 ) . '...' . substr( hash( 'sha256', get_the_ID() ), -8 );
	$page_title = strtoupper( $slug );
	?>

	<!-- Status Line / Breadcrumbs Bar -->
	<div style="margin-bottom: 24px; padding: 8px 16px; border-left: 4px solid var(--gold); background: var(--surface); font-family: var(--font-mono); font-size: 0.82rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;">
		<div>
			<span style="color: var(--gold); font-weight: 700;">&gt;</span>
			<span style="color: var(--muted);">SYSTEM</span>
			<span style="color: var(--line);">/</span>
			<span style="color: var(--muted);">LEGAL</span>
			<span style="color: var(--line);">/</span>
			<span style="color: var(--gold); font-weight: 700;"><?php echo esc_html( $page_title ); ?>.v1.0</span>
		</div>
		<div>
			<span style="color: var(--green); font-weight: 700;">&bull; BUFFER_STABLE</span>
		</div>
	</div>

	<!-- Main 2-Column Grid (Legal Article Canvas 8-cols + Sidebar 4-cols) -->
	<div class="legal-page-grid">
		<!-- Left Column: Main Document Body (8 Cols) -->
		<article id="page-<?php the_ID(); ?>" <?php post_class( 'legal-article-box' ); ?>>
			<!-- Subtle background watermark -->
			<div class="legal-watermark">
				<?php echo esc_html( strtoupper( $site_name ) ); ?>
			</div>

			<header class="legal-article-header">
				<h1># MANIFEST: <?php echo esc_html( $page_title ); ?>.v1.0</h1>
				<p class="legal-article-subtitle">ENCRYPTED_CORE_LEGAL_ASSET // <?php echo esc_html( strtoupper( $site_name ) ); ?></p>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="featured-image" style="margin-bottom: 24px;">
					<?php the_post_thumbnail( 'large', array( 'style' => 'border: 2px solid var(--line); width: 100%; height: auto;' ) ); ?>
				</div>
			<?php endif; ?>

			<!-- Page Content Canvas -->
			<div class="entry-content" style="position: relative; z-index: 2;">
				<?php the_content(); ?>
			</div>

			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links" style="margin-top: 20px; font-family: var(--font-mono);">' . esc_html__( 'Pages:', 'playpixelpro' ),
					'after'  => '</div>',
				)
			);
			?>

			<!-- Terminal Article Footer -->
			<footer style="margin-top: 48px; padding-top: 20px; border-top: 2px solid var(--line); display: flex; justify-content: space-between; font-family: var(--font-mono); font-size: 0.78rem; color: var(--muted); opacity: 0.7; font-style: italic;">
				<div>// END_OF_MANIFEST</div>
				<div>PAGE [01/01]</div>
			</footer>

			<?php
			if ( comments_open() || get_comments_number() ) :
				?>
				<div style="margin-top: 24px;">
					<?php comments_template(); ?>
				</div>
			<?php endif; ?>
		</article>

		<!-- Right Column: Sidebar Metadata & System Actions (4 Cols) -->
		<aside class="legal-sidebar">
			<!-- Document Metadata Fieldset -->
			<fieldset class="brutalist-fieldset">
				<legend class="brutalist-legend">DOCUMENT_METADATA</legend>
				<div class="brutalist-fieldset-body" style="font-family: var(--font-mono); font-size: 0.8rem;">
					<div style="margin-bottom: 16px;">
						<p style="color: var(--muted); margin: 0 0 4px; font-size: 0.75rem; text-transform: uppercase;">LAST_MODIFIED</p>
						<p style="color: var(--gold); font-weight: 700; margin: 0; font-size: 0.88rem;"><?php echo esc_html( $mod_date ); ?></p>
					</div>

					<div style="margin-bottom: 16px;">
						<p style="color: var(--muted); margin: 0 0 4px; font-size: 0.75rem; text-transform: uppercase;">CHECKSUM_SHA256</p>
						<p style="color: var(--text); margin: 0; padding: 6px; background: rgba(0, 0, 0, 0.2); border: 1px solid var(--line); word-break: break-all; font-size: 0.72rem;"><?php echo esc_html( $checksum ); ?></p>
					</div>

					<div>
						<p style="color: var(--muted); margin: 0 0 4px; font-size: 0.75rem; text-transform: uppercase;">AUTHORITY_LEVEL</p>
						<p style="color: var(--text); margin: 0; display: flex; align-items: center; gap: 6px; font-weight: 700;">
							<span class="material-symbols-outlined" style="color: var(--gold); font-size: 1.1rem;">verified_user</span>
							<span>ROOT_ADMINISTRATOR</span>
						</p>
					</div>
				</div>
			</fieldset>

			<!-- System Actions Card -->
			<div class="legal-actions-box">
				<h3 style="font-family: var(--font-mono); font-size: 0.88rem; color: var(--gold); text-transform: uppercase; margin: 0 0 16px;">SYSTEM_ACTIONS</h3>

				<button type="button" class="legal-action-btn primary-action" onclick="window.print()">
					<span>PRINT_MANIFEST</span>
					<span class="material-symbols-outlined">print</span>
				</button>

				<button type="button" class="legal-action-btn" onclick="alert('Exporting manifest schema: <?php echo esc_js( $slug ); ?>.json [OK]');">
					<span>EXPORT_JSON</span>
					<span class="material-symbols-outlined">file_download</span>
				</button>

				<button type="button" class="legal-action-btn" onclick="alert('Raw document source loaded successfully.');">
					<span>VIEW_RAW_SRC</span>
					<span class="material-symbols-outlined">code</span>
				</button>
			</div>

			<!-- Atmospheric Data Stream Visual -->
			<div class="data-stream-box">
				<div class="data-stream-grid">
					<?php for ( $i = 0; $i < 32; $i++ ) : ?>
						<?php $op = ( mt_rand( 0, 100 ) > 50 ) ? '0.7' : '0.2'; ?>
						<div class="data-stream-bar" style="opacity: <?php echo esc_attr( $op ); ?>;"></div>
					<?php endfor; ?>
				</div>
				<div style="position: absolute; bottom: 6px; left: 8px; font-family: var(--font-mono); font-size: 0.65rem; color: var(--gold); opacity: 0.5; text-transform: uppercase;">
					DATA_STREAM_SIM_02
				</div>
			</div>
		</aside>
	</div>

	<?php
endwhile;

get_footer();