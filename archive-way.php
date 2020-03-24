<?php get_header(); ?>

<div class="way">
	<div class="container py-5">
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="d-flex flex-column align-items-center">
					<img src="<?php bloginfo('template_url') ?>/img/bus.svg" width="80px" class="mb-5" alt="">
					<h1 class="archive text-uppercase"><?php _e('Автобусные перевозки', 'restx'); ?></h1>	
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<?php 
				$current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;

				$query = new WP_Query( array( 
					'post_type' => 'way', 
					'posts_per_page' => 18,
					'order'    => 'DESC',
					'paged' => $current_page,
				) );
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
			<div class="col-md-4 mb-5">
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
		<div class="row mb-5">
			<div class="col-md-12 text-center">
				<div class="b_pagination">
					<?php 
						$big = 9999999991; // уникальное число
						echo paginate_links( array(
							'format' => '?page=%#%',
							'total' => $query->max_num_pages,
							'current' => $current_page,
							'prev_next' => true,
							'next_text' => (''),
							'prev_text' => (''),
						)); 
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>