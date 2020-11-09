<div class="row mt-3">
	<div class="col-md-12">
		<div class="breadcrumbs" itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
      <ul>
				<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
					<a itemprop="item" href="<?php echo home_url(); ?>">
						<span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
					</a>                        
					<meta itemprop="position" content="1">
				</li>
        <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
          <a itemprop="item" href="<?php echo get_page_url('tpl_allcity') ?>">
            <span itemprop="name"><?php _e( 'Курорты', 'restx' ); ?></span>
          </a>                        
          <meta itemprop="position" content="2">
        </li>
        <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
        	<?php 
        		$term_link = get_term_link(get_queried_object_id(), 'citylist');
        	?>
          <a itemprop="item" href="<?php echo $term_link ?>">
            <span itemprop="name"><?php single_term_title(); ?></span>
          </a>
          <meta itemprop="position" content="3">
        </li>
      </ul>
    </div>
	</div>
</div>