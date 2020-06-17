<?php
/*
Template Name: Главная страница
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'blocks/welcome', 'default' ); ?>
<?php get_template_part( 'blocks/maincards', 'default' ); ?>
<div class="pt-5">
	<?php get_template_part( 'blocks/b_rest', 'default' ); ?>	
</div>
<div class="pt-5">
	<?php get_template_part( 'blocks/popularhotels', 'default' ); ?>	
</div>
<!-- <div class="pc-show pt-5">
	<?php /* get_template_part( 'blocks/gocity', 'default' ); */ ?>	
</div> -->
<div class="pt-5 pb-2">
	<?php get_template_part( 'blocks/p_main-blog', 'default' ); ?>	
</div>
<div class="pt-5">
	<?php get_template_part( 'blocks/familyhotels', 'default' ); ?>	
</div>
<div class="py-5">
	<?php get_template_part( 'blocks/way-slider', 'default' ); ?>	
</div>
<div class="py-5">
	<?php get_template_part( 'blocks/b_social', 'default' ); ?>	
</div>
<div class="pt-5">
	<?php get_template_part( 'blocks/premiumhotels', 'default' ); ?>	
</div>
<div class="pt-5">
	<?php get_template_part( 'blocks/nearseahotels', 'default' );  ?>	
</div> 
<div class="pt-5">
	<?php get_template_part( 'blocks/animalshotels', 'default' ); ?>	
</div>

<div class="container pt-5">
	<div class="row">
		<div class="col-md-12">
			<div class="b_rest__text citylist__text">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
					<!-- Вопросы и ответы -->
					<?php if (carbon_get_post_meta(get_the_ID(), 'crb_page_faq')): ?>
						<div id="citylist-faq" class="mt-5">
							<h2 class="mb-4">Вопросы и ответы</h2>
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