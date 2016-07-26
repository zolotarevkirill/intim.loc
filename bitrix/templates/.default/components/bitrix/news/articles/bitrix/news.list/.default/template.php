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
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-sm-12">
                <div class="reviews">
                    <div class="row">
                        <div class="col-xs-12 col-md-8 col-sm-8">
                            <h2>Новости</h2>
                        </div>
                        <div class="col-xs-12 col-md-4 col-sm-4 text-right">
                            <a href="#" class="more" data-item="show-more">Смотреть все</a>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($arResult['ITEMS'] as $Item):?>
                        <div class="col-xs-12 col-md-3 col-sm-3">
                            <div class="item">
                                <div class="outer">
                                    <a href="<?=$Item["DETAIL_PAGE_URL"]?>" class="holder"><img src="<?=$Item["PREVIEW_PICTURE"]["SRC"]?>" class="full-width" alt=""></a>
                                    <div class="my-badge"><?=$Item['NAME']?></div>
                                    <div class="inner">
                                        <a href="<?=$Item["DETAIL_PAGE_URL"]?>">ПОДРОБНЕЕ</a>
                                    </div>
                                </div>
                                <div>
                                    <p class="description">
                                        <?=$Item['PREVIEW_TEXT']?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
