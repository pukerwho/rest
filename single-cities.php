<?php get_header(); ?>

<div class="single-cities">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="tabs">
					<div class="tab-button-outer mb-5">
						<ul class="nav nav-tabs" id="singleHotelTabs" role="tablist">
						  <li class="nav-item">
						    <a class="nav-link active" id="catalog-tab" data-toggle="tab" href="#catalog" role="tab" aria-controls="catalog" aria-selected="true">Каталог</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="place-tab" data-toggle="tab" href="#place" role="tab" aria-controls="place" aria-selected="false">Куда пойти</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="way-tab" data-toggle="tab" href="#way" role="tab" aria-controls="way" aria-selected="false">Как добраться</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="way-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false">Видео</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="cityreviews-tab" data-toggle="tab" href="#cityreviews" role="tab" aria-controls="cityreviews" aria-selected="false">Обсуждение</a>
						  </li>
						</ul>
					</div>
					
					<div class="tab-content" id="myTabContent">
					  <div class="tab-pane tab-single-hotel fade show active" id="catalog" role="tabpanel" aria-labelledby="catalog-tab">
					  	<div class="mb-5 lead">
					  		<?php get_template_part( 'blocks/city-hotel-catalog', 'default' ); ?>
					  	</div>
					  	<div><?php the_content(); ?></div>
					  </div>
					  <div class="tab-pane tab-single-hotel fade" id="place" role="tabpanel" aria-labelledby="place-tab">
					  	<h2>Раздел в разработке</h2>
					  </div>
					  <div class="tab-pane tab-single-hotel fade" id="way" role="tabpanel" aria-labelledby="way-tab">
					  	<h2>Еще нет ничего</h2>
					  </div>
					  <div class="tab-pane tab-single-hotel fade" id="video" role="tabpanel" aria-labelledby="video-tab">
					  	<h2>Тут будут видео</h2>
					  </div>
					  <div class="tab-pane tab-single-hotel fade" id="cityreviews" role="tabpanel" aria-labelledby="cityreviews-tab">
					  	<?php comments_template(); ?> 
					  </div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

<?php get_footer(); ?>