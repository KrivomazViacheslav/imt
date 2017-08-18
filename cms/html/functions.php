<?php
header('Content-Type: text/html; charset=utf-8');

if(isset($_SERVER) && $_SERVER['HTTP_HOST'] && $_SERVER['REQUEST_URI']) {
    setcookie('lastURI', $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], time()+60*60*24*30, '/');
}
setcookie('time', date('m-d-Y:H:i:s'), time()+60*60*24*30, '/');

if(isset($_POST['amount']) && isset($_POST['id'])) {
    $cart = array();
    $product_id = trim(strip_tags($_POST['id']));
    $amount = trim(strip_tags($_POST['amount']));
    if(isset($_COOKIE['cart'])) {
        $cart = unserialize($_COOKIE['cart']);
    }
    $cart[$product_id] = $amount;
    setcookie('cart',serialize($cart),time()+(60*60*24*30),'/');

    //header('Location: http://imt/cms/index.php?r=thanks');
    $path = '?r='.$_POST['r'].'&id='.$_POST['id'];
    header("Location: $path");
}

if(isset($_POST['wishes']) && isset($_POST['id'])) {
    $wishes = array();
    $product_id = trim(strip_tags($_POST['id']));
    $amount = 1;
    if(isset($_COOKIE['wishes'])) {
        $wishes = unserialize($_COOKIE['wishes']);
    }
    $wishes[$product_id] = $amount;
    setcookie('wishes',serialize($wishes),time()+(60*60*24*30),'/');

    $path = '?r='.$_POST['r'].'&id='.$_POST['id'];
    header("Location: $path");
}

ini_set('display_errors',true);
error_reporting(E_ALL);

require_once 'data/menu.php';
require_once 'data/categories.php';
require_once 'data/products.php';

if(isset($_POST['order']) && $_POST['order']) {

    $name    = $_POST['name'];
    $surname = $_POST['surname'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $address = $_POST['address'];
    $comment = $_POST['comment'];

    $file = fopen('orders.txt', 'a+');
    fwrite($file, "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\n".
        'Имя: '.$name."\r\n".
        'Фамилия: '.$surname."\r\n".
        'Email: '.$email."\r\n".
        'Телефон: '.$phone."\r\n".
        'Адрес доставки: '.$address."\r\n".
        'Комментарий: '.$comment."\r\n".
        'Список товаров:'."\r\n");
    $cart= getCart($products);
    $cnt = 0;
    foreach ($cart->items as $item) {
        $cnt += 1;
        fwrite($file, $cnt.'. '.$item->name.' - '.$item->amount.' шт - '.$item->variant->price." грн\r\n");     
    }
    fclose($file);

    setcookie('cart','',time()-(60*60),'/');
    $path = '?r=cart';
    header("Location: $path");

}

/*Построение дерева категорий*/
function makeTree($categories,$parent_id=0) {
    $results=array();
    if ($categories) {
        foreach ($categories as $key => $category) {
            if ($category->parent_id==$parent_id) {
                if ($category->id!=$parent_id) {
                    $subcategories = makeTree($categories,$category->id);
                    if(!empty($subcategories))
                        $category->subcategories = $subcategories ;
                }
                $results[]=$category;
                unset($category);
            }
        }
    }
    return $results;
}
/*Вывод дерева категорий*/
function viewCategories($categories) {
    if($categories) { // проверка лишней не бывает
        echo "<ul>";
        foreach ($categories as $category) {
            if($category->visible) { //важная проверка, которая позволит выводит только включенные категории на сайте
                echo
                "<li>
                    <a href='?r=categories&id=".$category->id."'>$category->name</a>
                </li>";
                if(isset($category->subcategories)) {
                    // проверяем есть ли подкатегории и вызываем заново функцию для вывода
                    viewCategories($category->subcategories); // передаем в функцию уже массив обьектов покатегорий
                }
            }
        }
        echo "</ul>";
    }
}
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
function viewMenu($pages) {
    if($pages) {
        echo '<ul class="nav navbar-nav">';
        foreach ($pages as $page) {
            if ($page->visible && $page->menu_id == 1) {
                if($page->url == '') {
                    echo "<li class='nav-link'><a href='".$_SERVER['SCRIPT_NAME']."'>$page->name</a></li>";
                } else {
                    echo "<li class='nav-link'><a href='?r=pages&id=".$page->id."'>$page->name</a></li>";
                }
            }
        }
        echo '</ul>';
    }
}
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
function viewFooter() {
     if (isset($_COOKIE['lastURI'])) {
        echo 'Последняя посещенная страница: '.$_COOKIE['lastURI'];
        if (isset($_COOKIE['time'])) {
            echo ' в '.$_COOKIE['time'];
        }
    }
}
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
function getPage($pages,$page_id) {
    if($page_id) {
        return $pages[$page_id];
    }
}
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
function getProduct($products,$id) {
    if($id) {
        return $products[$id];
    }
}
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
function getCart($products) {
    $cart_products = array();
    $total_amount = 0;
    $total_price = 0;
    $cart = new stdClass();
    if(isset($_COOKIE['cart'])) {
        $ids = unserialize($_COOKIE['cart']);
        foreach ($ids as $id=>$amount) {
            $cart_products[$id] = getProduct($products,$id);
            $cart_products[$id]->amount = $amount;
            $total_price += $cart_products[$id]->variant->price*$amount;
            $total_amount += $amount;
        }
        $cart->items = $cart_products;
    }
    $cart->total_price = $total_price;
    $cart->total_amount = $total_amount;
    return $cart;
}
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
function getWishes($products) {
    $wishes_products = array();
    $total_amount = 0;
    $wishes = new stdClass();
    if(isset($_COOKIE['wishes'])) {
        $ids = unserialize($_COOKIE['wishes']);
        foreach ($ids as $id=>$amount) {
            $wishes_products[$id] = getProduct($products,$id);
            $wishes_products[$id]->amount = $amount;
            $total_amount += $amount;
        }
        $wishes->items = $wishes_products;
    }
    $wishes->total_amount = $total_amount;
    return $wishes;
}