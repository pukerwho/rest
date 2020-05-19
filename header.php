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
  <?php if (is_singular('blogs')): ?>
    <meta property="og:article:published_time" content="<?php echo get_post_time('Y/n/j'); ?>" />
    <meta property="og:article:article:modified_time" content="<?php echo get_the_modified_time('Y/n/j'); ?>" />
    <meta property="og:article:author" content="<?php echo get_the_author(); ?>" />
  <?php endif; ?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-135287974-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-135287974-1');
  </script>
  <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '410771662818150');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=410771662818150&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->
</head>
<body <?php echo body_class(); ?>>
  <!-- <div class="preloader"></div> -->
  <header id="header" class="header" role="banner">
    <div class="container-fluid">
      <div class="header__content">
        <div class="d-flex align-items-center">
          <a href="<?php echo home_url(); ?>" class="header__logo">
            <span class="header__logo__icon"></span>
            <span class="header__logo__icon-two"></span>
            <span class="header__logo__text text-2xl ml-5">Vidpochivai.com.ua</span>
          </a>
          <div class="header__cities hero__block-cities ml-5">
            <input list="hero_city" id="my_hero_city" name="myCity" placeholder="<?php _e( 'Введите город', 'restx' ); ?>"  onchange="setCity(this)"/>
            <datalist id="hero_city">
              <?php $maincitylists = get_terms( array( 'taxonomy' => 'citylist', 'parent' => 0, 'hide_empty' => false, 'orderby' => 'name', 'order' => 'DESC', 'meta_key' => '_crb_citylist_iscurort', 'meta_value' => 'yes') );
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
        
        <div class="header__right pc-show">
          <div class="header__menu">
            <div class="has-submenu">
              <li>
                <a href="#"><?php _e( 'Курорты', 'restx' ); ?></a>
              </li>
              <div class="submenu">
                <li><a href="<?php echo get_page_url( 'tpl_karpaty' ); ?>"><?php _e( 'Карпаты', 'restx' ); ?></a></li>
                <li><a href="<?php echo get_page_url( 'tpl_blacksea' ); ?>"><?php _e( 'Черное море', 'restx' ); ?></a>
                <li><a href="<?php echo get_page_url( 'tpl_azovsea' ); ?>"><?php _e( 'Азовское море', 'restx' ); ?></a></li>
              </div>
            </div>
            <li>
              <a href="<?php echo get_post_type_archive_link('blogs'); ?>"><?php _e( 'Блог', 'restx' ); ?></a>
            </li>
            <li>
              <a href="<?php echo get_page_url( 'tpl_faq' ); ?>"><?php _e( 'Вопросы', 'restx' ); ?></a>
            </li>
            <li>
              <a href="<?php echo get_page_url( 'tpl_partner' ); ?>"><?php _e( 'Добавить предложение', 'restx' ); ?></a>
            </li>
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
  <section id="content" role="main" class="mb-5">