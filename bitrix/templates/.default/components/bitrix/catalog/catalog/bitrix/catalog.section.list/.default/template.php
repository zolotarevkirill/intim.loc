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

<!-- Products grid -->
<div class="row products grid">
    <?php foreach($arResult["SECTIONS"] as $arSection):?>
    <div class="col-md-4 col-sm-6">
        <div class="thumbnail no-border no-padding">
            <div class="media">
                <a class="media-link" href="<?=$arSection["SECTION_PAGE_URL"]?>">
                   <img src="<?=$arSection["PICTURE"]["SRC"]?>" alt="<?=$arSection["NAME"]?>"/>
                    <span class="icon-view">
                        <strong><i class="fa fa-eye"></i></strong>
                    </span>
                </a>
            </div>
            <div class="caption text-center">
                <h4 class="caption-title"><a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a></h4>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<!-- /Products grid -->



