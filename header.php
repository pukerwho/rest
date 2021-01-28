<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/img/restx-logo.png">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;500;700&display=swap" crossorigin>
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <link rel="alternate" hreflang="uk" href="<?php echo home_url(); ?>/uk">
  <!-- <link rel="stylesheet" href="../css/style.css" inline> -->
  <?php
    wp_head();
	?>
  <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>">
  <?php if (is_singular('blogs')): ?>
    <meta property="og:article:published_time" content="<?php echo get_post_time('Y/n/j'); ?>" />
    <meta property="og:article:article:modified_time" content="<?php echo get_the_modified_time('Y/n/j'); ?>" />
    <meta property="og:article:author" content="<?php echo get_the_author(); ?>" />
    <!-- <script data-ad-client="ca-pub-6649504422654100" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
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
    <!-- HEADER TOP -->
    <div class="header_top py-3">
      <div class="container mx-auto px-2 lg:px-0">
        <div class="flex">
          <div class="w-full flex items-center justify-between">
            <div class="header_top_social flex items-center">
              <li class="mr-4">
                <a href="https://www.facebook.com/vidpochivai" target="_blank">
                  <img src="<?php bloginfo('template_url'); ?>/img/facebook-white.svg" width="18px">
                </a>
              </li>
              <li class="mr-4">
                <a href="https://www.instagram.com/vidpochivai_tut/" target="_blank">
                  <img src="<?php bloginfo('template_url'); ?>/img/instagram-white.svg" width="18px">
                </a>
              </li>
              <li class="mr-4">
                <a href="https://www.youtube.com/channel/UC8aL1GxvTKVEdzp8Za3Gqig" target="_blank">
                  <img src="<?php bloginfo('template_url'); ?>/img/youtube-white.svg" width="20px">
                </a>
              </li>
            </div>
            <div class="flex items-center">
              <div class="mr-5">
                <div class="header__cities hero__block-cities mr-5">
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
                <li class="header_search">
                  <img src="<?php bloginfo('template_url') ?>/img/header_search.svg" class="header_search_icon">
                  <!-- <img src="<?php bloginfo('template_url') ?>/img/close.svg"> -->
                </li>
              </div>
              <div>
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
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- HEADER BOTTOM -->
    <div class="header_bottom">
      <div class="container mx-auto px-2 lg:px-0">
        <div class="header__content">

          <!-- mobile toggle -->
          <div class="mobile-show">
            <div class="header__mobile_toggle">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
          <!--  end mobile toggle -->

          <!-- header logo -->
          <div class="flex items-center">
            <a href="<?php echo home_url(); ?>" class="header__logo">
              <img src="<?php bloginfo('template_url') ?>/img/new_logo.svg" alt="">
            </a>
          </div>
          <!-- end header logo -->

          <!-- mobile add btn -->
          <div class="mobile-show">
            <div class="header__mobile_add">
              <a href="<?php echo get_page_url( 'tpl_partner' ); ?>">
                <img src="<?php bloginfo('template_url') ?>/img/plus.svg" alt="">  
              </a>
            </div>
          </div>
          <!-- end mobile add btn -->

          <!-- header nav -->
          <div class="pc-show">
            <?php wp_nav_menu([
              'theme_location' => 'head_menu',
              'menu_id' => 'head_menu',
              'menu_class' => 'header__menu'
            ]); ?>
          </div>
          <!-- end header nav -->

          <!-- header add btn -->
          <div class="pc-show">
            <div class="btn-rest btn-rest-yellow flex items-center js-openmodal-click" data-modal-id="add">
              <span class="mr-3"><?php _e( 'Добавить', 'restx' ); ?></span>
              <img src="<?php bloginfo('template_url'); ?>/img/plus-common.svg" width="15px">
            </div>  
          </div>
          <!-- end header add btn -->
        </div>
      </div>
    </div>
    <!-- HEADER FIXED -->
    <div class="hidden header_bottom_fixed">
      <div class="container mx-auto px-2 lg:px-0">
        <div class="header__content">

          <!-- mobile toggle -->
          <div class="mobile-show">
            <div class="header__mobile_toggle">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
          <!--  end mobile toggle -->

          <!-- header logo -->
          <div class="flex items-center">
            <a href="<?php echo home_url(); ?>" class="header__logo">
              <img src="<?php bloginfo('template_url') ?>/img/new_logo.svg" alt="">
            </a>
          </div>
          <!-- end header logo -->

          <!-- mobile add btn -->
          <div class="mobile-show">
            <div class="header__mobile_add">
              <a href="<?php echo get_page_url( 'tpl_partner' ); ?>">
                <img src="<?php bloginfo('template_url') ?>/img/plus.svg" alt="">  
              </a>
            </div>
          </div>
          <!-- end mobile add btn -->

          <!-- header nav -->
          <div class="pc-show">
            <?php wp_nav_menu([
              'theme_location' => 'head_menu',
              'menu_id' => 'head_menu',
              'menu_class' => 'header__menu'
            ]); ?>
          </div>
          <!-- end header nav -->

          <!-- header add btn -->
          <div class="pc-show">
            <div class="btn-rest btn-rest-yellow flex items-center js-openmodal-click" data-modal-id="add">
              <span class="mr-3"><?php _e( 'Добавить', 'restx' ); ?></span>
              <img src="<?php bloginfo('template_url'); ?>/img/plus-common.svg" width="15px">
            </div>  
          </div>
          <!-- end header add btn -->
        </div>
      </div>
    </div>
    <!-- end header fixed -->
  </header>
  <div class="mobile-search mobile-show">
    <div class="container mx-auto px-2 lg:px-0">
      <div class="hero__block-cities">
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
  </div>
  <div class="mobile-menu mobile-show">
    <div class="container mx-auto px-2 lg:px-0">
      <nav>
        <?php wp_nav_menu([
          'theme_location' => 'head_menu',
          'menu_id' => 'head_menu',
          'menu_class' => 'flex flex-col'
        ]); ?>
      </nav>
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
  </div>
  <section id="content" role="main">