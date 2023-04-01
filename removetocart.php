<?php

include "./app/autoload.php";

$product_id = $_GET['product_id'];

if ($product_id) {
    $help = new Custom();
    $help->removeItemCart($product_id);
    Flasher::setFlash('Successfully', 'to remove to cart!', 'success');
    header('Location: index.php');
}