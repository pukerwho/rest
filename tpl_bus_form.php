<?php
/*
Template Name: Автобусные перевозки (ФОРМА)
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="custom-page bus_form">
	<div class="container py-5">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center"><?php the_title(); ?></h1>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div>
					<?php the_content(); ?>
				</div>
				<form name="bus-form">
					<div>
						<label for="Перевозчик"><?php _e( 'Кто перевозчик? (Название компании)', 'restx' ); ?></label>
						<input type="text" name="Перевозчик" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
					</div>
					<div>
						<label for="Телефон"><?php _e( 'Ваш контактный телефон для связи', 'restx' ); ?></label>
						<input type="text" name="Телефон" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
					</div>
					<div class="bus_form_add_way mb-4">
						<span>+ Добавить рейс</span>
					</div>
					<span class="bus_form_success d-none p-3">Сообщение успешно отправлено</span>
					<button type="submit" class="contact_send bg-blue-700">Отправить</button>
				</form>		
			</div>
		</div>
		
	</div>
</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>