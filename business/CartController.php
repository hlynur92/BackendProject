<?php

class CartController
{
    private $_productCart;

    public function __construct(){

    }

    public function existsInCart($productid){
            $_SESSION['message'] = 'Product already in cart';
    }

    public function addToCart($productid){
        //$this->existsInCart($item);
        if(!in_array($productid, $_SESSION['cart'])){
            array_push($_SESSION['cart'], $productid);
            $_SESSION['message'] = 'Product added to cart';
            header('location', 'index.php');
        }
    }

    public function removeFromCart($productid){

    }
}