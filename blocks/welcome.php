<!-- WINTER EDITION -->
<?php 
	date_default_timezone_set('Europe/Kiev');
	$current_hour = date('H');
	$morning_bg = get_bloginfo('template_url').'/img/morning_bg_sea.jpg';
	$day_bg = get_bloginfo('template_url').'/img/day_bg_sea.jpg';
	$evening_bg = get_bloginfo('template_url').'/img/evening_bg_sea.jpg';
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
<div class="hero mb-5" style="background: url(<?php echo $current_bg ?>); background-size: cover; -webkit-background-size: cover; background-position-y: 40%;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="<?php echo $menu_class; ?> text-center text-uppercase mb-5"><?php _e( 'Отдых в Украине', 'restx' ); ?></h1>
				<div class="hero__block">
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
						<li><?php _e( 'Например', 'restx' ); ?>: </li>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>