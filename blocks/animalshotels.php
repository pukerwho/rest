<div class="animalshotels">
	<div class="container-fluid cf_px">
		<div class="row">
			<div class="col-md-12">
				<div class="mb-5">
					<div class="my-table">
						<div class="table-text">
							<h2><?php _e( 'С животными', 'restx' ); ?></h2>
							<p><?php _e( 'Здесь любят пухнастых!', 'restx' ); ?></p>		
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mobile-hotels-grid mb-5">
			<?php $citylists_new = get_terms( array( 
				'taxonomy' => 'citylist', 
				'parent' => 0, 
				'hide_empty' => false,
				'meta_key' => '_crb_citylist_location',
			  'meta_value' => array('blacksea','azovsea'),
			  'meta_compare' => 'IN'
			) )
			?>
			<?php $term_ids = wp_list_pluck( $citylists_new, 'term_id' ); ?>
			
			<?php 
				if (get_locale() == 'ru_RU') {
					$animals_slug = 'animals';
				} else {
					$animals_slug = 'z-tavrinami';
				}
				$id_city = get_the_id();
				$custom_query = new WP_Query( array( 
				'post_type' => 'hotels', 
				'posts_per_page' => 4,
				'orderby' => 'rand',
  			'order'    => 'ASC',
				'tax_query' => array(
			    array(
		        'taxonomy' => 'collections',
		        'terms' => $animals_slug,
		        'field' => 'slug',
		        'include_children' => true,
		        'operator' => 'IN'
			    ),
			    array(
		        'taxonomy' => 'citylist',
				    'terms' => $term_ids,
		        'field' => 'term_id',
		        'include_children' => true,
		        'operator' => 'IN'
			    )
				),
			) );
			if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
			  	<div class="col-md-12 col-lg-3">
			  		<?php get_template_part( 'blocks/hotel-card', 'default' ); ?>
			  	</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="button-more text-center">
					<a href="<?php 
					$term_link = get_term_link($animals_slug, 'collections');
					echo $term_link;
					?>"><?php _e( 'Еще варианты', 'restx' ); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>