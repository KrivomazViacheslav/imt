<?php
header('Content-Type: text/html; charset=utf-8');
if(isset($_SERVER) && $_SERVER['HTTP_HOST'] && $_SERVER['REQUEST_URI']) {
    setcookie('lastURI', $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], time()+3600*24*30, '/');
}
setcookie('time', date('m-d-Y:H:i:s'), time()+3600*24*30, '/');
if(isset($_GET) && $_GET['amount']) {
    $product_id = strip_tags(trim($_GET['product_id']));
    $amount     = strip_tags(trim($_GET['amount']));
    $cart       = array();
    if($_COOKIE['cart']) {
        $cart = unserialize($_COOKIE['cart']);
        $cart[$product_id] = $amount;
        setcookie('cart',serialize($cart),time()+3600*24*30,'/');
    } else {
        $cart[$product_id] = $amount;
        setcookie('cart',serialize($cart),time()+3600*24*30,'/');
    }
    header('Location: http://imt/cms/index.php?r=thanks');
}
ini_set('display_errors',true);
error_reporting(E_ALL);
require_once 'data/menu.php';
require_once 'data/categories.php';
require_once 'data/products.php';
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
        if (isset($_COOKIE['cart'])) {
            $cart = unserialize($_COOKIE['cart']);
            $cnt  = count($cart);
            echo "<li class='nav-link'><a href='?r=cart'>Ваша корзина – $cnt товаров</a></li>";
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