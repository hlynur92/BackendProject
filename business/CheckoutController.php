<?php
include_once __DIR__ . "/../Persistence/CheckoutDAO.php";
class CheckoutController{

    public function checkoutOrder($orderData){
        $checkoutDAO = new CheckoutDAO();
        $orderid = $checkoutDAO->checkoutOrder($orderData);
        return $orderid;
    }
}