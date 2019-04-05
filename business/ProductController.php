<?php
include_once __DIR__ . "/../Persistence/ProductDAO.php";

class ProductController{

    public function __construct(){

    }

    public function getLatestSpecialOffers(){
        $prodDAO = new ProductDAO();

        $products = $prodDAO->getLatestSpecialOffers();

        $products = $this->getProductTemplate($products);

        return $products;
    }

    public  function getProductTemplate($products){
        $tempProducts = array();
        foreach ($products as $product){
            $discount = $product['Discount']/100;
            $discountPrice = $product['Price'] * ( 1 - $discount);
            $temp = "
                <div class=\"col-md-3\">
                    <div class=\"card mb-4 shadow-sm\">
                        <image name=\"productimg\" class=\"bd-placeholder-img card-img-top\" width=\"100%\" height=\"100%\" src=" . $product['ImgPath'] . " preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: Thumbnail\">
                            <title>Placeholder</title>
                            <rect width=\"100%\" height=\"100%\" fill=\"#55595c\"/><text x=\"50%\" y=\"50%\" fill=\"#eceeef\" dy=\".3em\"></text>
                        </image>
                        <div class=\"card-body bg-info\">
                            <h3 name=\"productname\">" . $product['ProductName'] . "</h3>
                            <p name=\"description\" class=\"card-text\">" . $product['Description'] . "</p>
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div class=\"btn-group\">
                                    <button type=\"button\" class=\"btn btn-sm btn-outline-secondary\" onclick=\"location.href='" . $GLOBALS['URL'] . "Presentation/shop-detail.php  '\">Detail</button>
                                </div>
                                <small name=\"price\" class=\"text-warning\">Full Price: " . $product['Price'] . " Discount Price: " . round($discountPrice, 2) . " Discount: " . $product['Discount'] . "%</small>
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