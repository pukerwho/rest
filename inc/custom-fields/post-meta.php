<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
	Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'blogs' )
    ->add_fields( array(
      Field::make( 'checkbox', 'crb_blogs_whether', 'Погода?' )->set_option_value('no'),
      Field::make( 'text', 'crb_blogs_city', 'City (для погоды)' )->set_conditional_logic( array(
        array(
            'field' => 'crb_blogs_whether',
            'value' => true,
        )
    ) ),
  ) );
}

?>