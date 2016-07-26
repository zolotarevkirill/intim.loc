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

111
<!-- Products grid -->
<div class="row products grid">
    <?php foreach ($arResult['ITEMS'] as $arItem): ?>
    <?php
    $renderImage = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], Array("width" => 270, "height" => 370),BX_RESIZE_IMAGE_EXACT);
    ?>
        <div class="col-md-4 col-sm-6">
            <div class="thumbnail no-border no-padding">
                <div class="media">
                    <a class="media-link" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                        <img src="<?= $renderImage['src'] ?>" alt="<?= $arItem['NAME']?>"/>
                        <span class="icon-view">
                            <strong><i class="fa fa-eye"></i></strong>
                        </span>
                    </a>
                </div>
                <div class="caption text-center">
                    <h4 class="caption-title"><a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= substr($arItem['NAME'], 0,23) ?>...</a></h4>

                    <div class="price">
                        <ins><?= $arItem["PROPERTIES"]["price"]["VALUE"] ?> руб.</ins> 
                        <!--<del><?= $arItem["PROPERTIES"]["discount"]["VALUE"] ?></del>-->
                    </div>
                    <div class="buttons">

                        <a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!-- /Products grid -->
<!-- Pagination -->
<div class="pagination-wrapper">
    <?= $arResult["NAV_STRING"] ?>
</div>
<!-- /Pagination -->



