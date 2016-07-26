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




<div class="main-slider">
    <div class="owl-carousel" id="main-slider">
        <?php foreach($arResult["ITEMS"] as $arItem): ?>
        <div class="item slide2 <?=$arItem['PROPERTIES']['style']['VALUE']?>">
            <img class="slide-img" src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>"/>
            <div class="caption">
                <div class="container">
                    <div class="div-table">
                        <div class="div-cell">
                            <div class="caption-content">
                                <?php if($arItem['PROPERTIES']['caption_title']['VALUE']):?>
                                <h2 class="caption-title"><?=$arItem['PROPERTIES']['caption_title']['VALUE']?></h2>
                                <?php endif; ?>
                                <?php if($arItem['PROPERTIES']['caption_subtitle']['VALUE']):?>
                                <h3 class="caption-subtitle"><span><?=$arItem['PROPERTIES']['caption_subtitle']['VALUE']?></span></h3>
                                <?php endif; ?>
                                <?php if($arItem['PROPERTIES']['price']['VALUE'] || $arItem['PROPERTIES']['price2']['VALUE']):?>
                                <div class="price">
                                    <?php if($arItem['PROPERTIES']['price2']['VALUE']):?>
                                    <ins><?=$arItem['PROPERTIES']['price2']['VALUE']?> руб.</ins>
                                     <?php endif; ?>
                                     <?php if($arItem['PROPERTIES']['price2']['VALUE']):?>
                                    <del><?=$arItem['PROPERTIES']['price2']['VALUE']?> руб.</del>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                                <?php if($arItem['PROPERTIES']['caption_text']['VALUE']):?>
                                <p class="caption-text">
                                    <a class="btn btn-theme" href="<?=$arItem['PROPERTIES']['link']['VALUE']?>"><?=$arItem['PROPERTIES']['caption_text']['VALUE']?></a>
                                </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>

        

    </div>
</div>
