<?php get_header(); ?>

<div class="container">
	<div class="row mb-5">
		<div class="col-md-12">
			<h1>
				<?php single_term_title(); ?>
			</h1>
		</div>
	</div>
	<div class="pc-show">
		<div class="row mb-5">
			<?php 
				global $wp_query, $wp_rewrite;  
				$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
				$id_city = get_the_id();
				$current_term = get_queried_object_id();
				$custom_query = new WP_Query( array( 
				'post_type' => 'hotels',
				'posts_per_page' => 24, 
				'orderby' => 'rand',
				'order'    => 'ASC',
				'tax_query' => array(
			    array(
		        'taxonomy' => 'collections',
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
	</div>
	<!-- MOBILE VERSION -->
	<div class="mobile-show">
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="swiper-container swiper-hotels">
			    <div class="swiper-wrapper">
			    	<?php 
							$id_city = get_the_id();
							$current_term = get_queried_object_id();
							$custom_query = new WP_Query( array( 
							'post_type' => 'hotels', 
							'orderby' => 'rand',
							'order'    => 'ASC',
							'tax_query' => array(
						    array(
					        'taxonomy' => 'collections',
							    'terms' => $current_term,
					        'field' => 'term_id',
					        'include_children' => true,
					        'operator' => 'IN'
						    )
							),
						) );
						if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
							<div class="swiper-slide">
								<?php get_template_part( 'blocks/hotel-card', 'default' ); ?>
		          </div>
	          <?php endwhile; endif; ?>
			    </div>
			    <div class="swiper-button-next swiper-hotels-button-next"></div>
	      	<div class="swiper-button-prev swiper-hotels-button-prev"></div>
			  </div>
		  </div>
		</div>
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
</div>
<?php get_footer(); ?>