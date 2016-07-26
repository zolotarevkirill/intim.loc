<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "секс шоп, secretplace, mysecretplace, интим бутик");
$APPLICATION->SetPageProperty("description", "Секс шоп - интернет бутик интимных товаров с доставкой на дом по МОскве");
$APPLICATION->SetTitle("Секс шоп - интернет бутик интимных товаров");
?>


<!-- PAGE -->
<section class="page-section no-padding-bottom">
    <div class="container">

        <div class="row main-slider-row">

            <div class="col-md-9 slider">
                <?php
                $APPLICATION->IncludeComponent(
                        "bitrix:news.list", "slider_main", Array(
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
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
                    "COMPONENT_TEMPLATE" => "slider_main",
                    "DETAIL_URL" => "",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "DISPLAY_DATE" => "N",
                    "DISPLAY_NAME" => "N",
                    "DISPLAY_PICTURE" => "N",
                    "DISPLAY_PREVIEW_TEXT" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array("NAME", "PREVIEW_PICTURE", ""),
                    "FILTER_NAME" => "",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "6",
                    "IBLOCK_TYPE" => "reklama",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
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
                    "PARENT_SECTION_CODE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "PROPERTY_CODE" => array("", "caption_title", "price2", "caption_subtitle", "link", "style", "caption_text", "price", ""),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "SORT",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER1" => "DESC",
                    "SORT_ORDER2" => "DESC"
                        )
                );
                ?>

            </div>

            <div class="col-md-3 sidebar">
                
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
            </div>

        </div>

    </div>
</section>
<!-- /PAGE -->

<!-- PAGE -->
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="thumbnail no-border no-padding thumbnail-banner size-1x3">
                    <div class="media">
                        <a class="media-link" href="#">
                            <div class="img-bg" style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/banner-1.jpg')"></div>
                            <div class="caption">
                                <div class="caption-wrapper div-table">
                                    <div class="caption-inner div-cell">
                                        <h2 class="caption-title"><span>Lorem Ipsum</span></h2>
                                        <h3 class="caption-sub-title"><span>Dolor Sir Amet Percpectum</span></h3>
                                        <span class="btn btn-theme btn-theme-sm">Shop Now</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="thumbnail no-border no-padding thumbnail-banner size-1x3">
                    <div class="media">
                        <a class="media-link" href="#">
                            <div class="img-bg" style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/banner-2.jpg')"></div>
                            <div class="caption text-right">
                                <div class="caption-wrapper div-table">
                                    <div class="caption-inner div-cell">
                                        <h2 class="caption-title"><span>Lorem Ipsum</span></h2>
                                        <h3 class="caption-sub-title"><span>Dolor Sir Amet Percpectum</span></h3>
                                        <span class="btn btn-theme btn-theme-sm">Shop Now</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /PAGE -->

<!-- PAGE -->
<section class="page-section">
    <div class="container">

        <div class="tabs">
            <ul id="tabs" class="nav nav-justified-off"><!--
                --><li class=""><a href="#tab-1" data-toggle="tab">Featured</a></li><!--
                --><li class="active"><a href="#tab-2" data-toggle="tab">Newest</a></li><!--
                --><li class=""><a href="#tab-3" data-toggle="tab">Top Sellers</a></li>
            </ul>
        </div>

        <div class="tab-content">

            <!-- tab 1 -->
            <div class="tab-pane fade" id="tab-1">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-3.jpg" alt=""/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
                            <div class="caption text-center">
                                <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                                <div class="rating">
                                    <span class="star"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span>
                                </div>
                                <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                <div class="buttons">
                                    <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-4.jpg" alt=""/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
                            <div class="caption text-center">
                                <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                                <div class="rating">
                                    <span class="star"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span>
                                </div>
                                <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                <div class="buttons">
                                    <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1.jpg" alt=""/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
                            <div class="caption text-center">
                                <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                                <div class="rating">
                                    <span class="star"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span>
                                </div>
                                <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                <div class="buttons">
                                    <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-2.jpg" alt=""/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
                            <div class="caption text-center">
                                <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                                <div class="rating">
                                    <span class="star"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span>
                                </div>
                                <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                <div class="buttons">
                                    <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- tab 2 -->
            <div class="tab-pane fade active in" id="tab-2">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1.jpg" alt=""/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
                            <div class="caption text-center">
                                <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                                <div class="rating">
                                    <span class="star"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span>
                                </div>
                                <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                <div class="buttons">
                                    <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-2.jpg" alt=""/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
                            <div class="caption text-center">
                                <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                                <div class="rating">
                                    <span class="star"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span>
                                </div>
                                <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                <div class="buttons">
                                    <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-3.jpg" alt=""/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
                            <div class="caption text-center">
                                <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                                <div class="rating">
                                    <span class="star"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span>
                                </div>
                                <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                <div class="buttons">
                                    <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-4.jpg" alt=""/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
                            <div class="caption text-center">
                                <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                                <div class="rating">
                                    <span class="star"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span>
                                </div>
                                <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                <div class="buttons">
                                    <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- tab 3 -->
            <div class="tab-pane fade" id="tab-3">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-2.jpg" alt=""/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
                            <div class="caption text-center">
                                <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                                <div class="rating">
                                    <span class="star"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span>
                                </div>
                                <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                <div class="buttons">
                                    <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-3.jpg" alt=""/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
                            <div class="caption text-center">
                                <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                                <div class="rating">
                                    <span class="star"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span>
                                </div>
                                <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                <div class="buttons">
                                    <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-4.jpg" alt=""/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
                            <div class="caption text-center">
                                <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                                <div class="rating">
                                    <span class="star"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span>
                                </div>
                                <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                <div class="buttons">
                                    <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1.jpg" alt=""/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
                            <div class="caption text-center">
                                <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                                <div class="rating">
                                    <span class="star"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span><!--
                                    --><span class="star active"></span>
                                </div>
                                <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                <div class="buttons">
                                    <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                    --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- /PAGE -->

<!-- PAGE -->
<section class="page-section">
    <div class="container">
        <div class="message-box">
            <div class="message-box-inner">
                <h2>Free shipping on all orders over $45</h2>
            </div>
        </div>
    </div>
</section>
<!-- /PAGE -->

<!-- PAGE -->
<section class="page-section">
    <div class="container">
        <h2 class="section-title"><span>Top Rated Products</span></h2>
        <div class="top-products-carousel">
            <div class="owl-carousel" id="top-products-carousel">
                <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/top-rated-1.jpg" alt=""/>
                            <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                        <div class="rating">
                            <span class="star"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span>
                        </div>
                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                            --><a class="btn btn-theme btn-theme-transparent" href="#">Add to Cart</a><!--
                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                        </div>
                    </div>
                </div>
                <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/top-rated-2.jpg" alt=""/>
                            <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                        <div class="rating">
                            <span class="star"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span>
                        </div>
                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                            --><a class="btn btn-theme btn-theme-transparent" href="#">Add to Cart</a><!--
                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                        </div>
                    </div>
                </div>
                <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/top-rated-3.jpg" alt=""/>
                            <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                        <div class="rating">
                            <span class="star"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span>
                        </div>
                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                            --><a class="btn btn-theme btn-theme-transparent" href="#">Add to Cart</a><!--
                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                        </div>
                    </div>
                </div>
                <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/top-rated-4.jpg" alt=""/>
                            <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                        <div class="rating">
                            <span class="star"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span>
                        </div>
                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                            --><a class="btn btn-theme btn-theme-transparent" href="#">Add to Cart</a><!--
                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                        </div>
                    </div>
                </div>
                <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/top-rated-5.jpg" alt=""/>
                            <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                        <div class="rating">
                            <span class="star"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span>
                        </div>
                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                            --><a class="btn btn-theme btn-theme-transparent" href="#">Add to Cart</a><!--
                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                        </div>
                    </div>
                </div>
                <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/top-rated-6.jpg" alt=""/>
                            <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                        <div class="rating">
                            <span class="star"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span>
                        </div>
                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                            --><a class="btn btn-theme btn-theme-transparent" href="#">Add to Cart</a><!--
                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                        </div>
                    </div>
                </div>
                <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/top-rated-1.jpg" alt=""/>
                            <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                        <div class="rating">
                            <span class="star"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span>
                        </div>
                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                            --><a class="btn btn-theme btn-theme-transparent" href="#">Add to Cart</a><!--
                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                        </div>
                    </div>
                </div>
                <div class="thumbnail no-border no-padding">
                    <div class="media">
                        <a class="media-link" data-gal="prettyPhoto" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/product-1-big.jpg">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/top-rated-2.jpg" alt=""/>
                            <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h4 class="caption-title"><a href="product-details.html">Standard Product Header</a></h4>
                        <div class="rating">
                            <span class="star"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span><!--
                            --><span class="star active"></span>
                        </div>
                        <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        <div class="buttons">
                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                            --><a class="btn btn-theme btn-theme-transparent" href="#">Add to Cart</a><!--
                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /PAGE -->

<!-- PAGE -->
<section class="page-section">
    <div class="container">
        <a class="btn btn-theme btn-title-more btn-icon-left" href="#"><i class="fa fa-file-text-o"></i>See All Posts</a>
        <h2 class="block-title"><span>Our Recent posts</span></h2>
        <div class="row">
            <div class="col-md-6">
                <div class="recent-post">
                    <div class="media">
                        <a class="pull-left media-link" href="#">
                            <img class="media-object" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/blog/recent-post-1.jpg" alt="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="media-body">
                            <p class="media-category"><a href="#">Shoes</a> / <a href="#">Dress</a></p>
                            <h4 class="media-heading"><a href="#">Standard Post Comment Header Here</a></h4>
                            Fusce gravida interdum eros a mollis. Sed non lorem varius, volutpat nisl in, laoreet ante.
                            <div class="media-meta">
                                6th June 2014
                                <span class="divider">/</span><a href="#"><i class="fa fa-comment"></i>27</a>
                                <span class="divider">/</span><a href="#"><i class="fa fa-heart"></i>18</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="recent-post">
                    <div class="media">
                        <a class="pull-left media-link" href="#">
                            <img class="media-object" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/blog/recent-post-2.jpg" alt="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="media-body">
                            <p class="media-category"><a href="#">Wedding</a> / <a href="#">Meeting</a></p>
                            <h4 class="media-heading"><a href="#">Standard Post Comment Header Here</a></h4>
                            Fusce gravida interdum eros a mollis. Sed non lorem varius, volutpat nisl in, laoreet ante.
                            <div class="media-meta">
                                6th June 2014
                                <span class="divider">/</span><a href="#"><i class="fa fa-comment"></i>27</a>
                                <span class="divider">/</span><a href="#"><i class="fa fa-heart"></i>18</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="recent-post">
                    <div class="media">
                        <a class="pull-left media-link" href="#">
                            <img class="media-object" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/blog/recent-post-3.jpg" alt="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="media-body">
                            <p class="media-category"><a href="#">Children</a> / <a href="#">Kids</a></p>
                            <h4 class="media-heading"><a href="#">Standard Post Comment Header Here</a></h4>
                            Fusce gravida interdum eros a mollis. Sed non lorem varius, volutpat nisl in, laoreet ante.
                            <div class="media-meta">
                                6th June 2014
                                <span class="divider">/</span><a href="#"><i class="fa fa-comment"></i>27</a>
                                <span class="divider">/</span><a href="#"><i class="fa fa-heart"></i>18</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="recent-post">
                    <div class="media">
                        <a class="pull-left media-link" href="#">
                            <img class="media-object" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/blog/recent-post-4.jpg" alt="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="media-body">
                            <p class="media-category"><a href="#">Man</a> / <a href="#">Accessories</a></p>
                            <h4 class="media-heading"><a href="#">Standard Post Comment Header Here</a></h4>
                            Fusce gravida interdum eros a mollis. Sed non lorem varius, volutpat nisl in, laoreet ante.
                            <div class="media-meta">
                                6th June 2014
                                <span class="divider">/</span><a href="#"><i class="fa fa-comment"></i>27</a>
                                <span class="divider">/</span><a href="#"><i class="fa fa-heart"></i>18</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /PAGE -->

<!-- PAGE -->
<section class="page-section">
    <div class="container">
        <h2 class="section-title"><span>Brand &amp; Clients</span></h2>
        <div class="partners-carousel">
            <div class="owl-carousel" id="partners">
                <div><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                <div><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                <div><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                <div><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                <div><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                <div><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                <div><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                <div><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                <div><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                <div><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                <div><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                <div><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
            </div>
        </div>
    </div>
</section>
<!-- /PAGE -->

<!-- PAGE -->
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="product-list">
                    <a class="btn btn-theme btn-title-more" href="#">See All</a>
                    <h4 class="block-title"><span>Top Sellers</span></h4>
                    <div class="media">
                        <a class="pull-left media-link" href="#">
                            <img class="media-object" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/top-sellers-1.jpg" alt="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">Standard Product Header</a></h4>
                            <div class="rating">
                                <span class="star"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span>
                            </div>
                            <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        </div>
                    </div>
                    <div class="media">
                        <a class="pull-left media-link" href="#">
                            <img class="media-object" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/top-sellers-2.jpg" alt="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">Standard Product Header</a></h4>
                            <div class="rating">
                                <span class="star"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span>
                            </div>
                            <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        </div>
                    </div>
                    <div class="media">
                        <a class="pull-left media-link" href="#">
                            <img class="media-object" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/top-sellers-3.jpg" alt="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">Standard Product Header</a></h4>
                            <div class="rating">
                                <span class="star"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span>
                            </div>
                            <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-list">
                    <a class="btn btn-theme btn-title-more" href="#">See All</a>
                    <h4 class="block-title"><span>Top Accessories</span></h4>
                    <div class="media">
                        <a class="pull-left media-link" href="#">
                            <img class="media-object" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/top-sellers-4.jpg" alt="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">Standard Product Header</a></h4>
                            <div class="rating">
                                <span class="star"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span>
                            </div>
                            <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        </div>
                    </div>
                    <div class="media">
                        <a class="pull-left media-link" href="#">
                            <img class="media-object" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/top-sellers-5.jpg" alt="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">Standard Product Header</a></h4>
                            <div class="rating">
                                <span class="star"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span>
                            </div>
                            <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        </div>
                    </div>
                    <div class="media">
                        <a class="pull-left media-link" href="#">
                            <img class="media-object" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/top-sellers-6.jpg" alt="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">Standard Product Header</a></h4>
                            <div class="rating">
                                <span class="star"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span>
                            </div>
                            <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-list">
                    <a class="btn btn-theme btn-title-more" href="#">See All</a>
                    <h4 class="block-title"><span>Top Newest</span></h4>
                    <div class="media">
                        <a class="pull-left media-link" href="#">
                            <img class="media-object" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/top-sellers-7.jpg" alt="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">Standard Product Header</a></h4>
                            <div class="rating">
                                <span class="star"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span>
                            </div>
                            <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        </div>
                    </div>
                    <div class="media">
                        <a class="pull-left media-link" href="#">
                            <img class="media-object" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/top-sellers-8.jpg" alt="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">Standard Product Header</a></h4>
                            <div class="rating">
                                <span class="star"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span>
                            </div>
                            <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        </div>
                    </div>
                    <div class="media">
                        <a class="pull-left media-link" href="#">
                            <img class="media-object" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/preview/shop/top-sellers-9.jpg" alt="">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">Standard Product Header</a></h4>
                            <div class="rating">
                                <span class="star"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span>
                            </div>
                            <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /PAGE -->

<!-- PAGE -->
<section class="page-section no-padding-top">
    <div class="container">
        <div class="row blocks shop-info-banners">
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-gift"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Buy 1 Get 1</h4>
                            Proin dictum elementum velit. Fusce euismod consequat ante.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-comments"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Call to Free</h4>
                            Proin dictum elementum velit. Fusce euismod consequat ante.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-right"><i class="fa fa-trophy"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading">Money Back!</h4>
                            Proin dictum elementum velit. Fusce euismod consequat ante.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /PAGE -->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>