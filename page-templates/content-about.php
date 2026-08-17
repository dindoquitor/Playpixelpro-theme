<?php
/**
 * Content template for Terminal About Me page (matching new_design/developer_portfolio_about_me/code.html).
 *
 * @package PlayPixelPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// 1. Terminal Hero Section
$show_hero   = playpixelpro_is_option_enabled( 'playpixelpro_about_show_hero', true );
$session     = get_theme_mod( 'playpixelpro_about_hero_session', 'SESSION: bash — 80x24' );
$prompt      = get_theme_mod( 'playpixelpro_about_hero_prompt', 'user@dev-shell:~$' );
$command     = get_theme_mod( 'playpixelpro_about_hero_command', 'cat bio.md' );
$hero_title  = get_theme_mod( 'playpixelpro_about_hero_title', '# ARCHITECTING DIGITAL INFRASTRUCTURE' );
$hero_bio    = get_theme_mod( 'playpixelpro_about_hero_bio', 'Senior developer specializing in high-performance cross-platform systems. Bridging the gap between low-level Android performance and modern reactive web architectures.' );

$col1_title = get_theme_mod( 'playpixelpro_about_hero_col1_title', 'Android Ecosystem' );
$col1_items = get_theme_mod( 'playpixelpro_about_hero_col1_items', "Kotlin / Coroutines / Flow\nJetpack Compose UI Engine\nNative C++ (JNI) Integrations\nMaterial 3 Implementation" );

$col2_title = get_theme_mod( 'playpixelpro_about_hero_col2_title', 'Web Infrastructure' );
$col2_items = get_theme_mod( 'playpixelpro_about_hero_col2_items', "React & Next.js Frameworks\nTypeScript / Strict Typing\nWebGL & Shader Programming\nTailwind & Headless UI" );

// 2. System Modules
$show_modules = playpixelpro_is_option_enabled( 'playpixelpro_about_show_modules', true );
$mod_title    = get_theme_mod( 'playpixelpro_about_modules_title', 'SYSTEM_MODULES' );
$mod_icon     = get_theme_mod( 'playpixelpro_about_modules_icon', 'settings_input_component' );

$modules = array(
	1 => array(
		'legend'     => get_theme_mod( 'playpixelpro_about_mod1_legend', 'KERNEL_CORE' ),
		'row1_label' => get_theme_mod( 'playpixelpro_about_mod1_row1_label', 'OS_TARGET' ),
		'row1_val'   => get_theme_mod( 'playpixelpro_about_mod1_row1_val', 'AOSP / LINUX' ),
		'row2_label' => get_theme_mod( 'playpixelpro_about_mod1_row2_label', 'PERF_METRIC' ),
		'row2_val'   => get_theme_mod( 'playpixelpro_about_mod1_row2_val', 'OPTIMAL' ),
		'desc'       => get_theme_mod( 'playpixelpro_about_mod1_desc', 'Android SDK, Gradle, NDK, Room DB, Retrofit, WorkManager, Dagger-Hilt.' ),
	),
	2 => array(
		'legend'     => get_theme_mod( 'playpixelpro_about_mod2_legend', 'UI_SUBSYSTEM' ),
		'row1_label' => get_theme_mod( 'playpixelpro_about_mod2_row1_label', 'RENDERING' ),
		'row1_val'   => get_theme_mod( 'playpixelpro_about_mod2_row1_val', 'GPU_ACCEL' ),
		'row2_label' => get_theme_mod( 'playpixelpro_about_mod2_row2_label', 'FPS_TARGET' ),
		'row2_val'   => get_theme_mod( 'playpixelpro_about_mod2_row2_val', '120_LOCKED' ),
		'desc'       => get_theme_mod( 'playpixelpro_about_mod2_desc', 'Compose, Framer Motion, Three.js, Canvas API, Figma-to-Code, Responsive Systems.' ),
	),
	3 => array(
		'legend'     => get_theme_mod( 'playpixelpro_about_mod3_legend', 'NETWORK_BINARIES' ),
		'row1_label' => get_theme_mod( 'playpixelpro_about_mod3_row1_label', 'PROTOCOL' ),
		'row1_val'   => get_theme_mod( 'playpixelpro_about_mod3_row1_val', 'GRPC / REST' ),
		'row2_label' => get_theme_mod( 'playpixelpro_about_mod3_row2_label', 'LATENCY' ),
		'row2_val'   => get_theme_mod( 'playpixelpro_about_mod3_row2_val', '< 50MS' ),
		'desc'       => get_theme_mod( 'playpixelpro_about_mod3_desc', 'Node.js, PostgreSQL, Redis, GraphQL, Docker, Vercel, Firebase, AWS S3.' ),
	),
);

// 3. Runtime History
$show_history   = playpixelpro_is_option_enabled( 'playpixelpro_about_show_history', true );
$history_title  = get_theme_mod( 'playpixelpro_about_history_title', 'RUNTIME_HISTORY' );
$history_icon   = get_theme_mod( 'playpixelpro_about_history_icon', 'terminal' );
$history_filter = get_theme_mod( 'playpixelpro_about_history_filter', 'FILTER: ERROR=0 INFO=ALL' );

$logs = array(
	1 => array(
		'date'  => get_theme_mod( 'playpixelpro_about_log1_date', '[2022-PRESENT] INFO:' ),
		'title' => get_theme_mod( 'playpixelpro_about_log1_title', 'LEAD MOBILE ENGINEER @ NEXUS_LABS' ),
		'desc'  => get_theme_mod( 'playpixelpro_about_log1_desc', 'Architected a micro-services based Android application serving 2M+ active users. Reduced startup latency by 45% using Baseline Profiles and R8 optimization.' ),
	),
	2 => array(
		'date'  => get_theme_mod( 'playpixelpro_about_log2_date', '[2020-2022] INFO:' ),
		'title' => get_theme_mod( 'playpixelpro_about_log2_title', 'FULL STACK DEVELOPER @ BYTE_STREAM_INT' ),
		'desc'  => get_theme_mod( 'playpixelpro_about_log2_desc', 'Engineered a real-time analytics dashboard using Next.js and WebSocket. Integration of complex data visualization modules using WebGL for high-density packet tracking.' ),
	),
	3 => array(
		'date'  => get_theme_mod( 'playpixelpro_about_log3_date', '[2018-2020] INFO:' ),
		'title' => get_theme_mod( 'playpixelpro_about_log3_title', 'JUNIOR ANDROID DEVELOPER @ CORE_APPS' ),
		'desc'  => get_theme_mod( 'playpixelpro_about_log3_desc', 'Maintained legacy Java codebase while leading the migration to Kotlin. Implemented first-party authentication modules and unit testing suite coverage reaching 85%.' ),
	),
);

// 4. Call to Action
$show_cta   = playpixelpro_is_option_enabled( 'playpixelpro_about_show_cta', true );
$cta_title  = get_theme_mod( 'playpixelpro_about_cta_title', 'READY_FOR_DEPLOYMENT?' );
$cta_desc   = get_theme_mod( 'playpixelpro_about_cta_desc', 'Currently accepting inquiries for high-impact technical roles and specialized architectural consulting.' );
$cta_btn1   = get_theme_mod( 'playpixelpro_about_cta_btn1_text', 'INIT_CONTACT' );
$cta_url1   = get_theme_mod( 'playpixelpro_about_cta_btn1_url', '#' );
$cta_btn2   = get_theme_mod( 'playpixelpro_about_cta_btn2_text', 'VIEW_REPOSITORY' );
$cta_url2   = get_theme_mod( 'playpixelpro_about_cta_btn2_url', '#' );
$cta_image  = get_theme_mod( 'playpixelpro_about_cta_image', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBVvQM86xaZd9brr_jSpkhNAXV0Q14Xn3gBomWV-dRCR4AjWmQQJtVxn6uqG-X9Ush_e-BvH6SLWelp3bjydlG2zaa5gVwqQVVv95Nvd2ajTontS5UAaI1WDaf-HbljuLaRkkZCdrCs36izZ-a2FYIjRGST51h33fQy8Lf9StsG9MxLxeKybt5XivIVDe-PO1FLzFtUNRxisI65YZfMtdg-s1qyfa36Mro5IofkmRwa-X7GFTgKLWpXYOvIb2CbNOHdrK0srWkrmRxM' );
$cta_lens   = get_theme_mod( 'playpixelpro_about_cta_lens_id', 'LENS_ID: 0x4F2A' );
?>

<div class="about-page-wrapper">

	<?php if ( $show_hero ) : ?>
		<!-- About Me: Terminal Section -->
		<section class="about-section-gap">
			<div class="about-terminal-frame">
				<!-- Window Header Bar -->
				<div class="about-terminal-bar">
					<span class="about-terminal-session"><?php echo esc_html( $session ); ?></span>
					<div class="about-terminal-squares">
						<div class="sq-box sq-red"></div>
						<div class="sq-box sq-amber"></div>
						<div class="sq-box sq-cyan"></div>
					</div>
				</div>

				<!-- Terminal Body -->
				<div class="about-terminal-body">
					<!-- Command Input Row 1 -->
					<div class="about-cli-row">
						<span class="about-cli-prompt"><?php echo esc_html( $prompt ); ?></span>
						<span class="about-cli-cmd"><?php echo esc_html( $command ); ?></span>
					</div>

					<!-- Content Block -->
					<div class="about-cli-content">
						<h1 class="about-hero-h1"><?php echo esc_html( $hero_title ); ?></h1>
						<p class="about-hero-bio"><?php echo esc_html( $hero_bio ); ?></p>

						<div class="about-hero-cols">
							<?php if ( ! empty( $col1_title ) ) : ?>
								<div>
									<h2 class="about-col-h2"><?php echo esc_html( $col1_title ); ?></h2>
									<ul class="about-col-list">
										<?php
										$lines1 = array_filter( array_map( 'trim', explode( "\n", $col1_items ) ) );
										foreach ( $lines1 as $item ) :
											?>
											<li><span class="about-col-arrow">&gt;</span> <?php echo esc_html( $item ); ?></li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>

							<?php if ( ! empty( $col2_title ) ) : ?>
								<div>
									<h2 class="about-col-h2"><?php echo esc_html( $col2_title ); ?></h2>
									<ul class="about-col-list">
										<?php
										$lines2 = array_filter( array_map( 'trim', explode( "\n", $col2_items ) ) );
										foreach ( $lines2 as $item ) :
											?>
											<li><span class="about-col-arrow">&gt;</span> <?php echo esc_html( $item ); ?></li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<!-- Command Input Row 2 (Blinking Cursor) -->
					<div class="about-cli-row">
						<span class="about-cli-prompt"><?php echo esc_html( $prompt ); ?></span>
						<span class="about-cli-cursor"></span>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $show_modules ) : ?>
		<!-- Tech Stack Grid -->
		<section class="about-section-gap">
			<h2 class="about-section-h2">
				<span class="material-symbols-outlined"><?php echo esc_html( $mod_icon ); ?></span>
				<span><?php echo esc_html( $mod_title ); ?></span>
			</h2>

			<div class="about-modules-grid">
				<?php foreach ( $modules as $m ) : ?>
					<?php if ( ! empty( $m['legend'] ) ) : ?>
						<fieldset class="about-module-fieldset">
							<legend><?php echo esc_html( $m['legend'] ); ?></legend>
							<div class="about-module-body">
								<div class="about-module-row">
									<span class="about-module-label"><?php echo esc_html( $m['row1_label'] ); ?></span>
									<span class="about-module-badge"><?php echo esc_html( $m['row1_val'] ); ?></span>
								</div>
								<div class="about-module-row">
									<span class="about-module-label"><?php echo esc_html( $m['row2_label'] ); ?></span>
									<span class="about-module-highlight"><?php echo esc_html( $m['row2_val'] ); ?></span>
								</div>
								<div class="about-module-footer">
									<p><?php echo esc_html( $m['desc'] ); ?></p>
								</div>
							</div>
						</fieldset>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $show_history ) : ?>
		<!-- Experience Log (Runtime History) -->
		<section class="about-section-gap">
			<div class="about-history-header">
				<h2 class="about-section-h2" style="margin-bottom: 0;">
					<span class="material-symbols-outlined"><?php echo esc_html( $history_icon ); ?></span>
					<span><?php echo esc_html( $history_title ); ?></span>
				</h2>
				<span class="about-history-filter"><?php echo esc_html( $history_filter ); ?></span>
			</div>

			<div class="about-timeline-container">
				<?php foreach ( $logs as $index => $log ) : ?>
					<?php if ( ! empty( $log['title'] ) ) : ?>
						<div class="about-timeline-item">
							<div class="about-timeline-marker <?php echo ( 1 === $index ) ? 'active' : ''; ?>"></div>
							<div class="about-timeline-date">
								<?php
								$parts = explode( ' ', $log['date'], 2 );
								$date_str = $parts[0];
								$info_tag = isset( $parts[1] ) ? $parts[1] : 'INFO:';
								?>
								<span><?php echo esc_html( $date_str ); ?></span>
								<span class="about-timeline-info"><?php echo esc_html( $info_tag ); ?></span>
							</div>
							<div class="about-timeline-box">
								<h3><?php echo esc_html( $log['title'] ); ?></h3>
								<p><?php echo esc_html( $log['desc'] ); ?></p>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $show_cta ) : ?>
		<!-- Call to Action / Terminal -->
		<section class="about-cta-grid">
			<div class="about-cta-text">
				<h2><?php echo esc_html( $cta_title ); ?></h2>
				<p><?php echo esc_html( $cta_desc ); ?></p>
				<div class="about-cta-buttons">
					<?php if ( ! empty( $cta_btn1 ) ) : ?>
						<a href="<?php echo esc_url( $cta_url1 ); ?>" class="about-btn-primary"><?php echo esc_html( $cta_btn1 ); ?></a>
					<?php endif; ?>
					<?php if ( ! empty( $cta_btn2 ) ) : ?>
						<a href="<?php echo esc_url( $cta_url2 ); ?>" class="about-btn-secondary"><?php echo esc_html( $cta_btn2 ); ?></a>
					<?php endif; ?>
				</div>
			</div>

			<div class="about-cta-media">
				<div class="about-cta-img" style="background-image: url('<?php echo esc_url( $cta_image ); ?>');"></div>
				<div class="about-cta-overlay"></div>
				<?php if ( ! empty( $cta_lens ) ) : ?>
					<div class="about-cta-lens">
						<span><?php echo esc_html( $cta_lens ); ?></span>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

</div>
