<div class="container mx-auto px-2 lg:px-0">
	<div class="mb-8">
		<div class="my-table">
			<div class="table-text">
				<h2 class="font-bold"><?php _e( 'Популярное жилье на курортах Украины', 'restx' ); ?></h2>
				<p class="text-lg"><?php _e( 'Снять жилье в Украине', 'restx' ); ?></p>
			</div>
		</div>
	</div>
	<div class="flex flex-wrap -mx-3 mb-8">
		<?php $custom_query = new WP_Query( array( 
			'post_type' => 'hotels', 
			'posts_per_page' => 8,
			'orderby' => 'date',
			'order' => 'DESC',
		));
		if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
			<div class="w-1/2 lg:w-1/4 px-1 mb-4">
	  		<?php get_template_part( 'blocks/hotel-card', 'default' ); ?>
	  	</div>
		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>
	<div class="w-full flex justify-center">
		<a href="<?php echo get_post_type_archive_link( 'hotels' ); ?>" class="btn-more text-center flex items-center">
			<img src="<?php bloginfo('template_url'); ?>/img/more.svg" width="35" class="mr-4">
			<div class="btn-more-info flex items-center">
				<img src="https://859628.smushcdn.com/1875481/wp-content/uploads/2019/03/20_411_view-150x150.jpg?lossy=0&strip=1&webp=1" width="50" class="rounded-full">
				<span><?php _e( 'Все жилье', 'restx' ); ?></span>	
			</div>
		</a>
	</div>
</div>




<div class="container mx-auto px-2 lg:px-0">
	<div class="flex mb-8">
		
	</div>
</div>