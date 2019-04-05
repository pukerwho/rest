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

<div class="page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="mb-4">
					<div class="my-table">
						<div class="table-text">
							<h1>Отдых на Азовском море</h1>
							<p>Популярные направления</p>
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
						  'meta_value' => 'azovsea'
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
							  'meta_value' => 'azovsea'
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
							<h1>Популярные предложения</h1>
							<p>Где отдохнуть на Азовском море?</p>
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
					<p>С прошлого столетия побережье Азовского моря по праву считается лучшим местом для отдыха с детьми, для укрепления здоровья. В этом регионе сложился благоприятный климат, на курортах сформирована отличная инфраструктура туризма. Это позволяет замечательно провести время, получить массу впечатлений, заряд энергии, бодрости. Многочисленные курорты предоставляют возможность выбрать отдых на Азовском море 2019 с учетом личных предпочтений.</p>
					<h3>Преимущества отдыха на Азовском море</h3>
					<p>Отдых на Азовском море в Украине идеально подходит для семейного отпуска, романтической поездки, веселого времяпровождения в компании друзей. Основные преимущества обеспечивают особенности этого естественного водоема:</p>
					<p>
						<li>пляжи песчаные, пологие, безопасны даже для малышей;</li>
						<li>вода теплая, чистая, прогревается до 28° и выше;</li>
						<li>отсутствие опасных для купания мест, холодных течений;</li>
						<li>насыщенность воды полезными микроэлементами: бором, бромом, йодом;</li>
						<li>наличие целебных сульфидных грязей.</li>
					</p>
					<p>Не менее привлекательна развитая туристическая инфраструктура, позволяющая организовать досуг по своему вкусу. При этом цена отдыха на Азовском море умеренная, доступная для большинства туристов. Многочисленные отели, гостевые дома, базы отдыха на Азовском море позволяют каждому найти оптимальный вариант проживания.</p>
					<h3>Популярные курорты на Азовском море</h3>
					<p>Организовать комфортный, недорогой отдых на Азовском море можно в нескольких курортах. Наибольшей популярностью пользуются:</p>
					<p>
						<li><a href="<?php echo home_url(); ?>/citylist/berdynsk">Город-порт Бердянск.</a> Привлекательный курорт для почитателей развитой индустрии туризма. Пляжи оборудованы аквагорками, предлагаются все виды водных развлечений. В городе есть аттракционы, дельфинарий, зоопарк, много ресторанов, ночных клубов и др.</li>
						<li><a href="<?php echo home_url(); ?>/citylist/primorsk">Приморск.</a> Развивающийся курорт, расположенный на берегах моря и мелководного лимана. Можно поселиться в частном секторе, есть санатории, пансионаты на Азовском море для семейного отдыха. </li>
						<li><a href="<?php echo home_url(); ?>/citylist/kirillovka">Кирилловка.</a> Поселок с отлично развитой инфраструктурой. Отличную возможность для организации досуга обеспечивает наличие сафари-парка, луна-парка, дельфинария, аквапарка, конного цирка, ночных клубов. </li>
					</p>
					<p>На морском побережье много курортов различного статуса. Для грамотного выбора можно прочитать отзывы на отдых на Азовском море. Они помогут определиться с лучшим местом для проведения отпуска, оптимальным вариантом проживания.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>