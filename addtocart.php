<?php
include "./app/autoload.php";

$product_id = $_POST['product_id'];

if($product_id) {
    $cart = new Cart();
    $cart->addToCart($product_id);
    Flasher::setFlash('Successfully', 'to added to cart!', 'success');
    header('Location: index.php');
}