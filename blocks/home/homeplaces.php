<div class="container mx-auto px-2 lg:px-0">
	<div class="flex justify-center">
		<div class="w-full mb-8">
			<h2 class="font-bold"><?php _e( 'Популярные места', 'restx' ); ?></h2>
			<p class="text-lg"><?php _e( 'Что посмотреть интересного в Украине?', 'restx' ); ?></p>
		</div>
	</div>
	<div class="flex mb-8">
		<div class="w-full">
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
					<a href="<?php echo get_the_permalink(); ?>" class="home_places_item">
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
	<div class="flex mb-8">
		<div class="w-full flex justify-center">
			<a href="<?php echo get_post_type_archive_link('wow'); ?>" class="btn-more text-center flex items-center rounded-full">
				<img src="<?php bloginfo('template_url'); ?>/img/more.svg" width="35" class="mr-4">
				<div class="btn-more-info flex items-center">
					<img src="https://859628.smushcdn.com/1875481/wp-content/uploads/2020/07/akvapark_oazis-150x150.jpg" width="50" class="rounded-full">
					<span><?php _e( 'Посмотреть все интересные места', 'restx' ); ?></span>	
				</div>
			</a>
		</div>
	</div>
</div>