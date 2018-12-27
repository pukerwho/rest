<div class="row">
	<div class="col-md-9">
		<div class="mb-5">
			<div class="d-flex align-items-center mb-5">
				<img src="<?php bloginfo('template_url'); ?>/img/map.svg" alt="" width="40px" class="mr-3">
				<h3>Карта:</h3>
			</div>
			<div class="contact-grid">
				<?php 
					$args = array(
				    'width'        => '100%',
				    'height'       => '480px',
				    'zoom'         => 14,
				    'marker'       => true,
				    'marker_title' => 'Click me',
				    'info_window'  => '<h3>Title</h3><p>Content</p>.',
					);
					echo rwmb_meta( 'meta-hotel-map', $args );
				?>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="mb-5">
			<div class="d-flex align-items-center mb-5">
				<img src="<?php bloginfo('template_url'); ?>/img/phone-call.svg" alt="" width="40px" class="mr-3">
				<h3>Телефоны:</h3>
			</div>
			<div class="contact-grid">
				<?php
					$metaphones = rwmb_meta( 'meta-hotel-phones' );
					foreach ( $metaphones as $metaphone ): ?>
					<div class="lead">
						<?php echo $metaphone ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="mb-5">
			<div class="d-flex align-items-center mb-5">
				<img src="<?php bloginfo('template_url'); ?>/img/viber.svg" alt="" width="40px" class="mr-3">
				<h3>Viber:</h3>
			</div>
			<div class="contact-grid">
				<?php
					$metaviber = rwmb_meta( 'meta-hotel-viber' );
					foreach ( $metaviber as $metav ): ?>
					<div class="lead">
						<?php echo $metav ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="mb-5">
			<div class="d-flex align-items-center mb-5">
				<img src="<?php bloginfo('template_url'); ?>/img/whatsapp.svg" alt="" width="40px" class="mr-3">
				<h3>Whatsapp:</h3>
			</div>
			<div class="contact-grid">
				<?php
					$metawhatsapp = rwmb_meta( 'meta-hotel-whatsapp' );
					foreach ( $metawhatsapp as $metawh ): ?>
					<div class="lead">
						<?php echo $metawh ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="mb-5">
			<div class="d-flex align-items-center mb-5">
				<img src="<?php bloginfo('template_url'); ?>/img/telegram.svg" alt="" width="40px" class="mr-3">
				<h3>Telegram:</h3>
			</div>
			<div class="contact-grid">
				<?php
					$metatelegram = rwmb_meta( 'meta-hotel-telegram' );
					foreach ( $metatelegram as $metat ): ?>
					<div class="lead">
						<?php echo $metat ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

