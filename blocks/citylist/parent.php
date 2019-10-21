<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="table-text mb-5">
				<h1><?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_title') ?></h1>
				<p><?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_description') ?></p>
			</div>
			<div class="citylist_wrapper">
				<div class="citylist_content mb-5">
					<?php get_template_part( 'blocks/filters/city-filter-hotel', 'default' ); ?>	
					<div id="response" class="lead mb-5">
			  		<?php get_template_part( 'blocks/citylist/child-catalog', 'default' ); ?>
			  	</div>
			  	<div class="mobile-show">
			  		<?php 
							$current_term = get_queried_object_id();
							$custom_query = new WP_Query( array( 
							'post_type' => 'blogs', 
							'posts_per_page' => 5,
							'tax_query' => array(
						    array(
					        'taxonomy' => 'citylist',
							    'terms' => $current_term,
					        'field' => 'term_id',
					        'include_children' => true,
					        'operator' => 'IN'
						    )
							),
						) );
						?>
						<?php if ($custom_query->have_posts()): ?>
							<div class="title mb-4">
								Информация
							</div>
						<?php endif; ?>
						<?php
						if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
					  	<div>
				  			<?php get_template_part( 'blocks/citylist/blog', 'default' ); ?>
				  		</div>
						<?php endwhile; endif; wp_reset_postdata(); ?>
			  	</div>
			  	<div class="mobile-show mb-4">
			  		<div class="title mb-4">
							Видео
						</div>
						<?php if(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_video')): ?>
					  	<h3 class="mb-4"><?php _e( 'Наслаждайтесь видео!', 'restx' ); ?></h3>
					  	<div class="youtube-player" data-id="<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_video') ?>"></div>
					  	<?php else: ?>
				  		<div class="no-video">
				  			<div class="mb-5">
				  				<img src="<?php bloginfo('template_url') ?>/img/sad.svg" alt="" width="50px">
				  			</div>
				  			<div class="sad mb-5">
				  				<?php _e( 'К сожалению, мы пока не подготовили для вас хорошего видеоматериала', 'restx' ); ?>
				  			</div>
				  			<div class="help mb-5">
				  				<?php _e( 'Но вы можете помочь нам, отправив ссылку на подходящее видео', 'restx' ); ?>
				  			</div>
				  			<div class="send-message mb-5">
				  				<img src="<?php bloginfo('template_url') ?>/img/life-saver.svg" alt="" width="25px">
				  				<div>
				  					<?php _e( 'Отправить ссылку на видео', 'restx' ); ?>
				  				</div>
				  			</div>
				  		</div>
				  	<?php endif ?>
			  	</div>
			  	<div>
				  	<?php 
							$current_term = get_queried_object_id();
							$custom_query_post_comment = new WP_Query( array( 
							'post_type' => 'post_comment', 
							'posts_per_page' => 1,
							'tax_query' => array(
						    array(
					        'taxonomy' => 'citylist',
							    'terms' => $current_term,
					        'field' => 'term_id',
					        'include_children' => true,
					        'operator' => 'IN'
						    )
							),
						) );
						if ($custom_query_post_comment->have_posts()) : while ($custom_query_post_comment->have_posts()) : $custom_query_post_comment->the_post(); ?>
					  	<?php global $withcomments;
							$withcomments = true;
							comments_template(); ?> 
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</div>
					<div>
						<div class="citylist__text lead">
							<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_rich_text') ?>
						</div>
					</div>
				</div>
				<div class="citylist_sidebar">
					<div>
						<?php 
							$current_term = get_queried_object_id();
							$custom_query = new WP_Query( array( 
							'post_type' => 'blogs', 
							'posts_per_page' => 5,
							'tax_query' => array(
						    array(
					        'taxonomy' => 'citylist',
							    'terms' => $current_term,
					        'field' => 'term_id',
					        'include_children' => true,
					        'operator' => 'IN'
						    )
							),
						) );
						?>
						<?php if ($custom_query->have_posts()): ?>
							<div class="title mb-4">
								Информация
							</div>
						<?php endif; ?>
						<?php
						if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
					  	<div>
				  			<?php get_template_part( 'blocks/citylist/blog', 'default' ); ?>
				  		</div>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</div>
					<div class="title mb-4">
						Видео
					</div>
					<?php if(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_video')): ?>
				  	<h3 class="mb-4"><?php _e( 'Наслаждайтесь видео!', 'restx' ); ?></h3>
				  	<div class="youtube-player" data-id="<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_video') ?>"></div>
				  	<?php else: ?>
			  		<div class="no-video">
			  			<div class="mb-5">
			  				<img src="<?php bloginfo('template_url') ?>/img/sad.svg" alt="" width="50px">
			  			</div>
			  			<div class="sad mb-5">
			  				<?php _e( 'К сожалению, мы пока не подготовили для вас хорошего видеоматериала', 'restx' ); ?>
			  			</div>
			  			<div class="help mb-5">
			  				<?php _e( 'Но вы можете помочь нам, отправив ссылку на подходящее видео', 'restx' ); ?>
			  			</div>
			  			<div class="send-message mb-5">
			  				<img src="<?php bloginfo('template_url') ?>/img/life-saver.svg" alt="" width="25px">
			  				<div>
			  					<?php _e( 'Отправить ссылку на видео', 'restx' ); ?>
			  				</div>
			  			</div>
			  		</div>
			  	<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>