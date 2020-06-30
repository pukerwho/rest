<?php 
	if (get_locale() == 'ru_RU') {
		$comment_textarea_text = "Ваш комментарий";
		$comment_name_text = "Ваше имя";
		$comment_btn_text = "Отправить";
	} else {
		$comment_textarea_text = "Ваше повідомлення";
		$comment_name_text = "Ваше ім'я";
		$comment_btn_text = "Надіслати";
	}
?>

<?php function output_hidden_field_in_comment_form() {
  ?>
  	<?php global $wp; $current_post_link = home_url(add_query_arg(array(), $wp->request)); ?>
    <input type="hidden" name="redirect_to" value="<?php echo $current_post_link; ?>">
  <?php
}
add_action( 'comment_form', 'output_hidden_field_in_comment_form' );

?>

<div class="mb-5">
	<?php 
		comment_form([
			'comment_notes_before' => '',
			'title_reply' => '',
			'label_submit' => $comment_btn_text,
			'fields'               => [
				'author' => '<p class="comment-form-author">
					<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' placeholder="' . $comment_name_text . '" />
				</p>',
				'email'  => '<p class="comment-form-email">
					<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' placeholder="Ваш Email" />
				</p>',
			],
			'comment_field' => '<p class="comment-form-comment">
				<textarea id="comment" name="comment" rows="5" placeholder="' . $comment_textarea_text . '" aria-required="true" required="required"></textarea>
			</p>',
		]); 
	?>
</div>


<?php 
	function custom_comment_template($comment, $args, $depth) { ?>
		<div <?php comment_class('mb-5'); ?>>
			<div id="comment-<?php echo get_comment_ID(); ?>">
				<div class="comment_content mb-2">
					<span class="comment_name pr-4"><?php echo get_comment_author(); ?></span>
					<span class="comment_text"><?php comment_text(); ?></span>
				</div>
				<div class="comment_bottom">
					<div class="comment_answer mr-4"><?php
						comment_reply_link(
							array(
								'depth'     => 1,
								'max_depth' => 5,
								'reply_text' => __('Ответить', 'restx'),
								'respond_id' => 'respond',
							)
						); 
					?></div>
					<div><?php echo get_comment_date('j F'); ?> | <?php echo get_comment_time(); ?></div>
				</div>
			</div>
			
	<?php }
?>
<?php function custom_comment_template_end( $comment, $args, $depth ){	
	echo '</div>';
} ?>

<?php 

	$list_comments_args = array(
		'callback' => 'custom_comment_template',
		'end-callback' => 'custom_comment_template_end' 
	);

	$post__in_array = array();
	$translation_id = pll_get_post_translations(get_the_ID());
	foreach ($translation_id as $tr_id) {
		array_push($post__in_array, $tr_id);
	}
	$args = array(
		'post__in' => $post__in_array,
		'status' => 'approve'
	);

	$comments = get_comments( $args );
?>
<?php wp_list_comments($list_comments_args, $comments); ?>