<?php
	if (get_locale() == 'ru_RU') {
		$blog_other_slug = 'common';
		$blog_how_term_slug = 'kak-dobratsja';	
	} else {
		$blog_other_slug = 'articles-uk';
		$blog_how_term_slug = 'jak-distatis';
	}
?>

<div class="container-fluid cf_px">
	<div class="row">
		<div class="col-md-12">
			<div class="mb-4">
				<div class="my-table">
					<div class="table-text">
						<h2><?php _e( 'Полезная информация из нашего блога', 'restx' ); ?></h2>
						<p><?php _e( 'Как добраться, куда пойти - ответы на популярные вопросы', 'restx' ); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<?php 
			$blog_how_to_query = new WP_Query( array( 
				'post_type' => 'blogs', 
				'posts_per_page' => 2,
				'orderby' => 'rand',
				
			) );
		if ($blog_how_to_query->have_posts()) : while ($blog_how_to_query->have_posts()) : $blog_how_to_query->the_post(); ?>
		<div class="col-md-4 mb-4">
			<div class="home_blog main">
				<a href="<?php echo get_the_permalink(); ?>">
					<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="" class="home_blog_img mb-4">
				</a>
				<div class="home_blog_cat mb-2">
					<?php
					$home_blog_terms = get_the_terms( $blog_how_to_query->ID, 'blog-categories' );
					foreach (array_slice($home_blog_terms, 0,1) as $home_blog_term): ?>
						<a href="<?php echo get_term_link($home_blog_term); ?>"><?php echo $home_blog_term->name; ?></a>
					<?php endforeach; ?>
				</div>
				<div class="home_blog_title">
					<a href="<?php echo get_the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</div>
			</div>
		</div>
		<?php endwhile; endif; wp_reset_postdata(); ?>
		<div class="col-md-4">
			<?php 
				$blog_other_query = new WP_Query( array( 
					'post_type' => 'blogs', 
					'posts_per_page' => 3,
					'orderby' => 'rand',
					'tax_query' => array(
						array(
							'taxonomy' => 'blog-categories',
							'field' => 'slug',
							'terms' => $blog_other_slug
						)
					)
				) );
			if ($blog_other_query->have_posts()) : while ($blog_other_query->have_posts()) : $blog_other_query->the_post(); ?>
				<div class="home_blog second mb-4">
					<div class="row d-flex flex-row ">
						<div class="col-6">
							<a href="<?php echo get_the_permalink(); ?>">
								<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="" class="home_blog_img mb-4">
							</a>
						</div>
						<div class="col-6">
							<div class="home_blog_cat mr-2">
								<?php
								$home_blog_terms = get_the_terms( $blog_how_to_query->ID, 'blog-categories' );
								foreach (array_slice($home_blog_terms, 0,1) as $home_blog_term): ?>
									<a href="<?php echo get_term_link($home_blog_term); ?>"><?php echo $home_blog_term->name; ?></a>
								<?php endforeach; ?>
							</div>
							<div class="home_blog_title">
								<a href="<?php echo get_the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
</div>