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
        <div class="main_btn_wrap">
            <a href="/viplaty-i-lgoty/" class="main_btn_s">Подробнее</a>
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

        <!--<div class="support__btn-wrap">
            <button type="button" class="support__more-btn">
                Посмотреть больше
            </button>
        </div>-->
            <div class="main_btn_wrap">
                <a href="/viplaty-i-lgoty/" class="read-more__more-btn">Смотреть еще</a>
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
    <div class="main_btn_wrap">
        <a href="/chto-delat/" class="main_btn_s">Подробнее</a>
    </div>
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
    <div class="main_btn_wrap">
        <a href="/usloviya/" class="read-more__more-btn">Смотреть еще</a>
    </div>
</section>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"news2",
	Array(
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("ID", "CODE", "XML_ID", "NAME", "TAGS", "SORT", "PREVIEW_TEXT", "PREVIEW_PICTURE", "DETAIL_TEXT", "DETAIL_PICTURE", "DATE_ACTIVE_FROM", "ACTIVE_FROM", "DATE_ACTIVE_TO", "ACTIVE_TO", "SHOW_COUNTER", "SHOW_COUNTER_START", "IBLOCK_TYPE_ID", "IBLOCK_ID", "IBLOCK_CODE", "IBLOCK_NAME", "IBLOCK_EXTERNAL_ID", "DATE_CREATE", "CREATED_BY", "CREATED_USER_NAME", "TIMESTAMP_X", "MODIFIED_BY", "USER_NAME", ""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "pages",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "statyi",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("", ""),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
	)
);?>

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
<?php
include $_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/include/form.php';
?>
