<?php
include "./app/autoload.php";

$order = new Order();
$validation = new Validation();
$email = $validation->checkEmail($_POST['email']);
if($email != 0){
    $order->store($_POST);
    Flasher::setFlash('Successfully', 'Order store success.', 'success');
    header('Location: index.php');
} else {
    Flasher::setFlash('Failed', 'Invalid customer email', 'danger');
    header('Location: index.php');
}
