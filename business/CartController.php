<?php

class CartController
{
    private $_productCart;

    public function __construct(){

    }

    public function existsInCart($productid){
        $exists = array_search($productid, $_SESSION['cart']);
        if ($exists != false){
            return $exists;
        }else{
            $_SESSION['message'] = 'Product already in cart';
            return $exists;
        }
    }

    public function addToCart($productid, $specialofferid, $quantity){
        $exists = $this->existsInCart($productid);
        if ($exists != false){
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
    }

    public function removeFromCart($productid){

    }
}