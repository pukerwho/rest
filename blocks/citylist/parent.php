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
					<div class="citylist_sidebar_box mb-5">
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
						<?php
						if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
					  	<div class="mb-2">
				  			<?php get_template_part( 'blocks/citylist/blog', 'default' ); ?>
				  		</div>
						<?php endwhile; endif; wp_reset_postdata(); ?>
						<!-- end Сайдбар Блог выводим из этого города -->

						<!-- Сайдбар Блог выводим из категории Общее -->
							<?php 
								$custom_query = new WP_Query( array( 
								'post_type' => 'blogs', 
								'posts_per_page' => 3,
								'tax_query' => array(
							    array(
						        'taxonomy' => 'blog-categories',
								    'terms' => 'other',
						        'field' => 'slug',
						        'include_children' => true,
						        'operator' => 'IN'
							    )
								),
							) );
							?>
							<?php
							if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
						  	<div class="mb-2">
					  			<?php get_template_part( 'blocks/citylist/blog', 'default' ); ?>
					  		</div>
							<?php endwhile; endif; wp_reset_postdata(); ?>
						<!-- end Сайдбар Блог выводим из категории Общее -->
					</div>
					<!-- end Сайдбар блог -->

					<!-- Сайдбар Видео -->
					<div class="citylist_sidebar_box mb-5">
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
				</div>
				<!-- end Сайдбар -->
			</div>
			<!-- end Wrapper -->
		</div>
		<!-- end col-md -->
	</div>
	<!-- end row -->

	<!-- Комментарии -->
	<div class="row justify-content-center mb-5">
		<div class="col-md-9">
			<div class="text-center text-dark display-4 text-uppercase font-weight-normal mb-5">
				<?php _e('Обсуждение', 'restx'); ?>
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
			  	<?php 
				  	global $withcomments;
						$withcomments = true;
						comments_template(); 
					?> 
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
	<!-- end Комментарии -->

	<!-- Текст Контент -->
	<div class="row justify-content-center">
		<div class="col-md-8">		
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
											<div class="lead" itemprop="text">
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

</div>
<!-- end container -->