<?php get_header(); ?>
<div style="background: url(<?php bloginfo('template_url'); ?>/img/bg-bottom.svg) center bottom/105% no-repeat;">
	<div class="container py-5">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center font-gagalin"><?php the_title(); ?></h1>
				<div class="text-center maingreen mb-4">		
					<svg viewBox="0 0 67 17" preserveAspectRatio="none" focusable="false" class="_zdxht7" style="height: 15px;"><path fill="currentColor" d="M66.422 3.471c-3.874-1.387-8.03-1.944-12.153-2.313A286.65 286.65 0 0 0 41.283.312 299.882 299.882 0 0 0 15.42.315C10.544.522 5.675.837.82 1.25c-.767.065-.494 1.049.256.984C18.04.767 35.242.832 52.276 2.214c4.267.347 8.548.796 12.613 2.06-.714.38-1.659.45-2.49.508-1.681.118-3.368.193-5.054.254-3.323.118-6.651.157-9.979.175-6.586.036-13.177-.005-19.75.308-3.727.177-7.443.477-11.126.965-.512.068-.866.607-.584 1.02.507.741 1.333 1.13 2.273 1.33 1.17.25 2.375.404 3.563.562 2.625.349 5.264.583 7.9.853 4.758.487 9.528 1.124 14.026 2.68 2.43.842 4.631 2.024 6.759 3.348.606.377 1.446-.345.887-.838-3.091-2.724-7.517-4.264-11.687-5.201-4.773-1.073-9.682-1.428-14.55-1.935a119.4 119.4 0 0 1-4.363-.52c-.452-.064-.908-.125-1.36-.199 12.723-1.453 25.652-.78 38.463-1.334 1.827-.08 3.675-.133 5.489-.325 1.347-.142 2.72-.5 3.496-1.527.267-.355.053-.772-.38-.927"></path></svg>
				</div>
				<div class="lead text-center">Реальный результат нашей работы</div>
			</div>
		</div>
	</div>
</div>

<div class="bg-white">
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="lead">
						<?php the_content(); ?>		
					</div>
				<?php endwhile; else: ?>
					<p><?php _e('Сорямба, ничего нет.'); ?></p>
				<?php endif; ?>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-10">
				<hr style="background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiIHZpZXdCb3g9IjAgMCAxMTkgNiI%2BPHBhdGggZD0iTTExOSAzLjhjLTYwIDIuNS0zMy41LTctMTE5IDAiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzNjYjM3MCIgc3Ryb2tlLXdpZHRoPSIyIi8%2BPC9zdmc%2B) center/5em 100% repeat-x; height: 0.3em; margin: 3em 0; border: 0;">
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="lead mb-5">Готовы начать? Есть вопросы? Напишите нам!</div>
				<?php echo do_shortcode('[contact-form-7 id="21" title="Заявка"]'); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>