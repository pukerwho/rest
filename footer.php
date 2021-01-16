</section>
<footer id="footer" class="footer">
	<div class="container mx-auto px-2 lg:px-0 py-8">
    <div class="flex flex-wrap footer_top mb-4">
      <div class="w-full lg:w-1/4 mb-8">
        <h3 class="text-lg font-bold mb-4"><?php _e('Популярные курорты', 'restx'); ?></h3>
        <ul class="mb-4">
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
          <a href="<?php echo get_page_url('tpl_allcity') ?>" class="font-bold"><?php _e('Все курорты','restx'); ?></a>
        </div>
      </div>
      <div class="w-full lg:w-1/4 mb-8">
          <h3 class="text-lg font-bold mb-4"><?php _e('Автобусные перевозки', 'restx'); ?></h3>
          <ul class="mb-4">
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
            <a href="<?php echo get_post_type_archive_link('way'); ?>" class="font-bold"><?php _e('Все маршруты','restx'); ?></a>
          </div>
      </div>
      <div class="w-full lg:w-1/4 mb-8">
        <h3 class="text-lg font-bold mb-4"><?php _e('Наш блог', 'restx'); ?></h3>
        <ul class="mb-4">
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
          <a href="<?php echo get_post_type_archive_link('blogs'); ?>" class="font-bold"><?php _e('Все записи','restx'); ?></a>
        </div>
      </div>
      <div class="w-full lg:w-1/4 mb-8">
        <h3 class="text-lg font-bold mb-4"><?php _e('Полезные ссылки', 'restx'); ?></h3>
        <ul>
          <li><a href="<?php echo get_page_url('tpl_partner') ?>"><?php _e('Условия размещения','restx'); ?></a></li>
          <li><a href="/policy"><?php _e('Политика конфиденциальности','restx'); ?></a></li>
        </ul>
      </div>
    </div>
		<div class="footer_bottom flex items-center mb-8 lg:mb-0">
			<div class="w-full flex items-start flex-col-reverse lg:flex-row justify-between">
        <div class="mr-0 lg:mr-6">
          <div class="mb-6 lg:mb-0">
            <?php _e('Эл. почта для связи', 'restx'); ?>: <a href="mailto:partner@vidpochivai.com.ua">partner@vidpochivai.com.ua</a>
          </div>
          <?php if( !is_page_template( 'tpl_main.php' )): ?>
            2020 &copy; Vidpochivai.com.ua
          <? else: ?>
            2020 &copy; 
            <span typeof="v:Breadcrumb"> <a href="https://vidpochivai.com.ua/" rel="v:url" property="v:title"> Vidpochivai.com.ua</a> › </span> <span typeof="v:Breadcrumb"> <a href="https://vidpochivai.com.ua//#best" rel="v:url" property="v:title"><?php _e( 'Только проверенные предложения!', 'restx' ); ?></a> </span>
          <?php endif ?>
        </div>
      </div>
		</div>
	</div>
</footer>

<!-- Модальное окно, обратная связь -->
<div class="modal" data-modal-id="add">
  <div class="modal_content">
    <div class="modal_content_close">
      <img src="<?php bloginfo('template_url'); ?>/img/close-modal.svg" width="15px">
    </div>
    <div class="modal_content_title mb-5">
      <?php _e('Напишите нам', 'restx'); ?>
    </div>
    <div class="form_add">
      <form name="form_add">
        <div class="flex flex-col mb-3">
          <input type="text" name="EmailPhone" placeholder="<?php _e('Email или телефон', 'restx'); ?>" class="input-with-icon" required>
          <textarea name="Сообщение" id="" rows="5" placeholder="<?php _e('Сообщение','restx'); ?>" class="w-full"></textarea>
          <div class="flex items-center">
            <input type="checkbox" id="just_callback" name="just_callback">
            <label for="just_callback"><?php _e('Просто перезвоните мне, пообщаемся', 'restx'); ?></label>  
          </div>
        </div>
        <button type="submit" class="btn-rest btn-rest-dark flex items-center">
          <span class="mr-4"><?php _e('Отправить', 'restx'); ?></span>
          <img src="<?php bloginfo('template_url'); ?>/img/white-arrow.svg" width="12px" class="mt-1">
        </button>
        <div class="modal_success hidden"><?php _e('Мы получили ваше сообщение. Скоро ответим Вам', 'restx'); ?>.</div>
      </form>
    </div>
  </div>
</div>
<!-- Конец Модальное окно, обратная связь -->

<!-- Поиск -->
<div class="search">
  <div class="search_field">
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

<div class="rest_modal_bg"></div>
<div class="modal-bg"></div>

<?php wp_footer(); ?>

</body>
</html>