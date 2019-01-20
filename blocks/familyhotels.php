<div class="familyhotels">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="mb-5">
					<div class="my-table">
						<div class="my-table-cell pr-4">
							<img src="<?php bloginfo('template_url'); ?>/img/familyhotels.svg" alt="" width="40px">
						</div>
						<div class="table-text">
							<h2>Семейный отдых</h2>
							<p>Лучшие предложения для тех, кто едет отдыхать с детьми!</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- PC VERSION -->
		<div class="pc-show">
			<div class="row mb-5">
				<?php 
					$custom_query = new WP_Query( array( 
					'post_type' => 'hotels', 
					'posts_per_page' => 4,
					'orderby' => 'rand',
    			'order'    => 'ASC',
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
				<?php endwhile; endif; ?>
			</div>
		</div>
		<!-- MOBILE VERSION -->
		<div class="mobile-show">
			<div class="row mb-5">
				<div class="col-md-12">
					<div class="swiper-container swiper-hotels">
				    <div class="swiper-wrapper">
				    	<?php 
								$custom_query = new WP_Query( array( 
								'post_type' => 'hotels', 
								'posts_per_page' => 4,
								'orderby' => 'rand',
			    			'order'    => 'ASC',
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
					<a href="<?php 
					$term_slug = 'family';
					$term_link = get_term_link($term_slug, 'collections');
					echo $term_link;
					?>">
						<div class="btn">Смотреть больше вариантов</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>