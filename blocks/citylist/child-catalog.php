<div class="row">
	<div class="col-md-12">
		<div class="mb-5">
			<div class="my-table">
				<div class="my-table-cell pr-4">
					<img src="<?php echo carbon_get_term_meta( get_queried_object_id(), 'crb_citylist_icon'); ?>" alt="" width="40px">
				</div>
				<div class="table-text">
					<h1><?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_title') ?></h1>
					<p><?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_description') ?></p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mobile-hotels-grid mb-5">
	<?php 
		global $wp_query, $wp_rewrite;  
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
		$current_term = get_queried_object_id();
		$custom_query = new WP_Query( array( 
		'post_type' => 'hotels', 
		'posts_per_page' => 24,
		'orderby'        => 'meta_value',
    'meta_key'       => 'meta-hotel-mainrating',
		'tax_query' => array(
	    array(
        'taxonomy' => 'citylist',
		    'terms' => $current_term,
        'field' => 'term_id',
        'include_children' => true,
        'operator' => 'IN'
	    )
		),
	) );
	if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
	  	<div class="col-md-3">
	  		<?php get_template_part( 'blocks/hotel-card', 'default' ); ?>
	  	</div>
	<?php endwhile; endif; wp_reset_postdata(); ?>
</div>

<div class="row">
	<div class="col-md-12 text-center">
		<div class="b_pagination">
			<?php 
				$big = 999999999; // уникальное число
				echo paginate_links( array(
				'format'  => 'page/%#%',
				'current'   => $current,
				'total'   => $custom_query->max_num_pages,
				'prev_next' => true,
				'next_text' => (''),
				'prev_text' => ('')
				)); 
			?>
		</div>
	</div>
</div>