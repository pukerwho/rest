    </section>
    <div class="mobile-show">
        <div class="add modal_menu" data-bottom-btn="add_btn">
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
            <div class="modal_menu_bottom add_bottom modal_close_js">
                <div class="modal_menu_item add_item">
                    <a href="#">
                        <?php _e( 'Закрыть', 'restx' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-show">
        <div class="settings modal_menu" data-bottom-btn="settings_btn">
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
            <div class="modal_menu_bottom settings_bottom modal_close_js">
                <div class="modal_menu_item settings_item">
                    <a href="#">
                        <?php _e( 'Закрыть', 'restx' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-show">
        <div class="menu modal_menu" data-bottom-btn="menu_btn">
            <div class="modal_menu_top settings_top">
                <div class="modal_menu_item settings_item">
                    <a href="<?php echo get_page_url( 'tpl_allcity' ); ?>"><?php _e( 'Все курорты', 'restx' ); ?></a>
                </div>
                <div class="modal_menu_item settings_item">
                    <a href="<?php echo get_page_url( 'tpl_faq' ); ?>"><?php _e( 'Вопросы', 'restx' ); ?></a>
                </div>
                <div class="modal_menu_item settings_item">
                    <a href="<?php echo get_post_type_archive_link('blogs'); ?>"><?php _e( 'Блог', 'restx' ); ?></a>
                </div>
            </div>
            <div class="modal_menu_bottom settings_bottom modal_close_js">
                <div class="modal_menu_item settings_item">
                    <a href="#">
                        <?php _e( 'Закрыть', 'restx' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-link">
        <a class="mobile-link__item bottom_menu_js" data-bottom-btn="menu_btn">
            <img src="<?php bloginfo('template_url') ?>/img/menu.svg" width="25px" alt="" class="mb-2">
            <span><?php _e( 'Меню', 'restx' ); ?></span>
        </a>
        <a class="mobile-link__item bottom_menu_js" data-bottom-btn="add_btn">
            <img src="<?php bloginfo('template_url') ?>/img/plus.svg" width="25px" alt="" class="mb-2">
            <span><?php _e( 'Добавить', 'restx' ); ?></span>
        </a>
        <a class="mobile-link__item bottom_menu_js" data-bottom-btn="settings_btn">
            <img src="<?php bloginfo('template_url') ?>/img/setting.svg" width="25px" alt="" class="mb-2">
            <span><?php _e( 'Настройки', 'restx' ); ?></span>
        </a>
        <!-- <a href="<?php echo get_page_url('tpl_faq') ?>" class="mobile-link__item">
            <img src="<?php bloginfo('template_url') ?>/img/faq.svg" width="25px" alt="" class="mb-2">
            <span><?php _e( 'Вопросы', 'restx' ); ?></span>
        </a> -->
        <!-- <?php 
            if( !is_page_template( 'tpl_catalog.php' ) ){
                get_template_part('blocks/footer-info');
            } 
        ?> -->
    </div>

    <footer id="footer" class="footer bg-light">
    	<div class="container py-5">
            <div class="row footer_top">
                <div class="col-lg-3 mb-5">
                    <h3 class="mb-3"><?php _e('Популярные курорты', 'restx'); ?></h3>
                    <ul class="mb-3">
                        <?php if (get_locale() == 'ru_RU'): ?>
                            <li><a href="/citylist/kirillovka/">Отдых в Кирилловке</a></li>
                            <li><a href="/citylist/berdynsk/">Отдых в Бердянске</a></li>
                            <li><a href="/citylist/zatoka/">Отдых в Затоке</a></li>
                            <li><a href="/citylist/jelezniy-port/">Отдых в Железном порту</a></li>
                        <?php endif; ?>
                        <?php if (get_locale() == 'uk'): ?>
                            <li><a href="/uk/citylist/kirilivka/">Відпочинок у Кирилівці</a></li>
                            <li><a href="/uk/citylist/berdjansk/">Відпочинок у Бердянську</a></li>
                            <li><a href="/uk/citylist/zatoka-uk/">Відпочинок у Затоці</a></li>
                            <li><a href="/uk/citylist/zaliznij-port/">Відпочинок у Залізному порту</a></li>
                        <?php endif; ?>
                    </ul>
                    <div>
                        <a href="<?php echo get_page_url('tpl_allcity') ?>" class="footer_text_md"><?php _e('Все курорты','restx'); ?></a>
                    </div>
                </div>
                <div class="col-lg-3 mb-5">
                    <h3 class="mb-3"><?php _e('Автобусные перевозки', 'restx'); ?></h3>
                    <ul class="mb-3">
                        <?php 
                        $query_bus_footer = new WP_Query( array( 
                            'post_type' => 'way', 
                            'posts_per_page' => 4,
                            'order'    => 'DESC',
                        ) );
                        if ($query_bus_footer->have_posts()) : while ($query_bus_footer->have_posts()) : $query_bus_footer->the_post(); ?>
                            <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </ul>
                    <div>
                        <a href="<?php echo get_post_type_archive_link('way'); ?>" class="footer_text_md"><?php _e('Все маршруты','restx'); ?></a>
                    </div>
                </div>
                <div class="col-lg-3 mb-5">
                    <h3 class="mb-3"><?php _e('Наш блог', 'restx'); ?></h3>
                    <ul class="mb-3">
                        <?php 
                        $query_blog_footer = new WP_Query( array( 
                            'post_type' => 'blogs', 
                            'posts_per_page' => 4,
                            'order'    => 'DESC',
                        ) );
                        if ($query_blog_footer->have_posts()) : while ($query_blog_footer->have_posts()) : $query_blog_footer->the_post(); ?>
                            <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </ul>
                    <div>
                        <a href="<?php echo get_post_type_archive_link('blogs'); ?>" class="footer_text_md"><?php _e('Все записи','restx'); ?></a>
                    </div>
                </div>
                <div class="col-lg-3 mb-5">
                    <h3 class="mb-3"><?php _e('Полезные ссылки', 'restx'); ?></h3>
                    <ul>
                        <li><a href="<?php echo get_page_url('tpl_partner') ?>"><?php _e('Условия размещения','restx'); ?></a></li>
                        <li><a href="/policy"><?php _e('Политика конфиденциальности','restx'); ?></a></li>
                    </ul>
                </div>
            </div>
    		<div class="row footer_bottom align-items-center mb-5 mb-lg-0">
    			<div class="col-md-12 d-flex align-items-start flex-column-reverse flex-lg-row justify-content-between">
                    <div class="mr-0 mr-lg-4">
                        <div class="mb-4 mb-lg-0">
                            <?php _e('Эл. почта для связи', 'restx'); ?>: <a href="mailto:partner@vidpochivai.com.ua">partner@vidpochivai.com.ua</a>
                        </div>
                        <?php if( !is_page_template( 'tpl_main.php' )): ?>
                            2020 &copy; Vidpochivai.com.ua
                        <? else: ?>
                            2020 &copy; 
                            <span typeof="v:Breadcrumb"> <a href="https://vidpochivai.com.ua/" rel="v:url" property="v:title"> Vidpochivai.com.ua</a> › </span> <span typeof="v:Breadcrumb"> <a href="https://vidpochivai.com.ua//#best" rel="v:url" property="v:title"><?php _e( 'Только проверенные предложения!', 'restx' ); ?></a> </span>
                        <?php endif ?>
                    </div>
                    <div class="ml-0 ml-lg-4 mb-4 mb-lg-0">
                        <div>
                            ФОП ЧЕРЕПАХІН КИРИЛО СЕРГІЙОВИЧ, 3210414835    
                        </div>
                        <div>
                            ПЕЧЕРСЬКА ФIЛIЯ АТ КБ "ПРИВАТБАНК", UA803007110000026007052768086
                        </div>
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