    </section>
    <hr>
    <div class="mobile-link">
        <a href="<?php echo get_permalink( get_page_by_path( 'catalog' ) ); ?>" class="mobile-link__item">
            <img src="<?php bloginfo('template_url') ?>/img/catalogue.svg" width="25px" alt="" class="mb-2">
            <span>Каталог</span>
        </a>
        <a class="mobile-link__item search-button">
            <img src="<?php bloginfo('template_url') ?>/img/loupe.svg" width="25px" alt="" class="mb-2">
            <span>Поиск</span>
        </a>
        <a href="https://docs.google.com/forms/d/1J14J9G1fIYQA2oXnfyNny0LkPT7QbLYFDwTGX2KfIuI/edit" target="_blank" class="mobile-link__item">
            <img src="<?php bloginfo('template_url') ?>/img/plus.svg" width="25px" alt="" class="mb-2">
            <span>Добавить</span>
        </a>
        <!-- <?php 
            if( !is_page_template( 'tpl_catalog.php' ) ){
                get_template_part('blocks/footer-info');
            } 
        ?> -->
    </div>

    <?php if( !is_page_template( 'tpl_faq.php' )): ?>
    <footer id="footer">
    	<div class="container py-5">
    		<div class="row align-items-center mb-5">
    			<div class="col-md-12 d-flex align-items-center flex-column text-center">
                    <div class="d-flex align-items-center mb-4">
                        <img src="<?php bloginfo('template_url') ?>/img/faq.svg" alt="" width="35px" class="mr-3">
                        <h2>Есть вопросы?</h2>
                    </div>
                    <div class="display-4 mb-5 pb-2">
                        <a href="<?php echo get_permalink( get_page_by_path( 'faq' ) ); ?>"><div class="btn bg-pastel-blue">Задавай!</div></a>    
                    </div>
                    
                    <div class="lead copyright">
                        2019 &copy; Vidpochivai.com.ua
                    </div>
                </div>
    		</div>
    	</div>
    </footer>
    <?php endif ?>
    <?php wp_footer(); ?>
</body>
</html>