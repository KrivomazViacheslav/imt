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

<div class="row">
    <div class="col-lg-6">
        <form method="post">

            <div class="col-lg-6">
                <lebel>Имя:</lebel>
            </div>
             <div class="col-lg-6">
                <input type="text" name="name">
            </div>

            <div class="col-lg-6">
                <lebel>Фамилия:</lebel>
            </div>
            <div class="col-lg-6">
                <input type="text" name="surname">
            </div>

            <div class="col-lg-6">
                <lebel>Email:</lebel>
            </div>
            <div class="col-lg-6">
                <input type="text" name="email">
            </div>

            <div class="col-lg-6">
                <lebel>Телефон:</lebel>
            </div>
            <div class="col-lg-6">
                <input type="text" name="phone">
            </div>

            <div class="col-lg-6">
                <lebel>Адрес доставки:</lebel>
            </div>
            <div class="col-lg-6">
                <input type="text" name="address">
            </div>

            <div class="col-lg-6">
                <lebel>Комментарий:</lebel>
            </div>
            <div class="col-lg-6">
                <input type="text" name="comment">
            </div>

            <div class="col-lg-12">
                <input type="submit" name="order" value="Оформить заказ">
            </div>

        </form>
    </div>
</div>