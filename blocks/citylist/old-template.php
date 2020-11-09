<!-- Основной город -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="table-text mb-5">
				<h1><?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_title') ?></h1>
				<!-- Хлебные крошки -->
					<?php get_template_part( 'blocks/citylist/breadcrumbs', 'default' ); ?>
				<!-- end Хлебные крошки -->
			</div>

			<!-- Wrapper -->
			<div class="citylist_wrapper">
				<div class="citylist_content mb-5">

					<!-- Мобильная навигация -->
					<div class="mobile-show">
						<div class="citylist_nav mb-5">
							<div class="citylist_nav_container swiper-container">
								<div class="swiper-wrapper">
									<!-- Мобильная навигация ITEM -->
									<div class="swiper-slide">
										<a href="#info" class="d-flex flex-column">
											<div class="citylist_nav_icon">
												<img src="<?php bloginfo('template_url') ?>/img/clipboard.svg">	
											</div>
											<span><?php _e( 'Инфо', 'restx' ); ?></span>
										</a>
									</div>
									<!-- end Мобильная навигация ITEM -->
									<!-- Мобильная навигация ITEM -->
									<div class="swiper-slide">
										<a href="#video" class="d-flex flex-column">
											<div class="citylist_nav_icon">
												<img src="<?php bloginfo('template_url') ?>/img/video-player.svg">	
											</div>
											<span><?php _e( 'Видео', 'restx' ); ?></span>
										</a>
									</div>
									<!-- end Мобильная навигация ITEM -->
									<!-- Мобильная навигация ITEM -->
									<div class="swiper-slide">
										<a href="#blog" class="d-flex flex-column">
											<div class="citylist_nav_icon">
												<img src="<?php bloginfo('template_url') ?>/img/organize.svg">	
											</div>
											<span><?php _e( 'Блог', 'restx' ); ?></span>
										</a>
									</div>
									<!-- end Мобильная навигация ITEM -->
									<!-- Мобильная навигация ITEM -->
									<div class="swiper-slide">
										<a href="#near" class="d-flex flex-column">
											<div class="citylist_nav_icon">
												<img src="<?php bloginfo('template_url') ?>/img/direction-sign.svg">	
											</div>
											<span><?php _e( 'Рядом', 'restx' ); ?></span>
										</a>
									</div>
									<!-- end Мобильная навигация ITEM -->
									<!-- Мобильная навигация ITEM -->
									<div class="swiper-slide">
										<a href="#bus" class="d-flex flex-column">
											<div class="citylist_nav_icon">
												<img src="<?php bloginfo('template_url') ?>/img/bus.svg">	
											</div>
											<span><?php _e( 'Автобусы', 'restx' ); ?></span>
										</a>
									</div>
									<!-- end Мобильная навигация ITEM -->
									<!-- Мобильная навигация ITEM -->
									<div class="swiper-slide">
										<a href="#review" class="d-flex flex-column">
											<div class="citylist_nav_icon">
												<img src="<?php bloginfo('template_url') ?>/img/review.svg">	
											</div>
											<span><?php _e( 'Отзывы', 'restx' ); ?></span>
										</a>
									</div>
									<!-- end Мобильная навигация ITEM -->
								</div>
							</div>
						</div>
					</div>
					<!-- end Мобильная навигация -->

					<!-- Filter -->
					<?php get_template_part( 'blocks/filters/city_filter', 'default' ); ?>	
					<!-- end Filter -->

					<!-- Catalog Hotels -->
					<div class="lead">
			  		<?php get_template_part( 'blocks/citylist/parent-catalog', 'default' ); ?>
			  	</div>
			  	<!-- end Catalog Hotels -->

				</div>
				
				<!-- Сайдбар -->
				<div class="citylist_sidebar">
					<!-- Сайдбар Блог -->
					<div id="info" class="citylist_sidebar_box mb-5">
						<div class="citylist-blog mb-4">
							<div class="citylist-blog__img">
								<img src="<?php bloginfo('template_url') ?>/img/clipboard.svg" width="30px" alt="">
							</div>
							<div class="title">
								<?php _e( 'Информация', 'restx' ); ?>
							</div>
						</div>
						<!-- Сайдбар Блог выводим из этого города -->
						<?php 
							$current_term = get_queried_object_id();
							$blog_current_query = new WP_Query( array( 
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
						
						if ($blog_current_query->have_posts()) : while ($blog_current_query->have_posts()) : $blog_current_query->the_post(); ?>
					  	<div class="mb-2">
				  			<?php get_template_part( 'blocks/citylist/blog', 'default' ); ?>
				  		</div>
						<?php wp_reset_postdata(); endwhile; endif;  ?>
						<!-- end Сайдбар Блог выводим из этого города -->
					</div>
					<!-- end Сайдбар блог -->

					<!-- Сайдбар Видео -->
					<div id="video" class="citylist_sidebar_box mb-5">
						<div class="citylist-blog mb-4">
							<div class="citylist-blog__img" style="background-color: #d3d7f6;">
								<img src="<?php bloginfo('template_url') ?>/img/video-player.svg" width="25px" alt="">
							</div>
							<div class="title">
								<?php _e( 'Видео', 'restx' ); ?>
							</div>
						</div>
						<?php if(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_video')): ?>
							<h3 class="mb-4"><?php _e( 'Наслаждайтесь видео!', 'restx' ); ?></h3>
					  	<div class="youtube-player" data-id="<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_video') ?>"></div>
					  <?php else: ?>
							<?php get_template_part('blocks/citylist/no-video', 'default'); ?> 
				  	<?php endif ?>
					</div>
			  	<!-- end Сайдбар видео -->
			  	<!-- общий Блог -->
			  	<div id="blog" class="citylist_sidebar_box mb-5">
			  		<div class="citylist-blog mb-4">
							<div class="citylist-blog__img" style="background-color: #cdf5d4;">
								<img src="<?php bloginfo('template_url') ?>/img/organize.svg" width="30px" alt="">
							</div>
							<div class="title">
								<?php _e( 'Блог', 'restx' ); ?>
							</div>
						</div>
						<div>
							<?php 
								$blog_all_query = new WP_Query( array( 
								'post_type' => 'blogs', 
								'posts_per_page' => 5,
								'tax_query' => array(
							    array(
						        'taxonomy' => 'blog-categories',
								    'terms' => 'common',
						        'field' => 'slug',
						        'include_children' => true,
						        'operator' => 'IN'
							    )
								),
							) );
							
							if ($blog_all_query->have_posts()) : while ($blog_all_query->have_posts()) : $blog_all_query->the_post(); ?>
						  	<div class="mb-2">
					  			<?php get_template_part( 'blocks/citylist/blog', 'default' ); ?>
					  		</div>
							<?php wp_reset_postdata();  endwhile; endif; ?>
						</div>
					</div>
			  	<!-- end общий Блог -->
			  	<!-- Ближайшие города -->
			  	<?php if(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_association')): ?>
				  	<div id="near" class="citylist_sidebar_box mb-5">
				  		<div class="citylist-blog mb-4">
								<div class="citylist-blog__img" style="background-color: #c5eefa;">
									<img src="<?php bloginfo('template_url') ?>/img/direction-sign.svg" width="30px" alt="">
								</div>
								<div class="title">
									<?php _e( 'Ближайшие курорты', 'restx' ); ?>
								</div>
							</div>
							<div>
								<?php 
						  		$near_cities_array = [];
						  		$near_cities = carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_association'); 
						  		foreach($near_cities as $near_city) {
							  		$near_city_id = $near_city['id'];
							  		array_push($near_cities_array, $near_city_id);
							  	}
						  	?>
						  	<?php $near_city_terms = get_terms(array(
						  		'taxonomy' => 'citylist',
						  		'include' => $near_cities_array,
						  	)) ?>
						  	<?php foreach($near_city_terms as $near_city_term): ?>
						  		<div class="citylist-blog__item">
						  			<a href="<?php echo get_term_link($near_city_term->term_id, 'citylist') ?>"><div class="citylist-blog__title"><?php echo $near_city_term->name ?></div></a>	
						  		</div>
						  	<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>
			  	<!-- end Ближайшие города -->
			  	<!-- автобусы из города -->
			  	<div id="bus" class="citylist_sidebar_box mb-5">
			  		<div class="citylist-blog mb-4">
							<div class="citylist-blog__img" style="background-color: #c5eefa;">
								<img src="<?php bloginfo('template_url') ?>/img/bus.svg" width="30px" alt="">
							</div>
							<div class="title">
								<?php _e( 'Автобусы из г.', 'restx' ); ?> <?php single_term_title(); ?>
							</div>
						</div>
						<div>
				  		<?php 
				  			$current_city_for_way = 'term:citylist:'. get_queried_object_id() .'';
								$custom_query = new WP_Query( array( 
								'post_type' => 'way', 
								'posts_per_page' => 10,
								'meta_query' => array(
									'relation' => 'AND',
									array(
										'key'     => 'crb_way_start_city',
							      'value'   => array($current_city_for_way),
							      'compare' => 'IN', 
									)
								)
							) );
							if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
		        		<a href="<?php the_permalink(); ?>">
	        				<div class="single-blogs__other-title mb-2 p-0">
	        					<?php the_title(); ?>	
	        				</div>
			        	</a>
							<?php endwhile; ?>
							<?php else: ?>
								<p><?php _e('Пока ничего нет', 'restx'); ?></p>
							<?php endif; ?>
						</div>
					</div>
			  	<!-- end автобусы из города -->
			  	<!-- автобусы в города -->
			  	<div class="citylist_sidebar_box mb-5">
			  		<div class="citylist-blog mb-4">
							<div class="citylist-blog__img" style="background-color: #c5eefa;">
								<img src="<?php bloginfo('template_url') ?>/img/bus.svg" width="30px" alt="">
							</div>
							<div class="title">
								<?php _e( 'Автобусы в г.', 'restx' ); ?> <?php single_term_title(); ?>
							</div>
						</div>
						<div>
				  		<?php 
				  			$current_city_for_way = 'term:citylist:'. get_queried_object_id() .'';
								$custom_query = new WP_Query( array( 
								'post_type' => 'way', 
								'posts_per_page' => 10,
								'meta_query' => array(
									'relation' => 'AND',
									array(
										'key'     => 'crb_way_end_city',
							      'value'   => array($current_city_for_way),
							      'compare' => 'IN', 
									)
								)
							) );
							if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
		        		<a href="<?php the_permalink(); ?>">
	        				<div class="single-blogs__other-title mb-2 p-0">
	        					<?php the_title(); ?>	
	        				</div>
			        	</a>
							<?php endwhile; ?>
							<?php else: ?>
								<p><?php _e('Пока ничего нет', 'restx'); ?></p>
							<?php endif; ?>
						</div>
					</div>
			  	<!-- end автобусы в города -->
				</div>
				<!-- end Сайдбар -->
			</div>
			<!-- end Wrapper -->
		</div>
		<!-- end col-md -->
	</div>
	<!-- end row -->

	<!-- Текст Контент -->
	<div class="row justify-content-center mb-5">
		<div class="col-md-7">		
			<div class="citylist__text lead">
				<?php echo apply_filters( 'the_content', carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_rich_text') ); ?>
				<!-- Вопросы и ответы -->
				<?php if (carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_faq')): ?>
					<div id="citylist-faq" class="mt-5">
						<h2 class="mb-4">Вопросы и ответы</h2>
						<div>
							<ul itemscope itemtype="https://schema.org/FAQPage">
								<?php 
								$city_faqs = carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_faq');
								foreach( $city_faqs as $city_faq ): ?>
									<li itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
										<h4 class="zag" itemprop="name">
											<?php echo $city_faq['crb_citylist_faq_question'] ?>
										</h4>
										<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
											<div class="lead mb-5" itemprop="text">
												<p><?php echo $city_faq['crb_citylist_faq_answer'] ?></p>
											</div>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				<?php endif; ?>
				<!-- end Вопросы и ответы -->
			</div>
		</div>
	</div>
	<!-- end Текст Контент -->

	<!-- Комментарии -->
	<div id="review" class="row justify-content-center">
		<div class="col-md-8">
			<div class="text-center text-dark display-4 text-uppercase font-weight-normal mb-5">
				<?php _e('Обсуждение', 'restx'); ?>
			</div>
			<div>
				<?php 
					$current_term = get_queried_object_id();
					$post_comment_query = new WP_Query( array( 
					'post_type' => 'post_comment', 
					'posts_per_page' => 1,
					'tax_query' => array(
				    array(
			        'taxonomy' => 'citylist',
					    'terms' => $current_term,
			        'field' => 'term_id',
			        
				    )
					),
				) );
				?>
				<?php if ($post_comment_query->have_posts()): ?>
					<?php while ($post_comment_query->have_posts()) : $post_comment_query->the_post(); ?>
				  	<?php /* echo do_shortcode('[anycomment]'); */ ?>
				  	<?php get_template_part('blocks/custom_comments'); ?>				  	
				  	<?php wp_reset_postdata(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<!-- end Комментарии -->

</div>
<!-- end container -->