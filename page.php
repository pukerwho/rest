<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="container mx-auto px-2 lg:px-0 pt-20 lg:pt-12 lg:pb-12">
		<div class="mb-5">
			<h1 class="text-3xl lg:text-5xl"><?php the_title(); ?></h1>
		</div>
		<div class="content">
			<?php the_content(); ?>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>