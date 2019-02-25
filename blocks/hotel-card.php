<a href="<?php the_permalink(); ?>">
	<div class="hotel-item mb-5">
		<div class="hotel-item__img p-relative mb-4">
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
			<div class="swiper-container hotel-item-swiper">
				<div class="swiper-wrapper">
					<?php 
						$images = rwmb_meta( 'meta-hotel-photos', array( 'size' => 'large' ) );
						$title_img_territory = get_the_title();
						foreach ( $images as $image ) {
						    echo '<div class="swiper-slide"><img src="', $image['url'], '"></div>';
						} 
					?>
				</div>
				<div class="hotel-item__img-navigation">
					<div class="hotel-item__img-leftbg"></div>
					<div class="hotel-item__img-rightbg"></div>	
				</div>
				<div class="swiper-button-next swiper-hotelcard-button-next"></div>
		    <div class="swiper-button-prev swiper-hotelcard-button-prev"></div>
			</div>
			<!-- <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""> -->
			<div class="hotel-item__img__city">
				<div class="hotel-item__img__city__link">
					<?php
					$myterms = wp_get_post_terms(  get_the_ID() , 'citylist', array( 'parent' => 0 ) );
					foreach ($myterms as $myterm): ?>
						<a href="<?php echo get_term_link($myterm) ?>"><img src="<?php bloginfo('template_url'); ?>/img/pin.svg" alt="" class="hotel-item__icon mr-2"><span><?php echo $myterm->name; ?><span></a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="hotel-item__title">
			<a href="<?php the_permalink(); ?>" class="pb-3"><?php the_title(); ?></a>
		</div>
		<div class="lead pt-3">
			
			<?php get_template_part('blocks/hotel-price'); ?>

			<!-- Цена: <?php echo rwmb_meta( 'meta-hotel-minprice' ); ?> — <?php echo rwmb_meta( 'meta-hotel-maxprice' ); ?> грн -->
		</div>
	</div>
</a>