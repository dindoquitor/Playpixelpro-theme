<?php
/**
 * Terminal Comments Template.
 *
 * @package PlayPixelPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area brutalist-card" style="padding: 24px; margin-top: 40px; margin-bottom: 24px;">
	<div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid var(--line); padding-bottom: 12px; margin-bottom: 20px;">
		<h3 style="margin: 0; font-family: var(--font-mono); font-size: 1.1rem; color: var(--gold); text-transform: uppercase;">
			&gt; comments_log [<?php echo esc_html( get_comments_number() ); ?>]
		</h3>
		<span style="font-family: var(--font-mono); font-size: 0.78rem; color: var(--muted);">
			STATUS: <?php echo comments_open() ? 'OPEN' : 'CLOSED'; ?>
		</span>
	</div>

	<?php if ( have_comments() ) : ?>
		<ol class="comment-list" style="list-style: none; padding: 0; margin: 0 0 24px;">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 42,
				)
			);
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav class="comment-navigation" style="display: flex; justify-content: space-between; font-family: var(--font-mono); font-size: 0.85rem; margin-bottom: 20px;">
				<div class="nav-previous"><?php previous_comments_link( __( '&lt;- PREV_COMMENTS', 'playpixelpro' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'NEXT_COMMENTS -&gt;', 'playpixelpro' ) ); ?></div>
			</nav>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments" style="font-family: var(--font-mono); font-size: 0.85rem; color: var(--muted); font-style: italic; margin: 0;">
			[ status: comments_closed_for_this_entry ]
		</p>
	<?php endif; ?>

	<?php
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );

	$fields = array(
		'author' => '<div class="comment-form-author" style="margin-bottom: 14px;"><label for="author" style="display:block; font-family:var(--font-mono); font-size:0.82rem; color:var(--muted); margin-bottom:4px;">USER_NAME ' . ( $req ? '*' : '' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' style="width:100%; padding:8px 12px; background:var(--bg); border:2px solid var(--line); color:var(--text); font-family:var(--font-mono);" /></div>',
		'email'  => '<div class="comment-form-email" style="margin-bottom: 14px;"><label for="email" style="display:block; font-family:var(--font-mono); font-size:0.82rem; color:var(--muted); margin-bottom:4px;">USER_EMAIL ' . ( $req ? '*' : '' ) . '</label><input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' style="width:100%; padding:8px 12px; background:var(--bg); border:2px solid var(--line); color:var(--text); font-family:var(--font-mono);" /></div>',
		'url'    => '<div class="comment-form-url" style="margin-bottom: 14px;"><label for="url" style="display:block; font-family:var(--font-mono); font-size:0.82rem; color:var(--muted); margin-bottom:4px;">WEBSITE_URL</label><input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" style="width:100%; padding:8px 12px; background:var(--bg); border:2px solid var(--line); color:var(--text); font-family:var(--font-mono);" /></div>',
	);

	comment_form(
		array(
			'fields'               => $fields,
			'comment_field'        => '<div class="comment-form-comment" style="margin-bottom: 16px;"><label for="comment" style="display:block; font-family:var(--font-mono); font-size:0.82rem; color:var(--muted); margin-bottom:4px;">COMMENT_PAYLOAD *</label><textarea id="comment" name="comment" cols="45" rows="5" required style="width:100%; padding:8px 12px; background:var(--bg); border:2px solid var(--line); color:var(--text); font-family:var(--font-mono);"></textarea></div>',
			'title_reply'          => __( 'add_comment --post', 'playpixelpro' ),
			'title_reply_to'       => __( 'add_comment --reply-to=%s', 'playpixelpro' ),
			'cancel_reply_link'    => __( '[CANCEL_REPLY]', 'playpixelpro' ),
			'label_submit'         => __( 'SUBMIT_COMMENT >', 'playpixelpro' ),
			'class_submit'         => 'heavy-btn',
			'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" style="cursor:pointer;" />',
			'title_reply_before'   => '<h4 id="reply-title" class="comment-reply-title" style="font-family:var(--font-mono); font-size:0.95rem; color:var(--gold); text-transform:uppercase; margin-top:24px; margin-bottom:14px;">',
			'title_reply_after'    => '</h4>',
		)
	);
	?>
</div>
