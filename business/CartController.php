<?php

class CartController{

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

    public function changeQuantity($productid, $quantity, $type){
        foreach ($_SESSION['cart'] as $index => $item){
            if ($type == "add"){
                if ($item['productid'] == $productid){
                    $_SESSION['cart'][$index]['quantity'] += $quantity;
                }
            }elseif ($type == "subtract"){
                if ($item['productid'] == $productid){
                    if($_SESSION['cart'][$index]['quantity'] > 0){
                        $_SESSION['cart'][$index]['quantity'] -= $quantity;
                    }else{
                        unset($_SESSION['cart'][$index]);
                    }
                    if ($_SESSION['cart'][$index]['quantity'] == 0){
                        unset($_SESSION['cart'][$index]);
                    }
                }
            }
        }
    }

    public function removeFromCart($productid){
        foreach ($_SESSION['cart'] as $index => $item){
            if ($item['productid'] == $productid){
                unset($_SESSION['cart'][$index]);
            }
        }
    }
}