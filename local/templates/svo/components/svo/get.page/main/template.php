<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>






<?php
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var string $templateName
 * @var string $componentPath
 */
if(empty($arResult)){
    exit();
}
$arProp = $arResult['PROPERTIES'];
?>

<?php if(!empty($arProp['FITST_BLOCK']['~VALUE'])):?>
    <section class="home">
        <?php
            $imgDesk = '/local/templates/svo/assets/bg-mjrlcHiF.png';
            $imgMob = '/local/templates/svo/assets/mobile-bg-AvaVcpcE.png';
        if(!empty($arProp['FITST_BLOCK']['~VALUE']['IMG'])){
            $imgDesk = CFile::GetPath($arProp['FITST_BLOCK']['VALUE']['IMG']);
        }
        if(!empty($arProp['FITST_BLOCK']['~VALUE']['IMG_MOB'])){
            $imgMob = CFile::GetPath($arProp['FITST_BLOCK']['~VALUE']['IMG_MOB']);
        }
        ?>
        <img src="<?=$imgDesk?>" fetchpriority="high" alt="Солдат" class="home__bg" />
        <img src="<?=$imgMob?>" fetchpriority="high" alt="Солдат" class="home__bg home__bg_mobile"/>
        <div class="container">
            <div class="home__text-wrap">
                <h1 class="home__title page-title">
                    <?php if(!empty($arProp['FITST_BLOCK']['~VALUE']['TITLE'])):?>
                        <?=$arProp['FITST_BLOCK']['~VALUE']['TITLE'];?>
                    <?php else:?>
                        Служи Родине и не переживай за родных!
                    <?php endif;?>
                </h1>
                <?php if(!empty($arProp['FITST_BLOCK']['~VALUE']['SUBTITLE'])):?>
                    <p class="home__subtitle">
                        <?=$arProp['FITST_BLOCK']['~VALUE']['SUBTITLE'];?>
                    </p>
                <?php endif;?>
                <div class="btn_first_wrap">
                    <a href="#callback" class="home__btn btn">
                        Оставить заявку
                    </a>
                </div>
            </div>
            <?php if(!empty($arProp['FIRST_ADVANTAGE']['~VALUE'])):?>
                <div class="home__items">
                    <?php foreach ($arProp['FIRST_ADVANTAGE']['~VALUE'] as $arAdvantage):?>
                        <a href="#" data-izimodal-open="#modal" class="home-item" >
                            <span class="home-item__text">
                                <?php if(!empty($arAdvantage['TITLE'])):?>
                                    <?=$arAdvantage['TITLE'];?>
                                <?php endif;?>
                            </span>
                        </a>
                    <?php endforeach;?>
                </div>
            <?php endif;?>
        </div>
    </section>
<?php endif;?>

<?php if(!empty($arProp['PAYMENTS_ITEMS']['~VALUE'])):?>
    <section class="info-cards payments header-breakpoint" id="payments">
        <div class="container">
            <div class="info-cards__column">
                <div class="info-cards__text-wrap">
                    <h2 class="info-cards__title block-title">
                        <?php if(!empty($arProp['PAYMENTS_BLOCK']['~VALUE']['TITLE'])):?>
                            <?=$arProp['PAYMENTS_BLOCK']['~VALUE']['TITLE']?>
                        <?php endif;?>
                    </h2>
                    <p class="info-cards__subtitle">
                        <?php if(!empty($arProp['PAYMENTS_BLOCK']['~VALUE']['TEXT'])):?>
                            <?=$arProp['PAYMENTS_BLOCK']['~VALUE']['TEXT']?>
                        <?php endif;?>
                    </p>
                </div>
            </div>

            <div class="info-cards__column info-cards__items">
                <?php foreach ($arProp['PAYMENTS_ITEMS']['~VALUE'] as $arPayItem):?>
                    <div class="info-card">
                        <span class="info-card__title">
                            <?php if(!empty($arPayItem['TITLE'])):?><?=$arPayItem['TITLE'];?><?php endif;?>
                        </span>

                        <p class="info-card__text">
                            <?php if(!empty($arPayItem['TEXT'])):?><?=$arPayItem['TEXT'];?><?php endif;?>
                        </p>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
<?php endif;?>

<section class="help">
    <div class="container">
        <div class="help__wrapper">
            <div class="help__column help__text-wrap">
                <h2 class="help__title block-title">
                    <?php if(!empty($arProp['WE_HELP_BLOCK']['~VALUE']['TITLE'])):?>
                        <?=$arProp['WE_HELP_BLOCK']['~VALUE']['TITLE'];?>
                    <?php endif;?>
                </h2>
                <?php if(!empty($arProp['WE_HELP_BLOCK']['~VALUE']['TEXT'])):?>
                    <?=$arProp['WE_HELP_BLOCK']['~VALUE']['TEXT'];?>
                <?php else:?>
                    <ul class="help__list list list_white">
                        <li>
                            Обеспечим трансфер из любой точки страны
                            за наш счет
                        </li>
                        <li>
                            Поможем в списании кредитов и
                            задолженностей до 10 млн. рублей
                        </li>
                        <li>
                            Восстановим документы и поможем решить
                            проблемы с законом
                        </li>
                    </ul>
                <?php endif;?>
            </div>
            <div class="help__column">
                <?php
                    $imgHelp = '/local/templates/svo/assets/main-U6IqoCOP.png';
                    if(!empty($arProp['WE_HELP_BLOCK']['~VALUE']['IMG'])){
                        $imgHelp = CFile::GetPath($arProp['WE_HELP_BLOCK']['~VALUE']['IMG']);
                    }
                ?>
                <img src="<?=$imgHelp;?>" alt="Солдаты" class="help__img" loading="lazy"/>
            </div>
        </div>
    </div>
    <img src="<?=$imgHelp;?>" alt="Солдаты" class="help__img help__img_mobile" loading="lazy"/>
</section>

<section class="support">
    <div class="container">
        <h2 class="support__title block-title">
            <?php if(!empty($arProp['SUPPORT_TITLE']['~VALUE'])):?>
                <?=$arProp['SUPPORT_TITLE']['~VALUE']?>
            <?php else:?>
                Дополнительные
                <mark class="marked">меры поддержки</mark>
            <?php endif;?>
        </h2>
        <?php if(!empty($arProp['SUPPORTS']['~VALUE'])):?>
        <div class="support__items">
            <?php foreach ($arProp['SUPPORTS']['~VALUE'] as $arSupport):?>
                <div class="support-item">
                    <?php if(!empty($arSupport['ICON'])):?>
                        <img src="<?=CFile::GetPath($arSupport['ICON']);?>" alt="Иконка" loading="lazy" class="support-item__img" />
                    <?php endif;?>
                    <?php if(!empty($arSupport['TITLE'])):?>
                        <h3 class="support-item__name">
                            <?=$arSupport['TITLE']?>
                        </h3>
                    <?php endif;?>
                    <div class="support-item__hidden">
                        <?php if(!empty($arSupport['TEXT'])):?>
                            <?=$arSupport['TEXT']?>
                        <?php endif;?>
                    </div>
                </div>
            <?php endforeach;?>
        </div>

        <div class="support__btn-wrap">
            <button type="button" class="support__more-btn">
                Посмотреть больше
            </button>
        </div>
        <?php endif;?>
    </div>
</section>

<section class="advantages" id="advantages">
    <div class="container">
        <h2 class="advantages__title block-title">
            <?php if(!empty($arProp['ADVANTAGE_TITLE']['~VALUE'])):?>
                <?=$arProp['ADVANTAGE_TITLE']['~VALUE']?>
            <?php else:?>
                <mark class="marked">Преимущества</mark> подписания контракта
            <?php endif;?>
        </h2>
        <?php if(!empty($arProp['ADVANTAGES']['~VALUE'])):?>
            <div class="advantages__items">
                <?php foreach ($arProp['ADVANTAGES']['~VALUE'] as $key => $arMainAdvat):?>
                    <?php if(!empty($arMainAdvat['TEXT'])):?>
                        <div class="advantage<?php if($key == 0 || $key == 04 || $key == 6):?> advantage_blue<?php endif;?>">
                            <p><?=$arMainAdvat['TEXT']?></p>
                        </div>
                    <?php endif;?>
                <?php endforeach;?>
            </div>
        <?php endif;?>
    </div>
</section>

<section class="conditions" id="conditions">
    <div class="container">
        <?php
            $imgCondition = '/local/templates/svo/assets/main-CJ270AzU.png';
            if(!empty($arProp['CONDITIONS']['~VALUE']['IMG'])){
                $imgCondition = CFile::GetPath($arProp['CONDITIONS']['~VALUE']['IMG']);
            }
        ?>
        <img src="<?=$imgCondition?>" alt="img" loading="lazy" class="conditions__img"/>

        <div class="conditions__text-wrap">
            <?php if(!empty($arProp['CONDITION_TITLE']['~VALUE'])):?>
                <h2 class="conditions__title block-title">
                    <?=$arProp['CONDITION_TITLE']['~VALUE'];?>
                </h2>
            <?php endif;?>
            <?php if(!empty($arProp['CONDITIONS']['~VALUE']['TEXT'])):?>
                <?=$arProp['CONDITIONS']['~VALUE']['TEXT'];?>
            <?php else:?>
                <ul class="conditions__list list list_blue">
                    <li>Тебе от 18 до 60 лет</li>
                    <li>
                        У тебя нет серьезных заболеваний, которые
                        мешают службе (ВИЧ, туберкулез, сахарный
                        диабет, эпилепсия, гипертония, инвалидность
                        1-й и 2-й группы и др. — полный перечень
                        уточняется при оформлении)
                    </li>
                    <li>
                        Ты не состоишь на учете у психиатра и
                        нарколога
                    </li>
                    <li>
                        У тебя нет погашенной или непогашенной
                        судимости за тяжкие преступления: против
                        половой неприкосновенности детей, за захват
                        заложников, терроризм.
                    </li>
                </ul>
            <?php endif;?>
        </div>
    </div>
</section>

<section class="documents" id="documents">
    <div class="container">

        <h2 class="documents__title block-title">
            <?php if(!empty($arProp['DOCUMENT_TITLE']['~VALUE']['TITLE'])):?>
                <?=$arProp['DOCUMENT_TITLE']['~VALUE']['TITLE'];?>
            <?php else:?>
                <mark class="marked">Документы</mark> для заключения
                контракта
            <?php endif;?>
        </h2>

        <div class="documents__grid">
            <?php if(!empty($arProp['DOCUMENTS']['~VALUE'])):?>
            <?php foreach ($arProp['DOCUMENTS']['~VALUE'] as $keyDoc => $arDoc):?>
                    <div class="document">
                        <span class="document__num"> <?=str_pad($keyDoc +1, 2, '0', STR_PAD_LEFT);?> </span>
                        <p class="document__text">
                            <?=$arDoc['TEXT']?>
                        </p>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
            <?php
                $imgDoc = '/local/templates/svo/assets/main-B6qep5Ea.png';
                $imgDocMob = '/local/templates/svo/assets/main-B6qep5Ea.png';
                if(!empty($arProp['DOCUMENT_TITLE']['~VALUE']['IMG'])){
                    $imgDoc = CFile::GetPath($arProp['DOCUMENT_TITLE']['~VALUE']['IMG']);
                }
                if(!empty($arProp['DOCUMENT_TITLE']['~VALUE']['IMG_MOB'])){
                    $imgDocMob = CFile::GetPath($arProp['DOCUMENT_TITLE']['~VALUE']['IMG_MOB']);
                }
            ?>
            <img src="<?=$imgDoc?>" alt="Фото паспорта и военного билета" loading="lazy" class="documents__img"/>
        </div>
    </div>
    <img src="<?=$imgDocMob?>" alt="Фото паспорта и военного билета" loading="lazy" class="documents__img documents__img_mobile"/>

</section>

<section class="foreigner">
    <div class="container">
        <header class="foreigner__header">

            <h2 class="foreigner__title block-title">
                <?php if(!empty($arProp['DOCUMENT_INO_TITLE']['~VALUE']['TITLE'])):?>
                    <?=$arProp['DOCUMENT_INO_TITLE']['~VALUE']['TITLE'];?>
                <?php else:?>
                    Для <mark class="marked">СВОих</mark> не бывает
                    иностранцев
                <?php endif;?>
            </h2>

            <p class="foreigner__subtitle">
                <?php if(!empty($arProp['DOCUMENT_INO_TITLE']['~VALUE']['TEXT'])):?>
                    <?=$arProp['DOCUMENT_INO_TITLE']['~VALUE']['TEXT'];?>
                <?php endif;?>
            </p>
        </header>

        <div class="foreigner__grid">
            <?php
            $imgForeigner = '/local/templates/svo/assets/main-Dvu7bx96.png';
            $imgForeignerMob = '/local/templates/svo/assets/main-Dvu7bx96.png';
             if(!empty($arProp['DOCUMENT_INO_TITLE']['~VALUE']['IMG'])){
                 $imgForeigner = CFile::GetPath($arProp['DOCUMENT_INO_TITLE']['~VALUE']['IMG']);
             }
            if(!empty($arProp['DOCUMENT_INO_TITLE']['~VALUE']['IMG_MOB'])){
                $imgForeignerMob = CFile::GetPath($arProp['DOCUMENT_INO_TITLE']['~VALUE']['IMG_MOB']);
            }
            ?>
            <img src="<?=$imgForeigner?>" alt="Человек подписывет бумаги" loading="lazy" class="foreigner__img"/>
            <?php if(!empty($arProp['DOCUMENTS_INO']['~VALUE'])):?>
                <?php foreach ($arProp['DOCUMENTS_INO']['~VALUE'] as $geyDocIn => $arInDoc):?>
                    <?php $number = $geyDocIn + 1;?>
                    <div class="foreigner-item">
                        <span class="foreigner-item__num"> <?=str_pad($number, 2, '0', STR_PAD_LEFT);?> </span>
                        <p class="foreigner-item__text">
                            <?php if(!empty($arInDoc['TEXT'])):?><?=$arInDoc['TEXT'];?><?php endif;?>
                        </p>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
        <aside class="foreigner__clue">
            <p>
                <?php if(!empty($arProp['DOCUMENT_INO_TITLE']['~VALUE']['TEXT_FAKT'])):?>
                    <?=$arProp['DOCUMENT_INO_TITLE']['~VALUE']['TEXT_FAKT'];?>
                <?php else:?>
                    Также необходимо подтвердить фактическое знание русского языка
                <?php endif;?>
            </p>
        </aside>
    </div>

    <img src="<?=$imgForeignerMob?>" alt="Человек подписывет бумаги" loading="lazy" class="foreigner__img foreigner__img_mobile"/>
</section>

<section class="info-cards steps">
    <div class="container">
        <div class="info-cards__column">
            <div class="info-cards__text-wrap">
                <h2 class="info-cards__title block-title">
                    <?php if(!empty($arProp['STEP_TITLE']['~VALUE']['TITLE'])):?>
                        <?=$arProp['STEP_TITLE']['~VALUE']['TITLE'];?>
                    <?php else:?>
                        <mark class="marked">4 шага</mark> от заявки до подписания контракта:
                    <?php endif;?>
                </h2>
                <?php if(!empty($arProp['STEP_TITLE']['~VALUE']['TEXT'])):?>
                    <p class="info-cards__subtitle">
                        <?=$arProp['STEP_TITLE']['~VALUE']['TEXT'];?>
                    </p>
                <?php endif;?>
                <a href="#callback" class="info-cards__btn btn">
                    Оставить заявку
                </a>
            </div>
            <div class="m"></div>
        </div>

        <?php if(!empty($arProp['STEPS']['~VALUE'])):?>
            <div class="info-cards__column info-cards__items">
                <?php foreach ($arProp['STEPS']['~VALUE'] as $keyStep => $arSteps):?>
                    <div class="info-card info-card_step">
                        <span class="info-card__num"> <?=str_pad($keyStep + 1, 2, '0', STR_PAD_LEFT);?> </span>

                        <h3 class="info-card__title">
                            <?php if(!empty($arSteps['TITLE'])):?><?=$arSteps['TITLE']?><?php endif;?>
                        </h3>
                        <?php if(!empty($arSteps['TEXT'])):?>
                            <p class="info-card__text">
                                <?=$arSteps['TEXT']?>
                            </p>
                        <?php endif;?>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>
        <a href="#callback" class="info-cards__btn info-cards__btn_mobile btn">
            Оставить заявку
        </a>
    </div>
</section>

<section class="questions">
    <div class="container">
        <h2 class="questions__title block-title">
            <?php if(!empty($arProp['FAQ_TITLE']['~VALUE'])):?>
                <?=$arProp['FAQ_TITLE']['~VALUE'];?>
            <?php else:?>
                Часто задаваемые вопросы:
            <?php endif;?>

        </h2>
        <?php if(!empty($arProp['FAQ']['~VALUE'])):?>
            <div class="questions__items">
                <?php foreach ($arProp['FAQ']['~VALUE'] as $faq):?>
                    <div class="question">
                        <button class="question__btn">
                            <?php if(!empty($faq['TITLE'])):?>
                                <?=$faq['TITLE'];?>
                            <?php endif;?>
                        </button>

                        <div class="question__hidden">
                            <?php if(!empty($faq['TEXT'])):?>
                                <p>
                                    <?=$faq['TEXT'];?>
                                </p>
                            <?php endif;?>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>
    </div>
    <?php if(!empty($arProp['FAQ']['~VALUE'])):?>
        <div class="questions__items questions__items_mobile">
            <?php foreach ($arProp['FAQ']['~VALUE'] as $faq):?>
                <div class="question">
                    <button class="question__btn">
                        <?php if(!empty($faq['TITLE'])):?>
                            <?=$faq['TITLE'];?>
                        <?php endif;?>
                    </button>

                    <div class="question__hidden">
                        <?php if(!empty($faq['TEXT'])):?>
                            <p>
                                <?=$faq['TEXT'];?>
                            </p>
                        <?php endif;?>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    <?php endif;?>
</section>

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