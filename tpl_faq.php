<?php
/*
Template Name: Вопросы-Ответы
*/
?>

<?php get_header(); ?>

<div class="p_faq">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php _e( 'Задай вопрос - получи ответ', 'restx' ); ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php /* echo do_shortcode('[anycomment]'); */ ?>
				<?php get_template_part('blocks/custom_comments'); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>