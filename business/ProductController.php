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
}


/*
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
                       <div class=\"card-body bg-light text-dark\">
                           <h3 name=\"productname\">" . $product['ProductName'] . "</h3>
                           <p name=\"description\" class=\"card-text\">" . $product['Description'] . "</p>
                           <div class=\"justify-content-between text-right\">

                               <small name=\"price\" class=\"text-info\"><del> " . $product['Price'] . " </del>Discount: " . $product['Discount'] . "% <br><h3>" . round($discountPrice, 2) . " </h3></small>

                           </div>
                           <div class=\"d-flex justify-content-between align-items-center clearfix\">
                               <div class=\"btn-group\">
                                   <button type=\"button\" class=\"btn btn-sm btn-success\" onclick=\"location.href='" . $GLOBALS['URL'] . "Presentation/shop-detail-so.php  '\">View more</button>
                               </div>

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
   */