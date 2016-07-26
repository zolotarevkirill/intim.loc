<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Поиск");
$APPLICATION->SetPageProperty("description", "Поиск");
$APPLICATION->SetTitle("Поиск");
?>
<section class="content white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-sm-12">
                <div class="holder-bg">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-12">
                            <?php
                            $APPLICATION->IncludeComponent(
	"bitrix:search.page", 
	"clearMy", 
	array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "N",
		"COMPONENT_TEMPLATE" => "clearMy",
		"DEFAULT_SORT" => "rank",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "Y",
		"FILTER_NAME" => "",
		"NO_WORD_LOGIC" => "N",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "forum",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGE_RESULT_COUNT" => "24",
		"PATH_TO_USER_PROFILE" => "",
		"RATING_TYPE" => "",
		"RESTART" => "Y",
		"SHOW_RATING" => "",
		"SHOW_WHEN" => "N",
		"SHOW_WHERE" => "Y",
		"USE_LANGUAGE_GUESS" => "Y",
		"USE_SUGGEST" => "Y",
		"USE_TITLE_RANK" => "N",
		"arrFILTER" => array(
			0 => "iblock_catalog",
		),
		"arrWHERE" => array(
		),
		"SHOW_ITEM_TAGS" => "Y",
		"TAGS_INHERIT" => "Y",
		"SHOW_ITEM_DATE_CHANGE" => "Y",
		"SHOW_ORDER_BY" => "Y",
		"SHOW_TAGS_CLOUD" => "N",
		"arrFILTER_iblock_catalog" => array(
			0 => "5",
		)
	),
	false
);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>