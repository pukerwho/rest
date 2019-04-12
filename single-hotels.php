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
				<div class="single-hotel-cover-grid">
					<div class="single-hotel-cover-item">
						<div class="single-hotel-cover-subtitle mb-5">
							Відпочивай тут
						</div>
						<div class="address mb-4">
							<img src="<?php bloginfo('template_url') ?>/img/direction-sign.svg" width="30px" alt="">
							<?php echo rwmb_meta( 'meta-hotel-address' ); ?>
						</div>
						<div class="title">
							<?php the_title(); ?>
						</div>
					</div>
					<div class="single-hotel-cover-item">
						<div class="cover p-relative">
							<!-- <div class="cover-icon">
								<?php if(rwmb_meta( 'meta-hotel-mainrating' ) > 75): ?>
									<img src="<?php bloginfo('template_url'); ?>/img/sun.svg" alt="">
								<? elseif (rwmb_meta( 'meta-hotel-mainrating' ) > 50): ?>
									<img src="<?php bloginfo('template_url'); ?>/img/sun-cloud.svg" alt="">
								<? elseif (rwmb_meta( 'meta-hotel-mainrating' ) > 25): ?>
									<img src="<?php bloginfo('template_url'); ?>/img/cloud.svg" alt="">
								<? elseif (rwmb_meta( 'meta-hotel-mainrating' ) < 25): ?>
									<img src="<?php bloginfo('template_url'); ?>/img/rain.svg" alt="">
								<?php endif ?>
							</div> -->
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container my-5">
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
				<div class="tabs">
					<div class="tab-button-outer mb-5">
						<ul class="nav nav-tabs" id="singleHotelTabs" role="tablist">
						  <li class="nav-item">
						    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Главная</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="nomers-tab" data-toggle="tab" href="#nomers" role="tab" aria-controls="nomers" aria-selected="false">Номера</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Контакты</a>
						  </li>
						  <?php if(rwmb_meta( 'meta-hotel-sale' )): ?>
						  <li class="nav-item">
						    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#sale" role="tab" aria-controls="sale" aria-selected="false">Скидки</a>
						  </li>
						  <?php endif ?>
						  <?php if(rwmb_meta( 'meta-hotel-reviews' )): ?>
						  <li class="nav-item">
						    <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Обсуждение</a>
						  </li>
						  <?php endif ?>
						</ul>
					</div>
					
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
						  				<h3 class="mb-5">Удобства:</h3>
						  				<?php get_template_part( 'blocks/include', 'default' ); ?>
						  			</div>
						  			<div class="col-md-9">
						  				<div class="hotel-content mb-5">
						  					<?php the_content(); ?>	
						  				</div>
						  				<h3 class="text-uppercase mb-5">Фотографии территории:</h3>
						  				<div class="hotel-photos mb-5">
									  		<?php 
													$images = rwmb_meta( 'meta-hotel-photos', array( 'size' => 'large' ) );
													$title_img_territory = get_the_title();
													foreach ( $images as $image ) {
													    echo '<div class="hotel-photos__item"><a href="', $image['full_url'], '" data-lightbox="territory" data-title="', $title_img_territory,'"><img src="', $image['url'], '"></a></div>';
													} 
												?>
									  	</div>
									  	<div class="send-message">
									  		<img src="<?php bloginfo('template_url') ?>/img/send-message.svg" width="25px" alt="">
									  		<div>
									  			Сообщить о неточности
									  		</div>
									  	</div>
						  			</div>
						  		</div>
						  	</div>
					  	<?php endwhile; else: ?>
								<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
							<?php endif; ?>
					  </div>
					  <div class="tab-pane tab-single-hotel fade" id="nomers" role="tabpanel" aria-labelledby="nomers-tab">
					  	<div class="nomers">
					  		<div class="container p-0">
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
					  		
					  	</div>
					  </div>
					  <div class="tab-pane tab-single-hotel fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					  	<?php get_template_part( 'blocks/single-hotel-contact', 'default' ); ?>
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
	<div class="container pt-5">
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="my-table">
					<div class="my-table-cell pr-4">
						<img src="<?php bloginfo('template_url'); ?>/img/thumbs-up.svg" alt="" width="50px">
					</div>
					<div class="table-text">
						<h2>Другие предложения в этом городе</h2>
						<p>Возможно, вам больше подойдут эти варианты</p>
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
				$current_term = wp_get_post_terms(  get_the_ID() , 'citylist', array( 'parent' => 0 ) );
				$custom_query = new WP_Query( array( 
				'post_type' => 'hotels', 
				'posts_per_page' => 4,
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
							<div class="btn">Все предложения</div>	
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>