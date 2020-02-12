<?php get_header(); ?>


<?php 
	function custom_comment_template($comment, $args, $depth) { ?>
		<div <?php comment_class('mb-5'); ?>>
			<div><?php echo get_comment_author(); ?></div>
			<div><?php comment_text(); ?></div>	
			<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'add_below' => $add_below,
							'depth'     => $depth,
							'max_depth' => $args['max_depth']
						)
					)
				); 
			?>
		</div>
		
	<?php }
?>

<?php 

	$list_comments_args = array(
		'style' => 'div',
		'callback' => 'custom_comment_template',
	);
	$post__in_array = array();
	$translation_id = pll_get_post_translations(get_the_ID());
	foreach ($translation_id as $tr_id) {
		array_push($post__in_array, $tr_id);
	}

	$args = array(
		'post__in' => $post__in_array,
	);

	$comments = get_comments( $args );
?>
<?php echo wp_list_comments($list_comments_args, $comments); ?>


<?php get_footer(); ?>