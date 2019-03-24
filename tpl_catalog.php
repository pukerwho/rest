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
<div class="catalog">
	<div class="container">
		<div class="row mobile-hotels-grid" id="response">
			<?php 
			  $custom_query_catalog = new WP_Query( array( 
			  	'post_type' => 'hotels', 
			  	'posts_per_page' => 24, 
			  	'orderby'        => 'meta_value',
    			'meta_key'       => 'meta-hotel-mainrating',
			  ));
			  if ($custom_query_catalog->have_posts()) : while ($custom_query_catalog->have_posts()) : $custom_query_catalog->the_post(); ?>
					<div class="col-md-12 col-lg-3">
						<?php get_template_part( 'blocks/hotel-card', 'default' ); ?>
					</div>
				<?php endwhile; endif; ?>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="catalog-more button-more text-center">
						<div class="btn">Загрузить еще</div>
					</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>