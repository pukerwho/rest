<?php get_header(); ?>

<div class="container mx-auto px-2 lg:px-0 pt-20 lg:pt-12 lg:pb-12">
	<div class="flex flex-wrap flex-col-reverse lg:flex-row">
		<!-- Сайдбар -->
		<div class="w-full lg:w-3/12 mb-6 lg:mb-0 pr-0 lg:pr-8">
			<div class="sticky" style="top: 90px;">
				<div>
					<div>
						<div class="mb-4 text-lg"><?php _e('Направления', 'restx'); ?>:</div>
						<ul class="mb-6">
							<li class="mb-2"><a href="<?php echo get_page_url('tpl_blacksea') ?>" class="blue-links"><?php _e('Черное море', 'restx'); ?></a></li>
							<li class="mb-2"><a href="<?php echo get_page_url('tpl_azovsea') ?>" class="blue-links"><?php _e('Азовское море', 'restx'); ?></a></li>
							<li class="mb-2"><a href="<?php echo get_page_url('tpl_karpaty') ?>" class="blue-links"><?php _e('Карпаты', 'restx'); ?></a></li>
						</ul>
						<div class="mb-4 text-lg"><?php _e('Популярные курорты', 'restx'); ?>:</div>
						<ul class="mb-3" style="border-bottom: 1px solid #f0f0f0; padding-bottom: 12px;">
							<?php $maincitylists = get_terms( array( 
								'taxonomy' => 'citylist', 
								'parent' => 0, 
								'hide_empty' => false,
								'meta_query' => array(
									'relation' => 'AND',
						      array(
										'key'       => '_crb_citylist_iscurort',
										'value'     => 'yes',
										'compare'   => '='
						      ),
						      array(
										'key'       => '_crb_citylist_showmain',
										'value'     => 'yes',
										'compare'   => '='
						      )
						    )
							));
							shuffle( $maincitylists );
							foreach ( array_slice($maincitylists, 0, 9) as $citylist ): ?>
								<?php if($citylist): ?>
									<?php
									$find_all_hotels_term = get_terms(
										'citylist', array(
											'parent' => $citylist->term_id, 
											'hide_empty' => false,
											'meta_query' => array(
									      array(
													'key'       => '_crb_citylist_all_category',
													'value'     => 'yes',
													'compare'   => '='
									      )
									    ),
										)
									);
									if ($find_all_hotels_term[0]->term_id) {
										$term_hotels_all_id = $find_all_hotels_term[0]->term_id;
									} else {
										$term_hotels_all_id = $citylist->term_id;
									}
									?>
									<li class="mb-2">
										<a href="<?php echo get_term_link($term_hotels_all_id, 'citylist'); ?>" class="blue-links"><?php echo $citylist->name ?></a>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
						<div>
							<a href="<?php echo get_page_url('tpl_allcity') ?>" class="blue-links"><?php _e('Все города', 'restx'); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Основной контент -->
		<div class="w-full lg:w-9/12 pl-0 lg:pl-8">
			<!-- Хлебные крошки (pc) -->
			<div class="block mb-4">
				<div class="breadcrumbs" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
		      <ul>
						<li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem'>
							<a itemprop="item" href="<?php echo home_url(); ?>">
								<span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
							</a>                        
							<meta itemprop="position" content="1">
						</li>
						<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
			        <a itemprop="item" href="<?php echo get_post_type_archive_link('wow'); ?>">
			          <span itemprop="name"><?php _e( 'Жилье в Украине', 'restx' ); ?></span>
			        </a>                        
			        <meta itemprop="position" content="2">
			      </li>
		      </ul>
		    </div>
			</div>
			<h1 class="text-2xl lg:text-4xl mb-6"><?php _e('Снять жилье в Украине', 'restx'); ?></h1>
			<!-- Все жилье, что есть -->
			<div class="flex flex-wrap lg:-mx-2 mb-6" id="response">
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
				) );
				if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
				  	<div class="w-1/2 lg:w-1/3 px-1 mb-2">
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
		</div>
	</div>
</div>

<?php get_footer(); ?>