<?php
/**
 * PlayPixelPro ClassicPress Customizer settings & dynamic CSS.
 *
 * @package PlayPixelPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Customizer Settings and Controls under Appearance > Customize.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager object.
 */
function playpixelpro_customize_register( $wp_customize ) {

	// Panel: PlayPixelPro Terminal Options
	$wp_customize->add_panel(
		'playpixelpro_panel',
		array(
			'title'       => __( 'PlayPixelPro Theme Options', 'playpixelpro' ),
			'description' => __( 'Customize colors, terminal prompts, hero animation, services, projects, and social links.', 'playpixelpro' ),
			'priority'    => 30,
		)
	);

	// Section 1: Colors & Aesthetics
	$wp_customize->add_section(
		'playpixelpro_colors_section',
		array(
			'title'    => __( 'Colors & CRT Effects', 'playpixelpro' ),
			'panel'    => 'playpixelpro_panel',
			'priority' => 10,
		)
	);

	// Accent Gold Color
	$wp_customize->add_setting(
		'playpixelpro_accent_color',
		array(
			'default'           => '#eec35e',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'playpixelpro_accent_color',
			array(
				'label'    => __( 'Primary Accent Color (Amber Gold)', 'playpixelpro' ),
				'section'  => 'playpixelpro_colors_section',
				'settings' => 'playpixelpro_accent_color',
			)
		)
	);

	// Background Color
	$wp_customize->add_setting(
		'playpixelpro_bg_color',
		array(
			'default'           => '#16130b',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'playpixelpro_bg_color',
			array(
				'label'    => __( 'Background Color (Obsidian Dark)', 'playpixelpro' ),
				'section'  => 'playpixelpro_colors_section',
				'settings' => 'playpixelpro_bg_color',
			)
		)
	);

	// Surface Container Color
	$wp_customize->add_setting(
		'playpixelpro_surface_color',
		array(
			'default'           => '#1e1b13',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'playpixelpro_surface_color',
			array(
				'label'    => __( 'Terminal Surface Color', 'playpixelpro' ),
				'section'  => 'playpixelpro_colors_section',
				'settings' => 'playpixelpro_surface_color',
			)
		)
	);

	// CRT Scanline Overlay Toggle
	$wp_customize->add_setting(
		'playpixelpro_enable_scanline',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_enable_scanline',
		array(
			'label'    => __( 'Enable CRT Scanline Overlay', 'playpixelpro' ),
			'section'  => 'playpixelpro_colors_section',
			'type'     => 'checkbox',
		)
	);

	// Blinking CLI Cursor Toggle
	$wp_customize->add_setting(
		'playpixelpro_enable_cursor',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_enable_cursor',
		array(
			'label'    => __( 'Enable Blinking Terminal Cursor', 'playpixelpro' ),
			'section'  => 'playpixelpro_colors_section',
			'type'     => 'checkbox',
		)
	);

	// Section 2: Header & Terminal Branding
	$wp_customize->add_section(
		'playpixelpro_header_section',
		array(
			'title'    => __( 'Header & Navigation', 'playpixelpro' ),
			'panel'    => 'playpixelpro_panel',
			'priority' => 20,
		)
	);

	// Terminal Logo / Brand Title
	$wp_customize->add_setting(
		'playpixelpro_logo_text',
		array(
			'default'           => 'DEV_ROOT',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_logo_text',
		array(
			'label'    => __( 'Terminal Brand Logo Text', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Prompt Prefix
	$wp_customize->add_setting(
		'playpixelpro_prompt_prefix',
		array(
			'default'           => 'user@dev-root:~$',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_prompt_prefix',
		array(
			'label'    => __( 'Terminal Prompt Prefix', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Header CTA Action Button Label
	$wp_customize->add_setting(
		'playpixelpro_cta_text',
		array(
			'default'           => 'ssh_connect',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_cta_text',
		array(
			'label'    => __( 'Header Action Button Label', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Header CTA Action Button URL
	$wp_customize->add_setting(
		'playpixelpro_cta_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_cta_url',
		array(
			'label'       => __( 'Header Action Button Link URL', 'playpixelpro' ),
			'description' => __( 'Leave empty to link to Downloads archive.', 'playpixelpro' ),
			'section'     => 'playpixelpro_header_section',
			'type'        => 'url',
		)
	);

	// Hero Terminal Window Title
	$wp_customize->add_setting(
		'playpixelpro_hero_window_title',
		array(
			'default'           => 'bash — 120x40',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_hero_window_title',
		array(
			'label'    => __( 'Hero Terminal Window Title Bar', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Hero Line 1 Text
	$wp_customize->add_setting(
		'playpixelpro_hero_line1',
		array(
			'default'           => 'System initialized. Fetching profile...',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_hero_line1',
		array(
			'label'    => __( 'Hero Terminal Line 01 Text', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Hero Line 2 Text
	$wp_customize->add_setting(
		'playpixelpro_hero_line2',
		array(
			'default'           => 'Specialization: [Android_SDK, Kotlin, WebGL, NextJS, Game_Streaming]',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_hero_line2',
		array(
			'label'    => __( 'Hero Terminal Line 02 Text', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Hero Line 3 Text
	$wp_customize->add_setting(
		'playpixelpro_hero_line3',
		array(
			'default'           => 'Status: All systems operational. Ready for deployment.',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_hero_line3',
		array(
			'label'    => __( 'Hero Terminal Line 03 Text', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Hero Line 4 Text
	$wp_customize->add_setting(
		'playpixelpro_hero_line4',
		array(
			'default'           => 'Environment: Production // Node_01',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_hero_line4',
		array(
			'label'    => __( 'Hero Terminal Line 04 Text', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Hero Line 5 Command Text
	$wp_customize->add_setting(
		'playpixelpro_hero_command',
		array(
			'default'           => 'deploy --android --web',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_hero_command',
		array(
			'label'    => __( 'Hero Terminal Line 05 Command Text', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// GitHub Action Button Text
	$wp_customize->add_setting(
		'playpixelpro_github_btn_text',
		array(
			'default'           => 'VIEW_GITHUB',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_github_btn_text',
		array(
			'label'    => __( 'Hero GitHub Button Text', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Hero GitHub Repository URL
	$wp_customize->add_setting(
		'playpixelpro_github_url',
		array(
			'default'           => 'https://github.com/dindoquitor',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_github_url',
		array(
			'label'       => __( 'Hero GitHub Repository URL', 'playpixelpro' ),
			'description' => __( 'Link URL for the hero button under the terminal section.', 'playpixelpro' ),
			'section'     => 'playpixelpro_header_section',
			'type'        => 'url',
		)
	);

	// Section 5: Homepage Sections Toggles
	$wp_customize->add_section(
		'playpixelpro_frontpage_sections',
		array(
			'title'    => __( 'Front Page Section Controls', 'playpixelpro' ),
			'panel'    => 'playpixelpro_panel',
			'priority' => 40,
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_show_services',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_show_services',
		array(
			'label'    => __( 'Show 01_Services Section', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_show_projects',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_show_projects',
		array(
			'label'    => __( 'Show 02_Projects Section', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_show_support',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_show_support',
		array(
			'label'    => __( 'Show 03_Support Section', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_show_gaming',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_show_gaming',
		array(
			'label'    => __( 'Show 04_Gaming Section', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'checkbox',
		)
	);

	// Section Titles Controls
	$wp_customize->add_setting(
		'playpixelpro_services_title',
		array(
			'default'           => '01_Services',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_services_title',
		array(
			'label'    => __( 'Section 01 Title', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'text',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_projects_title',
		array(
			'default'           => '02_Projects',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_projects_title',
		array(
			'label'    => __( 'Section 02 Title', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'text',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_support_title',
		array(
			'default'           => '03_Support',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_support_title',
		array(
			'label'    => __( 'Section 03 Title', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'text',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_gaming_title',
		array(
			'default'           => '04_Gaming & Streams',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_gaming_title',
		array(
			'label'    => __( 'Section 04 Title', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'text',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_latest_entries_title',
		array(
			'default'           => 'latest_entries',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_latest_entries_title',
		array(
			'label'    => __( 'Latest Entries Section Title', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'text',
		)
	);

	// Latest Entries Count Control (3 to 9 posts)
	$wp_customize->add_setting(
		'playpixelpro_latest_entries_count',
		array(
			'default'           => 6,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_latest_entries_count',
		array(
			'label'       => __( 'Number of Latest Entries (3 to 9)', 'playpixelpro' ),
			'description' => __( 'Select how many recent blog post cards to display on the front page (up to 9).', 'playpixelpro' ),
			'section'     => 'playpixelpro_frontpage_sections',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 3,
				'max'  => 9,
				'step' => 1,
			),
		)
	);

	// Card Limits for Services
	$wp_customize->add_setting(
		'playpixelpro_services_count',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_services_count',
		array(
			'label'       => __( 'Services Card Limit (0 = All)', 'playpixelpro' ),
			'description' => __( 'Set how many service cards to display on the front page (0 displays all published services).', 'playpixelpro' ),
			'section'     => 'playpixelpro_frontpage_sections',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 12,
				'step' => 1,
			),
		)
	);

	// Card Limits for Projects
	$wp_customize->add_setting(
		'playpixelpro_projects_count',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_projects_count',
		array(
			'label'       => __( 'Projects Card Limit (0 = All)', 'playpixelpro' ),
			'description' => __( 'Set how many project cards to display on the front page (0 displays all published projects).', 'playpixelpro' ),
			'section'     => 'playpixelpro_frontpage_sections',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 12,
				'step' => 1,
			),
		)
	);

	// Card Limits for Streams
	$wp_customize->add_setting(
		'playpixelpro_streams_count',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_streams_count',
		array(
			'label'       => __( 'Stream Channels Limit (0 = All)', 'playpixelpro' ),
			'description' => __( 'Set how many stream channels to display on the front page (0 displays all published streams).', 'playpixelpro' ),
			'section'     => 'playpixelpro_frontpage_sections',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 12,
				'step' => 1,
			),
		)
	);

	// Section 6: Dynamic Custom Sections Builder
	$wp_customize->add_section(
		'playpixelpro_custom_builder_section',
		array(
			'title'       => __( 'Dynamic Custom Sections Builder', 'playpixelpro' ),
			'description' => __( 'Add and customize new custom sections to display on your front page.', 'playpixelpro' ),
			'panel'       => 'playpixelpro_panel',
			'priority'    => 45,
		)
	);

	for ( $i = 1; $i <= 3; $i++ ) {
		// Toggle
		$wp_customize->add_setting(
			"playpixelpro_show_custom_sec{$i}",
			array(
				'default'           => false,
				'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
			)
		);
		$wp_customize->add_control(
			"playpixelpro_show_custom_sec{$i}",
			array(
				'label'    => sprintf( __( 'Enable Custom Section %d', 'playpixelpro' ), $i ),
				'section'  => 'playpixelpro_custom_builder_section',
				'type'     => 'checkbox',
			)
		);

		// Title
		$wp_customize->add_setting(
			"playpixelpro_custom_sec{$i}_title",
			array(
				'default'           => sprintf( '0%d_CustomSection', $i + 4 ),
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			"playpixelpro_custom_sec{$i}_title",
			array(
				'label'    => sprintf( __( 'Section %d Heading Title', 'playpixelpro' ), $i ),
				'section'  => 'playpixelpro_custom_builder_section',
				'type'     => 'text',
			)
		);

		// Content
		$wp_customize->add_setting(
			"playpixelpro_custom_sec{$i}_content",
			array(
				'default'           => '',
				'sanitize_callback' => 'wp_kses_post',
			)
		);
		$wp_customize->add_control(
			"playpixelpro_custom_sec{$i}_content",
			array(
				'label'       => sprintf( __( 'Section %d Content / Shortcode', 'playpixelpro' ), $i ),
				'description' => __( 'Enter HTML text or shortcodes (e.g. [terminal-box title="SYSTEM_LOGS"]...[/terminal-box] or [system-specs]).', 'playpixelpro' ),
				'section'     => 'playpixelpro_custom_builder_section',
				'type'        => 'textarea',
			)
		);
	}

	// Section: Single Post Social Share Options
	$wp_customize->add_section(
		'playpixelpro_share_section',
		array(
			'title'    => __( 'Single Post Social Share Buttons', 'playpixelpro' ),
			'panel'    => 'playpixelpro_panel',
			'priority' => 50,
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_share_x',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_share_x',
		array(
			'label'    => __( 'Enable X (Twitter) Share Button', 'playpixelpro' ),
			'section'  => 'playpixelpro_share_section',
			'type'     => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_share_facebook',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_share_facebook',
		array(
			'label'    => __( 'Enable Facebook Share Button', 'playpixelpro' ),
			'section'  => 'playpixelpro_share_section',
			'type'     => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_share_linkedin',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_share_linkedin',
		array(
			'label'    => __( 'Enable LinkedIn Share Button', 'playpixelpro' ),
			'section'  => 'playpixelpro_share_section',
			'type'     => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_share_reddit',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_share_reddit',
		array(
			'label'    => __( 'Enable Reddit Share Button', 'playpixelpro' ),
			'section'  => 'playpixelpro_share_section',
			'type'     => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_share_email',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_share_email',
		array(
			'label'    => __( 'Enable Email Share Button', 'playpixelpro' ),
			'section'  => 'playpixelpro_share_section',
			'type'     => 'checkbox',
		)
	);
}
add_action( 'customize_register', 'playpixelpro_customize_register' );

/**
 * Sanitize Checkbox Inputs.
 *
 * @param mixed $checked Input status.
 * @return bool Sanitized boolean output.
 */
function playpixelpro_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && ( true === $checked || 1 == $checked || '1' === (string) $checked || 'true' === (string) $checked || 'on' === (string) $checked ) ) ? true : false );
}

/**
 * Generate Inline Dynamic CSS from Customizer Settings.
 */
function playpixelpro_customizer_css() {
	$accent_color  = get_theme_mod( 'playpixelpro_accent_color', '#eec35e' );
	$bg_color      = get_theme_mod( 'playpixelpro_bg_color', '#16130b' );
	$surface_color = get_theme_mod( 'playpixelpro_surface_color', '#1e1b13' );

	$css = ":root {
		--gold: {$accent_color};
		--bg: {$bg_color};
		--surface: {$surface_color};
	}";

	wp_add_inline_style( 'playpixelpro', $css );
}
add_action( 'wp_enqueue_scripts', 'playpixelpro_customizer_css', 20 );
