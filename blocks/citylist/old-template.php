<div class="container mx-auto px-2 lg:px-0 pt-20 lg:pt-12 lg:pb-12">
	<div class="flex flex-col lg:flex-row">
		<!-- Сайдбар -->
		<div class="w-full lg:w-3/12 mb-6 lg:mb-0 pr-0 lg:pr-8">
			<div class="sticky" style="top: 90px;">
				<!-- Хлебные крошки (mobile) -->
				<div class="block lg:hidden mb-6">
					<?php get_template_part( 'blocks/citylist/breadcrumbs', 'default' ); ?>
				</div>	
				<!-- end Хлебные крошки (mobile) -->
				<div>
					<div class="mb-3 text-blue-500" style="border-bottom: 1px solid #f0f0f0; padding-bottom: 12px;">
						<a href="/hotels"><?php _e('Жилье в Украине', 'restx'); ?></a>
					</div>
					<div class="mb-3"><?php single_term_title(); ?>: <?php _e('все жилье в городе', 'restx'); ?>	</div>
					<ul class="ml-3">
						<?php 
						$taxonomyName = 'citylist';
						$t_terms = get_terms($taxonomyName, array('parent' => get_queried_object()->term_id, 'hide_empty' => false));
						foreach ($t_terms as $t_term): ?>
							<?php if($t_term): ?>
							<li class="mb-2">
								<a href="<?php echo get_term_link( $t_term->term_id, $taxonomyName ); ?>" class="text-blue-500"><?php echo $t_term->name; ?></a>
							</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>

		<!-- Основной контент -->
		<div class="w-full lg:w-9/12 pl-0 lg:pl-8">
			<!-- Хлебные крошки (pc) -->
			<div class="hidden lg:block mb-4">
				<?php get_template_part( 'blocks/citylist/breadcrumbs', 'default' ); ?>
			</div>	
			<!-- end Хлебные крошки (pc) -->
			

			<h1 class="text-2xl lg:text-4xl mb-2"><?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_title') ?></h1>
			
			<!-- Filter -->
			<?php get_template_part( 'blocks/filters/city_filter', 'default' ); ?>	
			<!-- end Filter -->

			<!-- Catalog Hotels -->
	  		<?php get_template_part( 'blocks/citylist/parent-catalog', 'default' ); ?>
	  	<!-- end Catalog Hotels -->

	  	<!-- TEXT -->
	  	<div class="mb-6">
		  	<?php echo apply_filters( 'the_content', carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_rich_text') ); ?>	
	  	</div>
	  	<!-- END TEXT -->

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
	</div>
</div>