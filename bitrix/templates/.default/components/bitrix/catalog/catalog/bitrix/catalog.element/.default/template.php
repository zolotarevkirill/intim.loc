<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<!-- PAGE -->
<section class="page-section">
    <div class="container">

        <div class="row product-single">
            <div class="col-md-6">
                <div class="badges">
                    <div class="hot">hot</div>
                    <div class="new">new</div>
                </div>
                <div class="item">
                    <a class="btn btn-theme btn-theme-transparent btn-zoom" href="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>" data-gal="prettyPhoto">
                        <i class="fa fa-plus"></i>
                    </a>
                    <a href="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>" data-gal="prettyPhoto">
                        <img class="img-responsive" src="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>" alt=""/>
                    </a>
                </div>

            </div>
            <div class="col-md-6">
                <div class="back-to-category">
                    <span class="link"><i class="fa fa-angle-left"></i> Вернуться в категорию<a href="<?=$arResult["SECTION"]["SECTION_PAGE_URL"]?>"><?=$arResult["SECTION"]["NAME"]?></a></span>
                    <div class="pull-right">
                        <a class="btn btn-theme btn-theme-transparent btn-previous" href="#"><i class="fa fa-angle-left"></i></a><!--
                        --><a class="btn btn-theme btn-theme-transparent btn-next" href="#"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <h2 class="product-title"><?= $arResult['NAME']?></h2>
               
                <div class="product-availability">Наличие: <strong>на складе</strong> <?=$arResult['PROPERTIES']["qty"]['VALUE']?></div>
                <hr class="page-divider small"/>

                <div class="product-price"><?= $arResult['PROPERTIES']['price']['VALUE']?> руб.</div>
                <hr class="page-divider"/>

                <div class="product-text">
                    <?= $arResult['PREVIEW_TEXT']?>
                </div>
                <hr class="page-divider"/>

<!--                <form action="#" class="row variable">
                    <div class="col-sm-6">
                        <div class="form-group selectpicker-wrapper">
                            <label for="exampleSelect1">Size</label>
                            <select
                                id="exampleSelect1"
                                class="selectpicker input-price" data-live-search="true" data-width="100%"
                                data-toggle="tooltip" title="Select">
                                <option>Select Your Size</option>
                                <option>Size 1</option>
                                <option>Size 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group selectpicker-wrapper">
                            <label for="exampleSelect2">Color</label>
                            <select
                                id="exampleSelect2"
                                class="selectpicker input-price" data-live-search="true" data-width="100%"
                                data-toggle="tooltip" title="Select">
                                <option>Select Your Color</option>
                                <option>Color 1</option>
                                <option>Color 2</option>
                            </select>
                        </div>
                    </div>
                </form>-->
                <hr class="page-divider small"/>


                <div class="buttons">
                    <div class="quantity">
                        <button class="btn"><i class="fa fa-minus"></i></button>
                        <input class="form-control qty" type="number" step="1" min="1" name="quantity" value="1" title="Qty">
                        <button class="btn"><i class="fa fa-plus"></i></button>
                    </div>
                    <button class="btn btn-theme btn-cart btn-icon-left" type="submit"><i class="fa fa-shopping-cart"></i>Добавить в корзину</button>
                
                </div>

                <hr class="page-divider small"/>

                
                <hr class="page-divider small"/>

                <ul class="social-icons list-inline">
                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                </ul>

            </div>
        </div>

    </div>
</section>
<!-- /PAGE -->