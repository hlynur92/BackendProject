<?php

class CartController
{
    private $_productCart;

    public function __construct(){

    }

    public function existsInCart($productid){
            $_SESSION['message'] = 'Product already in cart';
    }

    public function addToCart($productid, $specialofferid, $quantity){
        //$this->existsInCart($item);
        $newdata = array(
            "productid"=>$productid,
            "specialofferid"=>$specialofferid,
            "quantity"=>$quantity
        );

        if(!in_array($productid, $_SESSION['cart'])){
            array_push($_SESSION['cart'], $newdata);
            $_SESSION['message'] = 'Product added to cart';
            //header('location', 'index.php');
        }
    }

    public function addToCartSpecialOffer($productid, $specialofferid, $quantity){
        //$this->existsInCart($item);
        $newdata = array(
            "productid"=>$productid,
            "specialofferid"=>$specialofferid,
            "quantity"=>$quantity
        );

        if(!in_array($productid, $_SESSION['cart'])){
            array_push($_SESSION['cart'], $newdata);
            $_SESSION['message'] = 'Product added to cart';
            //header('location', 'index.php');
        }
    }

    public function removeFromCart($productid){

    }
}