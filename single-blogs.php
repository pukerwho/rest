<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="single-blogs pt-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-9">
					<div class="single-blogs__breadcrumb d-flex mb-4">
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
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<div class="row justify-content-center mb-4">
				<div class="col-md-8 text-center">
					<h3><?php _e( 'Популярные предложения в этом городе', 'restx' ); ?></h3>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="single-blogs-hotels">
						<?php 
							$current_term = wp_get_post_terms(  get_the_ID() , 'citylist', array( 'parent' => 0 ) );
							foreach ($current_term as $myterm); {
								$current_term_slug = $myterm->slug;
							}
						?>
						<?php 
							$current_term = wp_get_post_terms(  get_the_ID() , 'citylist', array( 'parent' => 0 ) );
							$custom_query = new WP_Query( array( 
							'post_type' => 'hotels', 
							'posts_per_page' => 6,
							'orderby' => 'rand',
							'order'    => 'ASC',
							'tax_query' => array(
						    array(
					        'taxonomy' => 'citylist',
							    'terms' => $current_term_slug,
					        'field' => 'slug',
					        'include_children' => true,
					        'operator' => 'IN'
						    )
							),
						) );
						if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
							<a href="<?php echo get_permalink(); ?>">
					  		<div class="single-blogs-hotel">
					  			<div class="single-blogs-hotel-img">
						  			<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">	
					  			</div>
					  			<div class="single-blogs-hotel-content">
						  			<div class="single-blogs-hotel-title">
						  				<?php the_title(); ?>	
						  			</div>
						  			<div class="single-blogs-hotel-price">
						  				<?php get_template_part('blocks/hotel-price'); ?>	
						  			</div>	
						  			<div class="single-blogs-hotel-nomer">
						  				<?php _e( 'Номера', 'restx' ); ?>: 
											<?php if(rwmb_meta( 'meta-hotel-kottedg-has' )): ?>
												<span><?php _e( 'Коттеджи', 'restx' ); ?></span>
											<?php endif ?>
											<?php if(rwmb_meta( 'meta-hotel-lux-has' )): ?>
												<span><?php _e( 'Люксы', 'restx' ); ?></span>
											<?php endif ?>
											<?php if(rwmb_meta( 'meta-hotel-halflux-has' )): ?>
												<span><?php _e( 'Полулюксы', 'restx' ); ?></span>
											<?php endif ?>
											<?php if(rwmb_meta( 'meta-hotel-standart-has' )): ?>
												<span><?php _e( 'Стандарты', 'restx' ); ?></span>
											<?php endif ?>
											<?php if(rwmb_meta( 'meta-hotel-budget-has' )): ?>
												<span><?php _e( 'Бюджетные', 'restx' ); ?></span>
											<?php endif ?>
						  			</div>
					  			</div>
					  		</div>
				  		</a>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>