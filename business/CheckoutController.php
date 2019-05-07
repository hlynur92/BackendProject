<?php

class CheckoutController{

    public function checkoutOrder($orderData){
        $checkoutDAO = new CheckoutDAO();
        $checkoutDAO->checkoutOrder($orderData);
    }
}