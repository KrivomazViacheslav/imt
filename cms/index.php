<?php require_once 'html/functions.php' ?>
<?php $cart= getCart($products) ?>
<?php $wishes = getWishes($products) ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Мой магазин</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
</head>
<body>
    <div class="row">
        <div class="bg-info col-lg-12">
            <?php viewMenu($pages) ?>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-4">
            <a href="?r=cart">Корзина:</a> <?php echo $cart->total_amount;?>
            на сумму <?php echo $cart->total_price;?> грн.
        </div>
        <div class="col-lg-4">
            <a href="?r=wishes">Желания:</a> <?php echo $wishes->total_amount;?>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="col-lg-4 panel panel-default">
                <h2 class="panel-heading">Sidebar</h2>
                <div class="">
                    <?php
                        $categories_tree = makeTree($categories);
                        viewCategories($categories_tree);
                    ?>
                </div>
            </div>
            <div class="col-lg-8 panel panel-default">
                <h2 class="panel-heading">Content</h2>
                <div>
                    <?php require_once 'html/content.php'?>
                </div>
            </div>
            <div class="row col-lg-12">
                <div class="panel-footer">
                    <h2 class="panel-heading">Footer</h2>
                    <div>
                        <?php viewFooter(); ?>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>