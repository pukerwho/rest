<?php
/*
Template Name: Добавить предложение
*/
?>

<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" id="add_hotels" action="<?php bloginfo('template_url') ?>/add_hotels.php">
				<input type="text" name="myname" placeholder="Имя">
				<button type="submit">Добавить</button>
			</form>
		</div>
	</div>
</div>

<?php get_footer(); ?>