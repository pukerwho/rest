<?php
/*
Template Name: Каталог
*/
?>

<?php get_header(); ?>

<div class="container">
	<div class="row mb-5">
		<div class="col-md-12">
			<?php get_template_part( 'blocks/filters/filter-hotel', 'default' ); ?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row" id="response">
		<?php 
		  $custom_query = new WP_Query( array( 'post_type' => 'hotels') );
		  if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
				<div class="col-md-3">
					<?php get_template_part( 'blocks/hotel-card', 'default' ); ?>
				</div>
			<?php endwhile; endif; ?>
	</div>
</div>

<?php get_footer(); ?>