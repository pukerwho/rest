<?php if(rwmb_meta( 'meta-hotel-phones' )): ?>
<div class="mb-5">
	<div class="flex items-center mb-4">
		<img src="<?php bloginfo('template_url'); ?>/img/phone-call.svg" alt="" width="25px" class="mr-3">
		<h4><?php _e( 'Телефоны', 'restx' ); ?>:</h4>
	</div>
	<div class="contact-grid">
		<?php
			$metaphones = rwmb_meta( 'meta-hotel-phones' );
			foreach ( $metaphones as $metaphone ): ?>
			<div class="lead">
				<a href="tel:<?php echo $metaphone ?>"><?php echo $metaphone ?></a>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<?php endif ?>

<?php if(rwmb_meta( 'meta-hotel-viber' )): ?>
<div class="mb-5">
	<div class="flex items-center mb-4">
		<img src="<?php bloginfo('template_url'); ?>/img/viber.svg" alt="" width="25px" class="mr-3">
		<h4>Viber:</h4>
	</div>
	<div class="contact-grid">
		<?php
			$metaviber = rwmb_meta( 'meta-hotel-viber' );
			foreach ( $metaviber as $metav ): ?>
			<div class="lead">
				<a href="viber://chat?number=<?php echo $metav ?>"><?php echo $metav ?></a>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<?php endif ?>

<?php if(rwmb_meta( 'meta-hotel-whatsapp' )): ?>
<div class="mb-5">
	<div class="flex items-center mb-4">
		<img src="<?php bloginfo('template_url'); ?>/img/whatsapp.svg" alt="" width="25px" class="mr-3">
		<h4>Whatsapp:</h4>
	</div>
	<div class="contact-grid">
		<?php
			$metawhatsapp = rwmb_meta( 'meta-hotel-whatsapp' );
			foreach ( $metawhatsapp as $metawh ): ?>
			<div class="lead">
				<a href="https://api.whatsapp.com/send?phone=<?php echo $metawh ?>"><?php echo $metawh ?></a>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<?php endif ?>

<?php if(rwmb_meta( 'meta-hotel-telegram' )): ?>
<div class="mb-5">
	<div class="flex items-center mb-4">
		<img src="<?php bloginfo('template_url'); ?>/img/telegram.svg" alt="" width="25px" class="mr-3">
		<h4>Telegram:</h4>
	</div>
	<div class="contact-grid">
		<?php
			$metatelegram = rwmb_meta( 'meta-hotel-telegram' );
			foreach ( $metatelegram as $metat ): ?>
			<div class="lead">
				<a href="tg://resolve?domain=<?php echo $metat ?>"><?php echo $metat ?></a>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<?php endif ?>