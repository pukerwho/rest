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
			'posts_per_page' => 4,
			'orderby' => 'date',
			'order' => 'DESC',
		));
		if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
			<div class="col-md-3 mb-5">
				<a href="<?php the_permalink(); ?>">
					<div class="way_item d-flex flex-column justify-content-center align-items-center p-4 pl-5">
						<h2 class="way_item_title mb-5">
							<?php the_title(); ?>	
						</h2>
						<div>
							<?php _e('Количество рейсов', 'restx'); ?>: 
							<?php $way_count = carbon_get_the_post_meta('crb_way'); ?>
							<?php echo count($way_count); ?>
						</div>
					</div>
				</a>
			</div>
		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>
</div>

<div class="container">
	<div class="row mb-5">
		<div class="col-md-12">
			<div class="button-more text-center">
				<a href="<?php echo get_post_type_archive_link( 'way' ); ?>">
					<div class="btn"><?php _e( 'Все маршруты', 'restx' ); ?></div>
				</a>
			</div>
		</div>
	</div>
</div>