<?php
/**
 * Content template for Terminal About Me page.
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

$col1_title = get_theme_mod( 'playpixelpro_about_hero_col1_title', 'ANDROID ECOSYSTEM' );
$col1_items = get_theme_mod( 'playpixelpro_about_hero_col1_items', "Kotlin / Coroutines / Flow\nJetpack Compose UI Engine\nNative C++ (JNI) Integrations\nMaterial 3 Implementation" );

$col2_title = get_theme_mod( 'playpixelpro_about_hero_col2_title', 'WEB INFRASTRUCTURE' );
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
$cta_image  = get_theme_mod( 'playpixelpro_about_cta_image', 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?q=80&w=1200&auto=format&fit=crop' );
$cta_lens   = get_theme_mod( 'playpixelpro_about_cta_lens_id', 'LENS_ID: 0x4F2A' );
?>

<div class="about-me-container site-container" style="padding-top: 24px; padding-bottom: 48px;">

	<?php if ( $show_hero ) : ?>
		<!-- Section 1: Terminal Hero -->
		<section class="terminal-window" style="margin-bottom: 40px;">
			<div class="window-bar">
				<div class="window-dots">
					<span class="window-dot dot-red"></span>
					<span class="window-dot dot-yellow"></span>
					<span class="window-dot dot-green"></span>
				</div>
				<span class="window-title"><?php echo esc_html( $session ); ?></span>
			</div>
			<div class="terminal-body" style="padding: 24px;">
				<div style="display: flex; gap: 12px; margin-bottom: 16px; font-size: 0.9rem;">
					<span style="color: var(--gold); font-weight: bold;"><?php echo esc_html( $prompt ); ?></span>
					<span><?php echo esc_html( $command ); ?></span>
				</div>

				<div style="border-left: 2px solid var(--accent-dim); padding-left: 16px; margin: 16px 0;">
					<h1 style="color: var(--gold); font-size: 1.4rem; margin: 0 0 16px; font-weight: 700; text-transform: uppercase;">
						<?php echo esc_html( $hero_title ); ?>
					</h1>

					<p style="max-width: 750px; line-height: 1.6; color: var(--text); margin-bottom: 24px; font-size: 0.95rem;">
						<?php echo esc_html( $hero_bio ); ?>
					</p>

					<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px;">
						<?php if ( ! empty( $col1_title ) ) : ?>
							<div>
								<h2 style="color: var(--gold); border-bottom: 1px solid var(--line); padding-bottom: 6px; margin: 0 0 12px; font-size: 0.95rem; text-transform: uppercase;">
									<?php echo esc_html( $col1_title ); ?>
								</h2>
								<ul style="list-style: none; margin: 0; padding: 0;">
									<?php
									$lines1 = array_filter( array_map( 'trim', explode( "\n", $col1_items ) ) );
									foreach ( $lines1 as $item ) :
										?>
										<li style="display: flex; align-items: center; gap: 8px; margin-bottom: 6px; font-size: 0.88rem;">
											<span style="color: var(--gold); font-weight: bold;">&gt;</span>
											<span><?php echo esc_html( $item ); ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>

						<?php if ( ! empty( $col2_title ) ) : ?>
							<div>
								<h2 style="color: var(--gold); border-bottom: 1px solid var(--line); padding-bottom: 6px; margin: 0 0 12px; font-size: 0.95rem; text-transform: uppercase;">
									<?php echo esc_html( $col2_title ); ?>
								</h2>
								<ul style="list-style: none; margin: 0; padding: 0;">
									<?php
									$lines2 = array_filter( array_map( 'trim', explode( "\n", $col2_items ) ) );
									foreach ( $lines2 as $item ) :
										?>
										<li style="display: flex; align-items: center; gap: 8px; margin-bottom: 6px; font-size: 0.88rem;">
											<span style="color: var(--gold); font-weight: bold;">&gt;</span>
											<span><?php echo esc_html( $item ); ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<div style="display: flex; gap: 12px; margin-top: 20px; font-size: 0.9rem; align-items: center;">
					<span style="color: var(--gold); font-weight: bold;"><?php echo esc_html( $prompt ); ?></span>
					<span class="cli-cursor"></span>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $show_modules ) : ?>
		<!-- Section 2: System Modules -->
		<section style="margin-bottom: 48px;">
			<div class="section-header-wrap" style="margin-top: 0; margin-bottom: 24px;">
				<h2 style="display: flex; align-items: center; gap: 10px;">
					<span class="material-symbols-outlined"><?php echo esc_html( $mod_icon ); ?></span>
					<span><?php echo esc_html( $mod_title ); ?></span>
				</h2>
				<div class="section-line"></div>
			</div>

			<div class="system-modules-grid">
				<?php foreach ( $modules as $m ) : ?>
					<?php if ( ! empty( $m['legend'] ) ) : ?>
						<fieldset class="system-module-card">
							<legend><?php echo esc_html( $m['legend'] ); ?></legend>
							<div class="module-row">
								<span style="color: var(--muted);"><?php echo esc_html( $m['row1_label'] ); ?></span>
								<span class="module-badge"><?php echo esc_html( $m['row1_val'] ); ?></span>
							</div>
							<div class="module-row">
								<span style="color: var(--muted);"><?php echo esc_html( $m['row2_label'] ); ?></span>
								<span class="module-highlight"><?php echo esc_html( $m['row2_val'] ); ?></span>
							</div>
							<div class="module-desc">
								<?php echo esc_html( $m['desc'] ); ?>
							</div>
						</fieldset>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $show_history ) : ?>
		<!-- Section 3: Runtime History Timeline -->
		<section class="runtime-timeline-wrap">
			<div class="section-header-wrap" style="margin-top: 0; margin-bottom: 8px;">
				<h2 style="display: flex; align-items: center; gap: 10px;">
					<span class="material-symbols-outlined"><?php echo esc_html( $history_icon ); ?></span>
					<span><?php echo esc_html( $history_title ); ?></span>
				</h2>
				<div class="section-line"></div>
				<span style="font-size: 0.8rem; color: var(--muted); font-family: var(--font-mono); font-weight: 600;"><?php echo esc_html( $history_filter ); ?></span>
			</div>

			<div class="runtime-timeline">
				<?php foreach ( $logs as $index => $log ) : ?>
					<?php if ( ! empty( $log['title'] ) ) : ?>
						<div class="timeline-entry">
							<div class="timeline-dot <?php echo ( 1 === $index ) ? '' : 'muted'; ?>"></div>
							<div class="timeline-date">
								<?php echo esc_html( $log['date'] ); ?>
							</div>
							<div class="timeline-card">
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
		<!-- Section 4: Call to Action -->
		<section class="cta-deploy-section">
			<div class="cta-deploy-grid">
				<div class="cta-text-side">
					<h2><?php echo esc_html( $cta_title ); ?></h2>
					<p><?php echo esc_html( $cta_desc ); ?></p>
					<div class="cta-btn-group">
						<?php if ( ! empty( $cta_btn1 ) ) : ?>
							<a href="<?php echo esc_url( $cta_url1 ); ?>" class="button heavy-btn"><?php echo esc_html( $cta_btn1 ); ?></a>
						<?php endif; ?>
						<?php if ( ! empty( $cta_btn2 ) ) : ?>
							<a href="<?php echo esc_url( $cta_url2 ); ?>" class="button" style="border-color: var(--line); color: var(--text);"><?php echo esc_html( $cta_btn2 ); ?></a>
						<?php endif; ?>
					</div>
				</div>

				<div class="cta-image-side">
					<img src="<?php echo esc_url( $cta_image ); ?>" alt="Developer Studio Macro" class="cta-image-bg" />
					<?php if ( ! empty( $cta_lens ) ) : ?>
						<div class="cta-lens-tag"><?php echo esc_html( $cta_lens ); ?></div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

</div>
