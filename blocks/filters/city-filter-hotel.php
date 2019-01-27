<div class="hotel-filter">
	<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="city-filter">
		<div class="multiselect">
	    <div class="selectBox select_collections_class">
	    	<div class="select">
		      <select>
		        <option>Категория</option>
		      </select>
		    </div>
	      <div class="overSelect"></div>
	    </div>
	    <div class="checkboxes collections_filter_class">
	    	<?php if( $terms = get_terms( array( 'taxonomy' => 'collections', 'parent' => 0 ) ) ): ?>
	    		<?php foreach ($terms as $term): ?>
			      <label for="<?php echo $term->slug ?>">
			        <input type="checkbox" name="collectionsfilter[]" value="<?php echo $term->slug ?>" id="<?php echo $term->slug ?>" /><span><?php echo $term->name ?></span></label>
		      <?php endforeach; ?>
	      <?php endif; ?>
	    </div>
	  </div>
	  <div class="multiselect">
	    <div class="selectBox select_numers_class">
	    	<div class="select">
		      <select>
		        <option>Номера</option>
		      </select>
		    </div>
	      <div class="overSelect"></div>
	    </div>
	    <div class="checkboxes numers_filter_class">
	    	<label for="budget">
        <input type="checkbox" name="budgetfilter" value="1" id="budget" /><span>Бюджетные</span></label>
        <label for="half-lux">
        <input type="checkbox" name="halfluxfilter" value="1" id="half-lux" /><span>Полу-люкс</span></label>
        <label for="lux">
        <input type="checkbox" name="luxfilter" value="1" id="lux" /><span>Люкс</span></label>
	    </div>
	  </div>
	  <input type="hidden" name="citynamefilter" value="<?php echo get_queried_object_id() ?>">
	  <div class="btn-container">
	  	<button class="btn bg-paster-green">Применить фильтр</button>	
	  </div>
		<input type="hidden" name="action" value="my_city_filter">
	</form>
</div>