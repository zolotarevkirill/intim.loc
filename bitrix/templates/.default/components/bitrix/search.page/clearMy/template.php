<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
?>

<div class="row">
    <div class="col-xs-12 col-md-12 col-sm-12">
        <form action="" method="get" class="FormSearch">
            <div class="input-group full-width">
                <input class="form-control" placeholder="Поиск по каталогу..." name="q" value="" type="text">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Найти</button>
                </span>
            </div>
        </form>
    </div>
</div>


<?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):?>
<div class="search-language-guess">
    <?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
</div><br /><?
endif;?>

<div class="search-result">
    <?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
    <?elseif($arResult["ERROR_CODE"]!=0):?>
    <p><?= GetMessage("CT_BSP_ERROR") ?></p>
    <?ShowError($arResult["ERROR_TEXT"]);?>
    <p><?= GetMessage("CT_BSP_CORRECT_AND_CONTINUE") ?></p>
    <br /><br />
    <p><?= GetMessage("CT_BSP_SINTAX") ?><br /><b><?= GetMessage("CT_BSP_LOGIC") ?></b></p>
    <table border="0" cellpadding="5">
        <tr>
            <td align="center" valign="top"><?= GetMessage("CT_BSP_OPERATOR") ?></td><td valign="top"><?= GetMessage("CT_BSP_SYNONIM") ?></td>
            <td><?= GetMessage("CT_BSP_DESCRIPTION") ?></td>
        </tr>
        <tr>
            <td align="center" valign="top"><?= GetMessage("CT_BSP_AND") ?></td><td valign="top">and, &amp;, +</td>
            <td><?= GetMessage("CT_BSP_AND_ALT") ?></td>
        </tr>
        <tr>
            <td align="center" valign="top"><?= GetMessage("CT_BSP_OR") ?></td><td valign="top">or, |</td>
            <td><?= GetMessage("CT_BSP_OR_ALT") ?></td>
        </tr>
        <tr>
            <td align="center" valign="top"><?= GetMessage("CT_BSP_NOT") ?></td><td valign="top">not, ~</td>
            <td><?= GetMessage("CT_BSP_NOT_ALT") ?></td>
        </tr>
        <tr>
            <td align="center" valign="top">( )</td>
            <td valign="top">&nbsp;</td>
            <td><?= GetMessage("CT_BSP_BRACKETS_ALT") ?></td>
        </tr>
    </table>
    <?elseif(count($arResult["SEARCH"])>0):?>
    <?if($arParams["DISPLAY_TOP_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
    <?if($arParams["SHOW_ORDER_BY"] != "N"):?>
    <div class="search-sorting"><label><?echo GetMessage("CT_BSP_ORDER")?>:</label>&nbsp;
        <?if($arResult["REQUEST"]["HOW"]=="d"):?>
        <a href="<?= $arResult["URL"] ?>&amp;how=r"><?= GetMessage("CT_BSP_ORDER_BY_RANK") ?></a>&nbsp;<b><?= GetMessage("CT_BSP_ORDER_BY_DATE") ?></b>
        <?else:?>
        <b><?= GetMessage("CT_BSP_ORDER_BY_RANK") ?></b>&nbsp;<a href="<?= $arResult["URL"] ?>&amp;how=d"><?= GetMessage("CT_BSP_ORDER_BY_DATE") ?></a>
        <?endif;?>
    </div>
    <?endif;?>








    <div class="col-xs-12 col-md-12 col-sm-12">
        <div class="reviews">
            <?php $cnt = 0; ?>
            <?php foreach ($arResult["SEARCH"] as $arItem): ?>
                <?php if ($cnt == 0): ?>
                    <div class="row">
                    <?php endif; ?>
                    <?php $cnt++; ?>           
                    <?php
                    $res = CIBlockElement::GetByID($arItem["ITEM_ID"]);
                    if ($ar_res = $res->GetNext()) {
                        $img = CFile::GetPath($ar_res['DETAIL_PICTURE']);

                        if ($img) {
                            $path_img = thumb($_SERVER['DOCUMENT_ROOT'] . $img);
                            $path_img = str_replace('/var/www/webgold/data/www/mysecretplace.ru', '', $path_img);
                        } else {
                            $path_img = 'http://placehold.it/250x250';
                        }
                    }
                    ?>
                    <div class="col-xs-12 col-md-2 col-sm-2">
                        <div class="item">
                            <div class="outer">
                                <a href="<?= $arItem["URL"] ?>" class="holder">
                                    <img src="<?= $path_img ?>" class="full-width" alt="">
                                </a>
                            </div>
                            <div>
                                <p class="date text-center" style="color:black;">
    <?= $arItem["TITLE"] ?>
                                </p>
                                <a href="<?= $arItem["URL"] ?>">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>

    <?php if ($cnt == 6): ?>
                    </div>
                        <?php $cnt = 0; ?>
                <?php endif; ?>      
            <?php endforeach; ?>

        </div>
    </div>


    <?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?>

    <?else:?>
    <?ShowNote(GetMessage("CT_BSP_NOTHING_TO_FOUND"));?>
    <?endif;?>

</div>
</div>