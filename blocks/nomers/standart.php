<!-- Определяем первую фотку -->
<?php 
	$images_standart = rwmb_meta( 'meta-hotel-standart-photos', array( 'size' => 'large', 'limit' => 1 ) );
	$image_standart = reset( $images_standart );
?>

<div class="col-md-4 mb-5">
	<div class="nomer" style="background: url('<?php echo $image_standart['url']; ?>'); background-size: cover; background-repeat: no-repeat;" data-nomer="standart">
		<div class="nomer__title">
			<?php _e( 'Номера Стандарт', 'restx' ); ?>
			<br>
			<span><?php _e( 'Цена', 'restx' ); ?>: <?php echo rwmb_meta( 'meta-hotel-standart-minprice_nesezon' ); ?> — <?php echo rwmb_meta( 'meta-hotel-standart-maxprice_sezon' ); ?> грн</span>
			<br>
			<span class="nomer__qty">
				<?php if(rwmb_meta( 'meta-hotel-standart-hasone' )): ?>
				<span>1</span>
				<?php endif ?>
				<?php if(rwmb_meta( 'meta-hotel-standart-hastwo' )): ?>
				<span>2</span>
				<?php endif ?>
				<?php if(rwmb_meta( 'meta-hotel-standart-hasthree' )): ?>
				<span>3</span>
				<?php endif ?>
				<?php if(rwmb_meta( 'meta-hotel-standart-hasfour' )): ?>
				<span>4</span>
				<?php endif ?>
				<?php if(rwmb_meta( 'meta-hotel-standart-hasfive' )): ?>
				<span>5</span>
				<?php endif ?>
				<?php if(rwmb_meta( 'meta-hotel-standart-hassix' )): ?>
				<span>6</span>
				<?php endif ?>
				<?php if(rwmb_meta( 'meta-hotel-standart-hasseven' )): ?>
				<span>7</span>
				<?php endif ?>
				<?php _e( 'местные', 'restx' ); ?>
			</span>
		</div>
	</div>
</div>

<div class="nomer-modal nomer-modal-standart">
	<div class="nomer-modal__header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="nomer-modal__back" data-nomer="standart">
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
	  				<?php _e( 'Стандартный номер', 'restx' ); ?>
	  				<span class="nomers-item__small">
		  				(
		  				<?php if(rwmb_meta( 'meta-hotel-standart-hasone' )): ?>
		  				<span>1 <?php _e( 'местный', 'restx' ); ?></span>
		  				<?php endif ?>
		  				<?php if(rwmb_meta( 'meta-hotel-standart-hastwo' )): ?>
		  				<span>2-х <?php _e( 'местные', 'restx' ); ?></span>
		  				<?php endif ?>
		  				<?php if(rwmb_meta( 'meta-hotel-standart-hasthree' )): ?>
		  				<span>3-х <?php _e( 'местные', 'restx' ); ?></span>
		  				<?php endif ?>
		  				<?php if(rwmb_meta( 'meta-hotel-standart-hasfour' )): ?>
		  				<span>4-х <?php _e( 'местные', 'restx' ); ?></span>
		  				<?php endif ?>
		  				<?php if(rwmb_meta( 'meta-hotel-standart-hasfive' )): ?>
		  				<span>5-ти <?php _e( 'местные', 'restx' ); ?></span>
		  				<?php endif ?>
		  				<?php if(rwmb_meta( 'meta-hotel-standart-hassix' )): ?>
		  				<span>6-ти <?php _e( 'местные', 'restx' ); ?></span>
		  				<?php endif ?>
		  				<?php if(rwmb_meta( 'meta-hotel-standart-hasseven' )): ?>
		  				<span>7-ми <?php _e( 'местные', 'restx' ); ?></span>
		  				<?php endif ?>
		  				)
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
							<div class="nomer-price__column" style="height: calc((<?php echo rwmb_meta( 'meta-hotel-standart-minprice_nesezon' ); ?>/<?php echo rwmb_meta( 'meta-hotel-standart-maxprice_sezon' ); ?>)*100%);">
								<div class="nomer-price__number">
									<span>
										<?php echo rwmb_meta( 'meta-hotel-standart-minprice_nesezon' ); ?>	грн.
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
							<div class="nomer-price__column" style="height: calc((<?php echo rwmb_meta( 'meta-hotel-standart-maxprice_nesezon' ); ?>/<?php echo rwmb_meta( 'meta-hotel-standart-maxprice_sezon' ); ?>)*100%);">
								<div class="nomer-price__number">
									<span>
										<?php echo rwmb_meta( 'meta-hotel-standart-maxprice_nesezon' ); ?>	грн.
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
							<div class="nomer-price__column" style="height: calc((<?php echo rwmb_meta( 'meta-hotel-standart-minprice_sezon' ); ?>/<?php echo rwmb_meta( 'meta-hotel-standart-maxprice_sezon' ); ?>)*100%);">
								<div class="nomer-price__number">
									<span>
										<?php echo rwmb_meta( 'meta-hotel-standart-minprice_sezon' ); ?>	грн.
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
										<?php echo rwmb_meta( 'meta-hotel-standart-maxprice_sezon' ); ?>	грн.
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
			  		<?php get_template_part( 'blocks/include/includestandart', 'default' ); ?>
			  	</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3 class="mb-5"><?php _e( 'Фотографии:', 'restx' ); ?></h3>
					<div class="hotel-photos mb-5">
			  		<?php 
							$images_standart_list = rwmb_meta( 'meta-hotel-standart-photos', array( 'size' => 'large' ) );
							$title_img = get_the_title();
							foreach ( $images_standart_list as $image ) {
							    echo '<div class="hotel-photos__item"><a href="', $image['full_url'], '" data-lightbox="standart-photos" data-title="', $title_img,'"><img src="', $image['url'], '"></a></div>';
							} 
						?>
			  	</div>
				</div>
			</div>
		</div>
	</div>
</div>