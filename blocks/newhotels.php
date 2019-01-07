<div class="newhotels">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="mb-5">
					<div class="my-table">
						<div class="my-table-cell pr-4">
							<img src="<?php bloginfo('template_url'); ?>/img/newhotels.svg" alt="" width="40px">
						</div>
						<div class="table-text">
							<h2>Недавно добавленные на сайт</h2>
							<p>Поприветствуем новичков!</p>		
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- PC VERSION -->
		<div class="pc-show">
			<div class="row">
				<?php 
			  $custom_query = new WP_Query( array( 'post_type' => 'hotels', 'posts_per_page' => 4 ) );
			  if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
					<div class="col-md-3">
						<?php get_template_part( 'blocks/hotel-card', 'default' ); ?>
					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
		<!-- MOBILE VERSION -->
		<div class="mobile-show">
			<div class="row">
				<div class="col-md-12">
					<div class="swiper-container swiper-hotels">
				    <div class="swiper-wrapper">
				    	<?php 
						  $custom_query = new WP_Query( array( 'post_type' => 'hotels', 'posts_per_page' => 4 ) );
						  if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
								<div class="swiper-slide">
									<?php get_template_part( 'blocks/hotel-card', 'default' ); ?>
			          </div>
		          <?php endwhile; endif; ?>
				    </div>
				    <div class="swiper-button-next swiper-hotels-button-next"></div>
		      	<div class="swiper-button-prev swiper-hotels-button-prev"></div>
				  </div>
			  </div>
			</div>
		</div>
	</div>
</div>