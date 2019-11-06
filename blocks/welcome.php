<!-- WINTER EDITION -->
<?php 
	date_default_timezone_set('Europe/Kiev');
	$current_hour = date('H');
	$morning_bg = get_bloginfo('template_url').'/img/morning_bg.jpg';
	$day_bg = get_bloginfo('template_url').'/img/day_bg.jpg';
	$evening_bg = get_bloginfo('template_url').'/img/evening_bg.jpg';
	$night_bg = get_bloginfo('template_url').'/img/night_bg.jpg';
	if ($current_hour < 12 & $current_hour >= 6) {
		$current_bg = $morning_bg;
		$menu_class = 'morning';
	}
	else if ($current_hour < 19 & $current_hour >= 12) {
		$current_bg = $day_bg;
		$menu_class = 'day';
	}
	else if ($current_hour < 22 & $current_hour >= 19) {
		$current_bg = $evening_bg;
		$menu_class = 'evening';
	}
	else if ($current_hour >= 22) {
		$current_bg = $night_bg;
		$menu_class = 'night';
	}
	else if ($current_hour >= 0 & $current_hour < 6) {
		$current_bg = $night_bg;
		$menu_class = 'night';
	}
?>
<div class="hero" style="background: url(<?php echo $current_bg ?>); background-size: cover; -webkit-background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero__block">
					<h1 class="mb-3"><?php _e( 'Зимний отдых в Украине:', 'restx' ); ?></h1>
					<div class="hero__block-subtitle mb-4">
						<?php _e( 'Самый удобный сайт по отдыху', 'restx' ); ?>
					</div>
					<div class="hero__block-cities mb-4">
						<input list="hero_city" id="my_hero_city" name="myCity" placeholder="<?php _e( 'Введите город', 'restx' ); ?>"  onchange="setCity(this)"/>
					  <datalist id="hero_city">
					  	<?php $maincitylists = get_terms( array( 'taxonomy' => 'citylist', 'parent' => 0, 'hide_empty' => false) );
								foreach ( $maincitylists as $citylist ): ?>
							  <option value="<?php echo $citylist->name ?>" data-link="<?php echo get_term_link($citylist); ?>">
					  	<?php endforeach; ?>
					  <script type="text/javascript">
					  	function setCity(city) {
					  		var el = document.querySelector(".hero__block-cities option[value='" + city.value + "']");
					  		var city_link = el.getAttribute('data-link');
					  		window.location = city_link;
					  	}
					  </script>
					</div>
					<div class="hero__block-advice">
						<?php _e( 'Например', 'restx' ); ?>: 
						<li><a href="<?php echo get_term_link(223, 'citylist') ?>"><?php _e( 'Яремче', 'restx' ); ?></a></li>
						<li><a href="<?php echo get_term_link(237, 'citylist') ?>"><?php _e( 'Верховина', 'restx' ); ?></a></li>
						<li><a href="<?php echo get_term_link(227, 'citylist') ?>"><?php _e( 'Ворохта', 'restx' ); ?></a></li>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <div class="welcome">	
	<div class="welcome__text">
		<h1>Летний<br>отдых<br> в Украине</h1>
		<p>Самый удобный сайт по отдыху</p>
	</div>
	<div class="welcome__photos">
		<div class="welcome__photos__row">
			<img src="<?php bloginfo('template_url'); ?>/img/IMG_01.jpg" alt="">
			<img src="<?php bloginfo('template_url'); ?>/img/IMG_02.jpg" alt="">
			<img src="<?php bloginfo('template_url'); ?>/img/IMG_03.jpg" alt="">
			<img src="<?php bloginfo('template_url'); ?>/img/IMG_04.jpg" alt="">
			<img src="<?php bloginfo('template_url'); ?>/img/IMG_05.jpg" alt="">
		</div>
		<div class="welcome__photos__row">
			<img src="<?php bloginfo('template_url'); ?>/img/IMG_06.jpg" alt="">
			<img src="<?php bloginfo('template_url'); ?>/img/IMG_07.jpg" alt="">
			<img src="<?php bloginfo('template_url'); ?>/img/IMG_08.jpg" alt="">
			<img src="<?php bloginfo('template_url'); ?>/img/IMG_05.jpg" alt="">
			<img src="<?php bloginfo('template_url'); ?>/img/IMG_09.jpg" alt="">
		</div>
		<div class="welcome__photos__row">
			<img src="<?php bloginfo('template_url'); ?>/img/IMG_04.jpg" alt="">
			<img src="<?php bloginfo('template_url'); ?>/img/IMG_09.jpg" alt="">
			<img src="<?php bloginfo('template_url'); ?>/img/IMG_05.jpg" alt="">
			<img src="<?php bloginfo('template_url'); ?>/img/IMG_01.jpg" alt="">
			<img src="<?php bloginfo('template_url'); ?>/img/IMG_03.jpg" alt="">
		</div>
	</div>
</div> -->