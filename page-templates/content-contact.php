<?php
/**
 * Content template for Contact Terminal page (matching new_design/developer_portfolio_contact_terminal/code.html).
 *
 * @package PlayPixelPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Customizer Settings
$uplink_tag       = get_theme_mod( 'playpixelpro_contact_uplink_tag', 'ESTABLISHING_UPLINK' );
$contact_title    = get_theme_mod( 'playpixelpro_contact_title', '> CONNECT.SH' );
$contact_desc     = get_theme_mod( 'playpixelpro_contact_desc', 'Direct transmission interface. Send secure packets to the administrator. Response times vary based on server load and local latency.' );
$nano_title       = get_theme_mod( 'playpixelpro_contact_nano_title', 'NANO 8.0 // protocol_message.md' );
$label_user       = get_theme_mod( 'playpixelpro_contact_label_user', '[01] USERNAME_STR' );
$label_email      = get_theme_mod( 'playpixelpro_contact_label_email', '[02] RETURN_ADDR' );
$label_msg        = get_theme_mod( 'playpixelpro_contact_label_msg', '[03] DATA_PAYLOAD' );
$label_newsletter = get_theme_mod( 'playpixelpro_contact_label_newsletter', 'SECURE_ENCRYPT' );
$btn_text         = get_theme_mod( 'playpixelpro_contact_btn_text', 'SEND_PACKET' );

$loc  = get_theme_mod( 'playpixelpro_contact_sys_loc', 'BERLIN_DE_01' );
$temp = get_theme_mod( 'playpixelpro_contact_sys_temp', '32.4°C' );

$github_url  = get_theme_mod( 'playpixelpro_contact_github', 'https://github.com' );
$twitter_url = get_theme_mod( 'playpixelpro_contact_twitter', 'https://x.com' );
$so_url      = get_theme_mod( 'playpixelpro_contact_stackoverflow', 'https://stackoverflow.com' );

// Bot Protection Settings
$bot_provider = get_option( 'ppp_bot_provider', 'none' );
$bot_site_key = get_option( 'ppp_bot_site_key', '' );
?>

<div class="contact-terminal-wrapper">

	<!-- Left Column: Command Prompt / Header -->
	<div class="contact-header-block">
		<?php if ( ! empty( $uplink_tag ) ) : ?>
			<div class="contact-uplink-badge"><?php echo esc_html( $uplink_tag ); ?></div>
		<?php endif; ?>

		<h1 class="contact-terminal-h1">
			<span><?php echo esc_html( $contact_title ); ?></span>
			<span class="contact-cursor-blink"></span>
		</h1>

		<p class="contact-terminal-sub"><?php echo esc_html( $contact_desc ); ?></p>
	</div>

	<!-- Main Grid (8:4 Column Layout) -->
	<div class="contact-grid">
		<!-- Left Column: Nano Protocol Form -->
		<div class="contact-main-col">
			<fieldset class="contact-nano-fieldset">
				<legend class="contact-nano-legend"><?php echo esc_html( $nano_title ); ?></legend>

				<div class="contact-nano-body">
					<form id="contact-terminal-form" method="POST" action="">
						<?php wp_nonce_field( 'ppp_contact_nonce', 'contact_nonce' ); ?>

						<!-- Username Field -->
						<div class="contact-form-group">
							<label class="contact-form-label"><?php echo esc_html( $label_user ); ?></label>
							<input type="text" name="username" class="contact-form-input" placeholder="Enter identifier..." required>
						</div>

						<!-- Email Field -->
						<div class="contact-form-group">
							<label class="contact-form-label"><?php echo esc_html( $label_email ); ?></label>
							<input type="email" name="email" class="contact-form-input" placeholder="user@remote.host" required>
						</div>

						<!-- Message Field -->
						<div class="contact-form-group">
							<label class="contact-form-label"><?php echo esc_html( $label_msg ); ?></label>
							<textarea name="message" class="contact-form-textarea" rows="8" placeholder="Write your logs here..." required></textarea>
						</div>

						<!-- Turnstile / reCAPTCHA Container -->
						<?php if ( 'turnstile' === $bot_provider && ! empty( $bot_site_key ) ) : ?>
							<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
							<div class="cf-turnstile" data-sitekey="<?php echo esc_attr( $bot_site_key ); ?>" style="margin-bottom: 16px;"></div>
						<?php elseif ( 'recaptcha_v2' === $bot_provider && ! empty( $bot_site_key ) ) : ?>
							<script src="https://www.google.com/recaptcha/api.js" async defer></script>
							<div class="g-recaptcha" data-sitekey="<?php echo esc_attr( $bot_site_key ); ?>" style="margin-bottom: 16px;"></div>
						<?php elseif ( 'recaptcha_v3' === $bot_provider && ! empty( $bot_site_key ) ) : ?>
							<script src="https://www.google.com/recaptcha/api.js?render=<?php echo esc_attr( $bot_site_key ); ?>"></script>
							<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
							<script>
							grecaptcha.ready(function() {
								grecaptcha.execute('<?php echo esc_attr( $bot_site_key ); ?>', {action: 'contact_submit'}).then(function(token) {
									var el = document.getElementById('g-recaptcha-response');
									if (el) el.value = token;
								});
							});
							</script>
						<?php endif; ?>

						<!-- Controls Footer Row -->
						<div class="contact-form-footer">
							<label class="contact-checkbox-label">
								<input type="checkbox" name="subscribe" value="1" class="contact-checkbox-input" checked>
								<span class="contact-checkbox-custom"></span>
								<span class="contact-checkbox-text"><?php echo esc_html( $label_newsletter ); ?></span>
							</label>

							<button type="submit" class="contact-btn-submit" id="contact-submit-btn">
								<span><?php echo esc_html( $btn_text ); ?></span>
							</button>
						</div>

						<!-- CLI Response Feedback Box -->
						<div id="contact-cli-output" class="contact-cli-output" style="display: none;"></div>
					</form>
				</div>

				<!-- Editor Status Footer -->
				<div class="contact-nano-status-bar">
					<div class="contact-nano-status-keys">
						<span>^G Get Help</span>
						<span>^O Write Out</span>
						<span class="highlight-exit">^X Exit</span>
					</div>
					<div class="contact-nano-status-meta">
						[ Row 1, Col 1 | UTF-8 | Markdown ]
					</div>
				</div>
			</fieldset>
		</div>

		<!-- Right Column: System Status & Social Nodes -->
		<div class="contact-sidebar-col">
			<!-- SYS_STATUS CARD -->
			<div class="contact-status-card">
				<h3 class="contact-card-title">SYS_STATUS</h3>
				<ul class="contact-status-list">
					<li>
						<span class="label">LOC:</span>
						<span class="val"><?php echo esc_html( $loc ); ?></span>
					</li>
					<li>
						<span class="label">UPTIME:</span>
						<span class="val"><?php echo esc_html( gmdate( 'H:i:s', time() % 86400 ) ); ?></span>
					</li>
					<li>
						<span class="label">TEMP:</span>
						<span class="val"><?php echo esc_html( $temp ); ?></span>
					</li>
					<li>
						<span class="label">LOAD:</span>
						<span class="val highlight">0.02 / 0.14 / 0.08</span>
					</li>
				</ul>
			</div>

			<!-- SOCIAL_NODES CARD -->
			<div class="contact-status-card">
				<h3 class="contact-card-title">SOCIAL_NODES</h3>
				<div class="contact-nodes-list">
					<?php if ( ! empty( $github_url ) ) : ?>
						<a class="contact-node-item" href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noopener">
							<div class="icon-box">
								<span class="material-symbols-outlined">terminal</span>
							</div>
							<div class="info-box">
								<div class="title">GITHUB</div>
								<div class="sub">@dev_root_core</div>
							</div>
						</a>
					<?php endif; ?>

					<?php if ( ! empty( $twitter_url ) ) : ?>
						<a class="contact-node-item" href="<?php echo esc_url( $twitter_url ); ?>" target="_blank" rel="noopener">
							<div class="icon-box">
								<span class="material-symbols-outlined">share</span>
							</div>
							<div class="info-box">
								<div class="title">TWITTER / X</div>
								<div class="sub">@root_dev_ops</div>
							</div>
						</a>
					<?php endif; ?>

					<?php if ( ! empty( $so_url ) ) : ?>
						<a class="contact-node-item" href="<?php echo esc_url( $so_url ); ?>" target="_blank" rel="noopener">
							<div class="icon-box">
								<span class="material-symbols-outlined">data_object</span>
							</div>
							<div class="info-box">
								<div class="title">STACK_OVERFLOW</div>
								<div class="sub">uid: 492019</div>
							</div>
						</a>
					<?php endif; ?>
				</div>
			</div>

			<!-- DECORATIVE SECURITY ASSET -->
			<div class="contact-security-card">
				<div class="security-overlay-grid"></div>
				<div class="security-content">
					<span class="material-symbols-outlined shield-icon">security</span>
					<div class="security-badge-pulse">ENCRYPTION ACTIVE</div>
				</div>
				<div class="security-bars">
					<div class="bar bar-1"></div>
					<div class="bar bar-2"></div>
					<div class="bar bar-3"></div>
					<div class="bar bar-4"></div>
					<div class="bar bar-5"></div>
					<div class="bar bar-6"></div>
				</div>
			</div>
		</div>
	</div>

</div>
