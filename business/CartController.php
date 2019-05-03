<?php

class CartController
{
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

    public function addToCart($productid, $specialofferid, $quantity)
    {
        $exists = $this->existsInCart($productid);
        if (!$exists) {
            $newdata = array(
                "productid" => $productid,
                "specialofferid" => $specialofferid,
                "quantity" => $quantity
            );

            if (!in_array($productid, $_SESSION['cart'])) {
                array_push($_SESSION['cart'], $newdata);
                $_SESSION['message'] = 'Product added to cart';
            }
        }
    }

    public function changeQuantity($productid, $quantity){
        /*
        for ($i = 0; $i < count($_SESSION['cart']); $i++ ){
            if ($_SESSION['cart'][$i]['quantity'] == $productid){
                $_SESSION['cart'][$i['quantity']] = $quantity;
            }
        }
        */
        /*
        foreach ($_SESSION['cart'] as $item){
            if ($item['productid'] == $productid){
                $item['quantity'] = $quantity;
                //$_SESSION['cart'][$item] = $item;
            }
        }
        */
    }

    public function removeFromCart($productid){
        /*
        for ($i = 0; $i < count($_SESSION['cart']); $i++ ){
            if ($_SESSION['cart'][$i]['productid'] == $productid){
                unset($_SESSION['cart'][$i]);
            }
        }
        */
        foreach ($_SESSION['cart'] as $index => $item){
            //echo "fghgkjkjkjkj";
            echo $item['productid'];
            if ($item['productid'] == $productid){
                //var_dump($index['productid']);
                unset($_SESSION['cart'][$index]);
            }
        }
    }
}