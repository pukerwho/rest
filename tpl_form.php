<?php
/*
Template Name: Форма
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="addnew">
	<div class="container">
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="d-flex flex-column align-items-center">
					<img src="<?php bloginfo('template_url') ?>/img/clipboard.svg" width="80px" class="mb-5" alt="">
					<h1 class="text-uppercase text-center"><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
		<div class="row justify-content-center mb-5">
			<div class="col-md-8">
				<div class="addnew__content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>