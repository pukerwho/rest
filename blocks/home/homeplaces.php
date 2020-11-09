<div class="container-fluid cf_px">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<h2><?php _e( 'Популярные места', 'restx' ); ?></h2>
			<p class="mb-5"><?php _e( 'Что посмотреть интересного в Украине?', 'restx' ); ?></p>
		</div>
	</div>
	<div class="row mb-5">
		<div class="col-md-12">
			<div class="swiper-container swiper-home-places">
		    <div class="swiper-wrapper">
		    	<?php 
					$query = new WP_Query( array( 
						'post_type' => 'wow', 
						'posts_per_page' => 6,
						'order'    => 'DESC',
					) );
				if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
				<div class="swiper-slide">
					<a href="" class="home_places_item">
						<div class="home_places_item_img">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="" class="">
						</div>
						<div class="home_places_item_info">
							<div class="home_places_item_title mb-3">
								<?php the_title(); ?>		
							</div>	
							<div class="home_places_item_city">
								<?php
								$myterms = wp_get_post_terms(  get_the_ID() , 'citylist', array( 'parent' => 0 ) );
								foreach (array_slice($myterms, 0,1) as $myterm): ?>
									<span><?php echo $myterm->name; ?><span>
								<?php endforeach; ?>
							</div>
						</div>
					</a>
				</div>
				<?php endwhile; endif; wp_reset_postdata(); ?>
		    </div>
		  </div>
		</div>
		
	</div>
	<div class="row mb-5">
		<div class="col-md-12 d-flex justify-content-center">
			<a href="<?php echo get_post_type_archive_link('wow'); ?>" class="btn-more text-center d-flex align-items-center">
				<img src="<?php bloginfo('template_url'); ?>/img/more.svg" width="35px" class="mr-4">
				<div class="btn-more-info d-flex align-items-center">
					<img src="http://localhost/mythemetwo/restx/wp-content/uploads/2019/04/photo_2019-04-15-10.08.50.jpeg" height="50px" class="rounded-circle">
					<span><?php _e( 'Посмотреть все интересные места', 'restx' ); ?></span>	
				</div>
			</a>
		</div>
	</div>
</div>