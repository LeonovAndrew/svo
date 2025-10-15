<section id="callback" class="callback">
    <div class="container">
        <form action="/ajax/ajax.php" method="POST" class="form">
            <h2 class="form__title block-title">
                Стань одним из СВОих,<br> <br class="br-tab"> ты нужен Родине!
            </h2>
            <p class="form__subtitle">
                Оставь заявку и мы свяжемся в ближайшее время
            </p>

            <fieldset class="form__inputs">
                <legend class="form__legend">
                    Контактная информация
                </legend>

                <div class="form__input-group">
                    <label for="fullname" class="form__input-name">
                        ФИО
                        <span class="form__input-name_mini">(обязательное поле)</span>
                    </label>
                    <input type="text" name="name" id="fullname" required class="form__input input"/>
                </div>

                <div class="form__input-group">
                    <label for="region" class="form__input-name">
                        Регион проживания
                    </label>
                    <select name="region" id="region" class="form__input input">
                        <option value="">Выберите регион</option>
                        <option value="Абинский район">Абинский район</option>
                        <option value="Анапа город-курорт">Анапа город-курорт</option>
                        <option value="Апшеронский район">Апшеронский район</option>
                        <option value="Армавир город">Армавир город</option>
                        <option value="Белоглинский район">Белоглинский район</option>
                        <option value="Белореченский район">Белореченский район</option>
                        <option value="Брюховецкий район">Брюховецкий район</option>
                        <option value="Выселковский район">Выселковский район</option>
                        <option value="Геленджик город-курорт">Геленджик город-курорт</option>
                        <option value="Горячий Ключ город">Горячий Ключ город</option>
                        <option value="Гулькевичский район">Гулькевичский район</option>
                        <option value="Динской район">Динской район</option>
                        <option value="Ейский район">Ейский район</option>
                        <option value="Кавказский район">Кавказский район</option>
                        <option value="Калининский район">Калининский район</option>
                        <option value="Каневской район">Каневской район</option>
                        <option value="Кореновский район">Кореновский район</option>
                        <option value="Красноармейский район">Красноармейский район</option>
                        <option value="Краснодар город">Краснодар город</option>
                        <option value="Крыловский район">Крыловский район</option>
                        <option value="Крымский район">Крымский район</option>
                        <option value="Курганинский район">Курганинский район</option>
                        <option value="Кущевский район">Кущевский район</option>
                        <option value="Лабинский район">Лабинский район</option>
                        <option value="Ленинградский район">Ленинградский район</option>
                        <option value="Мостовский район">Мостовский район</option>
                        <option value="Новокубанский район">Новокубанский район</option>
                        <option value="Новопокровский район">Новопокровский район</option>
                        <option value="Новороссийск город">Новороссийск город</option>
                        <option value="Отрадненский район">Отрадненский район</option>
                        <option value="Павловский район">Павловский район</option>
                        <option value="Приморско-Ахтарский район">Приморско-Ахтарский район</option>
                        <option value="Северский район">Северский район</option>
                        <option value="Сириус ФТ">Сириус ФТ</option>
                        <option value="Славянский район">Славянский район</option>
                        <option value="Сочи город-курорт">Сочи город-курорт</option>
                        <option value="Староминский район">Староминский район</option>
                        <option value="Тбилисский район">Тбилисский район</option>
                        <option value="Темрюкский район">Темрюкский район</option>
                        <option value="Тимашевский район">Тимашевский район</option>
                        <option value="Тихорецкий район">Тихорецкий район</option>
                        <option value="Туапсинский район">Туапсинский район</option>
                        <option value="Успенский район">Успенский район</option>
                        <option value="Усть-Лабинский район">Усть-Лабинский район</option>
                        <option value="Щербиновский район">Щербиновский район</option>
                    </select>
                </div>

                <div class="form__input-group">
                    <label for="phone" class="form__input-name">
                        Номер телефона <span class="form__input-name_mini">(обязательное поле)</span>
                    </label>
                    <input type="text" name="phone" id="phone" required class="form__input input tel"/>
                </div>

                <div class="form__input-group">
                    <label for="age" class="form__input-name">
                        Возраст
                    </label>
                    <input type="text" name="old" id="age" class="form__input input"/>
                </div>
                <div class="form__input-group">
                    <div id="captcha-container" class="smart-captcha" data-sitekey="ysc1_sxaLgBItJYBQFamyynjioxiK2r4SWzxDqy1ff6ged49e7cfc"></div>
                </div>
            </fieldset>

            <div role="alert" class="form__message">
                Данные успешно отправлены. Мы скоро свяжемся с
                вами!
            </div>

            <button type="submit" class="form__btn btn btn_white">
                Оставить заявку
            </button>

            <p class="form__descr">
                Нажимая кнопку, я даю свое согласие на<br class="br-mob"> обработку
                моих персональных<br><br class="br-tab"> данных, в<br class="br-mob"> соответствии с
                Федеральным законом от<br class="br-mob"> 27.07.2006 года<br><br class="br-tab"> №152-ФЗ
                «О персональных<br class="br-mob"> данных», на условиях и для
                целей,<br><br class="br-tab"> определенных<br class="br-mob"> в Согласии на обработку
                персональных данных
            </p>
        </form>
    </div>
</section>