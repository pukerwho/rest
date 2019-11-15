<?php
/*
Template Name: Черное море
*/
?>

<?php get_header(); ?>
<?php $citylists_new = get_terms( array( 
	'taxonomy' => 'citylist', 
	'parent' => 0, 
	'hide_empty' => false,
	'meta_key' => '_crb_citylist_location',
  'meta_value' => 'blacksea'
) )
?>
<?php $term_ids = wp_list_pluck( $citylists_new, 'term_id' ); ?>

<div class="page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="mb-4">
					<div class="my-table">
						<div class="table-text">
							<h1><?php _e( 'Отдых на Черном море', 'restx' ); ?></h1>
							<p><?php _e( 'Популярные направления', 'restx' ); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="allcity">
					<div class="swiper-container swiper-region">
						<div class="swiper-wrapper maincards__grid">
							<?php $citylists = get_terms( array( 
								'taxonomy' => 'citylist', 
								'parent' => 0, 
								'hide_empty' => false,
								'meta_key' => '_crb_citylist_location',
							  'meta_value' => 'blacksea'
							) );
							foreach ( $citylists as $citylist ): ?>
								<div class="swiper-slide maincards__item">
									<a href="<?php echo get_term_link($citylist); ?>">
										<div class="maincards__item__card" style="background: url('<?php echo carbon_get_term_meta($citylist->term_id, 'crb_citylist_img' ); ?>')">
											<div class="maincards__item__card__title">
												<?php echo $citylist->name ?>
											</div>
										</div>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="swiper-button-prev swiper-region-button-prev" style="background-position: 40% 50%; background-image: url(<?php bloginfo('template_url'); ?>/img/slider-left-arrow.svg");"></div>
					<div class="swiper-button-next swiper-region-button-next" style="background-position: 55% 50%; background-image: url(<?php bloginfo('template_url'); ?>/img/slider-right-arrow.svg");"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="mb-4">
					<div class="my-table">
						<div class="table-text">
							<h1><?php _e( 'Популярные предложения', 'restx' ); ?></h1>
							<p><?php _e( 'Где отдохнуть на Черном море?', 'restx' ); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mobile-hotels-grid mb-5">
			<?php 
				global $wp_query, $wp_rewrite;  
				// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
				
				$custom_query = new WP_Query( array( 
				'post_type' => 'hotels', 
				'posts_per_page' => 24,
				'paged' => $current,
				'orderby'        => 'meta_value',
		    'meta_key'       => 'meta-hotel-mainrating',
				'tax_query' => array(
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
			  	<div class="col-md-3">
			  		<?php get_template_part( 'blocks/hotel-card', 'default' ); ?>
			  	</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>

		<div class="row mb-5">
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
		<div class="row">
			<div class="col-md-12">
				<div class="b_rest__text">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; else: ?>
						<p><?php _e('Ничего не найдено'); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>