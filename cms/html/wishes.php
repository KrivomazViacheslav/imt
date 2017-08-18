<?php if(!empty($wishes->items)) :?>
    <div class="row text-center text-primary">
        <div class="col-lg-2">Фото</div>
        <div class="col-lg-4">Наименование</div>
        <div class="col-lg-2">Цена, грн</div>
    </div>
    <?php foreach ($wishes->items as $item) :?>
        <div class="row">
            <div class="col-lg-2">
                <img src="files/images/product.jpg" width="75px">
            </div>
            <div class="col-lg-4"><?php echo $item->name?></div>
            <div class="col-lg-2"><?php echo $item->variant->price ?></div>
        </div>
    <?php endforeach;?>
<?php else: ?>
    <h3>Список желаний пуст</h3>
<?php endif;?>