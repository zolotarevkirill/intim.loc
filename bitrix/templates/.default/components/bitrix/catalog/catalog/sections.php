<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
$this->setFrameMode(true);
?>

           <!-- PAGE WITH SIDEBAR -->
<section class="page-section with-sidebar">
    <div class="container">
        <div class="row">
            <!-- SIDEBAR -->
            <aside class="col-md-3 sidebar" id="sidebar">
                <!-- widget search -->
                <div class="widget">
                    <div class="widget-search">
                        <input class="form-control" type="text" placeholder="Search">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <!-- /widget search -->
                <!-- widget shop categories -->
                <?php
                $APPLICATION->IncludeComponent("bitrix:menu", "sidebar_menu", Array(
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
		"COMPONENT_TEMPLATE" => "catalog_vertical",
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "3",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "A",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"MENU_THEME" => "site",	// Тема меню
		"ROOT_MENU_TYPE" => "sidebar_menu",	// Тип меню для первого уровня
		"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	),
	false
);
                ?>
                <!-- /widget shop categories -->
            </aside>
            <!-- /SIDEBAR -->
            <!-- CONTENT -->
            <div class="col-md-9 content" id="content">




        <?php
        $APPLICATION->IncludeComponent(
                "bitrix:catalog.section.list", "", array(
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
            "TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
            "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
            "VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
            "SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
            "HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
            "ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
                ), $component, array("HIDE_ICONS" => "Y")
        );
        ?>



   </div>
            <!-- /CONTENT -->

        </div>
    </div>
</section>
<!-- /PAGE WITH SIDEBAR -->