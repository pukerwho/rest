<div class="flex flex-wrap lg:-mx-2" id="response">
	<?php 
		global $wp_query, $wp_rewrite;  
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
		$current_term = get_queried_object_id();
		$custom_query = new WP_Query( array( 
		'post_type' => 'hotels', 
		'posts_per_page' => 24,
		'orderby'        => 'date',
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
  	<div class="w-1/2 lg:w-1/3 px-1">
  		<?php get_template_part( 'blocks/hotel-card', 'default' ); ?>
  	</div>
	<?php endwhile; endif; wp_reset_postdata(); ?>
</div>

<div class="flex">
	<div class="w-full text-center">
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