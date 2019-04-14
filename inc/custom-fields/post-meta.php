<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
	Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'blogs' )
    ->add_fields( array(
      Field::make( 'header_scripts', 'crb_blogs_scripts', 'Js для погоды' )

  ) );
}

?>