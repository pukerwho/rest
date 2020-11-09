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
                <div class="modal_menu_item settings_item">
                    <a href="<?php echo get_post_type_archive_link('way'); ?>"><?php _e( 'Маршруты', 'restx' ); ?></a>
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