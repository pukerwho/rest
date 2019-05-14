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
					<h1 class="text-uppercase text-center">Добавить предложение</h1>
				</div>
			</div>
		</div>
		<div class="row justify-content-center mb-5">
			<div class="col-md-8">
				<div class="addnew__content">
					Заполнение займет у Вас 5-10 минут. Мы проверяем всю предоставленную информацию. Просим обратить внимание, что мы можем не допустить Вашу информацию или забанить Вас в случае обмана.
					<br><br>
					В случае проблем с заполнением, просим перезвонить в тех. поддержку сайта: +38(099)77-13-997	
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<form method="POST" id="add_hotels" action="<?php bloginfo('template_url') ?>/add_hotels.php">
					<div class="addnew__heading">
						Общая информация
					</div>
					<div>
						<label for="owner_name">Как к вам обращаться?</label>
						<input type="text" name="owner_name" placeholder="Мой ответ">
					</div>
					<div>
						<label for="owner_mail">Адрес электронной почты (обязательно):</label>
						<input type="email" name="owner_mail" placeholder="Мой ответ" >	
					</div>
					<div>
						<label for="owner_phone">Ваш номер телефона (обязательно):</label>
						<input type="text" name="owner_phone" placeholder="Мой ответ" >
					</div>
					<div class="addnew__heading">
						Информация об объекте
					</div>
					<div>
						<label for="hotels_name">Название объекта (обязательно):</label>
						<input type="text" name="hotels_name" placeholder="Мой ответ" >
					</div>
					<div class="mb-3">
						<label for="hotels_type">Тип объекта (обязательно):</label>
						<div class="d-flex align-items-center mb-3">
							<input type="radio" name="hotels_type" id="hotels_type_villa" value="Вилла">
							<label for="hotels_type_villa">Вилла</label>	
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="radio" name="hotels_type" id="hotels_type_gostinitsa" value="Гостиница">
							<label for="hotels_type_gostinitsa">Гостиница</label>	
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="radio" name="hotels_type" id="hotels_type_hotel" value="Отель">
							<label for="hotels_type_hotel">Отель</label>	
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="radio" name="hotels_type" id="hotels_type_baza" value="База отдыха">
							<label for="hotels_type_baza">База отдыха</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="radio" name="hotels_type" id="hotels_type_pansionat" value="Пансионат">
							<label for="hotels_type_pansionat">Пансионат</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="radio" name="hotels_type" id="hotels_type_sanatoriy" value="Санаторий">
							<label for="hotels_type_sanatoriy">Санаторий</label>
						</div>
						<div class="d-flex align-items-center mb-5">
							<input type="radio" name="hotels_type" id="hotels_type_guest" value="Гостевой дом">
							<label for="hotels_type_guest">Гостевой дом</label>
						</div>
					</div>
					<div>
						<label for="hotels_description">Описание объекта (обязательно):</label>
						<div class="addnew__description mb-3">Максимально 800 символов. Мы УБЕДИТЕЛЬНО просим не использовать тексты из других Ваших объявлений. Не допускается описание номеров и удобств на территории. Для этого есть соответствующие разделы.</div>
						<textarea name="hotels_description" id="" cols="30" rows="5" placeholder="Преимущества" ></textarea>
					</div>
					<div>
						<label for="hotels_address">Адрес объекта (обязательно):</label>
						<div class="addnew__description mb-3">
							Только полный адрес, в формате: город, улица, № дома
						</div>
						<input type="text" name="hotels_address" placeholder="Мой ответ" >
					</div>
					<div>
						<label for="hotels_phones">Контактные телефоны:</label>
						<input type="text" name="hotels_phones" placeholder="Мой ответ">
					</div>
					<div>
						<label for="hotels_telegram">Номер мессенджера Telegram:</label>
						<input type="text" name="hotels_telegram" placeholder="Мой ответ">
					</div>
					<div>
						<label for="hotels_viber">Номер мессенджера Viber:</label>
						<input type="text" name="hotels_viber" placeholder="Мой ответ">
					</div>
					<div>
						<label for="hotels_whatsapp">Номер мессенджера WhatsApp:</label>
						<input type="text" name="hotels_whatsapp" placeholder="Мой ответ">
					</div>
					<div>
						<label for="hotels_cover">Главная фотография, обложка (обязательно):</label>
						<div class="addnew__description">
							Разрешается фото без текстовых подписей или водяных знаков
						</div>
						<input type="file" name="hotels_cover" >
					</div>
					<div>
						<label for="hotels_territoria">Фотографии террритории (обязательно):</label>
						<div class="addnew__description">
							Только территория объекта, без стоковых фотографий и фотографий номеров. Также запрещено наличие текста или водяных знаков.
						</div>
						<input type="file" name="hotels_territoria"  multiple>
					</div>
					<div>
						<label for="hotels_collections">Выберите категорию отдыха, максимально подходящую для ваших посетителей (обязательно):</label>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_collections" id="hotels_collections_premium" value="Премиум">
							<label for="hotels_collections_premium">Премиум</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_collections" id="hotels_collections_econom" value="Экономичный">
							<label for="hotels_collections_econom">Экономичный</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_collections" id="hotels_collections_standart" value="Стандартный">
							<label for="hotels_collections_standart">Стандартный</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_collections" id="hotels_collections_family" value="Семейный">
							<label for="hotels_collections_family">Семейный</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_collections" id="hotels_collections_company" value="Для компаний">
							<label for="hotels_collections_company">Для компаний</label>
						</div>
						<div class="d-flex align-items-center mb-5">
							<input type="checkbox" name="hotels_collections" id="hotels_collections_animals" value="Можно с животными">
							<label for="hotels_collections_animals">Можно с животными</label>
						</div>
					</div>
					<div>
						<label for="hotels_has">Удобства на территории объекта (обязательно)</label>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_parking" value="Парковка">
							<label for="hotels_has_parking">Парковка</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_kids" value="Детская площадка">
							<label for="hotels_has_kids">Детская площадка</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_pool" value="Бассейн">
							<label for="hotels_has_pool">Бассейн</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_transfer" value="Трансфер">
							<label for="hotels_has_transfer">Трансфер</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_restzone" value="Зона отдыха">
							<label for="hotels_has_restzone">Зона отдыха</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_kitchen" value="Кухня">
							<label for="hotels_has_kitchen">Кухня</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_mangal" value="Мангал">
							<label for="hotels_has_mangal">Мангал</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_restraunt" value="Ресторан/Кафе">
							<label for="hotels_has_restraunt">Ресторан/Кафе на территерии</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_stiralka" value="Стиралка">
							<label for="hotels_has_stiralka">Стиральная машинка</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_biliard" value="Бильярд">
							<label for="hotels_has_biliard">Бильярд</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_sport" value="Спортивная площадка">
							<label for="hotels_has_sport">Спортивная площадка</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_wifi" value="Общий Wi-Fi">
							<label for="hotels_has_wifi">Общий Wi-Fi</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_sauna" value="Сауна">
							<label for="hotels_has_sauna">Сауна</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_card" value="Безналичный рассчет">
							<label for="hotels_has_card">Безналичный рассчет</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_market" value="Рядом рынок">
							<label for="hotels_has_market">Рядом рынок</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_supermarket" value="Рядом супермаркет">
							<label for="hotels_has_supermarket">Рядом супермаркет</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_beach" value="Частный пляж">
							<label for="hotels_has_beach">Частный пляж</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_has_lejak" value="Аренда лежаков">
							<label for="hotels_has_lejak">Аренда лежаков</label>
						</div>
						<div class="d-flex align-items-center mb-5">
							<input type="checkbox" name="hotels_has" id="hotels_has_animals" value="Можно с животными">
							<label for="hotels_has_animals">Можно с животными</label>
						</div>
					</div>
					<div>
						<label for="hotels_sale">Наличие скидок для посетителей:</label>
						<div class="addnew__description mb-3">Если у Вас есть скидки, расскажите нам о них</div>
						<textarea name="hotels_sale" id="" cols="30" rows="5" placeholder="Скидки, акции"></textarea>
					</div>
					<div class="addnew__heading">
						Номера
					</div>
					<div>
						<label for="hotels_nomers">Класс номеров:</label>
						<div class="addnew__description mb-3">
							Вся информация проверяется. Пожалуйста, размещайте правдивую информацию. Не правдивая информация может привести к бану или понижению в рейтинге.
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_nomers_cotedg" class="addnew__nomers_checked" value="Коттедж" data-addnewnomers="addnew__cotedg">
							<label for="hotels_nomers_cotedg">Коттедж</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_nomers_lux" class="addnew__nomers_checked" value="Люкс" data-addnewnomers="addnew__lux">
							<label for="hotels_nomers_lux">Люкс (в том числе премиум)</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_nomers_halflux" class="addnew__nomers_checked" value="Полулюкс" data-addnewnomers="addnew__halflux">
							<label for="hotels_nomers_halflux">Полулюкс</label>
						</div>
						<div class="d-flex align-items-center mb-3">
							<input type="checkbox" name="hotels_has" id="hotels_nomers_standart" class="addnew__nomers_checked" value="Стандарт" data-addnewnomers="addnew__standart">
							<label for="hotels_nomers_standart">Стандарт</label>
						</div>
						<div class="d-flex align-items-center mb-5">
							<input type="checkbox" name="hotels_has" id="hotels_nomers_budget" class="addnew__nomers_checked" value="Бюджетные" data-addnewnomers="addnew__budget">
							<label for="hotels_nomers_budget">Бюджетные номера</label>
						</div>
					</div>
					<!-- Коттеджи -->
					<div class="addnew__cotedg">
						<div class="addnew__heading">
							Коттеджи
						</div>
						<div>
							<label for="hotels_cotedg_photo">Фото номера:</label>
							<div class="addnew__description mb-3">
								Допускаются только реальные фото, без текста или водяных знаков.
							</div>
							<input type="file" name="hotels_cotedg_photo" multiple>
						</div>
						<div>
							<label for="hotels_cotedg_minsezon">Минимальная цена за номер в сезон, грн</label>
							<input type="text" name="hotels_cotedg_minsezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_cotedg_maxsezon">Максимальная цена за номер в сезон, грн</label>
							<input type="text" name="hotels_cotedg_maxsezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_cotedg_minnesezon">Минимальная цена за номер не в сезон, грн</label>
							<input type="text" name="hotels_cotedg_minnesezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_cotedg_maxnesezon">Максимальная цена за номер не в сезон, грн</label>
							<input type="text" name="hotels_cotedg_maxnesezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_cotedg_person">Количество мест в номере</label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_person" id="hotels_cotedg_person_one" value="Одноместный">
								<label for="hotels_cotedg_person_one">Одноместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_person" id="hotels_cotedg_person_two" value="Двуместный">
								<label for="hotels_cotedg_person_two">Двуместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_person" id="hotels_cotedg_person_three" value="Трехместный">
								<label for="hotels_cotedg_person_three">Трехместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_person" id="hotels_cotedg_person_four" value="Четырехместный">
								<label for="hotels_cotedg_person_four">Четырехместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_person" id="hotels_cotedg_person_five" value="Пятиместный">
								<label for="hotels_cotedg_person_five">Пятиместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_person" id="hotels_cotedg_person_six" value="Шестиместный">
								<label for="hotels_cotedg_person_six">Шестиместный</label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_cotedg_person" id="hotels_cotedg_person_seven" value="Семиместный">
								<label for="hotels_cotedg_person_seven">Семиместный</label>
							</div>
						</div>
						<div>
							<label for="hotels_cotedg_has">Удобства в номере</label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_conder" value="Кондиционер">
								<label for="hotels_cotedg_has_conder">Кондиционер</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_tv" value="Телевизор">
								<label for="hotels_cotedg_has_tv">Телевизор</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_holod" value="Холодильник">
								<label for="hotels_cotedg_has_holod">Холодильник</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_chainik" value="Чайник">
								<label for="hotels_cotedg_has_chainik">Чайник</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_aptechka" value="Аптечка">
								<label for="hotels_cotedg_has_aptechka">Аптечка</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_fen" value="Фен">
								<label for="hotels_cotedg_has_fen">Фен</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_micro" value="Микроволновая печь">
								<label for="hotels_cotedg_has_micro">Микроволновая печь</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_coffemaker" value="Кофеварка">
								<label for="hotels_cotedg_has_coffemaker">Кофеварка</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_utug" value="Утюг">
								<label for="hotels_cotedg_has_utug">Утюг</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_sanuzel" value="Санузел">
								<label for="hotels_cotedg_has_sanuzel">Санузел</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_dush" value="Душ">
								<label for="hotels_cotedg_has_dush">Душ</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_safe" value="Сейф">
								<label for="hotels_cotedg_has_safe">Сейф</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_ventilator" value="Вентилятор">
								<label for="hotels_cotedg_has_ventilator">Вентилятор</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_uborka" value="Уборка в номере">
								<label for="hotels_cotedg_has_uborka">Уборка в номере</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_wifi" value="Wi-Fi">
								<label for="hotels_cotedg_has_wifi">Wi-Fi</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_viewmore" value="Вид на море">
								<label for="hotels_cotedg_has_viewmore">Вид на море</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_minibar" value="Минибар">
								<label for="hotels_cotedg_has_minibar">Минибар</label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_cotedg_has" id="hotels_cotedg_has_telephone" value="Телефон">
								<label for="hotels_cotedg_has_telephone">Телефон</label>
							</div>
						</div>
					</div>
					<!-- Люкс -->
					<div class="addnew__lux">
						<div class="addnew__heading">
							Люкс
						</div>
						<div>
							<label for="hotels_lux_photo">Фото номера:</label>
							<div class="addnew__description mb-3">
								Допускаются только реальные фото, без текста или водяных знаков.
							</div>
							<input type="file" name="hotels_lux_photo" multiple>
						</div>
						<div>
							<label for="hotels_lux_minsezon">Минимальная цена за номер в сезон, грн</label>
							<input type="text" name="hotels_lux_minsezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_lux_maxsezon">Максимальная цена за номер в сезон, грн</label>
							<input type="text" name="hotels_lux_maxsezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_lux_minnesezon">Минимальная цена за номер не в сезон, грн</label>
							<input type="text" name="hotels_lux_minnesezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_lux_maxnesezon">Максимальная цена за номер не в сезон, грн</label>
							<input type="text" name="hotels_lux_maxnesezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_lux_person">Количество мест в номере</label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_person" id="hotels_lux_person_one" value="Одноместный">
								<label for="hotels_lux_person_one">Одноместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_person" id="hotels_lux_person_two" value="Двуместный">
								<label for="hotels_lux_person_two">Двуместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_person" id="hotels_lux_person_three" value="Трехместный">
								<label for="hotels_lux_person_three">Трехместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_person" id="hotels_lux_person_four" value="Четырехместный">
								<label for="hotels_lux_person_four">Четырехместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_person" id="hotels_lux_person_five" value="Пятиместный">
								<label for="hotels_lux_person_five">Пятиместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_person" id="hotels_lux_person_six" value="Шестиместный">
								<label for="hotels_lux_person_six">Шестиместный</label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_lux_person" id="hotels_lux_person_seven" value="Семиместный">
								<label for="hotels_lux_person_seven">Семиместный</label>
							</div>
						</div>
						<div>
							<label for="hotels_lux_has">Удобства в номере</label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_conder" value="Кондиционер">
								<label for="hotels_lux_has_conder">Кондиционер</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_tv" value="Телевизор">
								<label for="hotels_lux_has_tv">Телевизор</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_holod" value="Холодильник">
								<label for="hotels_lux_has_holod">Холодильник</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_chainik" value="Чайник">
								<label for="hotels_lux_has_chainik">Чайник</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_aptechka" value="Аптечка">
								<label for="hotels_lux_has_aptechka">Аптечка</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_fen" value="Фен">
								<label for="hotels_lux_has_fen">Фен</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_micro" value="Микроволновая печь">
								<label for="hotels_lux_has_micro">Микроволновая печь</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_coffemaker" value="Кофеварка">
								<label for="hotels_lux_has_coffemaker">Кофеварка</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_utug" value="Утюг">
								<label for="hotels_lux_has_utug">Утюг</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_sanuzel" value="Санузел">
								<label for="hotels_lux_has_sanuzel">Санузел</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_dush" value="Душ">
								<label for="hotels_lux_has_dush">Душ</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_safe" value="Сейф">
								<label for="hotels_lux_has_safe">Сейф</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_ventilator" value="Вентилятор">
								<label for="hotels_lux_has_ventilator">Вентилятор</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_uborka" value="Уборка в номере">
								<label for="hotels_lux_has_uborka">Уборка в номере</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_wifi" value="Wi-Fi">
								<label for="hotels_lux_has_wifi">Wi-Fi</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_viewmore" value="Вид на море">
								<label for="hotels_lux_has_viewmore">Вид на море</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_minibar" value="Минибар">
								<label for="hotels_lux_has_minibar">Минибар</label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_lux_has" id="hotels_lux_has_telephone" value="Телефон">
								<label for="hotels_lux_has_telephone">Телефон</label>
							</div>
						</div>
					</div>
					<!-- Полулюкс -->
					<div class="addnew__halflux">
						<div class="addnew__heading">
							Полулюкс
						</div>
						<div>
							<label for="hotels_halflux_photo">Фото номера:</label>
							<div class="addnew__description mb-3">
								Допускаются только реальные фото, без текста или водяных знаков.
							</div>
							<input type="file" name="hotels_halflux_photo" multiple>
						</div>
						<div>
							<label for="hotels_halflux_minsezon">Минимальная цена за номер в сезон, грн</label>
							<input type="text" name="hotels_halflux_minsezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_halflux_maxsezon">Максимальная цена за номер в сезон, грн</label>
							<input type="text" name="hotels_halflux_maxsezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_halflux_minnesezon">Минимальная цена за номер не в сезон, грн</label>
							<input type="text" name="hotels_halflux_minnesezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_halflux_maxnesezon">Максимальная цена за номер не в сезон, грн</label>
							<input type="text" name="hotels_halflux_maxnesezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_halflux_person">Количество мест в номере</label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_person" id="hotels_halflux_person_one" value="Одноместный">
								<label for="hotels_halflux_person_one">Одноместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_person" id="hotels_halflux_person_two" value="Двуместный">
								<label for="hotels_halflux_person_two">Двуместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_person" id="hotels_halflux_person_three" value="Трехместный">
								<label for="hotels_halflux_person_three">Трехместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_person" id="hotels_halflux_person_four" value="Четырехместный">
								<label for="hotels_halflux_person_four">Четырехместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_person" id="hotels_halflux_person_five" value="Пятиместный">
								<label for="hotels_halflux_person_five">Пятиместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_person" id="hotels_halflux_person_six" value="Шестиместный">
								<label for="hotels_halflux_person_six">Шестиместный</label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_halflux_person" id="hotels_halflux_person_seven" value="Семиместный">
								<label for="hotels_halflux_person_seven">Семиместный</label>
							</div>
						</div>
						<div>
							<label for="hotels_halflux_has">Удобства в номере</label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_conder" value="Кондиционер">
								<label for="hotels_halflux_has_conder">Кондиционер</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_tv" value="Телевизор">
								<label for="hotels_halflux_has_tv">Телевизор</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_holod" value="Холодильник">
								<label for="hotels_halflux_has_holod">Холодильник</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_chainik" value="Чайник">
								<label for="hotels_halflux_has_chainik">Чайник</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_aptechka" value="Аптечка">
								<label for="hotels_halflux_has_aptechka">Аптечка</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_fen" value="Фен">
								<label for="hotels_halflux_has_fen">Фен</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_micro" value="Микроволновая печь">
								<label for="hotels_halflux_has_micro">Микроволновая печь</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_coffemaker" value="Кофеварка">
								<label for="hotels_halflux_has_coffemaker">Кофеварка</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_utug" value="Утюг">
								<label for="hotels_halflux_has_utug">Утюг</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_sanuzel" value="Санузел">
								<label for="hotels_halflux_has_sanuzel">Санузел</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_dush" value="Душ">
								<label for="hotels_halflux_has_dush">Душ</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_safe" value="Сейф">
								<label for="hotels_halflux_has_safe">Сейф</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_ventilator" value="Вентилятор">
								<label for="hotels_halflux_has_ventilator">Вентилятор</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_uborka" value="Уборка в номере">
								<label for="hotels_halflux_has_uborka">Уборка в номере</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_wifi" value="Wi-Fi">
								<label for="hotels_halflux_has_wifi">Wi-Fi</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_viewmore" value="Вид на море">
								<label for="hotels_halflux_has_viewmore">Вид на море</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_minibar" value="Минибар">
								<label for="hotels_halflux_has_minibar">Минибар</label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_halflux_has" id="hotels_halflux_has_telephone" value="Телефон">
								<label for="hotels_halflux_has_telephone">Телефон</label>
							</div>
						</div>
					</div>
					<!-- Стандартные -->
					<div class="addnew__standart">
						<div class="addnew__heading">
							Стандартные номера
						</div>
						<div>
							<label for="hotels_standart_photo">Фото номера:</label>
							<div class="addnew__description mb-3">
								Допускаются только реальные фото, без текста или водяных знаков.
							</div>
							<input type="file" name="hotels_standart_photo" multiple>
						</div>
						<div>
							<label for="hotels_standart_minsezon">Минимальная цена за номер в сезон, грн</label>
							<input type="text" name="hotels_standart_minsezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_standart_maxsezon">Максимальная цена за номер в сезон, грн</label>
							<input type="text" name="hotels_standart_maxsezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_standart_minnesezon">Минимальная цена за номер не в сезон, грн</label>
							<input type="text" name="hotels_standart_minnesezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_standart_maxnesezon">Максимальная цена за номер не в сезон, грн</label>
							<input type="text" name="hotels_standart_maxnesezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_standart_person">Количество мест в номере</label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_person" id="hotels_standart_person_one" value="Одноместный">
								<label for="hotels_standart_person_one">Одноместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_person" id="hotels_standart_person_two" value="Двуместный">
								<label for="hotels_standart_person_two">Двуместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_person" id="hotels_standart_person_three" value="Трехместный">
								<label for="hotels_standart_person_three">Трехместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_person" id="hotels_standart_person_four" value="Четырехместный">
								<label for="hotels_standart_person_four">Четырехместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_person" id="hotels_standart_person_five" value="Пятиместный">
								<label for="hotels_standart_person_five">Пятиместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_person" id="hotels_standart_person_six" value="Шестиместный">
								<label for="hotels_standart_person_six">Шестиместный</label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_standart_person" id="hotels_standart_person_seven" value="Семиместный">
								<label for="hotels_standart_person_seven">Семиместный</label>
							</div>
						</div>
						<div>
							<label for="hotels_standart_has">Удобства в номере</label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_conder" value="Кондиционер">
								<label for="hotels_standart_has_conder">Кондиционер</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_tv" value="Телевизор">
								<label for="hotels_standart_has_tv">Телевизор</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_holod" value="Холодильник">
								<label for="hotels_standart_has_holod">Холодильник</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_chainik" value="Чайник">
								<label for="hotels_standart_has_chainik">Чайник</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_aptechka" value="Аптечка">
								<label for="hotels_standart_has_aptechka">Аптечка</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_fen" value="Фен">
								<label for="hotels_standart_has_fen">Фен</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_micro" value="Микроволновая печь">
								<label for="hotels_standart_has_micro">Микроволновая печь</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_coffemaker" value="Кофеварка">
								<label for="hotels_standart_has_coffemaker">Кофеварка</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_utug" value="Утюг">
								<label for="hotels_standart_has_utug">Утюг</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_sanuzel" value="Санузел">
								<label for="hotels_standart_has_sanuzel">Санузел</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_dush" value="Душ">
								<label for="hotels_standart_has_dush">Душ</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_safe" value="Сейф">
								<label for="hotels_standart_has_safe">Сейф</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_ventilator" value="Вентилятор">
								<label for="hotels_standart_has_ventilator">Вентилятор</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_uborka" value="Уборка в номере">
								<label for="hotels_standart_has_uborka">Уборка в номере</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_wifi" value="Wi-Fi">
								<label for="hotels_standart_has_wifi">Wi-Fi</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_viewmore" value="Вид на море">
								<label for="hotels_standart_has_viewmore">Вид на море</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_minibar" value="Минибар">
								<label for="hotels_standart_has_minibar">Минибар</label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_standart_has" id="hotels_standart_has_telephone" value="Телефон">
								<label for="hotels_standart_has_telephone">Телефон</label>
							</div>
						</div>
					</div>
					<!-- Бюджетные -->
					<div class="addnew__budget">
						<div class="addnew__heading">
							Бюджетные номера
						</div>
						<div>
							<label for="hotels_budget_photo">Фото номера:</label>
							<div class="addnew__description mb-3">
								Допускаются только реальные фото, без текста или водяных знаков.
							</div>
							<input type="file" name="hotels_budget_photo" multiple>
						</div>
						<div>
							<label for="hotels_budget_minsezon">Минимальная цена за номер в сезон, грн</label>
							<input type="text" name="hotels_budget_minsezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_budget_maxsezon">Максимальная цена за номер в сезон, грн</label>
							<input type="text" name="hotels_budget_maxsezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_budget_minnesezon">Минимальная цена за номер не в сезон, грн</label>
							<input type="text" name="hotels_budget_minnesezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_budget_maxnesezon">Максимальная цена за номер не в сезон, грн</label>
							<input type="text" name="hotels_budget_maxnesezon" placeholder="Мой ответ">
						</div>
						<div>
							<label for="hotels_budget_person">Количество мест в номере</label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_person" id="hotels_budget_person_one" value="Одноместный">
								<label for="hotels_budget_person_one">Одноместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_person" id="hotels_budget_person_two" value="Двуместный">
								<label for="hotels_budget_person_two">Двуместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_person" id="hotels_budget_person_three" value="Трехместный">
								<label for="hotels_budget_person_three">Трехместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_person" id="hotels_budget_person_four" value="Четырехместный">
								<label for="hotels_budget_person_four">Четырехместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_person" id="hotels_budget_person_five" value="Пятиместный">
								<label for="hotels_budget_person_five">Пятиместный</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_person" id="hotels_budget_person_six" value="Шестиместный">
								<label for="hotels_budget_person_six">Шестиместный</label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_budget_person" id="hotels_budget_person_seven" value="Семиместный">
								<label for="hotels_budget_person_seven">Семиместный</label>
							</div>
						</div>
						<div>
							<label for="hotels_budget_has">Удобства в номере</label>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_conder" value="Кондиционер">
								<label for="hotels_budget_has_conder">Кондиционер</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_tv" value="Телевизор">
								<label for="hotels_budget_has_tv">Телевизор</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_holod" value="Холодильник">
								<label for="hotels_budget_has_holod">Холодильник</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_chainik" value="Чайник">
								<label for="hotels_budget_has_chainik">Чайник</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_aptechka" value="Аптечка">
								<label for="hotels_budget_has_aptechka">Аптечка</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_fen" value="Фен">
								<label for="hotels_budget_has_fen">Фен</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_micro" value="Микроволновая печь">
								<label for="hotels_budget_has_micro">Микроволновая печь</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_coffemaker" value="Кофеварка">
								<label for="hotels_budget_has_coffemaker">Кофеварка</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_utug" value="Утюг">
								<label for="hotels_budget_has_utug">Утюг</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_sanuzel" value="Санузел">
								<label for="hotels_budget_has_sanuzel">Санузел</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_dush" value="Душ">
								<label for="hotels_budget_has_dush">Душ</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_safe" value="Сейф">
								<label for="hotels_budget_has_safe">Сейф</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_ventilator" value="Вентилятор">
								<label for="hotels_budget_has_ventilator">Вентилятор</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_uborka" value="Уборка в номере">
								<label for="hotels_budget_has_uborka">Уборка в номере</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_wifi" value="Wi-Fi">
								<label for="hotels_budget_has_wifi">Wi-Fi</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_viewmore" value="Вид на море">
								<label for="hotels_budget_has_viewmore">Вид на море</label>
							</div>
							<div class="d-flex align-items-center mb-3">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_minibar" value="Минибар">
								<label for="hotels_budget_has_minibar">Минибар</label>
							</div>
							<div class="d-flex align-items-center mb-5">
								<input type="checkbox" name="hotels_budget_has" id="hotels_budget_has_telephone" value="Телефон">
								<label for="hotels_budget_has_telephone">Телефон</label>
							</div>
						</div>
					</div>
					<button type="submit">Добавить</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>