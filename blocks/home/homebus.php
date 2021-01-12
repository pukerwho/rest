<div class="container mx-auto px-2 lg:px-0">
	<div class="flex">
		<div class="w-full">
			<div class="mb-8">
				<div class="my-table">
					<div class="table-text">
						<h2 class="font-bold"><?php _e( 'Автобусные перевозки', 'restx' ); ?></h2>
						<p class="text-lg"><?php _e( 'Как добраться до курорта? Есть регулярные автобусные рейсы', 'restx' ); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container mx-auto px-2 lg:px-0">
	<div class="flex flex-wrap -mx-3 mb-8">
		<?php $custom_query = new WP_Query( array( 
			'post_type' => 'way', 
			'posts_per_page' => 6,
			'orderby' => 'date',
			'order' => 'DESC',
		));
		if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
			<div class="w-full lg:w-1/3 px-3 mb-6">
				<a href="<?php the_permalink(); ?>">
					<div class="homebus_item">
						<div class="homebus_item_title">
							<?php the_title(); ?>		
						</div>
						<div class="homebus_item_img">
							<img src="<?php bloginfo('template_url'); ?>/img/for-links.svg" width="15px">
						</div>
					</div>
				</a>
			</div>
		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>
</div>

<div class="container mx-auto px-2 lg:px-0">
	<div class="flex mb-8">
		<div class="w-full flex justify-center">
			<a href="<?php echo get_post_type_archive_link( 'way' ); ?>" class="btn-more text-center flex items-center">
				<img src="<?php bloginfo('template_url'); ?>/img/more.svg" width="35" class="mr-4">
				<div class="btn-more-info flex items-center">
					<img src="https://859628.smushcdn.com/1875481/wp-content/uploads/2020/07/migeiskie-porogi-150x150.jpg" width="50" class="rounded-full">
					<span><?php _e( 'Все маршруты', 'restx' ); ?></span>	
				</div>
			</a>
		</div>
	</div>
</div>