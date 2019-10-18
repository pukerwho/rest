<div class="b_video">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="mb-5">
					<div class="my-table">
						<div class="my-table-cell pr-4">
							<img src="<?php bloginfo('template_url'); ?>/img/youtube.svg" alt="" width="40px">
						</div>
						<div class="table-text">
							<h2><?php _e( 'Подписывайтесь на наш канал', 'restx' ); ?></h2>
							<p><?php _e( 'Классные видео про украинские курорты', 'restx' ); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mobile-hotels-grid mb-5">
			<?php 
		  $custom_query = new WP_Query( array( 'post_type' => 'youtube', 'posts_per_page' => 4 ) );
		  if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
				<div class="col-md-12 col-lg-3">
					<div class="youtube-player" data-id="<?php echo rwmb_meta( 'meta-youtube-id' ); ?>"></div>
				</div>
			<?php endwhile; endif; ?>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="button-more text-center">
					<a href="https://www.youtube.com/channel/UC8aL1GxvTKVEdzp8Za3Gqig?sub_confirmation=1" target="_blank"><div class="btn"><?php _e( 'YouTube канал', 'restx' ); ?></div></a>
				</div>
			</div>
		</div>
	</div>
</div>