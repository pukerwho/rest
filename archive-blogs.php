<?php get_header(); ?>

<div class="blog">
	<div class="container">
		<div class="row pt-5 mb-5">
			<div class="col-md-12">
				<div class="text-center">
					<img src="<?php bloginfo('template_url') ?>/img/clipboard.svg" alt="" width="55px">
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<h1 class="text-uppercase text-center"><?php _e('Блог', 'restx') ?></h1>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="blog_grid">
					<?php 
					global $wp_query, $wp_rewrite;  
					// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

						$custom_query = new WP_Query( array( 
						'post_type' => 'blogs', 
						'posts_per_page' => 5,
						'order'    => 'DESC',
						'paged' => $current,
					) );
					if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
						<a href="<?php the_permalink() ?>"  class="blog_item">
							<div>
								<div class="blog_item_img">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="w-100 h-100">
								</div>
								<div class="blog_item_title">
									<?php the_title(); ?>	
								</div>
							</div>
						</a>
					<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md-12 text-center">
				<div class="b_pagination">
					<?php 
						$big = 999999999; // уникальное число
						echo paginate_links( array(
						'format'  => 'page/%#%',
						'current'   => $current,
						'total'   => $custom_query->max_num_pages,
						'prev_next' => true,
						'next_text' => (''),
						'prev_text' => ('')
						)); 
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>