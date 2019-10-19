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
						<?php if(rwmb_meta( 'meta-hotel-phones' )): ?>
						<div class="mb-5">
							<div class="d-flex align-items-center mb-4">
								<img src="<?php bloginfo('template_url'); ?>/img/phone-call.svg" alt="" width="25px" class="mr-3">
								<h4><?php _e( 'Телефоны', 'restx' ); ?>:</h4>
							</div>
							<div class="contact-grid">
								<?php
									$metaphones = rwmb_meta( 'meta-hotel-phones' );
									foreach ( $metaphones as $metaphone ): ?>
									<div class="lead">
										<a href="tel:<?php echo $metaphone ?>"><?php echo $metaphone ?></a>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endif ?>

						<?php if(rwmb_meta( 'meta-hotel-viber' )): ?>
						<div class="mb-5">
							<div class="d-flex align-items-center mb-4">
								<img src="<?php bloginfo('template_url'); ?>/img/viber.svg" alt="" width="25px" class="mr-3">
								<h4>Viber:</h4>
							</div>
							<div class="contact-grid">
								<?php
									$metaviber = rwmb_meta( 'meta-hotel-viber' );
									foreach ( $metaviber as $metav ): ?>
									<div class="lead">
										<a href="viber://chat?number=<?php echo $metav ?>"><?php echo $metav ?></a>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endif ?>

						<?php if(rwmb_meta( 'meta-hotel-whatsapp' )): ?>
						<div class="mb-5">
							<div class="d-flex align-items-center mb-4">
								<img src="<?php bloginfo('template_url'); ?>/img/whatsapp.svg" alt="" width="25px" class="mr-3">
								<h4>Whatsapp:</h4>
							</div>
							<div class="contact-grid">
								<?php
									$metawhatsapp = rwmb_meta( 'meta-hotel-whatsapp' );
									foreach ( $metawhatsapp as $metawh ): ?>
									<div class="lead">
										<a href="https://api.whatsapp.com/send?phone=<?php echo $metawh ?>"><?php echo $metawh ?></a>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endif ?>

						<?php if(rwmb_meta( 'meta-hotel-telegram' )): ?>
						<div class="mb-5">
							<div class="d-flex align-items-center mb-4">
								<img src="<?php bloginfo('template_url'); ?>/img/telegram.svg" alt="" width="25px" class="mr-3">
								<h4>Telegram:</h4>
							</div>
							<div class="contact-grid">
								<?php
									$metatelegram = rwmb_meta( 'meta-hotel-telegram' );
									foreach ( $metatelegram as $metat ): ?>
									<div class="lead">
										<a href="tg://resolve?domain=<?php echo $metat ?>"><?php echo $metat ?></a>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endif ?>
						<!-- <div class="single-hotel-collections">
							<?php 
								$terms = get_the_terms( $post->ID, 'collections' );
								foreach($terms as $term): ?>
								  <a href="/collections/<?php echo $term->slug ?>"><?php echo $term->name; ?></a>
							<?php endforeach; ?>
						</div> -->
					</div>
				</div>
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
								<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
							</div>
							<div class="right">
								<div class="p-relative" style="margin-bottom: 20px">
									<?php 
										$images = rwmb_meta( 'meta-hotel-photos', array( 'size' => 'large' ) );
										$title_img_territory = get_the_title();
										foreach ( $images as $image ) {
										    echo '<div class="hotel-photos__item"><a href="', $image['full_url'], '" data-lightbox="territory" data-title="', $title_img_territory,'"><div class="hotel-photos__item-bg"></div><div class="hotel-photos__item-title">Фото территории</div><img src="', $image['url'], '"></a></div>';
										} 
									?>
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
						<div class="hotel-content mb-5">
							<h3 class="mb-5"><?php _e( 'Описание', 'restx' ); ?></h3>
	  					<?php the_content(); ?>	
	  				</div>
	  				<h3 class="mb-5"><?php _e( 'Удобства:', 'restx' ); ?></h3>
	  				<?php get_template_part( 'blocks/include', 'default' ); ?>
	  				<div class="nomers d-flex flex-column">
	  					<h3 class="mb-5"><?php _e( 'Номера (кликните, чтобы посмотреть всю информацию', 'restx' ); ?></h3>
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
				  		</div>
			  		</div>
			  		<div>
			  			<h3 class="mb-5"><?php _e( 'Скидки', 'restx' ); ?></h3>
			  			<div class="mb-5">
					  		<?php if(rwmb_meta( 'meta-hotel-sale' )): ?>
							  	<?php echo rwmb_meta( 'meta-hotel-sale-text' ); ?>
							  <?php endif ?>	
						  </div>
			  		</div>
					  <div>
					  	<h3 class="mb-5"><?php _e( 'Обсуждение', 'restx' ); ?></h3>
					  	<div class="mb-5">
					  		<?php comments_template(); ?> 		
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
			</div>
		</div>
	</div>
	<div class="container-fluid my-5">
		<div class="row single-hotel-mobile-info pb-5">
			<div class="col-md-12">
				<div class="title">
					<?php the_title(); ?>
				</div>
				<div class="address">
					<?php echo rwmb_meta( 'meta-hotel-address' ); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				
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
				foreach ($current_term as $myterm); {
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
						foreach ($current_term as $myterm): ?>
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
					<a href="<?php echo get_permalink( get_page_by_path( 'allcity' ) ); ?>">
					<div class="btn"><?php _e( 'Все города', 'restx' ); ?></div>
				</a>
				</div>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>