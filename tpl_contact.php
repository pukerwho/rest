<?php
/*
Template Name: Контакты
*/
?>

<?php get_header(); ?>

<div class="container mx-auto px-2 lg:px-0 pt-20 lg:pt-12 lg:pb-12">
	<div class="w-full mb-6">
		<div class="flex flex-col items-center">
			<h1 class="text-3xl lg:text-5xl text-uppercase text-center mb-4"><?php _e( 'Наши контакты', 'restx' ); ?></h1>
		</div>
	</div>
	<div class="flex justify-center contact_info">
		<div class="w-full lg:w-1/3">
			<h3 class="mb-4" style="display:inline-block;background:#fddd33;padding:0.25rem 1rem;">
				<?php _e('Позвоните нам', 'restx'); ?>:
			</h3>
			<div class="mb-5">
				<li><a href="tel:099-77-13-997">099-77-13-997</a></li>
				<li><a href="tel:098-35-00-394">098-35-00-394</a></li>
			</div>
			<h3 class="mb-4" style="display:inline-block;background:#fddd33;padding:0.25rem 1rem;">
				<?php _e('Напишите нам', 'restx'); ?>:
			</h3>
			<div class="mb-5">
				<li><a href="mailto:partner@vidpochivai.com.ua">partner@vidpochivai.com.ua</a></li>
			</div>
		</div>
		<div class="w-full lg:w-1/2">
			<form name="contacts">
				<div class="flex flex-col mb-3">
					<input type="text" name="Имя" placeholder="<?php _e('Имя или телефон', 'restx'); ?>" class="input-with-icon" required>
	        <textarea name="Сообщение" id="" rows="5" placeholder="Сообщение" class="w-full"></textarea>
	      </div>
					<button type="submit" class="btn-rest btn-rest-dark flex items-center">
	          <span class="mr-4"><?php _e('Отправить', 'restx'); ?></span>
	          <img src="<?php bloginfo('template_url'); ?>/img/white-arrow.svg" width="12px" class="mt-1">
	        </button>
	      </div>
			</form>
		</div>
		<div class="notice success_contact">
			<div class="notice_content notice_green">
				<?php _e('Спасибо за ваше сообщение', 'restx'); ?>.
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>