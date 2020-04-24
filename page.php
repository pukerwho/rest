<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="custom-page pt-5">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md-12">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>