<?php get_header(); ?>

<div class="p_search">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <h1>Результаты поиска</h1>
            </div>
        </div>
        <div class="row">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="col-md-3">
                        <?php get_template_part( 'blocks/hotel-card', 'default' ); ?>
                    </div>
                <?php endwhile; ?>
                <?php else : ?>
                    ничего нет
                <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="b_pagination">
                    <?php 
                        $big = 999999999; // уникальное число
                        echo paginate_links( array(
                        'format'  => 'page/%#%',
                        'current'   => $current,
                        'total'   => $custom_query->max_num_pages,
                        'prev_next' => true,
                        'next_text' => (''),
                        'prev_text' => ('')
                        )); 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>