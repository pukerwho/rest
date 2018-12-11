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
						    <a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false">Фотографии</a>
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
						  				<div>
						  					<h4>Общий:</h4>
						  					<div class="hotel-rating">
						  						<div class="hotel-rating-bar" style="width: <?php echo rwmb_meta( 'meta-hotel-mainrating' ); ?>%">
						  							<span><?php echo rwmb_meta( 'meta-hotel-mainrating' ); ?>%</span>
						  						</div>
						  					</div>
						  				</div>
						  			</div>
						  			<div class="col-md-9">
						  				<?php the_content(); ?>
						  			</div>
						  		</div>
						  	</div>
					  	<?php endwhile; else: ?>
								<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
							<?php endif; ?>
					  </div>
					  <div class="tab-pane tab-single-hotel fade" id="photos" role="tabpanel" aria-labelledby="photos-tab">
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