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
    </div>
</div>

<?php get_footer(); ?>