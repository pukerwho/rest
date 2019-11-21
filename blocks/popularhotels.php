<div class="popular">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="mb-5">
					<div class="my-table">
						<div class="my-table-cell pr-4">
							<img src="<?php bloginfo('template_url'); ?>/img/popularhotels.svg" alt="" width="40px">
						</div>
						<div class="table-text">
							<h2><?php _e( 'Популярные предложения', 'restx' ); ?></h2>
							<p><?php _e( 'Это жилье пользуется повышенным спросом!', 'restx' ); ?></p>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $citylists_new = get_terms( array( 
			'taxonomy' => 'citylist', 
			'parent' => 0, 
			'hide_empty' => false,
			'meta_key' => '_crb_citylist_location',
		  'meta_value' => 'karpaty'
		) )
		?>
		<?php $term_ids = wp_list_pluck( $citylists_new, 'term_id' ); ?>

		<div class="row mobile-hotels-grid mb-5">
			<?php 
				if (get_locale() == 'ru_RU'); {
					$popular_slud = 'popular';
				} else {
					$popular_slud = 'populjarni';
				}
				$custom_query = new WP_Query( array( 
				'post_type' => 'hotels', 
				'posts_per_page' => 4,
				'orderby'        => 'rand',
				'tax_query' => array(
			    array(
		        'taxonomy' => 'collections',
		        'terms' => $popular_slud,
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
					$term_link = get_term_link($popular_slud, 'collections');
					echo $term_link;
					?>"><div class="btn"><?php _e( 'Смотреть больше вариантов', 'restx' ); ?></div></a>
				</div>
			</div>
		</div>
	</div>
</div>