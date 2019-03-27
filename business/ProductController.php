<?php
include '../db/DBFacade.php';

class ProductController{

    public function __construct(){

    }

    public function GetProducts(){
        $db = new DBFacade();

        $products = $db->getProducts();

        echo "Product List: " . $products;
    }
}

$instance = new ProductController();
$instance->GetProducts();