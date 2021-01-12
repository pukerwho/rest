<a href="<?php the_permalink(); ?>">
	<div class="hotel-item mb-8">
		<div class="hotel-item__img p-relative mb-4">
			<img 
			src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" 
			srcset="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?> 920w,
							<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?> 1220w"
			alt="<?php the_title(); ?>">
		</div>
		<div class="hotel-item__city mb-2">
			<?php
				$myterms = wp_get_post_terms(  get_the_ID() , 'citylist', array( 'parent' => 0 ) );
				foreach ($myterms as $myterm): ?>
					<a href="<?php echo get_term_link($myterm) ?>"><span><?php echo $myterm->name; ?><span></a>
				<?php endforeach; ?>
		</div>
		<div class="hotel-item__title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</div>
		<div class="lead pt-3">
			
			<?php /* get_template_part('blocks/hotel-price'); */ ?>

			Цена: <span class="get_hotel_minprice"><?php echo rwmb_meta( 'meta-hotel-minprice' ); ?></span> — <span class="get_hotel_maxprice"><?php echo rwmb_meta( 'meta-hotel-maxprice' ); ?></span> грн 
		</div>
	</div>
</a>