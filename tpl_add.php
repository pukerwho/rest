<?php
/*
Template Name: Добавить предложение
*/
?>

<?php get_header(); ?>

<div class="addnew">
	<div class="container">
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="d-flex flex-column align-items-center">
					<img src="<?php bloginfo('template_url') ?>/img/clipboard.svg" width="80px" class="mb-5" alt="">
					<h1 class="text-uppercase text-center"><?php _e( 'Добавить предложение', 'restx' ); ?></h1>
				</div>
			</div>
		</div>
		<div class="row justify-content-center mb-5">
			<div class="col-md-8">
				<div class="addnew__content">
					<?php _e( 'Заполнение займет у Вас 5-10 минут. Мы проверяем всю предоставленную информацию. Просим обратить внимание, что мы можем не допустить Вашу информацию или забанить Вас в случае обмана.', 'restx' ); ?>
					<br><br>
					<?php _e( 'В случае проблем с заполнением, просим перезвонить в тех. поддержку сайта: +38(099)77-13-997', 'restx' ); ?>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<form method="POST" id="add_hotels" action="<?php bloginfo('template_url') ?>/add_hotels.php" enctype="multipart/form-data">
					<div class="addnew__heading">
						<?php _e( 'Общая информация', 'restx' ); ?>
					</div>
					<div>
						<label for="Как обращаться к вам"><?php _e( 'Как к вам обращаться?', 'restx' ); ?></label>
						<input type="text" name="Как обращаться к вам" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
					</div>
					<div>
						<label for="owner_mail"><?php _e( 'Адрес электронной почты (обязательно)', 'restx' ); ?>:</label>
						<input type="email" name="owner_mail" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>" >	
					</div>
					<div>
						<label for="owner_phone"><?php _e( 'Ваш номер телефона (обязательно)', 'restx' ); ?>:</label>
						<input type="text" name="owner_phone" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>" >
					</div>
					<div class="addnew__heading">
						<?php _e( 'Информация об объекте', 'restx' ); ?>
					</div>
					<div>
						<label for="hotels_name"><?php _e( 'Название объекта (обязательно)', 'restx' ); ?>:</label>
						<input type="text" name="hotels_name" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>" >
					</div>
					<div class="mb-3">
						<label for="hotels_type"><?php _e( 'Тип объекта (обязательно)', 'restx' ); ?>:</label>
						<div class="d-flex align-items-center mb-3">
							<input type="radio" name="hotels_type" id="hotels_type_villa" value="Вилла">
							<label for="hotels_type_villa"><?php _e( 'Вилла', 'restx' ); ?></label>	
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="radio" name="hotels_type" id="hotels_type_gostinitsa" value="Гостиница">
							<label for="hotels_type_gostinitsa"><?php _e( 'Гостиница', 'restx' ); ?></label>	
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="radio" name="hotels_type" id="hotels_type_hotel" value="Отель">
							<label for="hotels_type_hotel"><?php _e( 'Отель', 'restx' ); ?></label>	
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="radio" name="hotels_type" id="hotels_type_baza" value="База отдыха">
							<label for="hotels_type_baza"><?php _e( 'База отдыха', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="radio" name="hotels_type" id="hotels_type_pansionat" value="Пансионат">
							<label for="hotels_type_pansionat"><?php _e( 'Пансионат', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="radio" name="hotels_type" id="hotels_type_sanatoriy" value="Санаторий">
							<label for="hotels_type_sanatoriy"><?php _e( 'Санаторий', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-5">
							<input type="radio" name="hotels_type" id="hotels_type_guest" value="Гостевой дом">
							<label for="hotels_type_guest"><?php _e( 'Гостевой дом', 'restx' ); ?></label>
						</div>
					</div>
					<div>
						<label for="hotels_description"><?php _e( 'Описание объекта (обязательно)', 'restx' ); ?>:</label>
						<div class="addnew__description mb-3"><?php _e( 'Максимально 800 символов. Мы УБЕДИТЕЛЬНО просим не использовать тексты из других Ваших объявлений. Не допускается описание номеров и удобств на территории. Для этого есть соответствующие разделы.', 'restx' ); ?></div>
						<textarea name="hotels_description" id="" cols="30" rows="5" placeholder="<?php _e( 'Преимущества', 'restx' ); ?>" ></textarea>
					</div>
					<div>
						<label for="hotels_address"><?php _e( 'Адрес объекта (обязательно)', 'restx' ); ?>:</label>
						<div class="addnew__description mb-3">
							<?php _e( 'Только полный адрес, в формате: город, улица, № дома', 'restx' ); ?>
						</div>
						<input type="text" name="hotels_address" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>" >
					</div>
					<div>
						<label for="hotels_phones"><?php _e( 'Контактные телефоны', 'restx' ); ?>:</label>
						<input type="text" name="hotels_phones" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
					</div>
					<div>
						<label for="hotels_telegram"><?php _e( 'Номер мессенджера Telegram', 'restx' ); ?>:</label>
						<input type="text" name="hotels_telegram" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
					</div>
					<div>
						<label for="hotels_viber"><?php _e( 'Номер мессенджера Viber', 'restx' ); ?>:</label>
						<input type="text" name="hotels_viber" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
					</div>
					<div>
						<label for="hotels_whatsapp"><?php _e( 'Номер мессенджера WhatsApp', 'restx' ); ?>:</label>
						<input type="text" name="hotels_whatsapp" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
					</div>
					<div>
						<label for="hotels_cover"><?php _e( 'Главная фотография, обложка (обязательно)', 'restx' ); ?>:</label>
						<div class="addnew__description">
							<?php _e( 'Разрешается фото без текстовых подписей или водяных знаков', 'restx' ); ?>
						</div>
						<input type="file" name="hotels_cover" >
					</div>
					<div>
						<label for="hotels_territoria"><?php _e( 'Фотографии террритории (обязательно)', 'restx' ); ?>:</label>
						<div class="addnew__description">
							<?php _e( 'Только территория объекта, без стоковых фотографий и фотографий номеров. Также запрещено наличие текста или водяных знаков', 'restx' ); ?>.
						</div>
						<input type="file" name="hotels_territoria"  multiple>
					</div>
					<div>
						<label for="hotels_collections"><?php _e( 'Выберите категорию отдыха, максимально подходящую для ваших посетителей (обязательно)', 'restx' ); ?>:</label>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_collections" id="hotels_collections_premium" value="Премиум">
							<label for="hotels_collections_premium"><?php _e( 'Премиум', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_collections" id="hotels_collections_econom" value="Экономичный">
							<label for="hotels_collections_econom"><?php _e( 'Экономичный', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_collections" id="hotels_collections_standart" value="Стандартный">
							<label for="hotels_collections_standart"><?php _e( 'Стандартный', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_collections" id="hotels_collections_family" value="Семейный">
							<label for="hotels_collections_family"><?php _e( 'Семейный', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_collections" id="hotels_collections_company" value="Для компаний">
							<label for="hotels_collections_company"><?php _e( 'Для компаний', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-5">
							<input type="checkbox" name="hotels_collections" id="hotels_collections_animals" value="Можно с животными">
							<label for="hotels_collections_animals"><?php _e( 'Можно с животными', 'restx' ); ?></label>
						</div>
					</div>
					<div>
						<label for="hotels_has"><?php _e( 'Удобства на территории объекта (обязательно)', 'restx' ); ?></label>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_parking" value="Парковка">
							<label for="hotels_has_parking"><?php _e( 'Парковка', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_kids" value="Детская площадка">
							<label for="hotels_has_kids"><?php _e( 'Детская площадка', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_pool" value="Бассейн">
							<label for="hotels_has_pool"><?php _e( 'Бассейн', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_transfer" value="Трансфер">
							<label for="hotels_has_transfer"><?php _e( 'Трансфер', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_restzone" value="Зона отдыха">
							<label for="hotels_has_restzone"><?php _e( 'Зона отдыха', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_kitchen" value="Кухня">
							<label for="hotels_has_kitchen"><?php _e( 'Кухня', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_mangal" value="Мангал">
							<label for="hotels_has_mangal"><?php _e( 'Мангал', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_restraunt" value="Ресторан/Кафе">
							<label for="hotels_has_restraunt"><?php _e( 'Ресторан/Кафе на территории', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_stiralka" value="Стиралка">
							<label for="hotels_has_stiralka"><?php _e( 'Стиральная машинка', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_biliard" value="Бильярд">
							<label for="hotels_has_biliard"><?php _e( 'Бильярд', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_sport" value="Спортивная площадка">
							<label for="hotels_has_sport"><?php _e( 'Спортивная площадка', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_wifi" value="Общий Wi-Fi">
							<label for="hotels_has_wifi"><?php _e( 'Общий Wi-Fi', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_sauna" value="Сауна">
							<label for="hotels_has_sauna"><?php _e( 'Сауна', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_card" value="Безналичный рассчет">
							<label for="hotels_has_card"><?php _e( 'Безналичный рассчет', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_market" value="Рядом рынок">
							<label for="hotels_has_market"><?php _e( 'Рядом рынок', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_supermarket" value="Рядом супермаркет">
							<label for="hotels_has_supermarket"><?php _e( 'Рядом супермаркет', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_beach" value="Частный пляж">
							<label for="hotels_has_beach"><?php _e( 'Частный пляж', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_lejak" value="Аренда лежаков">
							<label for="hotels_has_lejak"><?php _e( 'Аренда лежаков', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-5">
							<input type="checkbox" name="hotels_has" id="hotels_has_animals" value="Можно с животными">
							<label for="hotels_has_animals"><?php _e( 'Можно с животными', 'restx' ); ?></label>
						</div>
					</div>
					<div>
						<label for="hotels_sale"><?php _e( 'Наличие скидок для посетителей', 'restx' ); ?>:</label>
						<div class="addnew__description mb-3"><?php _e( 'Если у Вас есть скидки, расскажите нам о них', 'restx' ); ?></div>
						<textarea name="hotels_sale" id="" cols="30" rows="5" placeholder="<?php _e( 'Скидки, акции', 'restx' ); ?>"></textarea>
					</div>
					<div class="addnew__heading">
						<?php _e( 'Номера', 'restx' ); ?>
					</div>
					<div>
						<label for="hotels_nomers"><?php _e( 'Класс номеров', 'restx' ); ?>:</label>
						<div class="addnew__description mb-3">
							<?php _e( 'Вся информация проверяется. Пожалуйста, размещайте правдивую информацию. Не правдивая информация может привести к бану или понижению в рейтинге', 'restx' ); ?>.
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_nomers_cotedg" class="addnew__nomers_checked" value="Коттедж" data-addnewnomers="addnew__cotedg">
							<label for="hotels_nomers_cotedg"><?php _e( 'Коттедж', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_nomers_lux" class="addnew__nomers_checked" value="Люкс" data-addnewnomers="addnew__lux">
							<label for="hotels_nomers_lux"><?php _e( 'Люкс (в том числе премиум)', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_nomers_halflux" class="addnew__nomers_checked" value="Полулюкс" data-addnewnomers="addnew__halflux">
							<label for="hotels_nomers_halflux"><?php _e( 'Полулюкс', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_nomers_standart" class="addnew__nomers_checked" value="Стандарт" data-addnewnomers="addnew__standart">
							<label for="hotels_nomers_standart"><?php _e( 'Стандарт', 'restx' ); ?></label>
						</div>
						<div class="d-flex align-items-center mb-5">
							<input type="checkbox" name="hotels_has" id="hotels_nomers_budget" class="addnew__nomers_checked" value="Бюджетные" data-addnewnomers="addnew__budget">
							<label for="hotels_nomers_budget"><?php _e( 'Бюджетные номера', 'restx' ); ?></label>
						</div>
					</div>
					<!-- Коттеджи -->
					<div class="addnew__cotedg">
						<div class="addnew__heading">
							<?php _e( 'Коттеджи', 'restx' ); ?>
						</div>
						<div>
							<label for="hotels_cotedg_photo"><?php _e( 'Фото номера', 'restx' ); ?>:</label>
							<div class="addnew__description mb-3">
								<?php _e( 'Допускаются только реальные фото, без текста или водяных знаков', 'restx' ); ?>.
							</div>
							<input type="file" name="hotels_cotedg_photo" multiple>
						</div>
						<div>
							<label for="hotels_cotedg_minsezon"><?php _e( 'Минимальная цена за номер в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_cotedg_minsezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_cotedg_maxsezon"><?php _e( 'Максимальная цена за номер в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_cotedg_maxsezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_cotedg_minnesezon"><?php _e( 'Минимальная цена за номер не в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_cotedg_minnesezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_cotedg_maxnesezon"><?php _e( 'Максимальная цена за номер не в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_cotedg_maxnesezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_cotedg_person"><?php _e( 'Количество мест в номере', 'restx' ); ?></label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_person" id="hotels_cotedg_person_one" value="Одноместный">
								<label for="hotels_cotedg_person_one"><?php _e( 'Одноместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_person" id="hotels_cotedg_person_two" value="Двуместный">
								<label for="hotels_cotedg_person_two"><?php _e( 'Двуместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_person" id="hotels_cotedg_person_three" value="Трехместный">
								<label for="hotels_cotedg_person_three"><?php _e( 'Трехместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_person" id="hotels_cotedg_person_four" value="Четырехместный">
								<label for="hotels_cotedg_person_four"><?php _e( 'Четырехместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_person" id="hotels_cotedg_person_five" value="Пятиместный">
								<label for="hotels_cotedg_person_five"><?php _e( 'Пятиместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_person" id="hotels_cotedg_person_six" value="Шестиместный">
								<label for="hotels_cotedg_person_six"><?php _e( 'Шестиместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_cotedg_person" id="hotels_cotedg_person_seven" value="Семиместный">
								<label for="hotels_cotedg_person_seven"><?php _e( 'Семиместный', 'restx' ); ?></label>
							</div>
						</div>
						<div>
							<label for="hotels_cotedg_has"><?php _e( 'Удобства в номере', 'restx' ); ?></label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_conder" value="Кондиционер">
								<label for="hotels_cotedg_has_conder"><?php _e( 'Кондиционер', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_tv" value="Телевизор">
								<label for="hotels_cotedg_has_tv"><?php _e( 'Телевизор', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_holod" value="Холодильник">
								<label for="hotels_cotedg_has_holod"><?php _e( 'Холодильник', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_chainik" value="Чайник">
								<label for="hotels_cotedg_has_chainik"><?php _e( 'Чайник', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_aptechka" value="Аптечка">
								<label for="hotels_cotedg_has_aptechka"><?php _e( 'Аптечка', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_fen" value="Фен">
								<label for="hotels_cotedg_has_fen"><?php _e( 'Фен', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_micro" value="Микроволновая печь">
								<label for="hotels_cotedg_has_micro"><?php _e( 'Микроволновая печь', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_coffemaker" value="Кофеварка">
								<label for="hotels_cotedg_has_coffemaker"><?php _e( 'Кофеварка', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_utug" value="Утюг">
								<label for="hotels_cotedg_has_utug"><?php _e( 'Утюг', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_sanuzel" value="Санузел">
								<label for="hotels_cotedg_has_sanuzel"><?php _e( 'Санузел', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_dush" value="Душ">
								<label for="hotels_cotedg_has_dush"><?php _e( 'Душ', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_safe" value="Сейф">
								<label for="hotels_cotedg_has_safe"><?php _e( 'Сейф', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_ventilator" value="Вентилятор">
								<label for="hotels_cotedg_has_ventilator"><?php _e( 'Вентилятор', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_uborka" value="Уборка в номере">
								<label for="hotels_cotedg_has_uborka"><?php _e( 'Уборка в номере', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_wifi" value="Wi-Fi">
								<label for="hotels_cotedg_has_wifi"><?php _e( 'Wi-Fi', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_viewmore" value="Вид на море">
								<label for="hotels_cotedg_has_viewmore"><?php _e( 'Вид на море', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_minibar" value="Минибар">
								<label for="hotels_cotedg_has_minibar"><?php _e( 'Минибар', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_telephone" value="Телефон">
								<label for="hotels_cotedg_has_telephone"><?php _e( 'Телефон', 'restx' ); ?></label>
							</div>
						</div>
					</div>
					<!-- Люкс -->
					<div class="addnew__lux">
						<div class="addnew__heading">
							<?php _e( 'Люкс', 'restx' ); ?>
						</div>
						<div>
							<label for="hotels_lux_photo"><?php _e( 'Фото номера', 'restx' ); ?>:</label>
							<div class="addnew__description mb-3">
								<?php _e( 'Допускаются только реальные фото, без текста или водяных знаков', 'restx' ); ?>.
							</div>
							<input type="file" name="hotels_lux_photo" multiple>
						</div>
						<div>
							<label for="hotels_lux_minsezon"><?php _e( 'Минимальная цена за номер в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_lux_minsezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_lux_maxsezon"><?php _e( 'Максимальная цена за номер в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_lux_maxsezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_lux_minnesezon"><?php _e( 'Минимальная цена за номер не в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_lux_minnesezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_lux_maxnesezon"><?php _e( 'Максимальная цена за номер не в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_lux_maxnesezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_lux_person"><?php _e( 'Количество мест в номере', 'restx' ); ?></label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_person" id="hotels_lux_person_one" value="Одноместный">
								<label for="hotels_lux_person_one"><?php _e( 'Одноместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_person" id="hotels_lux_person_two" value="Двуместный">
								<label for="hotels_lux_person_two"><?php _e( 'Двуместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_person" id="hotels_lux_person_three" value="Трехместный">
								<label for="hotels_lux_person_three"><?php _e( 'Трехместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_person" id="hotels_lux_person_four" value="Четырехместный">
								<label for="hotels_lux_person_four"><?php _e( 'Четырехместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_person" id="hotels_lux_person_five" value="Пятиместный">
								<label for="hotels_lux_person_five"><?php _e( 'Пятиместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_person" id="hotels_lux_person_six" value="Шестиместный">
								<label for="hotels_lux_person_six"><?php _e( 'Шестиместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_lux_person" id="hotels_lux_person_seven" value="Семиместный">
								<label for="hotels_lux_person_seven"><?php _e( 'Семиместный', 'restx' ); ?></label>
							</div>
						</div>
						<div>
							<label for="hotels_lux_has"><?php _e( 'Удобства в номере', 'restx' ); ?></label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_conder" value="Кондиционер">
								<label for="hotels_lux_has_conder"><?php _e( 'Кондиционер', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_tv" value="Телевизор">
								<label for="hotels_lux_has_tv"><?php _e( 'Телевизор', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_holod" value="Холодильник">
								<label for="hotels_lux_has_holod"><?php _e( 'Холодильник', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_chainik" value="Чайник">
								<label for="hotels_lux_has_chainik"><?php _e( 'Чайник', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_aptechka" value="Аптечка">
								<label for="hotels_lux_has_aptechka"><?php _e( 'Аптечка', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_fen" value="Фен">
								<label for="hotels_lux_has_fen"><?php _e( 'Фен', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_micro" value="Микроволновая печь">
								<label for="hotels_lux_has_micro"><?php _e( 'Микроволновая печь', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_coffemaker" value="Кофеварка">
								<label for="hotels_lux_has_coffemaker"><?php _e( 'Кофеварка', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_utug" value="Утюг">
								<label for="hotels_lux_has_utug"><?php _e( 'Утюг', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_sanuzel" value="Санузел">
								<label for="hotels_lux_has_sanuzel"><?php _e( 'Санузел', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_dush" value="Душ">
								<label for="hotels_lux_has_dush"><?php _e( 'Душ', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_safe" value="Сейф">
								<label for="hotels_lux_has_safe"><?php _e( 'Сейф', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_ventilator" value="Вентилятор">
								<label for="hotels_lux_has_ventilator"><?php _e( 'Вентилятор', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_uborka" value="Уборка в номере">
								<label for="hotels_lux_has_uborka"><?php _e( 'Уборка в номере', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_wifi" value="Wi-Fi">
								<label for="hotels_lux_has_wifi"><?php _e( 'Wi-Fi', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_viewmore" value="Вид на море">
								<label for="hotels_lux_has_viewmore"><?php _e( 'Вид на море', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_minibar" value="Минибар">
								<label for="hotels_lux_has_minibar"><?php _e( 'Минибар', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_telephone" value="Телефон">
								<label for="hotels_lux_has_telephone"><?php _e( 'Телефон', 'restx' ); ?></label>
							</div>
						</div>
					</div>
					<!-- Полулюкс -->
					<div class="addnew__halflux">
						<div class="addnew__heading">
							<?php _e( 'Полулюкс', 'restx' ); ?>
						</div>
						<div>
							<label for="hotels_halflux_photo"><?php _e( 'Фото номера', 'restx' ); ?>:</label>
							<div class="addnew__description mb-3">
								<?php _e( 'Допускаются только реальные фото, без текста или водяных знаков', 'restx' ); ?>.
							</div>
							<input type="file" name="hotels_halflux_photo" multiple>
						</div>
						<div>
							<label for="hotels_halflux_minsezon"><?php _e( 'Минимальная цена за номер в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_halflux_minsezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_halflux_maxsezon"><?php _e( 'Максимальная цена за номер в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_halflux_maxsezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_halflux_minnesezon"><?php _e( 'Минимальная цена за номер не в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_halflux_minnesezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_halflux_maxnesezon"><?php _e( 'Максимальная цена за номер не в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_halflux_maxnesezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_halflux_person"><?php _e( 'Количество мест в номере', 'restx' ); ?></label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_person" id="hotels_halflux_person_one" value="Одноместный">
								<label for="hotels_halflux_person_one"><?php _e( 'Одноместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_person" id="hotels_halflux_person_two" value="Двуместный">
								<label for="hotels_halflux_person_two"><?php _e( 'Двуместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_person" id="hotels_halflux_person_three" value="Трехместный">
								<label for="hotels_halflux_person_three"><?php _e( 'Трехместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_person" id="hotels_halflux_person_four" value="Четырехместный">
								<label for="hotels_halflux_person_four"><?php _e( 'Четырехместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_person" id="hotels_halflux_person_five" value="Пятиместный">
								<label for="hotels_halflux_person_five"><?php _e( 'Пятиместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_person" id="hotels_halflux_person_six" value="Шестиместный">
								<label for="hotels_halflux_person_six"><?php _e( 'Шестиместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_halflux_person" id="hotels_halflux_person_seven" value="Семиместный">
								<label for="hotels_halflux_person_seven"><?php _e( 'Семиместный', 'restx' ); ?></label>
							</div>
						</div>
						<div>
							<label for="hotels_halflux_has"><?php _e( 'Удобства в номере', 'restx' ); ?></label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_conder" value="Кондиционер">
								<label for="hotels_halflux_has_conder"><?php _e( 'Кондиционер', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_tv" value="Телевизор">
								<label for="hotels_halflux_has_tv"><?php _e( 'Телевизор', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_holod" value="Холодильник">
								<label for="hotels_halflux_has_holod"><?php _e( 'Холодильник', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_chainik" value="Чайник">
								<label for="hotels_halflux_has_chainik"><?php _e( 'Чайник', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_aptechka" value="Аптечка">
								<label for="hotels_halflux_has_aptechka"><?php _e( 'Аптечка', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_fen" value="Фен">
								<label for="hotels_halflux_has_fen"><?php _e( 'Фен', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_micro" value="Микроволновая печь">
								<label for="hotels_halflux_has_micro"><?php _e( 'Микроволновая печь', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_coffemaker" value="Кофеварка">
								<label for="hotels_halflux_has_coffemaker"><?php _e( 'Кофеварка', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_utug" value="Утюг">
								<label for="hotels_halflux_has_utug"><?php _e( 'Утюг', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_sanuzel" value="Санузел">
								<label for="hotels_halflux_has_sanuzel"><?php _e( 'Санузел', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_dush" value="Душ">
								<label for="hotels_halflux_has_dush"><?php _e( 'Душ', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_safe" value="Сейф">
								<label for="hotels_halflux_has_safe"><?php _e( 'Сейф', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_ventilator" value="Вентилятор">
								<label for="hotels_halflux_has_ventilator"><?php _e( 'Вентилятор', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_uborka" value="Уборка в номере">
								<label for="hotels_halflux_has_uborka"><?php _e( 'Уборка в номере', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_wifi" value="Wi-Fi">
								<label for="hotels_halflux_has_wifi"><?php _e( 'Wi-Fi', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_viewmore" value="Вид на море">
								<label for="hotels_halflux_has_viewmore"><?php _e( 'Вид на море', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_minibar" value="Минибар">
								<label for="hotels_halflux_has_minibar"><?php _e( 'Минибар', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_telephone" value="Телефон">
								<label for="hotels_halflux_has_telephone"><?php _e( 'Телефон', 'restx' ); ?></label>
							</div>
						</div>
					</div>
					<!-- Стандартные -->
					<div class="addnew__standart">
						<div class="addnew__heading">
							<?php _e( 'Стандартные номера', 'restx' ); ?>
						</div>
						<div>
							<label for="hotels_standart_photo"><?php _e( 'Фото номера', 'restx' ); ?>:</label>
							<div class="addnew__description mb-3">
								<?php _e( 'Допускаются только реальные фото, без текста или водяных знаков', 'restx' ); ?>.
							</div>
							<input type="file" name="hotels_standart_photo" multiple>
						</div>
						<div>
							<label for="hotels_standart_minsezon"><?php _e( 'Минимальная цена за номер в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_standart_minsezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_standart_maxsezon"><?php _e( 'Максимальная цена за номер в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_standart_maxsezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_standart_minnesezon"><?php _e( 'Минимальная цена за номер не в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_standart_minnesezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_standart_maxnesezon"><?php _e( 'Максимальная цена за номер не в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_standart_maxnesezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_standart_person"><?php _e( 'Количество мест в номере', 'restx' ); ?></label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_person" id="hotels_standart_person_one" value="Одноместный">
								<label for="hotels_standart_person_one"><?php _e( 'Одноместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_person" id="hotels_standart_person_two" value="Двуместный">
								<label for="hotels_standart_person_two"><?php _e( 'Двуместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_person" id="hotels_standart_person_three" value="Трехместный">
								<label for="hotels_standart_person_three"><?php _e( 'Трехместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_person" id="hotels_standart_person_four" value="Четырехместный">
								<label for="hotels_standart_person_four"><?php _e( 'Четырехместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_person" id="hotels_standart_person_five" value="Пятиместный">
								<label for="hotels_standart_person_five"><?php _e( 'Пятиместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_person" id="hotels_standart_person_six" value="Шестиместный">
								<label for="hotels_standart_person_six"><?php _e( 'Шестиместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_standart_person" id="hotels_standart_person_seven" value="Семиместный">
								<label for="hotels_standart_person_seven"><?php _e( 'Семиместный', 'restx' ); ?></label>
							</div>
						</div>
						<div>
							<label for="hotels_standart_has"><?php _e( 'Удобства в номере', 'restx' ); ?></label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_conder" value="Кондиционер">
								<label for="hotels_standart_has_conder"><?php _e( 'Кондиционер', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_tv" value="Телевизор">
								<label for="hotels_standart_has_tv"><?php _e( 'Телевизор', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_holod" value="Холодильник">
								<label for="hotels_standart_has_holod"><?php _e( 'Холодильник', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_chainik" value="Чайник">
								<label for="hotels_standart_has_chainik"><?php _e( 'Чайник', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_aptechka" value="Аптечка">
								<label for="hotels_standart_has_aptechka"><?php _e( 'Аптечка', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_fen" value="Фен">
								<label for="hotels_standart_has_fen"><?php _e( 'Фен', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_micro" value="Микроволновая печь">
								<label for="hotels_standart_has_micro"><?php _e( 'Микроволновая печь', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_coffemaker" value="Кофеварка">
								<label for="hotels_standart_has_coffemaker"><?php _e( 'Кофеварка', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_utug" value="Утюг">
								<label for="hotels_standart_has_utug"><?php _e( 'Утюг', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_sanuzel" value="Санузел">
								<label for="hotels_standart_has_sanuzel"><?php _e( 'Санузел', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_dush" value="Душ">
								<label for="hotels_standart_has_dush"><?php _e( 'Душ', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_safe" value="Сейф">
								<label for="hotels_standart_has_safe"><?php _e( 'Сейф', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_ventilator" value="Вентилятор">
								<label for="hotels_standart_has_ventilator"><?php _e( 'Вентилятор', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_uborka" value="Уборка в номере">
								<label for="hotels_standart_has_uborka"><?php _e( 'Уборка в номере', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_wifi" value="Wi-Fi">
								<label for="hotels_standart_has_wifi"><?php _e( 'Wi-Fi', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_viewmore" value="Вид на море">
								<label for="hotels_standart_has_viewmore"><?php _e( 'Вид на море', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_minibar" value="Минибар">
								<label for="hotels_standart_has_minibar"><?php _e( 'Минибар', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_telephone" value="Телефон">
								<label for="hotels_standart_has_telephone"><?php _e( 'Телефон', 'restx' ); ?></label>
							</div>
						</div>
					</div>
					<!-- Бюджетные -->
					<div class="addnew__budget">
						<div class="addnew__heading">
							<?php _e( 'Бюджетные номера', 'restx' ); ?>
						</div>
						<div>
							<label for="hotels_budget_photo"><?php _e( 'Фото номера', 'restx' ); ?>:</label>
							<div class="addnew__description mb-3">
								<?php _e( 'Допускаются только реальные фото, без текста или водяных знаков', 'restx' ); ?>.
							</div>
							<input type="file" name="hotels_budget_photo" multiple>
						</div>
						<div>
							<label for="hotels_budget_minsezon"><?php _e( 'Минимальная цена за номер в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_budget_minsezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_budget_maxsezon"><?php _e( 'Максимальная цена за номер в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_budget_maxsezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_budget_minnesezon"><?php _e( 'Минимальная цена за номер не в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_budget_minnesezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_budget_maxnesezon"><?php _e( 'Максимальная цена за номер не в сезон, грн', 'restx' ); ?></label>
							<input type="text" name="hotels_budget_maxnesezon" placeholder="<?php _e( 'Мой ответ', 'restx' ); ?>">
						</div>
						<div>
							<label for="hotels_budget_person"><?php _e( 'Количество мест в номере', 'restx' ); ?></label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_person" id="hotels_budget_person_one" value="Одноместный">
								<label for="hotels_budget_person_one"><?php _e( 'Одноместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_person" id="hotels_budget_person_two" value="Двуместный">
								<label for="hotels_budget_person_two"><?php _e( 'Двуместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_person" id="hotels_budget_person_three" value="Трехместный">
								<label for="hotels_budget_person_three"><?php _e( 'Трехместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_person" id="hotels_budget_person_four" value="Четырехместный">
								<label for="hotels_budget_person_four"><?php _e( 'Четырехместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_person" id="hotels_budget_person_five" value="Пятиместный">
								<label for="hotels_budget_person_five"><?php _e( 'Пятиместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_person" id="hotels_budget_person_six" value="Шестиместный">
								<label for="hotels_budget_person_six"><?php _e( 'Шестиместный', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_budget_person" id="hotels_budget_person_seven" value="Семиместный">
								<label for="hotels_budget_person_seven"><?php _e( 'Семиместный', 'restx' ); ?></label>
							</div>
						</div>
						<div>
							<label for="hotels_budget_has"><?php _e( 'Удобства в номере', 'restx' ); ?></label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_conder" value="Кондиционер">
								<label for="hotels_budget_has_conder"><?php _e( 'Кондиционер', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_tv" value="Телевизор">
								<label for="hotels_budget_has_tv"><?php _e( 'Телевизор', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_holod" value="Холодильник">
								<label for="hotels_budget_has_holod"><?php _e( 'Холодильник', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_chainik" value="Чайник">
								<label for="hotels_budget_has_chainik"><?php _e( 'Чайник', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_aptechka" value="Аптечка">
								<label for="hotels_budget_has_aptechka"><?php _e( 'Аптечка', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_fen" value="Фен">
								<label for="hotels_budget_has_fen"><?php _e( 'Фен', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_micro" value="Микроволновая печь">
								<label for="hotels_budget_has_micro"><?php _e( 'Микроволновая печь', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_coffemaker" value="Кофеварка">
								<label for="hotels_budget_has_coffemaker"><?php _e( 'Кофеварка', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_utug" value="Утюг">
								<label for="hotels_budget_has_utug"><?php _e( 'Утюг', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_sanuzel" value="Санузел">
								<label for="hotels_budget_has_sanuzel"><?php _e( 'Санузел', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_dush" value="Душ">
								<label for="hotels_budget_has_dush"><?php _e( 'Душ', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_safe" value="Сейф">
								<label for="hotels_budget_has_safe"><?php _e( 'Сейф', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_ventilator" value="Вентилятор">
								<label for="hotels_budget_has_ventilator"><?php _e( 'Вентилятор', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_uborka" value="Уборка в номере">
								<label for="hotels_budget_has_uborka"><?php _e( 'Уборка в номере', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_wifi" value="Wi-Fi">
								<label for="hotels_budget_has_wifi"><?php _e( 'Wi-Fi', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_viewmore" value="Вид на море">
								<label for="hotels_budget_has_viewmore"><?php _e( 'Вид на море', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_minibar" value="Минибар">
								<label for="hotels_budget_has_minibar"><?php _e( 'Минибар', 'restx' ); ?></label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_telephone" value="Телефон">
								<label for="hotels_budget_has_telephone"><?php _e( 'Телефон', 'restx' ); ?></label>
							</div>
						</div>
					</div>
					<button type="submit"><?php _e( 'Добавить', 'restx' ); ?></button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>