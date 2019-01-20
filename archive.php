<?php get_header(); ?>

<?php do_action('show_beautiful_filters'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php the_title(); ?>
<?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>