<?php
/*
Template Name: Азовское море
*/
?>

<?php get_header(); ?>
<?php $citylists_new = get_terms( array( 
	'taxonomy' => 'citylist', 
	'parent' => 0, 
	'hide_empty' => false,
	'meta_key' => '_crb_citylist_location',
  'meta_value' => 'azovsea'
) )
?>
<?php $term_ids = wp_list_pluck( $citylists_new, 'term_id' ); ?>

<div class="container mx-auto px-2 lg:px-0 pt-20 lg:pt-12 lg:pb-12">
	<div class="flex flex-col lg:flex-row">
		<!-- Сайдбар -->
		<div class="w-full lg:w-3/12 mb-6 lg:mb-0 pr-0 lg:pr-8">
			<div class="sticky" style="top: 90px;">
				<!-- Хлебные крошки (mobile) -->
				<div class="block lg:hidden mb-6">
					<div class="flex">
						<div class="breadcrumbs" itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
					    <ul>
								<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
									<a itemprop="item" href="<?php echo home_url(); ?>">
										<span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
									</a>                        
									<meta itemprop="position" content="1">
								</li>
					      <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
					        <a itemprop="item" href="<?php echo get_page_url('tpl_allcity') ?>">
					          <span itemprop="name"><?php _e( 'Курорты', 'restx' ); ?></span>
					        </a>                        
					        <meta itemprop="position" content="2">
					      </li>
					      <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
					        <a itemprop="item" href="<?php echo get_page_url('tpl_azovsea') ?>">
					          <span itemprop="name"><?php _e( 'Отдых на Азовском море', 'restx' ); ?></span>
					        </a>
					        <meta itemprop="position" content="3">
					      </li>
					    </ul>
					  </div>
					</div>
				</div>	
				<!-- end Хлебные крошки (mobile) -->
				<div>
					<div class="mb-3" style="border-bottom: 1px solid #f0f0f0; padding-bottom: 12px;">
						<a href="/hotels" class="blue-links"><?php _e('Жилье в Украине', 'restx'); ?></a>
					</div>
					
						<?php $citylists = get_terms( array( 
							'taxonomy' => 'citylist', 
							'parent' => 0, 
							'hide_empty' => false,
							'meta_key' => '_crb_citylist_location',
						  'meta_value' => 'azovsea'
						) );
						foreach ( $citylists as $citylist ): ?>
							<li class="mb-2">
								<a href="<?php echo get_term_link($citylist); ?>" class="blue-links"><?php echo $citylist->name ?></a>
							</li>
						<?php endforeach; ?>
				</div>
			</div>
		</div>

		<!-- Основной контент -->
		<div class="w-full lg:w-9/12 pl-0 lg:pl-8">
			<!-- Хлебные крошки (pc) -->
			<div class="hidden lg:block mb-4">
				<div class="flex">
					<div class="breadcrumbs" itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
				    <ul>
							<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
								<a itemprop="item" href="<?php echo home_url(); ?>">
									<span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
								</a>                        
								<meta itemprop="position" content="1">
							</li>
				      <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
				        <a itemprop="item" href="<?php echo get_page_url('tpl_allcity') ?>">
				          <span itemprop="name"><?php _e( 'Курорты', 'restx' ); ?></span>
				        </a>                        
				        <meta itemprop="position" content="2">
				      </li>
				      <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
				        <a itemprop="item" href="<?php echo get_page_url('tpl_azovsea') ?>">
				          <span itemprop="name"><?php _e( 'Отдых на Азовском море', 'restx' ); ?></span>
				        </a>
				        <meta itemprop="position" content="3">
				      </li>
				    </ul>
				  </div>
				</div>
			</div>	
			<!-- end Хлебные крошки (pc) -->

			<h1 class="text-2xl lg:text-4xl mb-6"><?php _e( 'Отдых на Азовском море', 'restx' ); ?></h1>
			<!-- Catalog Hotels -->
  		<div class="flex flex-wrap lg:-mx-2" id="response">
				<?php 
					global $wp_query, $wp_rewrite;  
					// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
					
					$custom_query = new WP_Query( array( 
					'post_type' => 'hotels', 
					'posts_per_page' => 24,
					'paged' => $current,
					'orderby'        => 'meta_value',
			    'meta_key'       => 'meta-hotel-mainrating',
					'tax_query' => array(
				    array(
			        'taxonomy' => 'citylist',
					    'terms' => $term_ids,
			        'field' => 'term_id',
			        'include_children' => true,
			        'operator' => 'IN'
				    )
					),
				) );
				if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
				  	<div class="w-1/2 lg:w-1/3 px-1">
				  		<?php get_template_part( 'blocks/hotel-card', 'default' ); ?>
				  	</div>
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>

			<div class="flex mb-8">
				<div class="w-full text-center">
					<div class="b_pagination">
						<?php 
							$big = 999999999; // уникальное число
							echo paginate_links( array(
							'format'  => 'page/%#%',
							'current'   => $current,
							'total'   => $custom_query->max_num_pages,
							'prev_next' => true,
							'next_text' => (''),
							'prev_text' => ('')
							)); 
						?>
					</div>
				</div>
			</div>
	  	<!-- end Catalog Hotels -->

	  	<!-- TEXT -->
	  	<div class="content mb-6">
		  	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
					<!-- Вопросы и ответы -->
					<?php if (carbon_get_post_meta(get_the_ID(), 'crb_page_faq')): ?>
						<div id="citylist-faq" class="mt-5">
							<h2 class="mb-4">Вопросы и ответы</h2>
							<div>
								<ul itemscope itemtype="https://schema.org/FAQPage">
									<?php 
									$page_faqs = carbon_get_post_meta(get_the_ID(), 'crb_page_faq');
									foreach( $page_faqs as $page_faq ): ?>
										<li itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
											<h4 class="zag" itemprop="name">
												<?php echo $page_faq['crb_page_faq_question'] ?>
											</h4>
											<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
												<div class="lead" itemprop="text">
													<p><?php echo $page_faq['crb_page_faq_answer'] ?></p>
												</div>
											</div>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
					<?php endif; ?>
					<!-- end Вопросы и ответы -->
				<?php endwhile; else: ?>
					<p><?php _e('Ничего не найдено'); ?></p>
				<?php endif; ?>
	  	</div>
	  	<!-- END TEXT -->
		</div>
	</div>
</div>

<?php get_footer(); ?>