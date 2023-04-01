<?php

class Custom extends CBase
{
    public function dd($value)
    {
        echo '<pre>';
        var_dump($value);
        die;
    }

    public function dump($value)
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
    }

    public function addItemCart($data, $id)
    {
        $_SESSION['cart'][$id] = $data;
    }

    public function removeItemCart($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
    }

    public function countItemCart()
    {
        if (isset($_SESSION['cart'])) {
            return count($_SESSION['cart']);
        }
        return 0;
    }
}