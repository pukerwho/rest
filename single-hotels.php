<?php get_header(); ?>

<div class="single-hotel">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="cover">
					<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">	
				</div>
			</div>
		</div>
	</div>
	<div class="container my-5">
		<div class="row pb-5">
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
						  <li class="nav-item">
						    <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Обсуждение</a>
						  </li>
						</ul>
					</div>
					
					<div class="tab-content" id="myTabContent">
					  <div class="tab-pane tab-single-hotel fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					  	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						  	<div class="hotel-main">
						  		<div class="row">
						  			<div class="col-md-3">
						  				<h3 class="mb-5">Рейтинги</h3>
						  				<div class="mb-5">
						  					<h4>Общий:</h4>
						  					<div class="hotel-rating">
						  						<div class="hotel-rating-bar" style="width: <?php echo rwmb_meta( 'meta-hotel-mainrating' ); ?>%">
						  							<span><?php echo rwmb_meta( 'meta-hotel-mainrating' ); ?>%</span>
						  						</div>
						  					</div>
						  				</div>
						  				<h3 class="mb-5">Удобства:</h3>
						  				<?php get_template_part( 'blocks/include', 'default' ); ?>
						  			</div>
						  			<div class="col-md-9">
						  				<div class="hotel-content mb-5">
						  					<?php the_content(); ?>	
						  				</div>
						  				<h3 class="text-uppercase mb-5">Фотографии территории:</h3>
						  				<div class="hotel-photos">
									  		<?php 
													$images = rwmb_meta( 'meta-hotel-photos', array( 'size' => 'large' ) );
													$title_img = get_the_title();
													foreach ( $images as $image ) {
													    echo '<div class="hotel-photos__item"><a href="', $image['full_url'], '" data-lightbox="', $title_img,'" data-title="', $title_img,'"><img src="', $image['url'], '"></a></div>';
													} 
												?>
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
					  		<div class="nomers-item mb-5 pb-5">
					  			<h2 class="mb-4 pb-3">Номера "Люкс"</h2>
					  			<h3 class="mb-5">Стоимость: <?php echo rwmb_meta( 'meta-hotel-lux-price' ); ?></h3> 
					  			<div class="hotel-photos mb-5">
							  		<?php 
											$images = rwmb_meta( 'meta-hotel-lux-photos', array( 'size' => 'large' ) );
											$title_img = get_the_title();
											foreach ( $images as $image ) {
											    echo '<div class="hotel-photos__item"><a href="', $image['full_url'], '" data-lightbox="', $title_img,'" data-title="', $title_img,'"><img src="', $image['url'], '"></a></div>';
											} 
										?>
							  	</div>
							  	<h3 class="mb-5">Удобства:</h3>
							  	<div class="include-grid">
							  		<?php get_template_part( 'blocks/includelux', 'default' ); ?>
							  	</div>
					  		</div>
					  		<div class="nomers-item mb-5 pb-5">
					  			<h2 class="mb-4 pb-3">Номера "Полулюкс"</h2>
					  			<h3 class="mb-5">Стоимость: <?php echo rwmb_meta( 'meta-hotel-halflux-price' ); ?></h3> 
					  			<div class="hotel-photos">
							  		<?php 
											$images = rwmb_meta( 'meta-hotel-halflux-photos', array( 'size' => 'large' ) );
											$title_img = get_the_title();
											foreach ( $images as $image ) {
											    echo '<div class="hotel-photos__item"><a href="', $image['full_url'], '" data-lightbox="', $title_img,'" data-title="', $title_img,'"><img src="', $image['url'], '"></a></div>';
											} 
										?>
							  	</div>
					  		</div>
					  		<div class="nomers-item mb-5 pb-5">
					  			<h2 class="mb-4 pb-3">Бюджетные номера</h2>
					  			<h3 class="mb-5">Стоимость: <?php echo rwmb_meta( 'meta-hotel-budget-price' ); ?></h3> 
					  			<div class="hotel-photos">
							  		<?php 
											$images = rwmb_meta( 'meta-hotel-budget-photos', array( 'size' => 'large' ) );
											$title_img = get_the_title();
											foreach ( $images as $image ) {
											    echo '<div class="hotel-photos__item"><a href="', $image['full_url'], '" data-lightbox="', $title_img,'" data-title="', $title_img,'"><img src="', $image['url'], '"></a></div>';
											} 
										?>
							  	</div>
					  		</div>
					  	</div>
					  </div>
					  <div class="tab-pane tab-single-hotel fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					  	Контакты
					  </div>
					  <div class="tab-pane tab-single-hotel fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
					  	Обсуждение
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>