<?php if(!empty($cart->items)) :?>
    <div class="row text-center text-primary">
        <div class="col-lg-2">Фото</div>
        <div class="col-lg-4">Наименование</div>
        <div class="col-lg-2">Цена, грн</div>
        <div class="col-lg-2">Кол-во</div>
        <div class="col-lg-2">Сумма</div>
    </div>
    <?php foreach ($cart->items as $item) :?>
        <div class="row">
            <div class="col-lg-2">
                <img src="files/images/product.jpg" width="75px">
            </div>
            <div class="col-lg-4"><?php echo $item->name?></div>
            <div class="col-lg-2"><?php echo $item->variant->price ?></div>
            <div class="col-lg-2">
                <input class="form-control" type="number" value="<?php echo $item->amount?>">
            </div>
            <div class="col-lg-2">
                <?php echo $item->variant->price*$item->amount ?>
            </div>
        </div>
    <?php endforeach;?>
        <div class="row text-right bg-info">
            <div>Итого: <?php echo $cart->total_price ?> грн.</div>
        </div>

<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif;?>