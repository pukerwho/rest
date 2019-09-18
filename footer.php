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
                        <?php if( !is_page_template( 'tpl_main.php' )): ?>
                            2019 &copy; Vidpochivai.com.ua
                        <? else: ?>
                            2019 &copy; 
                            <span typeof="v:Breadcrumb"> <a href="https://vidpochivai.com.ua/" rel="v:url" property="v:title"> Vidpochivai.com.ua</a> › </span> <span typeof="v:Breadcrumb"> <a href="https://vidpochivai.com.ua//#best" rel="v:url" property="v:title">Только проверенные предложения!</a> </span>

                        <?php endif ?>
                    </div>
                    <div>
                        <a href="/citylist/jaremche/">Отдых в Яремче</a>,
                        <a href="/citylist/dragobrat/">Отдых в Драгобрате</a>,
                        <a href="/citylist/vorohta/">Отдых в Ворохте</a>,
                        <a href="/citylist/bukovel/">Отдых в Буковели</a>,
                        <a href="/citylist/jablunica/">Отдых в Яблонице</a>
                    </div>
                </div>
    		</div>
    	</div>
    </footer>
    <div class="mobile-show">
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
    </div>
    <div class="send-message-modal">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-5 col-sx-6 col-lg-6">
                    <div class="send-message-modal__box">
                        <div class="send-message-modal__close">
                            <img src="<?php bloginfo('template_url') ?>/img/modal-close.svg" width="20px" alt="">
                        </div>
                        <div class="send-message-modal__form">
                            <?php if( is_singular( 'hotels' )): ?>
                                <?php echo do_shortcode('[contact-form-7 id="2847" title="Сообщить о неточности"]') ?>
                                <?php else: ?>
                                   <?php echo do_shortcode('[contact-form-7 id="3640" title="Поделиться видео"]') ?> 
                            <?php endif ?>
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