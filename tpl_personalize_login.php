<?php
/**
 * Template Name: Персональный логин
 * Template Post Type: page
 *
 */

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container mx-auto px-2 lg:px-0 pt-20 lg:pt-12 lg:pb-12 mb-8">
	<h1 class="text-3xl lg:text-5xl text-center uppercase mb-6 lg:mb-8"><span><?php the_title(); ?></span></h1>
	<div class="flex flex-col lg:flex-row">
		<div class="w-full lg:w-2/5 mx-auto">
			<?php the_content(); ?>
		</div>
	</div>
</div>

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>