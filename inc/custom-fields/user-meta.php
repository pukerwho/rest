<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_user_options' );
function crb_user_options() {
Container::make( 'user_meta', 'Соц сети' )
    ->add_fields( array(
        Field::make( 'text', 'crb_city_and_post', 'City and post code' ),
        Field::make( 'text', 'crb_street', 'Street Name' ),
    ) );
	}

?>