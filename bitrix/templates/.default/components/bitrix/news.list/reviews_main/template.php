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
<div class="reviews">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-sm-8">
            <h2>Обзоры</h2>
        </div>
        <div class="col-xs-12 col-md-4 col-sm-4 text-right">
            <a href="#" class="more" data-item="show-more">Смотреть все</a>
        </div>
    </div>
    <div class="row">
    <?php foreach($arResult["ITEMS"] as $arItem):?>
        <div class="col-xs-12 col-md-3 col-sm-3">
            <div class="item">
                <div class="outer">
                <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="holder"><img
                class="preview_picture"
                src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                style="float:left"
                /></a>
                    <?php if($arItem["PROPERTIES"]["LABEL"]["VALUE"]["TEXT"]): ?>
                        <div class="my-badge"><?=$arItem["NAME"]?></div>
                    <?php endif; ?>
                    <div class="inner">
                        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">подробнее</a>
                    </div>
                </div>
                <div>
                    <p class="description">
                        <?php echo substr($arItem['PREVIEW_TEXT'], 0, 40)?> 
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>
