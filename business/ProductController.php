<?php
include_once __DIR__ . "/../Persistence/ProductDAO.php";

class ProductController{

    public function __construct(){

    }

    public function GetProducts(){
        $prodDAO = new ProductDAO();

        $products = $prodDAO->getProducts();

        $products = $this->ProductTemplate($products);

        return $products;
    }

    public  function ProductTemplate($products){
        $tempProducts = array();
        foreach ($products as $product){
            $temp = "
                <div class=\"col-md-4\">
                    <div class=\"card mb-4 shadow-sm\">
                        <svg name=\"productimg\" class=\"bd-placeholder-img card-img-top\" width=\"100%\" height=\"225\" xmlns=\"http://www.w3.org/2000/svg\" preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: Thumbnail\"><title>Placeholder</title><rect width=\"100%\" height=\"100%\" fill=\"#55595c\"/><text x=\"50%\" y=\"50%\" fill=\"#eceeef\" dy=\".3em\">Thumbnail</text></svg>
                        <div class=\"card-body\">
                            <h3 name=\"productname\">" . $product['ProductName'] . "</h3>
                            <p name=\"description\" class=\"card-text\">" . $product['Description'] . "</p>
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div class=\"btn-group\">
                                    <button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Detail</button>
                                </div>
                                <small name=\"price\" class=\"text-success\">" . $product['Price'] . "</small>
                            </div>
                        </div>
                    </div>
                </div>
            ";

            array_push($tempProducts, $temp);
        }

        return $tempProducts;
        //var_dump($tempProducts);
    }
}