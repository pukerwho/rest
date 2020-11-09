<?php get_header(); ?>

<?php 

$template = carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_newtemplate');
if ($template) {
	get_template_part( 'blocks/citylist/new-template' );
} else {
	get_template_part( 'blocks/citylist/old-template' );
}


?>

<?php get_footer(); ?>

