<?php get_header(); ?>

<?php 
$term = get_term_by('slug', get_query_var('term'), 'citylist');
if((int)$term->parent)
  get_template_part( 'blocks/citylist/child' );
else
  get_template_part( 'blocks/citylist/parent' );
?>

<?php get_footer(); ?>