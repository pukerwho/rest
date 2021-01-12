<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="single-blogs pt-5">
		<div class="container mx-auto px-2 lg:px-0 pt-20 lg:pt-12 lg:pb-12" itemscope itemtype="http://schema.org/Article">
			<div class="flex justify-center">
				<div class="w-full lg:w-7/12">
					<div class="single-blogs__breadcrumb flex mb-5">
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
				</div>
			</div>
			<article class="content">
				<div class="flex justify-center">
					<div class="w-full lg:w-7/12">
						<div class="single-blogs__title flex">
							<h1 itemprop="headline"><?php the_title(); ?></h1>	
						</div>
						<div class="flex mb-5">
							<div class="single-blogs__avatar mr-4">
								<?php 
									$avatar = get_avatar(get_the_author_meta('ID'));
								?>
								<?php if ($avatar): ?>
	                <?php echo $avatar; ?>
	              <?php else: ?>
	                <img src="<?php bloginfo('template_part'); ?>/img/user.svg" width="35px">
	              <?php endif; ?>
							</div>
							<div>
								<div class="single-blogs__date mb-3">
									<div>
										<?php _e('Автор', 'restx') ?>: <?php echo get_the_author(); ?>
									</div>
									<?php if(!empty(get_the_author_meta('facebook'))) { ?>
									<div>
										<a href="<?php the_author_meta('facebook'); ?>">Facebook</a>
									</div>
									<?php } ?>
								</div>
								<div class="single-blogs__date">
									<?php _e('Дата', 'restx') ?>: <?php echo get_the_modified_time('j/n/Y') ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="flex justify-center mb-5">
					<div class="w-full lg:w-7/12">
						<div class="single-blogs__text">
							<?php if(carbon_get_the_post_meta('crb_blogs_whether')): ?>
							<div class="weather-block" data-weather="<?php echo carbon_get_the_post_meta('crb_blogs_city'); ?>">
								<div id="weather"></div>		
							</div>
							<?php endif ?>
							<div class="single-blogs_subjects mb-5">
								<div class="single-blogs_subjects_subtitle font-weight-bold mb-3">
									Содержание:
								</div>
								<div class="single-blogs_subjects_inner"></div>
							</div>
							<div class="single-blogs__mainimg mb-5">
								<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>" alt="" loading="lazy" itemprop="image">
							</div>
							<div itemprop="articleBody">
								<?php the_content(); ?>	
							</div>
						</div>
					</div>
				</div>
			</article>
			<div class="flex justify-center mb-5">
				<div class="w-full lg:w-7/12">
					<h3 class="text-3xl text-center mb-4"><?php _e( 'Обсуждение', 'restx' ); ?></h3>
					<div>
						<?php get_template_part('blocks/custom_comments'); ?>
					</div>
				</div>
			</div>
			<div class="flex justify-center mb-5">
				<div class="w-full lg:w-7/12 text-center">
					<h3 class="text-3xl"><?php _e( 'Похожие записи', 'restx' ); ?></h3>
				</div>
			</div>
			<div class="flex justify-center flex-wrap lg:-mx-2">
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
        	<div class="w-full lg:w-1/3 mb-5 lg:px-2">
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