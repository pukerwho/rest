<div class="container-fluid cf_px">
	<div class="row">
		<div class="col-md-12">
			<div class="mb-5">
				<div class="my-table">
					<div class="table-text">
						<h2><?php _e( 'Автобусные перевозки', 'restx' ); ?></h2>
						<p><?php _e( 'Как добраться до курорта? Есть регулярные автобусные рейсы', 'restx' ); ?></p>		
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid cf_px">
	<div class="row">
		<?php $custom_query = new WP_Query( array( 
			'post_type' => 'way', 
			'posts_per_page' => 6,
			'orderby' => 'date',
			'order' => 'DESC',
		));
		if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
			<div class="col-md-4 mb-5">
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

<div class="container">
	<div class="row mb-5">
		<div class="col-md-12 d-flex justify-content-center">
			<a href="<?php echo get_post_type_archive_link( 'way' ); ?>" class="btn-more text-center d-flex align-items-center">
				<img src="<?php bloginfo('template_url'); ?>/img/more.svg" width="35px" class="mr-4">
				<div class="btn-more-info d-flex align-items-center">
					<img src="http://localhost/mythemetwo/restx/wp-content/uploads/2019/04/photo_2019-04-15-10.08.50.jpeg" height="50px" class="rounded-circle">
					<span><?php _e( 'Все маршруты', 'restx' ); ?></span>	
				</div>
			</a>
		</div>
	</div>
</div>