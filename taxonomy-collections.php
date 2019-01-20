<?php get_header(); ?>

<?php
	$posts = new WP_Query( array(
	    'relationship' => array(
	        'id'   => 'categories_to_posts',
	        'from' => get_the_ID(), // You can pass object ID or full object
	    ),
	    'nopaging'     => true,
	) );
	while ( $posts->have_posts() ) : $posts->the_post(); ?>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  <?php endwhile; ?>


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
</div>
<?php get_footer(); ?>