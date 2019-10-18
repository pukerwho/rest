<div class="hotel-filter">
	<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="catalog-filter">
		<?php if( $terms = get_terms( array( 'taxonomy' => 'citylist', 'parent' => 0 ) ) ): ?>
			<div class="b_filter__item">
				<div class="select">
					<select id="b_filter__item-cityname" name="citylistfilter"><option><?php _e( 'Город', 'restx' ); ?></option>
						<?php foreach ($terms as $term): ?>
							<option value="<?php echo $term->term_id ?>"><?php echo $term->name ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
		<?php endif; ?>
		<div class="b_filter__item">
			<div class="multiselect">
		    <div class="selectBox select_collections_class">
		    	<div class="select">
			      <select>
			        <option><?php _e( 'Категория', 'restx' ); ?></option>
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
		</div>
		<!-- <div class="b_filter__item">
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
		</div> -->
		<div class="b_filter__item">
		  <div class="multiselect">
		  	<div class="selectBox select_price_class">
		    	<div class="select">
			      <select>
			        <option><?php _e( 'Цена', 'restx' ); ?></option>
			      </select>
			    </div>
		      <div class="overSelect"></div>
		    </div>
		    <div class="checkboxes price_filter_class">
		    	<div class="b_filter__range__price">
				    <div class="range-slider m-4">
			        <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
		            <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
		            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
		            <span tabindex="50" class="ui-slider-handle ui-corner-all ui-state-default"></span>
			        </div>
			        <div class="b_filter__range__text">
			        	<span id="min-price" data-currency="&#8372;" class="slider-price">0</span>
			        	<span>&#8372;</span>
			        </div>
			        <div class="b_filter__range__text">
				       <span id="max-price" data-currency="&#8372;" data-max="15000"  class="slider-price">15000</span>
				       <span>&#8372;</span>
			        </div>
				    </div> 
					</div>
		    </div>
		  </div>
		</div>
		<div class="b_filter__item">
		  <div class="btn-container">
		  	<button class="btn bg-pastel-green"><?php _e( 'Применить фильтр', 'restx' ); ?></button>	
		  </div>
		</div>
		<input type="hidden" id="price_min_value" name="b_filter_price_min" value="0">
		<input type="hidden" id="price_max_value" name="b_filter_price_max" value="15000">
		<input type="hidden" name="action" value="my_catalog_filter">
	</form>
</div>