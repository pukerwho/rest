<!-- Новые отели -->
<div class="row">
	<div class="col-md-12">
		<div class="mb-5">
			<div class="my-table">
				<div class="my-table-cell pr-4">
					<img src="<?php bloginfo('template_url'); ?>/img/newhotels.svg" alt="" width="40px">
				</div>
				<div class="table-text">
					<h2><?php _e( 'Недавно добавленные на сайт', 'restx' ); ?></h2>
					<p><?php _e( 'Поприветствуем новичков!', 'restx' ); ?></p>		
				</div>
			</div>
		</div>
	</div>
</div>

<!-- PC SHOW -->
<div class="pc-show">
	<div class="row mb-5">
		<?php 
			$id_city = get_the_id();
			$custom_query = new WP_Query( array( 
			'post_type' => 'hotels', 
			'posts_per_page' => 4,
			'orderby'        => 'meta_value',
    	'meta_key'       => 'meta-hotel-mainrating',
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key'     => 'meta-hotelcity',
					'value'   => $id_city,
					'compare' => '=',
				),
			),
		) );
		if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
		  	<div class="col-md-12 col-lg-3">
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
					) );
					if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
						<div class="swiper-slide">
							<?php get_template_part( 'blocks/hotel-card', 'default' ); ?>
	          </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
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
			<a href="#"><div class="btn"><?php _e( 'Смотреть больше вариантов', 'restx' ); ?></div></a>
		</div>
	</div>
</div>

<!-- ПОПУЛЯРНЫЙ ОТДЫХ -->
<div class="row">
	<div class="col-md-12">
		<div class="mb-5">
			<div class="my-table">
				<div class="my-table-cell pr-4">
					<img src="<?php bloginfo('template_url'); ?>/img/popularhotels.svg" alt="" width="40px">
				</div>
				<div class="table-text">
					<h2><?php _e( 'Популярные предложения', 'restx' ); ?></h2>
					<p><?php _e( 'Эти пансионаты пользуются повышенным спросом!', 'restx' ); ?></p>	
				</div>
			</div>
		</div>
	</div>
</div>

<!-- PC SHOW -->
<div class="pc-show">
	<div class="row mb-5">
		<?php 
			$id_city = get_the_id();
			$custom_query = new WP_Query( array( 
			'post_type' => 'hotels', 
			'posts_per_page' => 4,
			'orderby' => 'rand',
			'order'    => 'ASC',
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
			    'terms' => 'popular',
	        'field' => 'slug',
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
				        'terms' => 'popular',
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
          <?php endwhile; endif; wp_reset_postdata(); ?>
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
			<a href="<?php echo $term_link_popular ?>"><div class="btn"><?php _e( 'Смотреть больше вариантов', 'restx' ); ?></div></a>

			<?php $terms = get_terms('collections');
foreach ($terms as $term) {
	echo '<a href="' . get_term_link($term) . '">' . $term->name . '</a>';
} ?>
		</div>
	</div>
</div>


<!-- СЕМЕЙНЫЙ ОТДЫХ -->
<div class="row">
	<div class="col-md-12">
		<div class="mb-5">
			<div class="my-table">
				<div class="my-table-cell pr-4">
					<img src="<?php bloginfo('template_url'); ?>/img/familyhotels.svg" alt="" width="40px">
				</div>
				<div class="table-text">
					<h2><?php _e( 'Семейный отдых', 'restx' ); ?></h2>
					<p><?php _e( 'Лучшие предложения для тех, кто едет отдыхать с детьми!', 'restx' ); ?></p>		
				</div>
			</div>
		</div>
	</div>
</div>

<!-- PC SHOW -->
<div class="pc-show">
	<div class="row mb-5">
		<?php 
			$id_city = get_the_id();
			$custom_query = new WP_Query( array( 
			'post_type' => 'hotels', 
			'posts_per_page' => 4,
			'orderby' => 'rand',
			'order'    => 'ASC',
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
          <?php endwhile; endif; wp_reset_postdata(); ?>
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
			<a href="#"><div class="btn"><?php _e( 'Смотреть больше вариантов', 'restx' ); ?></div></a>
		</div>
	</div>
</div>

<!-- ПРЕМИУМ ОТДЫХ -->
<div class="row">
	<div class="col-md-12">
		<div class="mb-5">
			<div class="my-table">
				<div class="my-table-cell pr-4">
					<img src="<?php bloginfo('template_url'); ?>/img/crown.svg" alt="" width="40px">
				</div>
				<div class="table-text">
					<h2><?php _e( 'Премиум отдых', 'restx' ); ?></h2>
					<p><?php _e( 'Комфортный отдых за соответствующую цену!', 'restx' ); ?></p>		
				</div>
			</div>
		</div>
	</div>
</div>

<!-- PC SHOW -->
<div class="pc-show">
	<div class="row mb-5">
		<?php 
			$id_city = get_the_id();
			$custom_query = new WP_Query( array( 
			'post_type' => 'hotels', 
			'posts_per_page' => 4,
			'orderby' => 'rand',
			'order'    => 'ASC',
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
	        'terms' => 'premuim',
	        'field' => 'slug',
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
				        'terms' => 'premium',
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
          <?php endwhile; endif; wp_reset_postdata(); ?>
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
			<a href="#"><div class="btn"><?php _e( 'Смотреть больше вариантов', 'restx' ); ?></div></a>
		</div>
	</div>
</div>

<!-- У МОРЯ ОТДЫХ -->
<div class="row">
	<div class="col-md-12">
		<div class="mb-5">
			<div class="my-table">
				<div class="my-table-cell pr-4">
					<img src="<?php bloginfo('template_url'); ?>/img/nearsea.svg" alt="" width="40px">
				</div>
				<div class="table-text">
					<h2><?php _e( 'Возле моря', 'restx' ); ?></h2>
					<p><?php _e( 'До моря рукой подать!', 'restx' ); ?></p>		
				</div>
			</div>
		</div>
	</div>
</div>

<!-- PC SHOW -->
<div class="pc-show">
	<div class="row mb-5">
		<?php 
			$id_city = get_the_id();
			$custom_query = new WP_Query( array( 
			'post_type' => 'hotels', 
			'posts_per_page' => 4,
			'orderby' => 'rand',
			'order'    => 'ASC',
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
	        'terms' => 'nearsea',
	        'field' => 'slug',
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
				        'terms' => 'nearsea',
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
          <?php endwhile; endif; wp_reset_postdata(); ?>
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
			<a href="#"><div class="btn"><?php _e( 'Смотреть больше вариантов', 'restx' ); ?></div></a>
		</div>
	</div>
</div>

<!-- С ЖИВОТНЫМИ ОТДЫХ -->
<div class="row">
	<div class="col-md-12">
		<div class="mb-5">
			<div class="my-table">
				<div class="my-table-cell pr-4">
					<img src="<?php bloginfo('template_url'); ?>/img/animals.svg" alt="" width="40px">
				</div>
				<div class="table-text">
					<h2><?php _e( 'С животными', 'restx' ); ?></h2>
					<p><?php _e( 'Здесь любят пухнастых!', 'restx' ); ?></p>		
				</div>
			</div>
		</div>
	</div>
</div>

<!-- PC SHOW -->
<div class="pc-show">
	<div class="row mb-5">
		<?php 
			$terms = get_the_terms( $post->ID , 'collections' );
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
	        'terms' => 'animals',
	        'field' => 'slug',
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
				        'terms' => 'animals',
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
          <?php endwhile; endif; wp_reset_postdata(); ?>
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
			<a href="#"><div class="btn"><?php _e( 'Смотреть больше вариантов', 'restx' ); ?></div></a>
		</div>
	</div>
</div>