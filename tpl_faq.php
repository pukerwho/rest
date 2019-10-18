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
				<?php comments_template(); ?> 
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>