<?php get_header(); ?>

<?php get_template_part( 'blocks/filters/filter-hotel', 'default' ); ?>
<div class="container">
	<div class="row" id="response">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php the_title(); ?>
<?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
	</div>
</div>



<?php get_footer(); ?>