<?php

// addCart()
if (isset($_GET) && $_GET['amount']) {

	$product_id = strip_tags(trim($_GET['product_id']));
	$amount = strip_tags(trim($_GET['amount']));
	$cart = array();
	
	if($_COOKIE['cart']) {
		$cart = unserialize($_COOKIE['cart']);
		$cart[$product_id] = $amount;
		setcookie('cart',serialize($cart),time()+3600,'/');
	} else {
		$cart[$product_id] = $amount;
		setcookie('cart',serialize($cart),time()+3600,'/');
	}

	print_r(unserialize($_COOKIE['cart']));
}

// getCart()
$cart_products = unserialize($_COOKIE['cart']);

foreach ($cart_products as $id => $amount) {
	$product_cart[$id] = getProduct($products,$id);
	$product_cart[$id]->amount = $amount;
}

?>

<?php
/*if (isset($_COOKIE['time'])) {
	echo 'Время посещения: '.$_COOKIE['time'];
} else {
	setcookie('time', date('m-d-Y:H:i:s'), time()+3600, '/');
}
*/
?>

<form method="get">
	
	<lebel>Amount</lebel>
	<input type="number" name="amount" value="1">

	<lebel>ID product</lebel>
	<input type="text" name="product_id" value="1">  

	<input type="submit" name="buy" value="Buy"> 

</form>