<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult)):?>
<ul class="nav navbar-nav">

    <?
    foreach($arResult as $arItem):
    if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
    continue;
    ?>
    <?if($arItem["SELECTED"]):?>
    <li class="active"><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
    <?else:?>
    <li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
    <?endif?>

    <?endforeach?>
    <li class="growNo">
        <a href="#" data-item="search"><i class="glyphicon glyphicon-search"></i></a>
        <div class="search-block">
            <?$APPLICATION->IncludeComponent(
            "bitrix:search.form",
            "search_header",
            Array(
            "COMPONENT_TEMPLATE" => ".default",
            "PAGE" => "#SITE_DIR#search/index.php",
            "USE_SUGGEST" => "Y"
            )
            );?>
        </div>
    </li>
</ul>
<?endif?>
