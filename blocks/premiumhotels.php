<div class="premiumhotels">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="mb-5">
					<div class="my-table">
						<div class="my-table-cell pr-4">
							<img src="<?php bloginfo('template_url'); ?>/img/crown.svg" alt="" width="40px">
						</div>
						<div class="table-text">
							<h2>Премиум отдых</h2>
							<p>Комфортный отдых за соответствующую цену!</p>		
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
			  'meta_value' => 'karpaty'
			) )
			?>
			<?php $term_ids = wp_list_pluck( $citylists_new, 'term_id' ); ?>

			<?php 
				$id_city = get_the_id();
				$custom_query = new WP_Query( array( 
				'post_type' => 'hotels', 
				'posts_per_page' => 4,
				'orderby' => 'rand',
  			'order'    => 'ASC',
				'tax_query' => array(
			    array(
		        'taxonomy' => 'collections',
		        'terms' => 'premium',
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
					$term_slug = 'premium';
					$term_link = get_term_link($term_slug, 'collections');
					echo $term_link;
					?>"><div class="btn">Смотреть больше вариантов</div></a>
				</div>
			</div>
		</div>
	</div>
</div>