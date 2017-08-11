<?php
if(isset($_GET['id'])) {
    $id = trim($_GET['id']);
}
if(isset($_GET['r'])) {
    switch ($_GET['r']) {
        case 'product':
            require_once 'product.php';
            break;
        case 'pages':
            require_once 'pages.php';
            break;
        case 'thanks':
            require_once 'thanks.php';
            break;
        case 'cart':
            require_once 'cart.php';
            break;
        default:
            require_once 'products.php';
            break;
    }  
} else {
    require_once 'products.php';
}