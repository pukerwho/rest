<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="tabs">
				<div class="tab-button-outer mb-5">
			    <div class="nav-img">
			    	<img src="<?php bloginfo('template_url') ?>/img/swipe.svg" alt="">
			    </div>
					<ul class="nav nav-tabs" id="singleHotelTabs" role="tablist">
					  <li class="nav-item">
					    <a class="nav-link active" id="catalog-tab" data-toggle="tab" href="#catalog" role="tab" aria-controls="catalog" aria-selected="true">Каталог</a>
					  </li>
					  <!-- <li class="nav-item">
					    <a class="nav-link" id="place-tab" data-toggle="tab" href="#place" role="tab" aria-controls="place" aria-selected="false">Куда пойти</a>
					  </li> -->
					  <!-- <li class="nav-item">
					    <a class="nav-link" id="way-tab" data-toggle="tab" href="#way" role="tab" aria-controls="way" aria-selected="false">Как добраться</a>
					  </li> -->
					  <li class="nav-item">
					  	<a class="nav-link" id="cityblog-tab" data-toggle="tab" href="#cityblog" role="tab" aria-controls="cityblog" aria-selected="false">Информация</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false">Видео</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="cityreviews-tab" data-toggle="tab" href="#cityreviews" role="tab" aria-controls="cityreviews" aria-selected="false">Обсуждение</a>
					  </li>
					</ul>
				</div>
				
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane tab-single-hotel fade show active" id="catalog" role="tabpanel" aria-labelledby="catalog-tab">
				  	<div class="mb-5">
				  		<?php get_template_part( 'blocks/filters/city-filter-hotel', 'default' ); ?>
				  	</div>
				  	<div class="mb-5 lead">
				  		<?php get_template_part( 'blocks/citylist/parent-catalog', 'default' ); ?>
				  	</div>
				  	<div class="row">
							<div class="col-md-12">
								<div class="citylist__text lead">
									<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_rich_text') ?>
								</div>
							</div>
						</div>
				  </div>
				  <!-- <div class="tab-pane tab-single-hotel fade" id="place" role="tabpanel" aria-labelledby="place-tab">
				  	<h2>Раздел в разработке</h2>
				  </div> -->
				  <!-- <div class="tab-pane tab-single-hotel fade" id="way" role="tabpanel" aria-labelledby="way-tab">
				  	<h2>Еще нет ничего</h2>
				  </div> -->
				  <div class="tab-pane tab-single-hotel fade" id="cityblog" role="tabpanel" aria-labelledby="cityblog-tab">
				  	<div class="row">
				  		<?php 
								global $wp_query, $wp_rewrite;  
								// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
								$current_term = get_queried_object_id();
								$custom_query = new WP_Query( array( 
								'post_type' => 'blogs', 
								'posts_per_page' => 24,
								'paged' => $current,
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
							if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
						  	<div class="col-md-12">
					  			<?php get_template_part( 'blocks/citylist/blog', 'default' ); ?>
					  		</div>
							<?php endwhile; endif; wp_reset_postdata(); ?>
				  	</div>
				  </div>
				  <div class="tab-pane tab-single-hotel fade" id="video" role="tabpanel" aria-labelledby="video-tab">
				  	<?php if(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_video')): ?>
					  	<h3 class="mb-4">Наслаждайтесь видео!</h3>
					  	<div class="youtube-player" data-id="<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_video') ?>"></div>
					  	<?php else: ?>
				  		<div class="no-video">
				  			<div class="mb-5">
				  				<img src="<?php bloginfo('template_url') ?>/img/sad.svg" alt="" width="50px">
				  			</div>
				  			<div class="sad mb-5">
					  			К сожалению, мы пока не подготовили для вас хорошего видеоматериала	
				  			</div>
				  			<div class="help mb-5">
				  				Но вы можете помочь нам, отправив ссылку на подходящее видео
				  			</div>
				  			<div class="send-message mb-5">
				  				<img src="<?php bloginfo('template_url') ?>/img/life-saver.svg" alt="" width="25px">
				  				<div>
				  					Отправить ссылку на видео	
				  				</div>
				  			</div>
				  		</div>
				  	<?php endif ?>
				  </div>
				  <div class="tab-pane tab-single-hotel fade" id="cityreviews" role="tabpanel" aria-labelledby="cityreviews-tab">
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
				</div>
			</div>
		</div>
	</div>
</div>