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
        <a href="https://docs.google.com/forms/d/1J14J9G1fIYQA2oXnfyNny0LkPT7QbLYFDwTGX2KfIuI/edit" target="_blank" class="mobile-link__item">
            <img src="<?php bloginfo('template_url') ?>/img/plus.svg" width="25px" alt="" class="mb-2">
            <span>Добавить</span>
        </a>
        <!-- <?php 
            if( !is_page_template( 'tpl_catalog.php' ) ){
                get_template_part('blocks/footer-info');
            } 
        ?> -->
    </div>
    <footer id="footer">
    	<div class="container py-5">
    		<div class="row">
    			<div class="col-md-3">
    				Колонка раз
    			</div>
    			<div class="col-md-3">
    				Колонка два
    			</div>
    			<div class="col-md-3">
    				Колонка три
    			</div>
    			<div class="col-md-3">
    				Колодец
    			</div>
    		</div>
    	</div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>