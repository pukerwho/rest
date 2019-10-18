<?php
/*
Template Name: Черное море
*/
?>

<?php get_header(); ?>
<?php $citylists_new = get_terms( array( 
	'taxonomy' => 'citylist', 
	'parent' => 0, 
	'hide_empty' => false,
	'meta_key' => '_crb_citylist_location',
  'meta_value' => 'blacksea'
) )
?>
<?php $term_ids = wp_list_pluck( $citylists_new, 'term_id' ); ?>

<div class="page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="mb-4">
					<div class="my-table">
						<div class="table-text">
							<h1><?php _e( 'Отдых на Черном море', 'restx' ); ?></h1>
							<p><?php _e( 'Популярные направления', 'restx' ); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<!-- MAINCARDS PC VERSION -->
				<div class="allcity">
					<div class="maincards__grid pc-show">
						<?php $citylists = get_terms( array( 
							'taxonomy' => 'citylist', 
							'parent' => 0, 
							'hide_empty' => false,
							'number' => 5,
							'meta_key' => '_crb_citylist_location',
						  'meta_value' => 'blacksea'
						) );
						foreach ( $citylists as $citylist ): ?>
						<div class="maincards__item">
							<a href="<?php echo get_term_link($citylist); ?>">
								<div class="maincards__item__card" style="background: url('<?php echo carbon_get_term_meta($citylist->term_id, 'crb_citylist_img' ); ?>')">
									<div class="maincards__item__card__title">
										<?php echo $citylist->name ?>
									</div>
								</div>
							</a>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<!-- MAINCARDS MOBILE VERSION -->
				<div class="mobile-show">
					<div class="allcity">
						<div class="maincards__grid">
							<?php $citylists = get_terms( array( 
								'taxonomy' => 'citylist', 
								'parent' => 0, 
								'hide_empty' => false,
								'number' => 6,
								'meta_key' => '_crb_citylist_location',
							  'meta_value' => 'blacksea'
							) );
							foreach ( $citylists as $citylist ): ?>
							<div class="maincards__item">
								<a href="<?php echo get_term_link($citylist); ?>">
									<div class="maincards__item__card" style="background: url('<?php echo carbon_get_term_meta($citylist->term_id, 'crb_citylist_img' ); ?>')">
										<div class="maincards__item__card__title">
											<?php echo $citylist->name ?>
										</div>
									</div>
								</a>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="mb-4">
					<div class="my-table">
						<div class="table-text">
							<h1><?php _e( 'Популярные предложения', 'restx' ); ?></h1>
							<p><?php _e( 'Где отдохнуть на Черном море?', 'restx' ); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mobile-hotels-grid mb-5">
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
			  	<div class="col-md-3">
			  		<?php get_template_part( 'blocks/hotel-card', 'default' ); ?>
			  	</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>

		<div class="row mb-5">
			<div class="col-md-12 text-center">
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
		<div class="row">
			<div class="col-md-12">
				<div class="b_rest__text">
					<p>С приходом курортного сезона тысячи жителей Украины, зарубежных туристов устремляются к благодатным черноморским берегам. Замечательный климат, развитая туристическая инфраструктура, большое количество вариантов проживания, умеренные цены позволяют организовать отличный отдых на Черном море 2019. </p>
					<h3>Общие критерии черноморских курортов Украины</h3>
					<p>Города, поселки, имеющие статус курорта, есть в нескольких областях: Николаевской, Одесской, Херсонской. Выбрать отдых на Черном море в Украине могут все категории туристов. 
					Курорты страны предлагают: </p>
					<p>
						<li>роскошные песчаные пляжи с пологим безопасным входом; </li>
						<li>развитую индустрию развлечений; </li>
						<li>сеть санаториев, пансионатов с различными лечебными профилями.</li>
					</p>
					<p>Цена отдыха на Черном море в большой степени зависит от варианта проживания. Почитатели максимального комфорта могут выбрать номера в фешенебельном отеле с широким спектром услуг. Желающие сэкономить затраты найдут оптимальные предложения в частном секторе, гостевых домах, мини-гостиницах. Можно предварительно почитать многочисленные отзывы на отдых на Черном море, которые помогут выбрать курорт и место проживания.</p>
					<h3>Самые популярные украинские курорты на Черном море</h3>
					<p>В категории украинских черноморских курортах наибольшей популярностью пользуются:</p>
					<p>
						<li><a href="<?php echo home_url(); ?>/citylist/gribovka">Поселок Грибовка (Одесская обл.).</a> Этот курорт неизменно выбирают туристы, желающие отлично провести время с детьми. Песчаные пляжи поселка отлично оборудованы, есть много детских площадок, аттракционов, дельфинарий, аквапарк. В Грибовке хорошие условия и для молодежного отдыха. Отлично провести время можно в ночных клубах, караоке, барах, воспользоваться водными развлечениями.</li>
						<li><a href="<?php echo home_url(); ?>/citylist/karolino-bugaz">Курорт Каролино-Бугаз (Одесская обл.).</a> Он одинаково привлекателен как для семейного, так и для молодежного отдыха. По всей территории расположены гостевые дома, пансионаты, отели. Курорт подойдет тем, кто ищет пансионат на Черном море для лечения. Здесь есть целебные грязи, помогающие избавиться от болезней суставов.</li>
						<li><a href="<?php echo home_url(); ?>/citylist/koblevo">Поселок Коблево (Николаевская обл.).</a> Курорт предоставляет возможность выбрать отели, пансионаты, базы отдыха на Черном море в украинском или молдавском секторе. Часть поселка, расположенная на украинской стороне, отлично подходит для спокойного семейного отдыха. В молдавском секторе активность не затихает, развлекаться и веселиться можно круглые сутки.</li>
					</p>
					<p>Желающие организовать полезный, недорогой отдых на Черном море могут отправиться в город <a href="<?php echo home_url(); ?>/citylist/skadovsk">Скадовск</a> в Херсонской области, в город <a href="<?php echo home_url(); ?>/citylist/chernomorsk">Черноморск</a> в Одесской области и др.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>