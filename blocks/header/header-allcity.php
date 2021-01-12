<div class="header__allcity-content">
	<div class="header__allcity-item">
		<div class="d-flex align-items-center mb-5">
			<img src="<?php bloginfo('template_url') ?>/img/blacksea.svg" alt="" width="40px" class="mr-3">
			<h2 class="mb-0">Черное море</h2>	
		</div>	
		<?php $citylists = get_terms( array( 
			'taxonomy' => 'citylist', 
			'parent' => 0, 
			'hide_empty' => false,
			'meta_key' => '_crb_citylist_location',
		  'meta_value' => 'blacksea'
		) );
		foreach ( $citylists as $citylist ): ?>
			<li>
				<a href="<?php echo get_term_link($citylist); ?>">
					<?php echo $citylist->name ?>
				</a>	
			</li>
		<?php endforeach; ?>
	</div>
	<div class="header__allcity-item">
		<div class="flex items-center mb-5">
			<img src="<?php bloginfo('template_url') ?>/img/azovsea.svg" alt="" width="40px" class="mr-3">
			<h2 class="mb-0">Азовское море</h2>	
		</div>	
		<?php $citylists = get_terms( array( 
			'taxonomy' => 'citylist', 
			'parent' => 0, 
			'hide_empty' => false,
			'meta_key' => '_crb_citylist_location',
		  'meta_value' => 'azovsea'
		) );
		foreach ( $citylists as $citylist ): ?>
			<li>
				<a href="<?php echo get_term_link($citylist); ?>">
					<?php echo $citylist->name ?>
				</a>	
			</li>
		<?php endforeach; ?>
	</div>
	<div class="header__allcity-item">
		<div class="flex items-center mb-5">
			<img src="<?php bloginfo('template_url') ?>/img/mountains.svg" alt="" width="40px" class="mr-3">
			<h2 class="mb-0">Карпаты</h2>	
		</div>	
		<?php $citylists = get_terms( array( 
			'taxonomy' => 'citylist', 
			'parent' => 0, 
			'hide_empty' => false,
			'meta_key' => '_crb_citylist_location',
		  'meta_value' => 'karpaty'
		) );
		foreach ( $citylists as $citylist ): ?>
			<li>
				<a href="<?php echo get_term_link($citylist); ?>">
					<?php echo $citylist->name ?>
				</a>	
			</li>
		<?php endforeach; ?>
	</div>
</div>