<?php get_header(); ?>

<div class="wow wow_archive">
	<div class="container mx-auto px-2 lg:px-0 pt-20 lg:pt-12 lg:pb-12">
		<div class="mb-8">
			<div class="flex flex-col items-center">
				<h1 class="text-3xl lg:text-5xl text-uppercase"><?php _e('Впечатления', 'restx'); ?></h1>	
				<div class="wow_archive_subtitle"><?php _e('Куда пойти, что посмотреть. Как интересно провести время на курорте', 'restx'); ?>.</div>
			</div>
		</div>
		<div class="flex flex-wrap mb-5 lg:-mx-2">
			<?php 
				$current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;

				$query = new WP_Query( array( 
					'post_type' => 'wow', 
					'posts_per_page' => 9,
					'order'    => 'DESC',
					'paged' => $current_page,
				) );
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
			<div class="w-full lg:w-3/12 px-2 mb-8">
				<a href="<?php the_permalink(); ?>">
					<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="" class="wow_archive_thumb mb-3">
					<div class="hotel-item__city mb-2">
						<?php
							$myterms = wp_get_post_terms(  get_the_ID() , 'citylist', array( 'parent' => 0 ) );
							foreach (array_slice($myterms, 0,1) as $myterm): ?>
								<a href="<?php echo get_term_link($myterm) ?>"><span><?php echo $myterm->name; ?><span></a>
							<?php endforeach; ?>
					</div>
					<div class="wow_archive_name">
						<?php the_title(); ?>
					</div>
				</a>
			</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
		<div class="flex mb-5">
			<div class="w-full text-center">
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