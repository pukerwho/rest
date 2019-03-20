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
        <a href="<?php echo get_permalink( get_page_by_path( 'faq' ) ); ?>" class="mobile-link__item">
            <img src="<?php bloginfo('template_url') ?>/img/faq.svg" width="25px" alt="" class="mb-2">
            <span>Вопросы</span>
        </a>
        <!-- <?php 
            if( !is_page_template( 'tpl_catalog.php' ) ){
                get_template_part('blocks/footer-info');
            } 
        ?> -->
    </div>

    <footer id="footer">
    	<div class="container py-5">
    		<div class="row align-items-center mb-5">
    			<div class="col-md-12 d-flex align-items-center flex-column text-center">
                    <?php if( !is_page_template( 'tpl_faq.php' )): ?>
                    <div class="d-flex align-items-center mb-4">
                        <img src="<?php bloginfo('template_url') ?>/img/faq.svg" alt="" width="35px" class="mr-3">
                        <h2>Есть вопросы?</h2>
                    </div>
                    <div class="display-4 mb-4 pb-2">
                        <a href="<?php echo get_permalink( get_page_by_path( 'faq' ) ); ?>"><div class="btn bg-pastel-blue">Задавай!</div></a>    
                    </div>
                    <?php endif ?>
                    <?php if( !is_page_template( 'tpl_partner.php' )): ?>
                        <div class="b_partner mb-5">
                            <a href="<?php echo get_permalink( get_page_by_path( 'partner' ) ); ?>">Партнерство</a>
                        </div>
                    <?php endif ?>
                    
                    <div class="lead copyright">
                        2019 &copy; Vidpochivai.com.ua
                    </div>
                </div>
    		</div>
    	</div>
    </footer>
    <div class="modal-callback">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="m_callback__box">
                        <div class="m_callback__title mb-4">
                            Мы вам перезвоним
                        </div>
                        <div class="m_callback__form">
                            <?php echo do_shortcode('[contact-form-7 id="2225" title="Callback"]') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-bg"></div>
    <?php wp_footer(); ?>
</body>
</html>