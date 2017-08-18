<?php $product = getProduct($products,$id) ?>

<h1 class="page-header"><?php echo $product->name ?></h1>

<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-4">
            <div class="image text-center">
                <img src="files/images/product.jpg" width="200px">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="price">
                <?php if(count($product->variants) > 1) :?>
                    <select name="variant">
                        <?foreach ($product->variants as $variant) :?>
                            <option><?php echo $variant->name ?> <?php echo ceil($variant->price) ?> грн.</option>
                        <?php endforeach;?>
                    </select>
                <?php else:?>
                    <span class="label label-info">Цена товара: <?php echo ceil($product->variant->price) ?> грн.</span>
                <?php endif;?>
            </div>
            <div>
                <form method="post">
                    <input type="hidden" name="r" value="<?php echo $_GET['r'] ?>">
                    <input type="hidden" name="id" value="<?php echo $product->id ?>">
                    <input type="number" name="amount" value="1" min="1" max="50">
                    <button type="submit">Купить</button>
                </form>
            </div>
             <div>
                <form method="post">
                    <input type="hidden" name="r" value="<?php echo $_GET['r'] ?>">
                    <input type="hidden" name="id" value="<?php echo $product->id ?>">
                    <input type="hidden" name="wishes" value="1">
                    <button type="submit">В список желаний</button>
                </form>
            </div>
            <? if(strlen($product->variant->sku) > 0): ?>
                <div>
                     <? echo $product->variant->sku ?>
                </div>
            <? endif; ?>
            <?php if($product->description):?>
                <h2>Описание товара</h2>
                <div class="bg-info">
                    <?php echo $product->description ?>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>