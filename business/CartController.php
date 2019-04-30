<?php

class CartController
{
    private $_productCart;

    public function __construct(){

    }

    public function existsInCart($productid){
        $exists = false;

        foreach ($_SESSION['cart'] as $item){
            if($item['productid'] == $productid){
                $_SESSION['message'] = 'Product already in cart';
                $exists = true;
                return $exists;
            }else {
                $exists = false;
            }
        }
        return $exists;
    }

    public function addToCart($productid, $specialofferid, $quantity){
        $exists = $this->existsInCart($productid);
        if (!$exists){
            $newdata = array(
                "productid"=>$productid,
                "specialofferid"=>$specialofferid,
                "quantity"=>$quantity
            );

            if(!in_array($productid, $_SESSION['cart'])){
                array_push($_SESSION['cart'], $newdata);
                $_SESSION['message'] = 'Product added to cart';
            }
        }
    }

    public function removeFromCart($productid){

    }
}