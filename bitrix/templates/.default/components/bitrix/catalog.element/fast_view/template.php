<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
$this->setFrameMode(true);
?>

<div class="col-xs-12 col-md-7 col-sm-7">
    <div class="zoom-main">
        <img  src="<?php echo $arResult["DETAIL_PICTURE"]["SRC"]; ?>" class="full-width" alt="<?php echo $arResult["DETAIL_PICTURE"]["SRC"]["ALT"]; ?>">
    </div>
    <!--<div class="zoom-thumbs">
            <div><img src="assets/img/zoom/item-1.jpg" class="full-width" alt=""></div>
            <div class="active"><img src="assets/img/zoom/item-1.jpg" class="full-width" alt=""></div>
            <div><img src="assets/img/zoom/item-1.jpg" class="full-width" alt=""></div>
            <div><img src="assets/img/zoom/item-1.jpg" class="full-width" alt=""></div>
    </div>-->
    <div class="description-about">
        <?php if ($arResult["PROPERTIES"]["brief"]["~VALUE"]): ?>
            <p><?= $arResult["PROPERTIES"]["brief"]["~VALUE"] ?></p>
        <?php endif; ?>    
    </div>
</div>
<div class="col-xs-12 col-md-5 col-sm-5">
    <div class="info">
        <h2><?php echo $arResult["NAME"]; ?></h2>
        <p class="article">Арт: <?php echo $arResult["PROPERTIES"]["art"]["~VALUE"]; ?></p>
        <!--<div><p class="old-price">19.99 &#8381;</p><p class="price">21.99 &#8381;</p><a href="card-item.html">Подробнее</a></div>-->
        <p class="price"><?php echo $arResult["PRICE"]; ?> &#8381;</p>
    </div>
    <div class="modal-add-card">
        <form data-toggle="validator" action="/include/cart.php" method="post" role="form" id="FormCart">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <?php echo $arResult["DETAIL_TEXT"]; ?>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label>Колличество</label>
                    </div>
                    <div class="col-xs-3">
                        <select name="quanty" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="col-xs-12">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <?php if ($USER->IsAuthorized()): ?>
                            <input type="hidden" name="sess" value="<?= $USER->GetID() ?>"/>
                            <input type="hidden" name="auth" value="1"/>
                        <?php else: ?>
                            <input type="hidden" name="sess" value="<?=session_id()?>"/>
                            <input type="hidden" name="auth" value="0"/>
                        <?php endif; ?>    
                        <input type="hidden" name="item" value="<?= $arResult["ID"] ?>"/>
                        <button type="submit" onclick="javascript: animateBtn();" class="btn ( btn-warning + flip ) full-width" value="add_card__btn" name="from">
                            <span>Добавить в козину</span>
                            <span>Добавлено!</span>
			</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
