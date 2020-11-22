<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/casestudy2/cart/Cart.php';


session_start();




if (isset($_REQUEST['add_product_code'])) {

    // process request from addToCart
    $add_product_code = (int)$_REQUEST['add_product_code'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = new Cart();
    }

    $_SESSION['cart']->setProduct($add_product_code);
    
}

if (isset($_REQUEST['change_product_code'])) {
    //process request from inc or dec btn
    $change_product_code = (int)$_REQUEST['change_product_code'];

    if ($change_product_code > 0) {
        $_SESSION['cart']->setProduct($change_product_code);
    }elseif ($change_product_code < 0) {
        $_SESSION['cart']->decreaseProduct(-$change_product_code);
    }
}

if (isset($_REQUEST['remove_product_code'])) {
    
    $remove_product_code = (int)$_REQUEST['remove_product_code'];

    $_SESSION['cart']->removeProduct($remove_product_code);
}

// respond to display total amount product in CartIcon (navigation-bar)
echo $_SESSION['cart']->getTotalAmount();

// session_destroy();