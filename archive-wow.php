<?php get_header(); ?>

<div class="wow wow_archive">
	<div class="container py-5">
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="d-flex flex-column">
					<h1 class="archive text-uppercase"><?php _e('Впечатления', 'restx'); ?></h1>	
					<div class="wow_archive_subtitle"><?php _e('Куда пойти, что посмотреть. Как интересно провести время на курорте.', 'restx'); ?></div>
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<?php 
				$current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;

				$query = new WP_Query( array( 
					'post_type' => 'wow', 
					'posts_per_page' => 9,
					'order'    => 'DESC',
					'paged' => $current_page,
				) );
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
			<div class="col-md-3 mb-5">
				<a href="<?php the_permalink(); ?>">
					<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="" class="wow_archive_thumb mb-3">
					<div class="wow_archive_name">
						<?php the_title(); ?>
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