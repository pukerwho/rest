<?php
/*
Template Name: Главная страница
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'blocks/home/homehero', 'default' ); ?>
<?php get_template_part( 'blocks/home/homecities', 'default' ); ?>
<?php get_template_part( 'blocks/home/homehotels', 'default' ); ?>
<?php get_template_part( 'blocks/home/homeplaces', 'default' ); ?>
<div class="pt-5 pb-2">
	<?php get_template_part( 'blocks/home/homeblog', 'default' ); ?>	
</div>
<div class="py-5">
	<?php get_template_part( 'blocks/home/homebus', 'default' ); ?>	
</div>

<div class="container mx-auto px-2 lg:px-0 py-8">
	<div class="flex">
		<div class="w-full">
			<div class="content">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="content">
						<?php the_content(); ?>
					</div>
					<!-- Вопросы и ответы -->
					<?php if (carbon_get_post_meta(get_the_ID(), 'crb_page_faq')): ?>
						<div id="citylist-faq" class="content mt-8">
							<h2 class="mb-6">Вопросы и ответы</h2>
							<div>
								<ul itemscope itemtype="https://schema.org/FAQPage">
									<?php 
									$page_faqs = carbon_get_post_meta(get_the_ID(), 'crb_page_faq');
									foreach( $page_faqs as $page_faq ): ?>
										<li itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
											<h4 class="zag" itemprop="name">
												<?php echo $page_faq['crb_page_faq_question'] ?>
											</h4>
											<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
												<div class="lead" itemprop="text">
													<p><?php echo $page_faq['crb_page_faq_answer'] ?></p>
												</div>
											</div>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
					<?php endif; ?>
					<!-- end Вопросы и ответы -->
				<?php endwhile; else: ?>
					<p><?php _e('Ничего не найдено'); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>