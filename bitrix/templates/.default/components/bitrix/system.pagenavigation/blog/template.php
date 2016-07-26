<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");


// Текущая страница = ["NavPageNomer"]
// Общее число страниц = ["NavPageCount"]
// Колличество записей NavRecordCount
//echo "<pre>";
//var_dump($arResult);
?>

<!-- Pagination -->


    <ul class="pagination">
<!--        <li class="disabled"><a href="#"><i class="fa fa-angle-double-left"></i> Previous</a></li>-->
        
           <?php for ($i = 1; $i <= $arResult["NavPageNomer"]; $i++): ?>
                    <?php if ($i != $arResult["NavPageNomer"] && $i >= ($arResult["NavPageNomer"] - 3)): ?>
                        <li><a  href="?PAGEN_1=<?= $i ?>"><?= $i ?></a></li>
                    <?php endif; ?>    
                <?php endfor; ?>

                <?php for ($i = $arResult["NavPageNomer"]; $i <= ($arResult["NavPageNomer"] + 2); $i++): ?>
                    <?php if ($i <= $arResult["NavPageCount"]): ?>
                        <li <?php if ($i == $arResult["NavPageNomer"]): ?> class="active" <?php endif; ?>><a  href="?PAGEN_1=<?= $i ?>"><?= $i ?></a></li>
                    <?php endif; ?>
                <?php endfor; ?>
<!--                        <li><a href="#">Next <i class="fa fa-angle-double-right"></i></a></li>-->
    </ul>

