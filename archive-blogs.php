<?php get_header(); ?>

<div class="blog py-20 pb-4 lg:py-12 lg:pb-12">
	<div class="container mx-auto px-2 lg:px-0">
		<div class="flex justify-center mb-5">
			<div class="w-full lg:w-9/12">
				<img src="<?php bloginfo('template_url') ?>/img/clipboard.svg" alt="<?php _e('Блог', 'restx') ?>" width="55" class="mx-auto mb-5">
				<h1 class="text-5xl uppercase text-center"><?php _e('Блог', 'restx') ?></h1>
			</div>
		</div>
		<div class="flex justify-center mb-5">
			<div class="w-full lg:w-9/12">
				<div class="info mb-5">
					<?php _e('Здесь собраны все статьи, которые могут быть полезными для вас. Первый раз отправляетесь в какой-то город? Мы расскажем, как лучше добраться, на что обращать особое внимание, как не потерять время зря. Отвечаем на самые важные для туристов вопросы.', 'restx') ?> 
				</div>
			</div>
		</div>
		<div class="flex justify-center mb-5">
			<div class="w-full lg:w-9/12">
				<div class="blog_categories flex flex-wrap">
					<?php 
						$blog_cats = get_terms(array(
							'taxonomy' => 'blog-categories',
						));
					?>
					<?php foreach ($blog_cats as $blog_cat): ?>
						<div class="blog_category mb-3">
							<a href="<?php echo get_term_link($blog_cat->term_id, 'blog-categories') ?>" class="block-inline lg:inline">
								<?php echo $blog_cat->name; ?>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		
		<div class="flex items-center justify-center flex-col-reverse lg:flex-row mb-5">
			<div class="w-full lg:w-9/12">
				<?php 
					$current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;

					$query = new WP_Query( array( 
						'post_type' => 'blogs', 
						'posts_per_page' => 5,
						'order'    => 'DESC',
						'paged' => $current_page,
					) );
				if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
					<div class="blog_item">
						<div class="flex h-100 -mx-2">
							<div class="blog_item_img px-1">
								<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover">
							</div>	
							<div class="blog_item_info px-1">
								<div class="blog_item_title mb-3">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</div>
								<div class="blog_item_cat mb-4">
									<?php
									$home_blog_terms = get_the_terms( $blog_how_to_query->ID, 'blog-categories' );
									foreach (array_slice($home_blog_terms, 0,1) as $home_blog_term): ?>
										<a href="<?php echo get_term_link($home_blog_term); ?>"><?php echo $home_blog_term->name; ?></a>
									<?php endforeach; ?>	
								</div>
								<div>
									<?php 
										$content_text = wp_strip_all_tags( get_the_content() );
										echo mb_strimwidth($content_text, 0, 150, '...');
									?>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
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