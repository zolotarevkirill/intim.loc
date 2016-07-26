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
<section class="content white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-sm-12">
                <div class="holder-bg">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-12">
                            <h1><?=$arResult['NAME']?></h1>
                            <p><?=$arResult['PREVIEW_TEXT']?></p>
                            <?=$arResult['DETAIL_TEXT']?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</section>