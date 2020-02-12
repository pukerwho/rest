<?php get_header(); ?>

<?php 
	$blog_cats = get_terms(array(
		'taxonomy' => 'blog-categories',
	));
	$current_blog_cat_id = get_queried_object_id();
	$current_blog_cat = get_term($current_blog_cat_id, 'blog-categories'); 
?>

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
				<h1 class="text-uppercase text-center"><?php _e('Категория', 'restx') ?>: <?php echo $current_blog_cat->name ?></h1>
			</div>
		</div>
		<div class="row flex-column-reverse flex-lg-row mb-5">
			<div class="col-md-9">
				<div class="blog_grid">
					<?php 
						$current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;

						$query = new WP_Query( array( 
							'post_type' => 'blogs', 
							'posts_per_page' => 5,
							'order'    => 'DESC',
							'paged' => $current_page,
							'tax_query' => array(
						    array(
					        'taxonomy' => 'blog-categories',
							    'terms' => $current_blog_cat_id,
					        'field' => 'term_id',
					        'include_children' => true,
					        'operator' => 'IN'
						    )
							),
						) );
					if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
						<a href="<?php the_permalink() ?>" class="blog_item">
							<div>
								<div class="blog_item_img">
									<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="" class="w-100 h-100">
								</div>
								<div class="blog_item_title">
									<?php the_title(); ?>	
								</div>
							</div>
						</a>
					<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
			</div>
			<div class="col-md-3 mb-4">
				<div class="blog_sidebar">
					<div class="blog_sidebar_box">
						<div class="d-flex align-items-center mb-4">
							<div class="blog_sidebar_box_icon">
								<img src="<?php bloginfo('template_url') ?>/img/organize.svg" width="30px" alt="">
							</div>
							<div class="blog_sidebar_box_subtitle"><?php _e('Категории', 'restx'); ?>:</div>
						</div>
						<div>
							<?php foreach ($blog_cats as $blog_cat): ?>
								<div class="blog_sidebar_box_item">
									<a href="<?php echo get_term_link($blog_cat->term_id, 'blog-categories') ?>"><?php echo $blog_cat->name; ?></a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
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