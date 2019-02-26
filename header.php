<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <link rel="profile" href="http://gmpg.org/xfn/11">

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
  
  <header id="header" class="header" role="banner">
    <div class="container-fluid">
      <div class="header__content">
        <div>
          <a href="<?php echo home_url(); ?>" class="header__logo">
            <span class="header__logo__icon"></span>
            <div class="header__logo__title">
              Відпочивай
            </div>
          </a>
        </div>
        <div class="header__mobile__menu mobile-show">
          <div class="btn bg-pastel-blue">Меню</div>
        </div>
        <div class="header__mobile__cover mobile-show">
          <div class="header__mobile__logo">
            <a href="<?php echo home_url(); ?>" class="header__logo">
              <span class="header__logo__icon"></span>
              <div class="header__logo__title">
                
              </div>
            </a>
          </div>
          <div class="header__mobile__close">
            <div class="btn bg-pastel-blue">Закрыть меню</div>
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
        <div class="header__menu pc-show">
          <?php wp_nav_menu( array(
            'theme_location'  => 'head_menu',
            'menu'            => '', 
            'container'       => 'nav', 
            'container_class' => 'secondemenu_wrap',
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
        <div class="add-button pc-show">
          <div class="btn bg-pastel-blue">Добавить</div>
        </div>
      </div>
    </div>
  </header>
  <section id="content" role="main">