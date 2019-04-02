<?php

class CartController
{
    private $_productCart;

    public function __construct(){

    }

    public function existsInCart($item){

    }

    public function addToCart($item, $quantity){

    }

    public function removeFromCart($id){

    }
}

/*
 * array (size=14)
      0 => string '1' (length=1)
      'ProductID' => string '1' (length=1)
      1 => string 'Mama Duck' (length=9)
      'ProductName' => string 'Mama Duck' (length=9)
      2 => string 'A mama Duck with a baby duck' (length=28)
      'Description' => string 'A mama Duck with a baby duck' (length=28)
      3 => string '11.99' (length=5)
      'Price' => string '11.99' (length=5)
      4 => string 'red' (length=3)
      'Colour' => string 'red' (length=3)
      5 => string 'medium' (length=6)
      'Size' => string 'medium' (length=6)
      6 => null
      'SpecialOfferID' => null
 */