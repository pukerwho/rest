<div class="city_filter mb-5">
	<div class="city_filter_items">
		<div class="city_filter_item mr-2">
			Отсортировать по
		</div>
		<div class="select_container">
			<select class="select select-schedule-city">
				<option value="date">дате</option>
				<option value="rating">рейтингу</option>
				<option value="price">цене</option>
			</select>
			<input type="hidden" value="<?php echo get_queried_object_id() ?>" class="city_filter_id">
			<svg class="IconV2 Select-icon IconV2--position-default IconV2--display-inlineBlock" width="16" height="16" viewBox="0 0 16 16"><path d="M3.619 3.729h8.762a.75.75 0 0 1 .637 1.146l-4.381 7.042a.75.75 0 0 1-1.274 0L2.982 4.875a.75.75 0 0 1 .637-1.146z" fill="#c4c3c0" fill-rule="evenodd"></path></svg>
		</div>
	</div>
</div>