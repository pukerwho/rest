    </section>
    <hr>
    <div class="mobile-show">
        <div class="add modal_menu">
            <div class="modal_menu_top add_top">
                <div class="modal_menu_item add_item">
                    <a href="<?php echo get_page_url('tpl_choose') ?>">
                        <?php _e( 'Добавить предложение', 'restx' ); ?>
                    </a>
                </div>
                <div class="modal_menu_item add_item">
                    <a href="<?php echo get_page_url('tpl_partner') ?>">
                        <?php _e( 'Условия размещения', 'restx' ); ?>
                    </a>
                </div>
            </div>
            <div class="modal_menu_bottom add_bottom">
                <div class="modal_menu_item add_item">
                    <a href="#">
                        <?php _e( 'Закрыть', 'restx' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-show">
        <div class="settings modal_menu">
            <div class="modal_menu_top settings_top">
                <div class="modal_menu_item settings_item">
                    <?php 
                        $currentlang = get_bloginfo('language'); 
                        $home_path = home_url();
                        $translations = pll_the_languages( array( 'hide_current' => 1, 'raw' => 1 ) ); 
                        foreach ($translations as $translation):
                        ?>
                        <li class="lang">
                            <a href="<?php echo $translation['url'] ?>" class="<?php echo ($currentlang === 'uk') ? 'active' : '' ?>">Українською</a>
                        </li>
                    <?php endforeach; ?>
                    </div>
                <div class="modal_menu_item settings_item search-button">
                    <a href="#"><?php _e( 'Поиск', 'restx' ); ?></a>
                </div>
            </div>
            <div class="modal_menu_bottom settings_bottom">
                <div class="modal_menu_item settings_item">
                    <a href="#">
                        <?php _e( 'Закрыть', 'restx' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-link">
        <a class="mobile-link__item add_btn">
            <img src="<?php bloginfo('template_url') ?>/img/plus.svg" width="25px" alt="" class="mb-2">
            <span><?php _e( 'Добавить', 'restx' ); ?></span>
        </a>
        <a class="mobile-link__item settings_btn">
            <img src="<?php bloginfo('template_url') ?>/img/setting.svg" width="25px" alt="" class="mb-2">
            <span><?php _e( 'Настройки', 'restx' ); ?></span>
        </a>
        <a href="<?php echo get_page_url('tpl_faq') ?>" class="mobile-link__item">
            <img src="<?php bloginfo('template_url') ?>/img/faq.svg" width="25px" alt="" class="mb-2">
            <span><?php _e( 'Вопросы', 'restx' ); ?></span>
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
                        <h2><?php _e( 'Есть вопросы?', 'restx' ); ?></h2>
                    </div>
                    <div class="display-4 mb-4 pb-2">
                        <a href="<?php echo get_page_url( 'tpl_faq' ); ?>"><div class="btn bg-pastel-blue"><?php _e( 'Задавай', 'restx' ); ?>!</div></a>    
                    </div>
                    <?php endif ?>
                    <?php if( !is_page_template( 'tpl_partner.php' )): ?>
                        <div class="b_partner mb-5">
                            <a href="<?php echo get_page_url( 'tpl_partner' ); ?>"><?php _e( 'Партнерство', 'restx' ); ?></a>
                        </div>
                    <?php endif ?>
                    
                    <div class="lead copyright">
                        <?php if( !is_page_template( 'tpl_main.php' )): ?>
                            2019 &copy; Vidpochivai.com.ua
                        <? else: ?>
                            2019 &copy; 
                            <span typeof="v:Breadcrumb"> <a href="https://vidpochivai.com.ua/" rel="v:url" property="v:title"> Vidpochivai.com.ua</a> › </span> <span typeof="v:Breadcrumb"> <a href="https://vidpochivai.com.ua//#best" rel="v:url" property="v:title"><?php _e( 'Только проверенные предложения!', 'restx' ); ?></a> </span>

                        <?php endif ?>
                    </div>
                    <div>
                        <?php if (get_locale() == 'ru_RU'): ?>
                            <a href="/citylist/jaremche/">Отдых в Яремче</a>,
                            <a href="/citylist/dragobrat/">Отдых в Драгобрате</a>,
                            <a href="/citylist/vorohta/">Отдых в Ворохте</a>,
                            <a href="/citylist/bukovel/">Отдых в Буковели</a>
                        <?php endif; ?>
                        <?php if (get_locale() == 'uk'): ?>
                            <a href="/uk/citylist/jaremche-uk/">Відпочинок в Яремче</a>,
                            <a href="/uk/citylist/dragobrat-uk/">Відпочинок у Драгобраті</a>,
                            <a href="/uk/citylist/vorohta-uk/">Відпочинок у Ворохті</a>,
                            <a href="/uk/citylist/bukovel-uk/">Відпочинок у Буковелі</a>
                        <?php endif; ?>
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
                                <?php _e( 'Мы вам перезвоним', 'restx' ); ?>
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
    <?php if( is_page_template( 'tpl_add.php' )): ?>
        <!-- Succass add hotel -->
        <div class="rest_modal">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="rest_modal_box">
                            <div class="mb-4">
                                <img src="<?php bloginfo('template_url') ?>/img/checked.svg" alt="" width="45px">
                            </div>
                            <h3 class="mb-4">Успешно отправлено</h3>
                            <div>
                                Спасибо, мы получили вашу заявку. В течении 24 часов, ваше предложение будет размещено на нашем сайте.
                            </div>
                        </div>
                        <div class="rest_modal_close">
                            <img src="<?php bloginfo('template_url') ?>/img/close.svg" alt="" width="15px" class="mr-3">
                            <span>Закрыть</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="rest_modal_bg"></div>
    <div class="modal-bg"></div>
    <?php wp_footer(); ?>
</body>
</html>