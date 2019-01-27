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

<!-- PC SHOW -->
<div class="pc-show">
	<div class="row mb-5">
		<?php 
			$current_term = get_queried_object_id();
			$custom_query = new WP_Query( array( 
			'post_type' => 'hotels', 
			'posts_per_page' => 20,
			'orderby' => 'rand',
			'order'    => 'ASC',
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
</div>

<!-- MOBILE VERSION -->
<div class="mobile-show">
	<div class="row mb-5">
		<div class="col-md-12">
			<div class="swiper-container swiper-hotels">
		    <div class="swiper-wrapper">
		    	<?php 
						$id_city = get_the_id();
						$custom_query = new WP_Query( array( 
						'post_type' => 'hotels', 
						'posts_per_page' => 4,
						'meta_query' => array(
							'relation' => 'AND',
							array(
								'key'     => 'meta-hotelcity',
								'value'   => $id_city,
								'compare' => '=',
							),
						),
						'tax_query' => array(
					    array(
				        'taxonomy' => 'collections',
				        'terms' => 'family',
				        'field' => 'slug',
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

<div class="row mb-5">
	<div class="col-md-12">
		<div class="button-more text-center">
			<a href="#"><div class="btn">Смотреть больше вариантов</div></a>
		</div>
	</div>
</div>