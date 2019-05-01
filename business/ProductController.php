<?php
include_once __DIR__ . "/../Persistence/ProductDAO.php";
class ProductController{

    public function __construct(){

    }

    public function getLatestSpecialOffers(){
        $prodDAO = new ProductDAO();
        $products = $prodDAO->getLatestSpecialOffers();
        return $products;
    }

    public function getAllProducts(){
        $prodDAO = new ProductDAO();
        $products = $prodDAO->getAllProducts();
        return $products;
    }

    public function getSpecificProduct($productid){
        $prodDAO = new ProductDAO();
        $products = $prodDAO->getSpecificProduct($productid);
        return $products;
    }

    public function getSpecificSpecialOfferProduct($productid, $specialofferid){
        $prodDAO = new ProductDAO();
        $products = $prodDAO->getSpecificSpecialOfferProduct($productid, $specialofferid);
        return $products;
    }

    public function getCartProducts(){
        $prodDAO = new ProductDAO();
        $products = array();
        foreach ($_SESSION['cart'] as $item){
            if ($item['specialofferid'] != null){
                $product = $prodDAO->getSpecificSpecialOfferProduct($item['productid'], $item['specialofferid']);
                array_push($products, $product[0]);
            }
            else{
                $product = $prodDAO->getSpecificProduct($item['productid']);
                array_push($products, $product[0]);
            }
        }
        return $products;
    }
}