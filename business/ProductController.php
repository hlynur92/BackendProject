<?php
include_once __DIR__ . "/../Persistence/ProductDAO.php";
class ProductController{

    public function getAllProducts(){
        $prodDAO = new ProductDAO();
        $products = $prodDAO->getAllProducts();
        return $products;
    }

    public function getAllProductVariations(){
        $prodDAO = new ProductDAO();
        $products = $prodDAO->getAllProductVariations();
        return $products;
    }

    public function getSpecificProduct($productid){
        $prodDAO = new ProductDAO();
        $products = $prodDAO->getSpecificProduct($productid);
        return $products;
    }

    public function deleteProduct($productid){
        $prodDAO = new ProductDAO();
        $prodDAO->deleteProduct($productid);
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

    public function createNewProduct($productname, $price, $colour, $size, $description, $imgPath){
        $prodDAO = new ProductDAO();
        $prodDAO->createNewProduct($productname, $price, $colour, $size, $description, $imgPath);
    }

    public function getAllSpecialOffers(){
        $prodDAO = new ProductDAO();
        $products = $prodDAO->getAllSpecialOffers();
        return $products;
    }

    public function getSpecificSpecialOffer($specialofferid){
        $prodDAO = new ProductDAO();
        $offers = $prodDAO->getSpecificSpecialOffer($specialofferid);
        return $offers;
    }

    public function getSpecificSpecialOfferProduct($productid, $specialofferid){
        $prodDAO = new ProductDAO();
        $products = $prodDAO->getSpecificSpecialOfferProduct($productid, $specialofferid);
        return $products;
    }

    public function deleteOffer($specialofferid){
        $prodDAO = new ProductDAO();
        $prodDAO->deleteOffer($specialofferid);
    }

    public function getLatestSpecialOffers(){
        $prodDAO = new ProductDAO();
        $products = $prodDAO->getLatestSpecialOffers();
        return $products;
    }

    public function createNewSpecialOffer($discount, $startdate, $enddate){
        $prodDAO = new ProductDAO();
        $prodDAO->createNewSpecialOffer($discount, $startdate, $enddate);
    }
}