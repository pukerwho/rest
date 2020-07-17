<?php get_header(); ?>

<!-- <?php if ( $post->post_parent ) { ?>
 <a href="<?php echo get_permalink( $post->post_parent ); ?>" >
    <?php echo get_the_title( $post->post_parent ); ?>
 </a>
<?php } ?> -->

<div class="single-hotel">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="single-hotel__breadcrumb text-left mb-4">
					<?php 
						$current_term = wp_get_post_terms(  get_the_ID() , 'citylist', array( 'parent' => 0 ) );
						foreach ($current_term as $myterm); {
							$current_term_slug = $myterm->slug;
							$current_term_name = $myterm->name;
						} 
					?>
					<?php $getCurrentTermId = pll_get_term($myterm->term_id); ?>

					<div class="breadcrumbs" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
			      <ul>
							<li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem'>
								<a itemprop="item" href="<?php echo home_url(); ?>">
									<span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
								</a>                        
								<meta itemprop="position" content="1">
							</li>
							<li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem'>
								<a itemprop="item" href="<?php echo get_term_link($getCurrentTermId, 'citylist') ?>">
									<span itemprop="name"><?php echo $current_term_name ?></span>
								</a>                        
								<meta itemprop="position" content="2">
							</li>
							<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
				        <span itemprop="name"><?php the_title(); ?></span>
				        <meta itemprop="position" content="3" />
				      </li>
			      </ul>
			    </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<!-- САЙДБАР СТАРТ -->
				<div class="single-hotel-sidebar">
					<div class="single-hotel-cover-item">
						<div class="single-hotel-cover-subtitle mb-5">
							Відпочивай тут
						</div>
						<div class="address mb-4">
							<img src="<?php bloginfo('template_url') ?>/img/direction-sign.svg" width="30px" alt="">
							<?php echo rwmb_meta( 'meta-hotel-address' ); ?>
						</div>
						<div class="title mb-5">
							<?php the_title(); ?>
						</div>
						<?php get_template_part('blocks/single-hotel/contact') ?>
					</div>	
				</div>
				<!-- САЙДБАР КОНЕЦ -->
			</div>
			<div class="col-md-8">
				<!-- ОСНОВНОЙ КОНТЕНТ СТАРТ -->
				<div class="single-hotel-main">
					<div class="single-hotel-cover-grid">
						<div class="single-hotel-cover-right">
							<div class="title mobile-show mb-4">
								<?php the_title(); ?>
							</div>
							<div class="address mobile-show mb-5">
								<?php echo rwmb_meta( 'meta-hotel-address' ); ?>
							</div>
							<div class="cover">
								<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
							</div>
							<div class="right">
								<div class="p-relative" style="margin-bottom: 20px">
									<?php 
										$images = rwmb_meta( 'meta-hotel-photos', array( 'size' => 'large' ) );
										$title_img_territory = get_the_title();
										foreach ( $images as $image ): ?> 
											<div class="hotel-photos__item nomer_photos">
												<a href="<?php echo $image['full_url'] ?>" data-lightbox="territory" data-title="<?php $title_img_territory ?>">
													<div class="hotel-photos__item-bg"></div>
													<div class="hotel-photos__item-title"><?php _e("Фото территории", "restx") ?></div>
													<img src="<?php echo $image['url'] ?>" alt="<?php echo $title_img_territory; ?> - Территория">
												</a>
											</div>
									<?php endforeach; ?>
								</div>
								<div>
									<?php 
										$args = array(
									    'width'        => '100%',
									    'height'       => '380px',
									    'zoom'         => 14,
									    'marker'       => true,
									    'marker_title' => 'Click me',
									    'info_window'  => '<h3>Title</h3><p>Content</p>.',
										);
										echo rwmb_meta( 'meta-hotel-map', $args );
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="tabs mt-5">
						<div class="mobile-show">
							<?php get_template_part('blocks/single-hotel/contact') ?>	
						</div>
						<!-- <div class="d-flex align-items-center lead mb-5">
							<img src="ВСТАВИТЬ БЛОГИНФО!!!/img/vision.svg" alt="" width="20px" class="mr-3">
							<p class="mb-0">Кол-во просмотров:</p>
						</div> -->
						<?php  tutCount(get_the_ID()); ?>
						<?php if(rwmb_meta( 'meta-hotel-gps' )): ?>
						<div class="d-flex align-items-center mb-5">
							<img src="<?php bloginfo('template_url') ?>/img/map.svg" alt="" width="35px" class="mr-2">
							<h3 class="mb-0"><?php _e( 'GPS:', 'restx' ); ?></h3>	
						</div>
						<div class="lead mb-5">
							<?php echo rwmb_meta( 'meta-hotel-gps' ); ?>
						</div>
						<?php endif ?>
						<div class="hotel-content mb-5">
							<h3 class="mb-5"><?php _e( 'Описание', 'restx' ); ?></h3>
	  					<?php the_content(); ?>	
	  				</div>
	  				<h3 class="mb-5"><?php _e( 'Удобства:', 'restx' ); ?></h3>
	  				<?php get_template_part( 'blocks/include', 'default' ); ?>
	  				<div class="nomers d-flex flex-column">
	  					<h3 class="mb-5"><?php _e( 'Номера (кликните, чтобы посмотреть всю информацию)', 'restx' ); ?></h3>
	  					<div class="row">
			  				<!-- Номер коттедж -->
					  		<?php if(rwmb_meta( 'meta-hotel-kottedg-has' )): ?>
					  			<?php get_template_part('blocks/nomers/kottedg') ?>
					  		<?php endif ?>
					  		<!-- Номер люкс -->
					  		<?php if(rwmb_meta( 'meta-hotel-lux-has' )): ?>
					  			<?php get_template_part('blocks/nomers/lux') ?>
					  		<?php endif ?>
					  		<!-- Номер полулюкс -->
					  		<?php if(rwmb_meta( 'meta-hotel-halflux-has' )): ?>
					  			<?php get_template_part('blocks/nomers/half-lux') ?>
					  		<?php endif ?>
					  		<!-- Номер стандартный -->
					  		<?php if(rwmb_meta( 'meta-hotel-standart-has' )): ?>
					  			<?php get_template_part('blocks/nomers/standart') ?>
					  		<?php endif ?>
					  		<!-- Номер бюджетный -->
					  		<?php if(rwmb_meta( 'meta-hotel-budget-has' )): ?>
					  			<?php get_template_part('blocks/nomers/budget') ?>
					  		<?php endif ?>
					  		<!-- Номер кемпинг -->
					  		<?php if(rwmb_meta( 'meta-hotel-camping-has' )): ?>
					  			<?php get_template_part('blocks/nomers/camping') ?>
					  		<?php endif ?>
					  		<!-- Номер Квартира -->
					  		<?php if(rwmb_meta( 'meta-hotel-appartment-has' )): ?>
					  			<?php get_template_part('blocks/nomers/appartment') ?>
					  		<?php endif ?>
				  		</div>
			  		</div>
			  		<?php if(rwmb_meta( 'meta-hotel-sale' )): ?>
			  		<div>
			  			<h3 class="mb-5"><?php _e( 'Скидки', 'restx' ); ?></h3>
			  			<div class="mb-5">
					  		<?php echo rwmb_meta( 'meta-hotel-sale-text' ); ?>
						  </div>
			  		</div>
			  		<?php endif ?>	
					  <div>
					  	<h3 class="mb-5"><?php _e( 'Обсуждение', 'restx' ); ?></h3>
					  	<div class="mb-5">
					  		<?php get_template_part('blocks/custom_comments'); ?>
					  	</div>
					  </div>
					  
						<!--<div class="tab-button-outer mb-5">
							<div class="nav-img">
					    	<img src="<?php bloginfo('template_url') ?>/img/swipe.svg" alt="">
					    </div>
							<ul class="nav nav-tabs" id="singleHotelTabs" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php _e( 'Главная', 'restx' ); ?></a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="nomers-tab" data-toggle="tab" href="#nomers" role="tab" aria-controls="nomers" aria-selected="false"><?php _e( 'Номера', 'restx' ); ?></a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><?php _e( 'Контакты', 'restx' ); ?></a>
							  </li>
							  <?php if(rwmb_meta( 'meta-hotel-sale' )): ?>
							  <li class="nav-item">
							    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#sale" role="tab" aria-controls="sale" aria-selected="false"><?php _e( 'Скидки', 'restx' ); ?></a>
							  </li>
							  <?php endif ?>
							  <?php if(rwmb_meta( 'meta-hotel-reviews' )): ?>
							  <li class="nav-item">
							    <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false"><?php _e( 'Обсуждение', 'restx' ); ?></a>
							  </li>
							  <?php endif ?>
							</ul>
						</div> -->
						
						<div class="tab-content" id="myTabContent">
						  <div class="tab-pane tab-single-hotel fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						  	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							  	<div class="hotel-main">
							  		<div class="row">
							  			<div class="col-md-3 single-hotel-include">
							  				<!-- <h3 class="mb-5">Рейтинги</h3>
							  				<div class="mb-5">
							  					<h4>Общий:</h4>
							  					<div class="hotel-rating">
							  						<div class="hotel-rating-bar" style="width: <?php echo rwmb_meta( 'meta-hotel-mainrating' ); ?>%">
							  							<span><?php echo rwmb_meta( 'meta-hotel-mainrating' ); ?>%</span>
							  						</div>
							  					</div>
							  				</div> -->
							  			</div>
							  		</div>
							  	</div>
						  	<?php endwhile; else: ?>
									<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
								<?php endif; ?>
						  </div>
						  <?php if(rwmb_meta( 'meta-hotel-sale' )): ?>
						  <div class="tab-pane tab-single-hotel fade" id="sale" role="tabpanel" aria-labelledby="sale-tab">
						  	<?php echo rwmb_meta( 'meta-hotel-sale-text' ); ?>
						  </div>
						  <?php endif ?>
						  <div class="tab-pane tab-single-hotel fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
						  	<?php comments_template(); ?> 
						  </div>
						</div>
					</div>
				</div>
				<!-- ОСНОВНОЙ КОНТЕНТ КОНЕЦ -->
			</div>
			<div class="col-md-12 single-hotel-content">
				

				
			</div>
		</div>
	</div>
	<div class="container single-hotel-morehotel pt-5">
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="my-table">
					<div class="my-table-cell pr-4">
						<img src="<?php bloginfo('template_url'); ?>/img/thumbs-up.svg" alt="" width="50px">
					</div>
					<div class="table-text">
						<h2><?php _e( 'Другие предложения в этом городе', 'restx' ); ?></h2>
						<p><?php _e( 'Возможно, вам больше подойдут эти варианты', 'restx' ); ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<?php 
				$current_term = wp_get_post_terms(  get_the_ID() , 'citylist', array( 'parent' => 0 ) );
				foreach (array_slice($current_term, 0,1) as $myterm); {
					$current_term_slug = $myterm->slug;
				}
			?>
			<?php 
				$current_id = get_the_ID();
				$current_term = wp_get_post_terms(  get_the_ID() , 'citylist', array( 'parent' => 0 ) );
				$custom_query = new WP_Query( array( 
				'post_type' => 'hotels', 
				'posts_per_page' => 4,
				'post__not_in' => array($current_id),
				'orderby'        => 'meta_value',
    		'meta_key'       => 'meta-hotel-mainrating',
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
			  	<div class="col-md-3">
			  		<?php get_template_part( 'blocks/hotel-card', 'default' ); ?>
			  	</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="button-more text-center">
					<?php 
						$current_term = wp_get_post_terms(  get_the_ID() , 'citylist', array( 'parent' => 0 ) );
						foreach (array_slice($current_term, 0,1) as $myterm): ?>
						<a href="<?php echo get_term_link($myterm) ?>">
							<div class="btn"><?php _e( 'Все предложения', 'restx' ); ?></div>	
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="container py-5">
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="my-table">
					<div class="my-table-cell pr-4">
						<img src="<?php bloginfo('template_url'); ?>/img/direction-sign.svg" alt="" width="50px">
					</div>
					<div class="table-text">
						<h2><?php _e( 'Популярные направления', 'restx' ); ?></h2>
						<p><?php _e( 'Загляните в эти города - может здесь найдете идеальное местечко?', 'restx' ); ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row allcity mb-5">
			<div class="col-md-12">
				<div class="maincards__grid pc-show">
					<?php $citylists = get_terms( array( 'taxonomy' => 'citylist', 'parent' => 0, 'hide_empty' => false ) );
					shuffle( $citylists );
					foreach ( array_slice($citylists, 0, 5) as $citylist ): ?>
					<div class="maincards__item">
						<a href="<?php echo get_term_link($citylist); ?>">
							<div class="maincards__item__card" style="background: url('<?php echo carbon_get_term_meta($citylist->term_id, 'crb_citylist_img' ); ?>')">
								<div class="maincards__item__card__title">
									<?php echo $citylist->name ?>
								</div>
							</div>
						</a>
					</div>
					<?php endforeach; ?>
				</div>
				<!-- MAINCARDS MOBILE VERSION -->
				<div class="mobile-show">
					<div class="allcity">
						<div class="maincards__grid">
							<?php $citylists = get_terms( array( 'taxonomy' => 'citylist', 'parent' => 0, 'hide_empty' => false ) );
							foreach ( array_slice($citylists, 0, 6) as $citylist ): ?>
							<div class="maincards__item">
								<a href="<?php echo get_term_link($citylist); ?>">
									<div class="maincards__item__card" style="background: url('<?php echo carbon_get_term_meta($citylist->term_id, 'crb_citylist_img' ); ?>')">
										<div class="maincards__item__card__title">
											<?php echo $citylist->name ?>
										</div>
									</div>
								</a>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="button-more text-center">
					<a href="<?php echo get_page_url('tpl_allcity') ?>">
						<div class="btn"><?php _e( 'Все города', 'restx' ); ?></div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>