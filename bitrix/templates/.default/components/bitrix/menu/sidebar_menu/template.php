<?php 
$page = $APPLICATION->GetCurPage(); 
if($page == '/'){
    $count = 29;
}else{
    $count = count($arResult);
}
?>
<!-- widget shop categories -->
<div class="widget shop-categories">
    <h4 class="widget-title">Категории</h4>
    <div class="widget-content">
        <ul>
            <?php for ($i = 0; $i < $count; $i++): ?>
                <?php if ($arResult[$i]['DEPTH_LEVEL'] == 1): ?>
                    <?php if ($arResult[$i]['IS_PARENT']): ?>
                            <li>
                                <?php if ($page != '/'): ?>
                                <span class="arrow"><i class="fa fa-angle-down"></i></span>
                                <?php endif; ?> 
                                <a href="<?= $arResult[$i]['LINK'] ?>" class="title">
                                    <?= $arResult[$i]['TEXT'] ?>
                                </a>      
                            <?php else: ?>
                            <li>
                                <a href="<?= $arResult[$i]['LINK'] ?>" class="title">
                                    <?= $arResult[$i]['TEXT'] ?>
                                </a>
                            </li>
                        <?php endif; ?>
                            
                           
                        <?php if ($arResult[$i]['IS_PARENT']): ?>
                             <?php if ($page != '/'): ?>
                            <ul class="children">
                                    <?php for ($j = ($i + 1); $j < count($arResult); $j++): ?>
                                        <?php if ($arResult[$j]['DEPTH_LEVEL'] == 1): ?>
                                            <?php break; ?>
                                        <?php else: ?>
                                            <li><a href="<?= $arResult[$j]['LINK'] ?>"><?= $arResult[$j]['TEXT'] ?></a></li>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                         
                        <?php endif; ?> 
                        
                    <?php endif; ?>
                        
                <?php endfor; ?>
            </ul>
    </div>
</div>
<!-- /widget shop categories -->