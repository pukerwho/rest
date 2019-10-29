<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="alternate" hreflang="uk" href="<?php echo home_url(); ?>/uk">

  <?php
  // ENQUEUE your css and js in inc/enqueues.php

    wp_head();
	?>
  <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-135287974-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-135287974-1');
  </script>
</head>
<body <?php echo body_class(); ?>>
  <!-- <div class="preloader"></div> -->
  <?php 
    date_default_timezone_set('Europe/Kiev');
    $current_hour = date('H');
    if ($current_hour < 12 & $current_hour >= 6) {
      $menu_class = 'dark';
    }
    else if ($current_hour < 19 & $current_hour >= 12) {
      $menu_class = 'dark';
    }
    else if ($current_hour < 22 & $current_hour >= 19) {
      $menu_class = 'light';
    }
    else if ($current_hour >= 22) {
      $menu_class = 'light';
    }
  ?>
  <header id="header" class="header <?php echo $menu_class ?>" role="banner">
    <div class="container-fluid">
      <div class="header__content">
        <div class="d-flex align-items-center">
          <a href="<?php echo home_url(); ?>" class="header__logo">
            <span class="header__logo__icon"></span>
            <span class="header__logo__icon-two"></span>
            <!-- <div class="header__logo__title">
              <div class="header__logo__title-first">
                Відпочивай  
              </div>
              <div class="header__logo__title-second">
                Відпочивай
              </div>
            </div> -->
          </a>
          <div class="header__cities hero__block-cities ml-5">
            <input list="hero_city" id="my_hero_city" name="myCity" placeholder="<?php _e( 'Введите город', 'restx' ); ?>"  onchange="setCity(this)"/>
            <datalist id="hero_city">
              <?php $maincitylists = get_terms( array( 'taxonomy' => 'citylist', 'parent' => 0, 'hide_empty' => false) );
                foreach ( $maincitylists as $citylist ): ?>
                <option value="<?php echo $citylist->name ?>" data-link="<?php echo get_term_link($citylist); ?>">
              <?php endforeach; ?>
            <script type="text/javascript">
              function setCity(city) {
                var el = document.querySelector(".hero__block-cities option[value='" + city.value + "']");
                var city_link = el.getAttribute('data-link');
                window.location = city_link;
              }
            </script>
          </div>
        </div>
        <!-- <div class="header__mobile__menu mobile-show">
          <div class="btn bg-pastel-blue">Меню</div>
        </div> -->
        <div class="header__mobile__cover mobile-show">
          <div class="header__mobile__logo">
            <a href="<?php echo home_url(); ?>" class="header__logo">
              <span class="header__logo__icon"></span>
              <div class="header__logo__title">
                
              </div>
            </a>
          </div>
          <div class="header__mobile__close">
            <div class="btn bg-pastel-blue"><?php _e( 'Закрыть меню', 'restx' ); ?></div>
          </div>
          <div class="header__mobile__nav">
            <?php wp_nav_menu( array(
              'theme_location'  => 'head_menu',
              'menu'            => '', 
              'container'       => 'nav', 
              'container_class' => 'header__mobile__nav__wrap',
              'menu_id'         => '',
              'echo'            => true,
              'fallback_cb'     => 'wp_page_menu',
              'before'          => '',
              'after'           => '',
              'link_before'     => '',
              'link_after'      => '',
              'items_wrap'      => '<ul class="wrap-menu">%3$s</ul>',
              'depth'           => 0,
              'walker'          => '',
            )); ?>
          </div>
          <div class="header__mobile__wave">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1170 193">
      <path d="M1175 131.2c0 0-81-89.4-224.3-103.4S713 72 665 97c-86 46-148 63-271 7C221.7 25.5 56 104.5-4 197.4 -4 58.7-3.3 0.3-3.3 0.3L1175 0V131.2z"></path>
          </div>
        </div>
        <div class="header__right pc-show">
          <div class="header__menu">
            <li>
              <a href="/catalog"><?php _e( 'Каталог', 'restx' ); ?></a>
            </li>
            <li>
              <a href="/faq"><?php _e( 'Вопросы', 'restx' ); ?></a>
            </li>
            <li>
              <a href="/partner"><?php _e( 'Добавить предложение', 'restx' ); ?></a>
            </li>
            <?php
              $currentlang = get_bloginfo('language'); 
              $home_path = home_url();
            ?>
            <li class="lang">
              <a href="<?php echo ($currentlang === 'uk') ? '/main' : '/uk' ?>" class="<?php echo ($currentlang === 'uk') ? 'active' : '' ?>">Українською</a>
            </li>
          </div>
          <!-- <div class="allcity-button text-dark mr-5"><div class="btn bg-pastel-blue"><span class="allcity-button-open">Курорты</span><span class="allcity-button-close">Закрыть</span></div></div>
          <a href="<?php echo get_permalink( get_page_by_path( 'catalog' ) ); ?>" class="text-dark mr-5"><div class="btn bg-pastel-green">Каталог</div></a>
          <div class="search-button text-dark"><div class="btn bg-pastel-red">Поиск</div></div> -->
        </div>
      </div>
    </div>
  </header>
  <div class="b_search">
    <div class="b_search__close">
      <img src="<?php bloginfo('template_url') ?>/img/close.svg" width="25px" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="b_search__inner">
            <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>  
          </div>
        </div>
      </div>
    </div>
  </div>
  <section id="content" role="main">