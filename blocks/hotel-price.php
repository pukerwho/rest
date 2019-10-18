<!-- Минимальная цена -->
<?php if(rwmb_meta( 'meta-hotel-budget-minprice_nesezon' )): ?>
	<?php $budget_min_nezon = rwmb_meta( 'meta-hotel-budget-minprice_nesezon' ) ?>
<? else: ?>
		<?php $budget_min_nezon = 10000000 ?>
<?php endif ?>
<?php if(rwmb_meta( 'meta-hotel-camping-minprice_nesezon' )): ?>
	<?php $camping_min_nezon = rwmb_meta( 'meta-hotel-camping-minprice_nesezon' ) ?>
<? else: ?>
		<?php $camping_min_nezon = 10000000 ?>
<?php endif ?>
<?php if(rwmb_meta( 'meta-hotel-halflux-minprice_nesezon' )): ?>
	<?php $halflux_min_nezon = rwmb_meta( 'meta-hotel-halflux-minprice_nesezon' ) ?>
<? else: ?>
		<?php $halflux_min_nezon = 10000000 ?>
<?php endif ?>
<?php if(rwmb_meta( 'meta-hotel-kottedg-minprice_nesezon' )): ?>
	<?php $kottedg_min_nezon = rwmb_meta( 'meta-hotel-kottedg-minprice_nesezon' ) ?>
<? else: ?>
		<?php $kottedg_min_nezon = 10000000 ?>
<?php endif ?>
<?php if(rwmb_meta( 'meta-hotel-lux-minprice_nesezon' )): ?>
	<?php $lux_min_nezon = rwmb_meta( 'meta-hotel-lux-minprice_nesezon' ) ?>
<? else: ?>
		<?php $lux_min_nezon = 10000000 ?>
<?php endif ?>
<?php if(rwmb_meta( 'meta-hotel-standart-minprice_nesezon' )): ?>
	<?php $standart_min_nezon = rwmb_meta( 'meta-hotel-standart-minprice_nesezon' ) ?>
<? else: ?>
		<?php $standart_min_nezon = 10000000 ?>
<?php endif ?>

<!-- Максимальная цена -->
<?php if(rwmb_meta( 'meta-hotel-budget-maxprice_sezon' )): ?>
	<?php $budget_max_sezon = rwmb_meta( 'meta-hotel-budget-maxprice_sezon' ) ?>
<? else: ?>
		<?php $budget_max_sezon = 1 ?>
<?php endif ?>
<?php if(rwmb_meta( 'meta-hotel-camping-maxprice_sezon' )): ?>
	<?php $camping_max_sezon = rwmb_meta( 'meta-hotel-camping-maxprice_sezon' ) ?>
<? else: ?>
		<?php $camping_max_sezon = 1 ?>
<?php endif ?>
<?php if(rwmb_meta( 'meta-hotel-halflux-maxprice_sezon' )): ?>
	<?php $halflux_max_sezon = rwmb_meta( 'meta-hotel-halflux-maxprice_sezon' ) ?>
<? else: ?>
		<?php $halflux_max_sezon = 1 ?>
<?php endif ?>
<?php if(rwmb_meta( 'meta-hotel-kottedg-maxprice_sezon' )): ?>
	<?php $kottedg_max_sezon = rwmb_meta( 'meta-hotel-kottedg-maxprice_sezon' ) ?>
<? else: ?>
		<?php $kottedg_max_sezon = 1 ?>
<?php endif ?>
<?php if(rwmb_meta( 'meta-hotel-lux-maxprice_sezon' )): ?>
	<?php $lux_max_sezon = rwmb_meta( 'meta-hotel-lux-maxprice_sezon' ) ?>
<? else: ?>
		<?php $lux_max_sezon = 1 ?>
<?php endif ?>
<?php if(rwmb_meta( 'meta-hotel-standart-maxprice_sezon' )): ?>
	<?php $standart_max_sezon = rwmb_meta( 'meta-hotel-standart-maxprice_sezon' ) ?>
<? else: ?>
		<?php $standart_max_sezon = 1 ?>
<?php endif ?>

<?php _e( 'Цена', 'restx' ); ?>: <?php 
	echo min(array(
		$standart_min_nezon, $lux_min_nezon, $kottedg_min_nezon, $halflux_min_nezon, $camping_min_nezon, $budget_min_nezon
	))
?> — <?php 
				echo max(array(
					$standart_max_sezon, $lux_max_sezon, $kottedg_max_sezon, $halflux_max_sezon, $camping_max_sezon, $budget_max_sezon
				))
			?> грн.