<!-- Определяем первую фотку -->
<?php 
	$images_camping = rwmb_meta( 'meta-hotel-camping-photos', array( 'size' => 'large', 'limit' => 1 ) );
	$image_camping = reset( $images_camping );
?>

<div class="col-md-4 mb-5">
	<div class="nomer" style="background: url('<?php echo $image_camping['url']; ?>'); background-size: cover; background-repeat: no-repeat;" data-nomer="camping">
		<div class="nomer__title">
			Кемпинг
			<br>
			<span>Цена: <?php echo rwmb_meta( 'meta-hotel-camping-minprice_nesezon' ); ?> — <?php echo rwmb_meta( 'meta-hotel-camping-maxprice_sezon' ); ?> грн</span>
			<br>
			<span class="nomer__qty">
				<?php if(rwmb_meta( 'meta-hotel-camping-hasone' )): ?>
				<span>1</span>
				<?php endif ?>
				<?php if(rwmb_meta( 'meta-hotel-camping-hastwo' )): ?>
				<span>2</span>
				<?php endif ?>
				<?php if(rwmb_meta( 'meta-hotel-camping-hasthree' )): ?>
				<span>3</span>
				<?php endif ?>
				<?php if(rwmb_meta( 'meta-hotel-camping-hasfour' )): ?>
				<span>4</span>
				<?php endif ?>
				<?php if(rwmb_meta( 'meta-hotel-camping-hasfive' )): ?>
				<span>5</span>
				<?php endif ?>
				<?php if(rwmb_meta( 'meta-hotel-camping-hassix' )): ?>
				<span>6</span>
				<?php endif ?>
				<?php if(rwmb_meta( 'meta-hotel-camping-hasseven' )): ?>
				<span>7</span>
				<?php endif ?>
				местные
			</span>
		</div>
	</div>
</div>

<div class="nomer-modal nomer-modal-camping">
	<div class="nomer-modal__header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="nomer-modal__back" data-nomer="camping">
						<svg viewBox="0 0 18 18" role="img" aria-label="Назад" focusable="false" style="height: 22px; width: 22px; display: block; fill: rgb(72, 72, 72); float: left; margin-right: 2rem;"><path d="m13.7 16.29a1 1 0 1 1 -1.42 1.41l-8-8a1 1 0 0 1 0-1.41l8-8a1 1 0 1 1 1.42 1.41l-7.29 7.29z" fill-rule="evenodd"></path></svg>
						Назад
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="nober-modal__content">
		<div class="container py-5">
			<div class="row">
				<div class="col-md-12">
					<h2 class="mb-4 pb-3">
	  				Кемпинг
	  				<span class="nomers-item__small">
		  				(
		  				<?php if(rwmb_meta( 'meta-hotel-camping-hasone' )): ?>
		  				<span>1 местный</span>
		  				<?php endif ?>
		  				<?php if(rwmb_meta( 'meta-hotel-camping-hastwo' )): ?>
		  				<span>2-х местные</span>
		  				<?php endif ?>
		  				<?php if(rwmb_meta( 'meta-hotel-camping-hasthree' )): ?>
		  				<span>3-х местные</span>
		  				<?php endif ?>
		  				<?php if(rwmb_meta( 'meta-hotel-camping-hasfour' )): ?>
		  				<span>4-х местные</span>
		  				<?php endif ?>
		  				<?php if(rwmb_meta( 'meta-hotel-camping-hasfive' )): ?>
		  				<span>5-ти местные</span>
		  				<?php endif ?>
		  				<?php if(rwmb_meta( 'meta-hotel-camping-hassix' )): ?>
		  				<span>6-ти местные</span>
		  				<?php endif ?>
		  				<?php if(rwmb_meta( 'meta-hotel-camping-hasseven' )): ?>
		  				<span>7-ми местные</span>
		  				<?php endif ?>
		  				)
	  				</span>
	  			</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3 class="mb-5">Цены</h3>
				</div>
			</div>
			<div class="nomer-price mb-5">
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="nomer-price__item">
							<div class="nomer-price__column" style="height: calc((<?php echo rwmb_meta( 'meta-hotel-camping-minprice_nesezon' ); ?>/<?php echo rwmb_meta( 'meta-hotel-camping-maxprice_sezon' ); ?>)*100%);">
								<div class="nomer-price__number">
									<span>
										<?php echo rwmb_meta( 'meta-hotel-camping-minprice_nesezon' ); ?>	грн.
									</span>
								</div>
							</div>
							<div class="nomer-price__text">
								Минимальная цена не в сезон
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="nomer-price__item">
							<div class="nomer-price__column" style="height: calc((<?php echo rwmb_meta( 'meta-hotel-camping-maxprice_nesezon' ); ?>/<?php echo rwmb_meta( 'meta-hotel-camping-maxprice_sezon' ); ?>)*100%);">
								<div class="nomer-price__number">
									<span>
										<?php echo rwmb_meta( 'meta-hotel-camping-maxprice_nesezon' ); ?>	грн.
									</span>
								</div>
							</div>
							<div class="nomer-price__text">
								Максимальная цена не в сезон
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="nomer-price__item">
							<div class="nomer-price__column" style="height: calc((<?php echo rwmb_meta( 'meta-hotel-camping-minprice_sezon' ); ?>/<?php echo rwmb_meta( 'meta-hotel-camping-maxprice_sezon' ); ?>)*100%);">
								<div class="nomer-price__number">
									<span>
										<?php echo rwmb_meta( 'meta-hotel-camping-minprice_sezon' ); ?>	грн.
									</span>
								</div>
							</div>
							<div class="nomer-price__text">
								Минимальная цена в сезон
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="nomer-price__item">
							<div class="nomer-price__column" style="height: 100%;">
								<div class="nomer-price__number">
									<span>
										<?php echo rwmb_meta( 'meta-hotel-camping-maxprice_sezon' ); ?>	грн.
									</span>
								</div>
							</div>
							<div class="nomer-price__text">
								Максимальная цена в сезон
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3 class="mb-5">Удобства:</h3>
			  	<div class="include-grid">
			  		<?php get_template_part( 'blocks/include/includecamping', 'default' ); ?>
			  	</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3 class="mb-5">Фотографии:</h3>
					<div class="hotel-photos mb-5">
			  		<?php 
							$images_camping_list = rwmb_meta( 'meta-hotel-camping-photos', array( 'size' => 'large' ) );
							$title_img = get_the_title();
							foreach ( $images_camping_list as $image ) {
							    echo '<div class="hotel-photos__item"><a href="', $image['full_url'], '" data-lightbox="camping-photos" data-title="', $title_img,'"><img src="', $image['url'], '"></a></div>';
							} 
						?>
			  	</div>
				</div>
			</div>
		</div>
	</div>
</div>