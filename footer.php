    </section>
    <hr>
    <div class="mobile-link">
        <?php 
            if( !is_page_template( 'tpl_catalog.php' ) ){
                get_template_part('blocks/footer-info');
            } 
        ?>
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