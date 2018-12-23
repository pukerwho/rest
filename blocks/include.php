<div class="include">
	<!-- begin Wi-fi -->
	<?php if(rwmb_meta( 'meta-hotel-wifi' )): ?>
	<div class="d-flex align-items-center mb-4">
		<img src="<?php bloginfo('template_url'); ?>/img/wifi.svg" alt="" width="45px" class="mr-3">
		<h4>Wi-Fi</h4>
	</div>
	<?php endif ?>
	<!-- end  -->
	<!-- begin parkovka -->
	<?php if(rwmb_meta( 'meta-hotel-parking' )): ?>
	<div class="d-flex align-items-center mb-4">
		<img src="<?php bloginfo('template_url'); ?>/img/parking.svg" alt="" width="45px" class="mr-3">
		<h4>Парковка</h4>
	</div>
	<?php endif ?>
	<!-- end parkovka -->
	<!-- begin detskay-ploshadka -->
	<?php if(rwmb_meta( 'meta-hotel-playground' )): ?>
	<div class="d-flex align-items-center mb-4">
		<img src="<?php bloginfo('template_url'); ?>/img/playground.svg" alt="" width="45px" class="mr-3">
		<h4>Детская площадка</h4>
	</div>
	<?php endif ?>
	<!-- end detskay-ploshadka -->
	<!-- begin basseyn -->
	<?php if(rwmb_meta( 'meta-hotel-pool' )): ?>
	<div class="d-flex align-items-center mb-4">
		<img src="<?php bloginfo('template_url'); ?>/img/pool.svg" alt="" width="45px" class="mr-3">
		<h4>Бассейн</h4>
	</div>
	<?php endif ?>
	<!-- end basseyn -->
	<!-- begin transfer -->
	<?php if(rwmb_meta( 'meta-hotel-transfer' )): ?>
	<div class="d-flex align-items-center mb-4">
		<img src="<?php bloginfo('template_url'); ?>/img/transfer.svg" alt="" width="45px" class="mr-3">
		<h4>Трансфер</h4>
	</div>
	<?php endif ?>
	<!-- end transfer -->
</div>