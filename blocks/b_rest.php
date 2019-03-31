<div class="b_rest">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="mb-5">
					<div class="my-table">
						<div class="my-table-cell pr-4">
							<img src="<?php bloginfo('template_url'); ?>/img/sun.svg" alt="" width="40px">
						</div>
						<div class="table-text">
							<h2>Скоро лето!</h2>
							<p>Пора планировать поездку на море</p>		
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-4">
				<a href="<?php echo get_permalink( get_page_by_path( 'azovsea' ) ); ?>">
					<div class="b_rest__img" style="background: url('<?php bloginfo('template_url') ?>/img/azovsea.jpg'); background-size: cover;">
						<div class="b_rest__content">
							<img src="<?php bloginfo('template_url') ?>/img/azovsea.svg" alt="" width="40px" class="mb-4">
							<div class="b_rest__title">
								Азовское море
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-6 mb-4">
				<a href="<?php echo get_permalink( get_page_by_path( 'blacksea' ) ); ?>">
					<div class="b_rest__img" style="background: url('<?php bloginfo('template_url') ?>/img/blacksea.jpg'); background-size: cover;">
						<!-- <div class="b_rest__img-bg"></div> -->
						<div class="b_rest__content">
							<img src="<?php bloginfo('template_url') ?>/img/blacksea.svg" alt="" width="40px" class="mb-4">
							<div class="b_rest__title">
								Черное море
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>