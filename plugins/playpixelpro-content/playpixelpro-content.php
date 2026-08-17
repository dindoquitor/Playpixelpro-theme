<?php
/**
 * Plugin Name: PlayPixelPro Content
 * Description: Content types, settings, and shortcodes for the PlayPixelPro ClassicPress site.
 * Version: 2.0.0
 * Author: PlayPixelPro
 * Requires PHP: 7.4
 * License: Proprietary
 * Text Domain: playpixelpro-content
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Custom Post Types and Taxonomies under Main PlayPixelPro Menu.
 */
function ppp_register_content() {
	// Register Downloads Post Type (Main PlayPixelPro Menu)
	register_post_type(
		'downloads',
		array(
			'labels'       => array(
				'name'               => __( 'PlayPixelPro', 'playpixelpro-content' ),
				'singular_name'      => __( 'Download', 'playpixelpro-content' ),
				'all_items'          => __( 'Downloads', 'playpixelpro-content' ),
				'add_new'            => __( 'Add New Download', 'playpixelpro-content' ),
				'add_new_item'       => __( 'Add New Download', 'playpixelpro-content' ),
				'edit_item'          => __( 'Edit Download', 'playpixelpro-content' ),
				'new_item'           => __( 'New Download', 'playpixelpro-content' ),
				'view_item'          => __( 'View Download', 'playpixelpro-content' ),
				'search_items'       => __( 'Search Downloads', 'playpixelpro-content' ),
				'not_found'          => __( 'No downloads found', 'playpixelpro-content' ),
				'not_found_in_trash' => __( 'No downloads found in trash', 'playpixelpro-content' ),
			),
			'public'       => true,
			'has_archive'  => true,
			'show_in_menu' => true,
			'menu_icon'    => 'dashicons-desktop',
			'menu_position'=> 25,
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments' ),
			'rewrite'      => array( 'slug' => 'downloads' ),
			'show_in_rest' => true,
		)
	);

	// Register Services Post Type
	register_post_type(
		'services',
		array(
			'labels'       => array(
				'name'               => __( 'Services', 'playpixelpro-content' ),
				'singular_name'      => __( 'Service', 'playpixelpro-content' ),
				'all_items'          => __( 'Services', 'playpixelpro-content' ),
				'add_new'            => __( 'Add New Service', 'playpixelpro-content' ),
				'add_new_item'       => __( 'Add New Service', 'playpixelpro-content' ),
				'edit_item'          => __( 'Edit Service', 'playpixelpro-content' ),
				'new_item'           => __( 'New Service', 'playpixelpro-content' ),
				'view_item'          => __( 'View Service', 'playpixelpro-content' ),
				'search_items'       => __( 'Search Services', 'playpixelpro-content' ),
				'not_found'          => __( 'No services found', 'playpixelpro-content' ),
				'not_found_in_trash' => __( 'No services found in trash', 'playpixelpro-content' ),
			),
			'public'       => true,
			'has_archive'  => false,
			'show_in_menu' => 'edit.php?post_type=downloads',
			'supports'     => array( 'title', 'editor', 'excerpt' ),
			'show_in_rest' => true,
		)
	);

	// Register Projects Post Type
	register_post_type(
		'projects',
		array(
			'labels'       => array(
				'name'               => __( 'Projects', 'playpixelpro-content' ),
				'singular_name'      => __( 'Project', 'playpixelpro-content' ),
				'all_items'          => __( 'Projects', 'playpixelpro-content' ),
				'add_new'            => __( 'Add New Project', 'playpixelpro-content' ),
				'add_new_item'       => __( 'Add New Project', 'playpixelpro-content' ),
				'edit_item'          => __( 'Edit Project', 'playpixelpro-content' ),
				'new_item'           => __( 'New Project', 'playpixelpro-content' ),
				'view_item'          => __( 'View Project', 'playpixelpro-content' ),
				'search_items'       => __( 'Search Projects', 'playpixelpro-content' ),
				'not_found'          => __( 'No projects found', 'playpixelpro-content' ),
				'not_found_in_trash' => __( 'No projects found in trash', 'playpixelpro-content' ),
			),
			'public'       => true,
			'has_archive'  => false,
			'show_in_menu' => 'edit.php?post_type=downloads',
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
			'show_in_rest' => true,
		)
	);

	// Register Streams Post Type
	register_post_type(
		'streams',
		array(
			'labels'       => array(
				'name'               => __( 'Streams', 'playpixelpro-content' ),
				'singular_name'      => __( 'Stream', 'playpixelpro-content' ),
				'all_items'          => __( 'Streams', 'playpixelpro-content' ),
				'add_new'            => __( 'Add New Stream', 'playpixelpro-content' ),
				'add_new_item'       => __( 'Add New Stream', 'playpixelpro-content' ),
				'edit_item'          => __( 'Edit Stream', 'playpixelpro-content' ),
				'new_item'           => __( 'New Stream', 'playpixelpro-content' ),
				'view_item'          => __( 'View Stream', 'playpixelpro-content' ),
				'search_items'       => __( 'Search Streams', 'playpixelpro-content' ),
				'not_found'          => __( 'No streams found', 'playpixelpro-content' ),
				'not_found_in_trash' => __( 'No streams found in trash', 'playpixelpro-content' ),
			),
			'public'       => true,
			'has_archive'  => false,
			'show_in_menu' => 'edit.php?post_type=downloads',
			'supports'     => array( 'title', 'editor', 'excerpt' ),
			'show_in_rest' => true,
		)
	);

	// Register Profiles Post Type (Dynamic Social & Developer Profiles)
	register_post_type(
		'profiles',
		array(
			'labels'       => array(
				'name'               => __( 'Profiles', 'playpixelpro-content' ),
				'singular_name'      => __( 'Profile', 'playpixelpro-content' ),
				'all_items'          => __( 'Profiles', 'playpixelpro-content' ),
				'add_new'            => __( 'Add New Profile', 'playpixelpro-content' ),
				'add_new_item'       => __( 'Add New Profile', 'playpixelpro-content' ),
				'edit_item'          => __( 'Edit Profile', 'playpixelpro-content' ),
				'new_item'           => __( 'New Profile', 'playpixelpro-content' ),
				'view_item'          => __( 'View Profile', 'playpixelpro-content' ),
				'search_items'       => __( 'Search Profiles', 'playpixelpro-content' ),
				'not_found'          => __( 'No profiles found', 'playpixelpro-content' ),
				'not_found_in_trash' => __( 'No profiles found in trash', 'playpixelpro-content' ),
			),
			'public'       => true,
			'has_archive'  => false,
			'show_in_menu' => 'edit.php?post_type=downloads',
			'supports'     => array( 'title' ),
			'show_in_rest' => true,
		)
	);

	// Register Genre Taxonomy under PlayPixelPro menu
	register_taxonomy(
		'download_genre',
		'downloads',
		array(
			'labels'            => array(
				'name'              => __( 'Genres', 'playpixelpro-content' ),
				'singular_name'     => __( 'Genre', 'playpixelpro-content' ),
				'search_items'      => __( 'Search Genres', 'playpixelpro-content' ),
				'all_items'         => __( 'All Genres', 'playpixelpro-content' ),
				'parent_item'       => __( 'Parent Genre', 'playpixelpro-content' ),
				'parent_item_colon' => __( 'Parent Genre:', 'playpixelpro-content' ),
				'edit_item'         => __( 'Edit Genre', 'playpixelpro-content' ),
				'update_item'       => __( 'Update Genre', 'playpixelpro-content' ),
				'add_new_item'      => __( 'Add New Genre', 'playpixelpro-content' ),
				'new_item_name'     => __( 'New Genre Name', 'playpixelpro-content' ),
				'menu_name'         => __( 'Genres', 'playpixelpro-content' ),
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_in_menu'      => 'edit.php?post_type=downloads',
			'show_in_rest'      => true,
			'rewrite'           => array( 'slug' => 'genre' ),
		)
	);
}
add_action( 'init', 'ppp_register_content' );

/**
 * Remove "Add New" submenus from PlayPixelPro main menu.
 */
function ppp_clean_admin_submenus() {
	remove_submenu_page( 'edit.php?post_type=downloads', 'post-new.php?post_type=downloads' );
	remove_submenu_page( 'edit.php?post_type=downloads', 'post-new.php?post_type=services' );
	remove_submenu_page( 'edit.php?post_type=downloads', 'post-new.php?post_type=projects' );
	remove_submenu_page( 'edit.php?post_type=downloads', 'post-new.php?post_type=streams' );
	remove_submenu_page( 'edit.php?post_type=downloads', 'post-new.php?post_type=profiles' );
}
add_action( 'admin_menu', 'ppp_clean_admin_submenus', 999 );

/**
 * Enqueue Material Symbols font in Admin for Services and Profiles editors.
 *
 * @param string $hook Admin page hook.
 */
function ppp_admin_scripts( $hook ) {
	global $post_type;
	if ( 'services' === $post_type || 'profiles' === $post_type ) {
		wp_enqueue_style(
			'material-symbols-admin',
			'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0',
			array(),
			'1.0.0'
		);
	}
}
add_action( 'admin_enqueue_scripts', 'ppp_admin_scripts' );

/**
 * Meta Box for Download Details.
 */
function ppp_download_box( $post ) {
	wp_nonce_field( 'ppp_save_download', 'ppp_download_nonce' );

	$file     = get_post_meta( $post->ID, '_ppp_file', true );
	$version  = get_post_meta( $post->ID, '_ppp_version', true );
	$size     = get_post_meta( $post->ID, '_ppp_size', true );
	$platform = get_post_meta( $post->ID, '_ppp_platform', true );
	?>
	<p>
		<label for="ppp_file"><strong><?php esc_html_e( 'Download File URL', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="url" id="ppp_file" name="ppp_file" value="<?php echo esc_attr( $file ); ?>" placeholder="https://...">
	</p>
	<p>
		<label for="ppp_version"><strong><?php esc_html_e( 'Version', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="text" id="ppp_version" name="ppp_version" value="<?php echo esc_attr( $version ); ?>" placeholder="e.g. v1.0.4">
	</p>
	<p>
		<label for="ppp_size"><strong><?php esc_html_e( 'File Size', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="text" id="ppp_size" name="ppp_size" value="<?php echo esc_attr( $size ); ?>" placeholder="e.g. 1.2 GB">
	</p>
	<p>
		<label for="ppp_platform"><strong><?php esc_html_e( 'Platform / OS', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="text" id="ppp_platform" name="ppp_platform" value="<?php echo esc_attr( $platform ); ?>" placeholder="e.g. Windows 10/11 64-bit">
	</p>
	<?php
}

/**
 * Meta Box for Service Details.
 *
 * @param WP_Post $post Current post object.
 */
function ppp_service_box( $post ) {
	wp_nonce_field( 'ppp_save_service', 'ppp_service_nonce' );

	$icon     = get_post_meta( $post->ID, '_ppp_service_icon', true );
	$commands = get_post_meta( $post->ID, '_ppp_service_commands', true );

	if ( empty( $icon ) ) {
		$icon = 'android';
	}

	$preset_icons = array(
		'android'        => __( 'Android', 'playpixelpro-content' ),
		'code'           => __( 'Web Dev', 'playpixelpro-content' ),
		'sports_esports' => __( 'Gaming', 'playpixelpro-content' ),
		'terminal'       => __( 'Terminal', 'playpixelpro-content' ),
		'cloud'          => __( 'Cloud / DevOps', 'playpixelpro-content' ),
		'rocket_launch'  => __( 'Deployment', 'playpixelpro-content' ),
		'speed'          => __( 'Performance', 'playpixelpro-content' ),
		'security'       => __( 'Security', 'playpixelpro-content' ),
		'database'       => __( 'Database', 'playpixelpro-content' ),
		'memory'         => __( 'Hardware', 'playpixelpro-content' ),
		'palette'        => __( 'Design / UI', 'playpixelpro-content' ),
		'tune'           => __( 'Optimization', 'playpixelpro-content' ),
	);
	?>
	<div class="ppp-icon-picker-wrap" style="margin-bottom: 20px;">
		<label><strong><?php esc_html_e( 'Select Service Icon (Click to choose):', 'playpixelpro-content' ); ?></strong></label>
		<div class="ppp-icon-grid" style="display: flex; flex-wrap: wrap; gap: 10px; margin: 12px 0;">
			<?php foreach ( $preset_icons as $icon_key => $label ) : ?>
				<?php $is_selected = ( $icon === $icon_key ); ?>
				<button type="button" 
					class="button ppp-icon-btn <?php echo $is_selected ? 'active' : ''; ?>" 
					data-icon="<?php echo esc_attr( $icon_key ); ?>"
					style="display: flex; align-items: center; gap: 6px; padding: 6px 12px; height: auto; <?php echo $is_selected ? 'background: #16130b; color: #eec35e; border-color: #eec35e; font-weight: bold;' : ''; ?>">
					<span class="material-symbols-outlined" style="font-size: 1.4rem; color: <?php echo $is_selected ? '#eec35e' : 'inherit'; ?>;"><?php echo esc_html( $icon_key ); ?></span>
					<span><?php echo esc_html( $label ); ?></span>
				</button>
			<?php endforeach; ?>
		</div>

		<p style="margin-top: 12px;">
			<label for="ppp_service_icon"><strong><?php esc_html_e( 'Selected Icon Key:', 'playpixelpro-content' ); ?></strong></label><br>
			<input class="widefat" type="text" id="ppp_service_icon" name="ppp_service_icon" value="<?php echo esc_attr( $icon ); ?>" style="max-width: 300px;">
		</p>
	</div>

	<script>
	jQuery(document).ready(function($) {
		$('.ppp-icon-btn').on('click', function(e) {
			e.preventDefault();
			var iconKey = $(this).data('icon');
			$('#ppp_service_icon').val(iconKey);

			$('.ppp-icon-btn').css({
				'background': '',
				'color': '',
				'border-color': '',
				'font-weight': ''
			}).find('.material-symbols-outlined').css('color', 'inherit');

			$(this).css({
				'background': '#16130b',
				'color': '#eec35e',
				'border-color': '#eec35e',
				'font-weight': 'bold'
			}).find('.material-symbols-outlined').css('color', '#eec35e');
		});
	});
	</script>

	<p style="margin-top: 20px;">
		<label for="ppp_service_commands"><strong><?php esc_html_e( 'Terminal Commands (One per line)', 'playpixelpro-content' ); ?></strong></label><br>
		<textarea class="widefat" rows="4" id="ppp_service_commands" name="ppp_service_commands" placeholder="> kotlin_coroutines.invoked()&#10;> jetpack_compose.build()"><?php echo esc_textarea( $commands ); ?></textarea>
	</p>
	<?php
}

/**
 * Meta Box for Project Details.
 *
 * @param WP_Post $post Current post object.
 */
function ppp_project_box( $post ) {
	wp_nonce_field( 'ppp_save_project', 'ppp_project_nonce' );

	$tech = get_post_meta( $post->ID, '_ppp_project_tech', true );
	$url  = get_post_meta( get_the_ID(), '_ppp_project_url', true );
	$btn  = get_post_meta( get_the_ID(), '_ppp_project_btn_text', true );

	if ( empty( $tech ) ) {
		$tech = 'Kotlin';
	}
	if ( empty( $btn ) ) {
		$btn = 'PROJECT_LINK >';
	}
	?>
	<p>
		<label for="ppp_project_tech"><strong><?php esc_html_e( 'Tech Tag / Badge', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="text" id="ppp_project_tech" name="ppp_project_tech" value="<?php echo esc_attr( $tech ); ?>" placeholder="e.g. Kotlin, Java, React, TypeScript">
	</p>
	<p>
		<label for="ppp_project_url"><strong><?php esc_html_e( 'Project / Repository URL', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="url" id="ppp_project_url" name="ppp_project_url" value="<?php echo esc_attr( $url ); ?>" placeholder="https://github.com/...">
	</p>
	<p>
		<label for="ppp_project_btn_text"><strong><?php esc_html_e( 'Button Text', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="text" id="ppp_project_btn_text" name="ppp_project_btn_text" value="<?php echo esc_attr( $btn ); ?>" placeholder="e.g. PROJECT_01 >">
	</p>
	<?php
}

/**
 * Meta Box for Stream Channel Details & Live Status.
 *
 * @param WP_Post $post Current post object.
 */
function ppp_stream_box( $post ) {
	wp_nonce_field( 'ppp_save_stream', 'ppp_stream_nonce' );

	$url     = get_post_meta( $post->ID, '_ppp_stream_url', true );
	$is_live = get_post_meta( $post->ID, '_ppp_stream_is_live', true );
	?>
	<p>
		<label for="ppp_stream_url"><strong><?php esc_html_e( 'Stream Channel URL', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="url" id="ppp_stream_url" name="ppp_stream_url" value="<?php echo esc_attr( $url ); ?>" placeholder="https://twitch.tv/playpixelpro">
	</p>
	<p style="margin-top: 16px; padding: 12px; background: #fff8e5; border-left: 4px solid #eec35e;">
		<label for="ppp_stream_is_live" style="font-size: 1rem; color: #16130b; font-weight: bold;">
			<input type="checkbox" id="ppp_stream_is_live" name="ppp_stream_is_live" value="1" <?php checked( $is_live, '1' ); ?>>
			🔴 <?php esc_html_e( 'Is Stream Currently Live?', 'playpixelpro-content' ); ?>
		</label><br>
		<small style="color: #666; font-style: italic;"><?php esc_html_e( 'Check this box to trigger the animated "● LIVE NOW" badge and glowing red border on the front page stream card.', 'playpixelpro-content' ); ?></small>
	</p>
	<?php
}

/**
 * Meta Box for Profile Details (Social & Developer Links).
 *
 * @param WP_Post $post Current post object.
 */
function ppp_profile_box( $post ) {
	wp_nonce_field( 'ppp_save_profile', 'ppp_profile_nonce' );

	$url   = get_post_meta( $post->ID, '_ppp_profile_url', true );
	$heavy = get_post_meta( $post->ID, '_ppp_profile_heavy', true );
	$icon  = get_post_meta( $post->ID, '_ppp_profile_icon', true );

	if ( empty( $icon ) ) {
		$icon = 'link';
	}

	$preset_icons = array(
		'code'           => __( 'GitHub / Code', 'playpixelpro-content' ),
		'favorite'       => __( 'Support / Sponsor', 'playpixelpro-content' ),
		'mail'           => __( 'Contact / Email', 'playpixelpro-content' ),
		'share'          => __( 'Social / Share', 'playpixelpro-content' ),
		'sports_esports' => __( 'Gaming / Steam', 'playpixelpro-content' ),
		'forum'          => __( 'Discord / Chat', 'playpixelpro-content' ),
		'public'         => __( 'Website / Web', 'playpixelpro-content' ),
		'terminal'       => __( 'Terminal / CLI', 'playpixelpro-content' ),
		'groups'         => __( 'Community', 'playpixelpro-content' ),
		'video_library'  => __( 'Videos', 'playpixelpro-content' ),
		'tune'           => __( 'Custom', 'playpixelpro-content' ),
	);
	?>
	<p>
		<label for="ppp_profile_url"><strong><?php esc_html_e( 'Profile Destination URL', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="url" id="ppp_profile_url" name="ppp_profile_url" value="<?php echo esc_attr( $url ); ?>" placeholder="https://...">
	</p>

	<p style="margin-top: 14px;">
		<label for="ppp_profile_heavy">
			<input type="checkbox" id="ppp_profile_heavy" name="ppp_profile_heavy" value="1" <?php checked( $heavy, '1' ); ?>>
			<strong><?php esc_html_e( 'Use Heavy Accent Button Style (Thick Border)', 'playpixelpro-content' ); ?></strong>
		</label>
	</p>

	<div class="ppp-profile-icon-picker" style="margin-top: 20px;">
		<label><strong><?php esc_html_e( 'Select Profile Button Icon (Click to choose):', 'playpixelpro-content' ); ?></strong></label>
		<div class="ppp-profile-icon-grid" style="display: flex; flex-wrap: wrap; gap: 10px; margin: 12px 0;">
			<?php foreach ( $preset_icons as $icon_key => $label ) : ?>
				<?php $is_selected = ( $icon === $icon_key ); ?>
				<button type="button" 
					class="button ppp-picon-btn <?php echo $is_selected ? 'active' : ''; ?>" 
					data-icon="<?php echo esc_attr( $icon_key ); ?>"
					style="display: flex; align-items: center; gap: 6px; padding: 6px 12px; height: auto; <?php echo $is_selected ? 'background: #16130b; color: #eec35e; border-color: #eec35e; font-weight: bold;' : ''; ?>">
					<span class="material-symbols-outlined" style="font-size: 1.4rem; color: <?php echo $is_selected ? '#eec35e' : 'inherit'; ?>;"><?php echo esc_html( $icon_key ); ?></span>
					<span><?php echo esc_html( $label ); ?></span>
				</button>
			<?php endforeach; ?>
		</div>

		<p style="margin-top: 12px;">
			<label for="ppp_profile_icon"><strong><?php esc_html_e( 'Selected Material Icon Key:', 'playpixelpro-content' ); ?></strong></label><br>
			<input class="widefat" type="text" id="ppp_profile_icon" name="ppp_profile_icon" value="<?php echo esc_attr( $icon ); ?>" style="max-width: 300px;">
		</p>
	</div>

	<script>
	jQuery(document).ready(function($) {
		$('.ppp-picon-btn').on('click', function(e) {
			e.preventDefault();
			var iconKey = $(this).data('icon');
			$('#ppp_profile_icon').val(iconKey);

			$('.ppp-picon-btn').css({
				'background': '',
				'color': '',
				'border-color': '',
				'font-weight': ''
			}).find('.material-symbols-outlined').css('color', 'inherit');

			$(this).css({
				'background': '#16130b',
				'color': '#eec35e',
				'border-color': '#eec35e',
				'font-weight': 'bold'
			}).find('.material-symbols-outlined').css('color', '#eec35e');
		});
	});
	</script>
	<?php
}

/**
 * Register Meta Boxes.
 */
function ppp_add_meta_boxes() {
	add_meta_box(
		'ppp_download_details',
		__( 'Download Details', 'playpixelpro-content' ),
		'ppp_download_box',
		'downloads',
		'side',
		'default'
	);

	add_meta_box(
		'ppp_service_details',
		__( 'Service Configuration', 'playpixelpro-content' ),
		'ppp_service_box',
		'services',
		'normal',
		'high'
	);

	add_meta_box(
		'ppp_project_details',
		__( 'Project Details & Links', 'playpixelpro-content' ),
		'ppp_project_box',
		'projects',
		'normal',
		'high'
	);

	add_meta_box(
		'ppp_stream_details',
		__( 'Stream Channel & Live Status', 'playpixelpro-content' ),
		'ppp_stream_box',
		'streams',
		'normal',
		'high'
	);

	add_meta_box(
		'ppp_profile_details',
		__( 'Profile Link & Icon Settings', 'playpixelpro-content' ),
		'ppp_profile_box',
		'profiles',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'ppp_add_meta_boxes' );

/**
 * Save Download Meta Box Data.
 */
function ppp_save_download( $post_id ) {
	if ( ! isset( $_POST['ppp_download_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ppp_download_nonce'] ) ), 'ppp_save_download' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( wp_is_post_revision( $post_id ) || 'downloads' !== get_post_type( $post_id ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['ppp_file'] ) ) {
		update_post_meta( $post_id, '_ppp_file', esc_url_raw( wp_unslash( $_POST['ppp_file'] ) ) );
	}
	if ( isset( $_POST['ppp_version'] ) ) {
		update_post_meta( $post_id, '_ppp_version', sanitize_text_field( wp_unslash( $_POST['ppp_version'] ) ) );
	}
	if ( isset( $_POST['ppp_size'] ) ) {
		update_post_meta( $post_id, '_ppp_size', sanitize_text_field( wp_unslash( $_POST['ppp_size'] ) ) );
	}
	if ( isset( $_POST['ppp_platform'] ) ) {
		update_post_meta( $post_id, '_ppp_platform', sanitize_text_field( wp_unslash( $_POST['ppp_platform'] ) ) );
	}
}
add_action( 'save_post_downloads', 'ppp_save_download' );

/**
 * Save Service Meta Box Data.
 */
function ppp_save_service( $post_id ) {
	if ( ! isset( $_POST['ppp_service_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ppp_service_nonce'] ) ), 'ppp_save_service' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( wp_is_post_revision( $post_id ) || 'services' !== get_post_type( $post_id ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['ppp_service_icon'] ) ) {
		update_post_meta( $post_id, '_ppp_service_icon', sanitize_text_field( wp_unslash( $_POST['ppp_service_icon'] ) ) );
	}
	if ( isset( $_POST['ppp_service_commands'] ) ) {
		update_post_meta( $post_id, '_ppp_service_commands', sanitize_textarea_field( wp_unslash( $_POST['ppp_service_commands'] ) ) );
	}
}
add_action( 'save_post_services', 'ppp_save_service' );

/**
 * Save Project Meta Box Data.
 */
function ppp_save_project( $post_id ) {
	if ( ! isset( $_POST['ppp_project_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ppp_project_nonce'] ) ), 'ppp_save_project' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( wp_is_post_revision( $post_id ) || 'projects' !== get_post_type( $post_id ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['ppp_project_tech'] ) ) {
		update_post_meta( $post_id, '_ppp_project_tech', sanitize_text_field( wp_unslash( $_POST['ppp_project_tech'] ) ) );
	}
	if ( isset( $_POST['ppp_project_url'] ) ) {
		update_post_meta( $post_id, '_ppp_project_url', esc_url_raw( wp_unslash( $_POST['ppp_project_url'] ) ) );
	}
	if ( isset( $_POST['ppp_project_btn_text'] ) ) {
		update_post_meta( $post_id, '_ppp_project_btn_text', sanitize_text_field( wp_unslash( $_POST['ppp_project_btn_text'] ) ) );
	}
}
add_action( 'save_post_projects', 'ppp_save_project' );

/**
 * Save Stream Meta Box Data.
 */
function ppp_save_stream( $post_id ) {
	if ( ! isset( $_POST['ppp_stream_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ppp_stream_nonce'] ) ), 'ppp_save_stream' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( wp_is_post_revision( $post_id ) || 'streams' !== get_post_type( $post_id ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['ppp_stream_url'] ) ) {
		update_post_meta( $post_id, '_ppp_stream_url', esc_url_raw( wp_unslash( $_POST['ppp_stream_url'] ) ) );
	}
	$is_live = isset( $_POST['ppp_stream_is_live'] ) ? '1' : '0';
	update_post_meta( $post_id, '_ppp_stream_is_live', $is_live );
}
add_action( 'save_post_streams', 'ppp_save_stream' );

/**
 * Save Profile Meta Box Data.
 */
function ppp_save_profile( $post_id ) {
	if ( ! isset( $_POST['ppp_profile_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ppp_profile_nonce'] ) ), 'ppp_save_profile' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( wp_is_post_revision( $post_id ) || 'profiles' !== get_post_type( $post_id ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['ppp_profile_url'] ) ) {
		update_post_meta( $post_id, '_ppp_profile_url', esc_url_raw( wp_unslash( $_POST['ppp_profile_url'] ) ) );
	}
	$heavy = isset( $_POST['ppp_profile_heavy'] ) ? '1' : '0';
	update_post_meta( $post_id, '_ppp_profile_heavy', $heavy );

	if ( isset( $_POST['ppp_profile_icon'] ) ) {
		update_post_meta( $post_id, '_ppp_profile_icon', sanitize_text_field( wp_unslash( $_POST['ppp_profile_icon'] ) ) );
	}
}
add_action( 'save_post_profiles', 'ppp_save_profile' );

/**
 * Activation & Deactivation Hooks.
 */
function ppp_activate() {
	ppp_register_content();
	flush_rewrite_rules();
}
function ppp_deactivate() {
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'ppp_activate' );
register_deactivation_hook( __FILE__, 'ppp_deactivate' );

/**
 * Shortcodes.
 */
function ppp_download_shortcode( $atts ) {
	$atts = shortcode_atts( array( 'id' => 0 ), $atts, 'game-card' );
	$post = get_post( absint( $atts['id'] ) );

	if ( ! $post || 'downloads' !== $post->post_type ) {
		return '';
	}

	$version  = get_post_meta( $post->ID, '_ppp_version', true );
	$size     = get_post_meta( $post->ID, '_ppp_size', true );
	$platform = get_post_meta( $post->ID, '_ppp_platform', true );

	$meta_html = '';
	if ( $version || $size || $platform ) {
		$meta_items = array_filter( array( $version, $size, $platform ) );
		$meta_html  = '<p class="meta">' . esc_html( implode( ' • ', $meta_items ) ) . '</p>';
	}

	return sprintf(
		'<div class="game-card brutalist-card"><div><h3>%1$s</h3>%2$s<p>%3$s</p></div><a class="button heavy-btn" href="%4$s">%5$s</a></div>',
		esc_html( get_the_title( $post ) ),
		$meta_html,
		esc_html( get_the_excerpt( $post ) ),
		esc_url( get_permalink( $post ) ),
		esc_html__( 'VIEW_DOWNLOAD', 'playpixelpro-content' )
	);
}
add_action( 'init', function() {
	add_shortcode( 'game-card', 'ppp_download_shortcode' );
} );

function ppp_terminal_box_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts( array( 'title' => 'TERMINAL_WINDOW' ), $atts, 'terminal-box' );

	return sprintf(
		'<div class="terminal-window"><div class="window-bar"><div class="window-dots"><span class="window-dot dot-red"></span><span class="window-dot dot-yellow"></span><span class="window-dot dot-green"></span></div><span class="window-title">%1$s</span></div><div class="terminal-body">%2$s</div></div>',
		esc_html( $atts['title'] ),
		do_shortcode( $content )
	);
}
add_shortcode( 'terminal-box', 'ppp_terminal_box_shortcode' );

function ppp_system_specs_shortcode( $atts ) {
	$atts = shortcode_atts( array( 'cpu' => '50', 'memory' => '40', 'disk' => '70' ), $atts, 'system-specs' );
	return sprintf(
		'<div class="brutalist-card" style="padding: 16px; margin: 20px 0;">' .
		'<div style="margin-bottom: 10px;"><strong style="font-size: 0.8rem; color: var(--gold);">CPU_LOAD (%1$d%%)</strong><div class="progress-wrap" style="height:6px; margin:4px 0;"><span style="width:%1$d%%;"></span></div></div>' .
		'<div style="margin-bottom: 10px;"><strong style="font-size: 0.8rem; color: var(--gold);">MEMORY_USAGE (%2$d%%)</strong><div class="progress-wrap" style="height:6px; margin:4px 0;"><span style="width:%2$d%%;"></span></div></div>' .
		'<div><strong style="font-size: 0.8rem; color: var(--gold);">STORAGE_USAGE (%3$d%%)</strong><div class="progress-wrap" style="height:6px; margin:4px 0;"><span style="width:%3$d%%;"></span></div></div>' .
		'</div>',
		absint( $atts['cpu'] ),
		absint( $atts['memory'] ),
		absint( $atts['disk'] )
	);
}
add_shortcode( 'system-specs', 'ppp_system_specs_shortcode' );

function ppp_social_shortcode() {
	$links = (array) get_option( 'ppp_social', array() );
	if ( empty( $links ) ) {
		return '';
	}

	$out = '<div class="social-links">';
	foreach ( $links as $label => $url ) {
		if ( ! empty( $url ) ) {
			$out .= sprintf( '<a class="meta-badge" href="%1$s" rel="me noopener" target="_blank">%2$s</a>', esc_url( $url ), esc_html( ucfirst( $label ) ) );
		}
	}
	$out .= '</div>';
	return $out;
}
add_shortcode( 'social-links', 'ppp_social_shortcode' );
