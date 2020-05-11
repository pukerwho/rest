<div class="b_rest">
	<div class="container-fluid cf_px">
		<div class="row">
			<div class="col-md-12">
				<div class="mb-5">
					<div class="my-table">
						<div class="table-text">
							<h2><?php _e( 'Курорты Украины', 'restx' ); ?></h2>
							<p><?php _e( 'Черное море, Азовское море, Карпаты', 'restx' ); ?></p>		
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 mb-4">
				<a href="<?php echo get_page_url('tpl_karpaty') ?>">
					<div class="b_rest__img" style="background: url('<?php bloginfo('template_url') ?>/img/karpaty.jpg'); background-size: cover;">
						<!-- <div class="b_rest__img-bg"></div> -->
						<div class="b_rest__content">
							<img src="<?php bloginfo('template_url') ?>/img/mountains.svg" alt="" width="40px" class="mb-4">
							<div class="b_rest__title">
								<?php _e( 'Карпаты', 'restx' ); ?>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4 mb-4">
				<a href="<?php echo get_page_url('tpl_azovsea') ?>">
					<div class="b_rest__img" style="background: url('<?php bloginfo('template_url') ?>/img/azovsea.jpg'); background-size: cover;">
						<div class="b_rest__content">
							<img src="<?php bloginfo('template_url') ?>/img/azovsea.svg" alt="" width="40px" class="mb-4">
							<div class="b_rest__title">
								<?php _e( 'Азовское море', 'restx' ); ?>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4 mb-4">
				<a href="<?php echo get_page_url('tpl_blacksea') ?>">
					<div class="b_rest__img" style="background: url('<?php bloginfo('template_url') ?>/img/blacksea.jpg'); background-size: cover;">
						<!-- <div class="b_rest__img-bg"></div> -->
						<div class="b_rest__content">
							<img src="<?php bloginfo('template_url') ?>/img/blacksea.svg" alt="" width="40px" class="mb-4">
							<div class="b_rest__title">
								<?php _e( 'Черное море', 'restx' ); ?>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>