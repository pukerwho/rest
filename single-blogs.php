<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="single-blogs pt-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-9">
					<div class="single-blogs__breadcrumb d-flex mb-5">
						<?php 
						$current_term = wp_get_post_terms(  get_the_ID() , 'blog-categories', array( 'parent' => 0 ) );
						foreach (array_slice($current_term, 0,1) as $myterm); {
						} ?>
						<?php if ($myterm): ?>
							<div class="breadcrumbs" itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
					      <ul>
									<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
										<a itemprop="item" href="<?php echo home_url(); ?>">
											<span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
										</a>                        
										<meta itemprop="position" content="1">
									</li>
									<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
										<a itemprop="item" href="<?php echo get_post_type_archive_link('blogs'); ?>">
											<span itemprop="name"><?php _e( 'Блог', 'restx' ); ?></span>
										</a>                        
										<meta itemprop="position" content="2">
									</li>
					        <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
					          <a itemprop="item" href="<?php echo get_term_link($myterm->term_id, 'blog-categories') ?>">
											<span itemprop="name"><?php echo $myterm->name; ?></span>
										</a>                        
										<meta itemprop="position" content="3">
					        </li>
					      </ul>
					    </div>
						<?php endif; ?>
					</div>
					<div class="single-blogs__title d-flex">
						<h1><?php the_title(); ?></h1>	
					</div>
					<div class="single-blogs__date mb-5">
						<?php _e('Дата', 'restx') ?>: <?php echo get_the_modified_time('j/n/Y') ?>
					</div>
				</div>
			</div>
			<div class="row justify-content-center mb-5">
				<div class="col-md-9">
					<div class="single-blogs__text">
						<?php if(carbon_get_the_post_meta('crb_blogs_whether')): ?>
						<div class="weather-block" data-weather="<?php echo carbon_get_the_post_meta('crb_blogs_city'); ?>">
							<div id="weather"></div>		
						</div>
						<?php endif ?>
						<div class="single-blogs__mainimg mb-5">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>" alt="" loading="lazy">
						</div>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<div class="row justify-content-center mb-5">
				<div class="col-md-8 text-center">
					<h3 class="display-4"><?php _e( 'Похожие записи', 'restx' ); ?></h3>
				</div>
			</div>
			<div class="row justify-content-center">
				<?php 
					$current_id = get_the_ID();
					$custom_query = new WP_Query( array( 
					'post_type' => 'blogs', 
					'posts_per_page' => 3,
					'post__not_in' => array($current_id),
					'tax_query' => array(
				    array(
			        'taxonomy' => 'blog-categories',
					    'terms' => $myterm->term_id,
			        'field' => 'term_id',
			        'include_children' => true,
			        'operator' => 'IN'
				    )
					),
				) );
				if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
        	<div class="col-md-4 mb-5">
        		<a href="<?php the_permalink(); ?>">
        			<div class="single-blogs__other">
        				<div class="single-blogs__other-img mb-4">
        					<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium') ?>" alt="" loading="lazy">
        				</div>
        				<div class="single-blogs__other-title text-center mb-4">
        					<?php the_title(); ?>	
        				</div>
	        		</div>
	        	</a>
        	</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>