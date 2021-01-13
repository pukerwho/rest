<div class="homehero pb-8 pt-24 lg:pb-12 lg:pt-16">
	<div class="container mx-auto">
		<div class="flex justify-center">
			<div class="w-full lg:w-9/12 text-center">
				<h1 class="text-5xl uppercase mb-5"><?php _e( 'Отдых в ', 'restx' ); ?><span><?php _e( 'Украине', 'restx' ); ?></span></h1>
				<p class="text-lg mb-5 px-4 lg:px-0">
					<?php _e('Куда поехать? Где жить? Что посмотреть? Как добраться? Все ответы на одном сайте', 'restx'); ?>.
				</p>
			</div>
		</div>
		<div class="flex justify-center">
			<div class="w-full lg:w-7/12 pc-show text-center">
				<div class="homehero__block">
					<div class="homehero__block-cities mb-2">
						<input list="homehero_city" id="my_welcome_city" name="myCity" placeholder="<?php _e( 'Введите город', 'restx' ); ?>"  onchange="setCity(this)"/>
					  <datalist id="homehero_city">
					  	<?php $maincitylists = get_terms( array( 'taxonomy' => 'citylist', 'parent' => 0, 'hide_empty' => false) );
								foreach ( $maincitylists as $citylist ): ?>
							  <option value="<?php echo $citylist->name ?>" data-link="<?php echo get_term_link($citylist); ?>">
					  	<?php endforeach; ?>
					  <script type="text/javascript">
					  	function setCity(city) {
					  		var el = document.querySelector(".homehero__block-cities option[value='" + city.value + "']");
					  		var city_link = el.getAttribute('data-link');
					  		window.location = city_link;
					  	}
					  </script>
					</div>
					<div class="homehero__block-advice">
						<li><?php _e( 'Например', 'restx' ); ?>: </li>
						<?php if (get_locale() == 'ru_RU'): ?>
							<li><a href="/citylist/kirillovka/"><?php _e( 'Кирилловка', 'restx' ); ?></a></li>
							<li><a href="/citylist/berdynsk/"><?php _e( 'Бердянск', 'restx' ); ?></a></li>
							<li><a href="/citylist/zatoka/"><?php _e( 'Затока', 'restx' ); ?></a></li>
						<?php endif; ?>
						<?php if (get_locale() == 'uk'): ?>
							<li><a href="/uk/citylist/kirilivka/">Кирилівка</a></li>
							<li><a href="/uk/citylist/berdjansk/">Бердянськ</a></li>
							<li><a href="/uk/citylist/zatoka-uk/">Затока</a></li>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>