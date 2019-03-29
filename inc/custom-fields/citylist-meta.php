<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
  Container::make( 'term_meta', __( 'Term Options', 'crb' ) )
    ->where( 'term_taxonomy', '=', 'citylist' ) // only show our new field for categories
    ->add_fields( array(
    	Field::make( 'image', 'crb_citylist_img', 'Заглавная картинка' )->set_value_type( 'url'),
      Field::make( 'text', 'crb_citylist_title', 'Заголовок' ),
      Field::make( 'text', 'crb_citylist_description', 'Подзаголовок' ),
      Field::make( 'image', 'crb_citylist_icon', 'Иконка' )->set_value_type( 'url'),
      Field::make( 'rich_text', 'crb_citylist_rich_text', 'Текст' ),
      Field::make( 'text', 'crb_citylist_video', 'Видео (id YouTube)' )
  ) );
}

?>