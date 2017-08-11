 <?php
 if (isset($_COOKIE['cart'])) {
    $cart = unserialize($_COOKIE['cart']);
    $cnt  = count($cart);
    echo '<h1 class="page-header">В корзине '.$cnt.' товаров</h1>';

    echo '<ul>';
    foreach ($cart as $id => $amount) {
		$product = getProduct($products,$id);
		$price   = round($product->variant->price);
		$sum	 = $amount * $price;
		echo "<li><a href='?r=product&id=$id'>$product->name</a>, цена $price, количество $amount, сумма $sum</li>";
	}
    echo '</ul>';
}