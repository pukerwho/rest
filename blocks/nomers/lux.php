<!-- Определяем первую фотку -->
<?php 
	$images_lux = rwmb_meta( 'meta-hotel-lux-photos', array( 'size' => 'large', 'limit' => 1 ) );
	$image_lux = reset( $images_lux );
?>

<div class="col-md-4 mb-5">
	<div class="nomer" style="background: url('<?php echo $image_lux['url']; ?>'); background-size: cover; background-repeat: no-repeat;" data-nomer="lux">
		<div class="nomer__title">
			<?php _e( 'Номера Люкс', 'restx' ); ?>
			<br>
			<span><?php _e( 'Цена', 'restx' ); ?>: <?php echo rwmb_meta( 'meta-hotel-lux-minprice_nesezon' ); ?> — <?php echo rwmb_meta( 'meta-hotel-lux-maxprice_sezon' ); ?> грн</span>
			<br>
			<?php if (rwmb_meta('meta-hotel-lux-nomers-qty')): ?>
				<span>Кол-во мест: <?php echo rwmb_meta('meta-hotel-lux-nomers-qty'); ?></span>
			<?php else: ?>
				<span class="nomer__qty">
					<?php if(rwmb_meta( 'meta-hotel-lux-hasone' )): ?>
					<span>1</span>
					<?php endif ?>
					<?php if(rwmb_meta( 'meta-hotel-lux-hastwo' )): ?>
					<span>2</span>
					<?php endif ?>
					<?php if(rwmb_meta( 'meta-hotel-lux-hasthree' )): ?>
					<span>3</span>
					<?php endif ?>
					<?php if(rwmb_meta( 'meta-hotel-lux-hasfour' )): ?>
					<span>4</span>
					<?php endif ?>
					<?php if(rwmb_meta( 'meta-hotel-lux-hasfive' )): ?>
					<span>5</span>
					<?php endif ?>
					<?php if(rwmb_meta( 'meta-hotel-lux-hassix' )): ?>
					<span>6</span>
					<?php endif ?>
					<?php if(rwmb_meta( 'meta-hotel-lux-hasseven' )): ?>
					<span>7</span>
					<?php endif ?>
					<?php _e( 'местные', 'restx' ); ?>
				</span>
			<?php endif; ?>
		</div>
	</div>
</div>

<div class="nomer-modal nomer-modal-lux">
	<div class="nomer-modal__header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="nomer-modal__back" data-nomer="lux">
						<svg viewBox="0 0 18 18" role="img" aria-label="Назад" focusable="false" style="height: 22px; width: 22px; display: block; fill: rgb(72, 72, 72); float: left; margin-right: 2rem;"><path d="m13.7 16.29a1 1 0 1 1 -1.42 1.41l-8-8a1 1 0 0 1 0-1.41l8-8a1 1 0 1 1 1.42 1.41l-7.29 7.29z" fill-rule="evenodd"></path></svg>
						Назад
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="nomer-modal__content">
		<div class="container py-5">
			<div class="row">
				<div class="col-md-12">
					<h2 class="mb-4 pb-3">
	  				<?php _e( 'Номера Люкс', 'restx' ); ?>
	  				<span class="nomers-item__small">
	  					<?php if (rwmb_meta('meta-hotel-lux-nomers-qty')): ?>
								<span>Кол-во мест: <?php echo rwmb_meta('meta-hotel-lux-nomers-qty'); ?></span>
							<?php else: ?>
			  				(
			  				<?php if(rwmb_meta( 'meta-hotel-lux-hasone' )): ?>
			  				<span>1 <?php _e( 'местный', 'restx' ); ?></span>
			  				<?php endif ?>
			  				<?php if(rwmb_meta( 'meta-hotel-lux-hastwo' )): ?>
			  				<span>2-х <?php _e( 'местные', 'restx' ); ?></span>
			  				<?php endif ?>
			  				<?php if(rwmb_meta( 'meta-hotel-lux-hasthree' )): ?>
			  				<span>3-х <?php _e( 'местные', 'restx' ); ?></span>
			  				<?php endif ?>
			  				<?php if(rwmb_meta( 'meta-hotel-lux-hasfour' )): ?>
			  				<span>4-х <?php _e( 'местные', 'restx' ); ?></span>
			  				<?php endif ?>
			  				<?php if(rwmb_meta( 'meta-hotel-lux-hasfive' )): ?>
			  				<span>5-ти <?php _e( 'местные', 'restx' ); ?></span>
			  				<?php endif ?>
			  				<?php if(rwmb_meta( 'meta-hotel-lux-hassix' )): ?>
			  				<span>6-ти <?php _e( 'местные', 'restx' ); ?></span>
			  				<?php endif ?>
			  				<?php if(rwmb_meta( 'meta-hotel-lux-hasseven' )): ?>
			  				<span>7-ми <?php _e( 'местные', 'restx' ); ?></span>
			  				<?php endif ?>
			  				)
			  			<?php endif; ?>
	  				</span>
	  			</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3 class="mb-5"><?php _e( 'Цены', 'restx' ); ?></h3>
				</div>
			</div>
			<div class="nomer-price mb-5">
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="nomer-price__item">
							<div class="nomer-price__column" style="height: calc((<?php echo rwmb_meta( 'meta-hotel-lux-minprice_nesezon' ); ?>/<?php echo rwmb_meta( 'meta-hotel-lux-maxprice_sezon' ); ?>)*100%);">
								<div class="nomer-price__number">
									<span>
										<?php echo rwmb_meta( 'meta-hotel-lux-minprice_nesezon' ); ?>	грн.
									</span>
								</div>
							</div>
							<div class="nomer-price__text">
								<?php _e( 'Минимальная цена не в сезон', 'restx' ); ?>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="nomer-price__item">
							<div class="nomer-price__column" style="height: calc((<?php echo rwmb_meta( 'meta-hotel-lux-maxprice_nesezon' ); ?>/<?php echo rwmb_meta( 'meta-hotel-lux-maxprice_sezon' ); ?>)*100%);">
								<div class="nomer-price__number">
									<span>
										<?php echo rwmb_meta( 'meta-hotel-lux-maxprice_nesezon' ); ?>	грн.
									</span>
								</div>
							</div>
							<div class="nomer-price__text">
								<?php _e( 'Максимальная цена не в сезон', 'restx' ); ?>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="nomer-price__item">
							<div class="nomer-price__column" style="height: calc((<?php echo rwmb_meta( 'meta-hotel-lux-minprice_sezon' ); ?>/<?php echo rwmb_meta( 'meta-hotel-lux-maxprice_sezon' ); ?>)*100%);">
								<div class="nomer-price__number">
									<span>
										<?php echo rwmb_meta( 'meta-hotel-lux-minprice_sezon' ); ?>	грн.
									</span>
								</div>
							</div>
							<div class="nomer-price__text">
								<?php _e( 'Минимальная цена в сезон', 'restx' ); ?>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="nomer-price__item">
							<div class="nomer-price__column" style="height: 100%;">
								<div class="nomer-price__number">
									<span>
										<?php echo rwmb_meta( 'meta-hotel-lux-maxprice_sezon' ); ?>	грн.
									</span>
								</div>
							</div>
							<div class="nomer-price__text">
								<?php _e( 'Максимальная цена в сезон', 'restx' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3 class="mb-5"><?php _e( 'Удобства:', 'restx' ); ?></h3>
			  	<div class="include-grid">
			  		<?php get_template_part( 'blocks/include/includelux', 'default' ); ?>
			  	</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3 class="mb-5"><?php _e( 'Фотографии:', 'restx' ); ?></h3>
					<div class="hotel-photos mb-5">
			  		<?php 
							$images_lux_list = rwmb_meta( 'meta-hotel-lux-photos', array( 'size' => 'large' ) );
							$title_img = get_the_title();
							foreach ( $images_lux_list as $image ) {
							    echo '<div class="hotel-photos__item"><a href="', $image['full_url'], '" data-lightbox="lux-photos" data-title="', $title_img,'"><img src="', $image['url'], '"></a></div>';
							} 
						?>
			  	</div>
				</div>
			</div>
		</div>
	</div>
</div>