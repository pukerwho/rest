<div class="nowwatch">
	<div class="container pc-show">
		<div class="row">
			<div class="col-md-4">
				<h2 class="nowwatch__title mb-4">
					<?php _e( 'Сейчас смотрят', 'restx' ); ?>
				</h2>
				<div class="nowwatch__line"></div>
				<p class="nowwatch__text mb-4">
					<?php _e( 'Эти предложения уже заинтересовали посетителей. Стоит присмотреться к ним внимательней!', 'restx' ); ?>
				</p>
				<div class="nowwatch-buttons">
					<div class="swiper-button-prev swiper-nowwatch-button-prev" style="width: 40px; background-size: 40px 40px; ;background-image: url(<?php bloginfo('template_url'); ?>/img/left-arrow.svg");"></div>
					<div class="swiper-button-next swiper-nowwatch-button-next" style="width: 40px; background-size: 40px 40px; ;background-image: url(<?php bloginfo('template_url'); ?>/img/right-arrow.svg");"></div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="nowwatch__slider">
					<div class="swiper-container swiper-hotels-now-watch">
						<div class="swiper-wrapper">
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
								$custom_query = new WP_Query( array( 
								'post_type' => 'hotels', 
								'posts_per_page' => 4,
								'orderby' => 'rand',
				  			'order'    => 'ASC',
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
								<div class="swiper-slide">
									
									<?php get_template_part( 'blocks/hotel-card-light', 'default' ); ?>
				        </div>
				      <?php endwhile; endif; ?>
				    </div>
				  </div>
				</div>
			</div>
		</div>
	</div>
	<div class="container mobile-show py-5">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="nowwatch__title mb-4">
					<?php _e( 'Сейчас смотрят', 'restx' ); ?>
				</h2>
				<p class="nowwatch__text mb-4">
					<?php _e( 'Эти предложения уже заинтересовали посетителей. Стоит присмотреться к ним внимательней!', 'restx' ); ?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="hotel-card-grid">
					<?php 
						$custom_query = new WP_Query( array( 
						'post_type' => 'hotels', 
						'posts_per_page' => 8,
						'orderby' => 'rand',
		  			'order'    => 'ASC',
					) );
					if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
						<div class="hotel-card-grid-item">
							<?php get_template_part( 'blocks/hotel-card-light', 'default' ); ?>
						</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>