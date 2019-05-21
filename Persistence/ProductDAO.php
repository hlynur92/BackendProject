<?php
include_once __DIR__ . "/DBConnection.php";

class ProductDAO
{
    public function __construct(){

    }

    public function getAllProducts(){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $result = mysqli_query($dbconnection, "CALL GetAllProducts()") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function getAllProductVariations(){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $result = mysqli_query($dbconnection, "CALL GetAllProductVariations()") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function getSpecificProduct($productid){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $productid = $dbmanager->sanitizeValue($productid);

            $result = mysqli_query($dbconnection, "CALL GetSpecificProduct(" . $productid . ")") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function deleteProduct($productid){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $productid = $dbmanager->sanitizeValue($productid);

            mysqli_query($dbconnection, "CALL DeleteProduct(" . $productid . ")") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function createNewProduct($productname, $price, $colour, $size, $description, $imgPath){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $productname = $dbmanager->sanitizeValue($productname);
            $price = $dbmanager->sanitizeValue($price);
            $colour = $dbmanager->sanitizeValue($colour);
            $size = $dbmanager->sanitizeValue($size);
            $description = $dbmanager->sanitizeValue($description);
            $imgPath = $dbmanager->sanitizeValue($imgPath);

            mysqli_query($dbconnection, "CALL CreateNewProduct('" . $productname . "', '" . $description . "', " . $price . ", '" . $imgPath . "', '" . $colour . "', '" . $size . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function editProduct($productid, $productname, $price, $colour, $size, $description){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $productid = $dbmanager->sanitizeValue($productid);
            $productname = $dbmanager->sanitizeValue($productname);
            $price = $dbmanager->sanitizeValue($price);
            $colour = $dbmanager->sanitizeValue($colour);
            $size = $dbmanager->sanitizeValue($size);
            $description = $dbmanager->sanitizeValue($description);

            mysqli_query($dbconnection, "CALL editProduct(" . $productid . ", '" . $productname . "', '" . $description . "', " . $price . ", '" . $colour . "', '" . $size . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function editProductWithImage($productid, $productname, $price, $colour, $size, $description, $uploadpath){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $productid = $dbmanager->sanitizeValue($productid);
            $productname = $dbmanager->sanitizeValue($productname);
            $price = $dbmanager->sanitizeValue($price);
            $colour = $dbmanager->sanitizeValue($colour);
            $size = $dbmanager->sanitizeValue($size);
            $description = $dbmanager->sanitizeValue($description);
            $uploadpath = $dbmanager->sanitizeValue($uploadpath);

            mysqli_query($dbconnection, "CALL EditProductWithImage(" . $productid . ", '" . $productname . "', '" . $description . "', " . $price . ", '" . $uploadpath . "', '" . $colour . "', '" . $size . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function getVariantSelection($productname, $productcolour, $productsize){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $productname = $dbmanager->sanitizeValue($productname);
            $productcolour = $dbmanager->sanitizeValue($productcolour);
            $productsize = $dbmanager->sanitizeValue($productsize);

            $result = mysqli_query($dbconnection, "CALL GetVariantSelection('" . $productname . "', '" . $productcolour . "', '" . $productsize . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function deleteOffer($specialofferid){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $specialofferid = $dbmanager->sanitizeValue($specialofferid);

            mysqli_query($dbconnection, "CALL DeleteOfferForeignKey(" . $specialofferid . ")") or die("Query Failed: " . mysqli_error($dbconnection));
            mysqli_query($dbconnection, "CALL DeleteOffer(" . $specialofferid . ")") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);

        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function getSpecificSpecialOfferProduct($productid, $specialofferid){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $productid = $dbmanager->sanitizeValue($productid);
            $specialofferid = $dbmanager->sanitizeValue($specialofferid);

            $result = mysqli_query($dbconnection, "CALL GetSpecificSpecialOfferProduct(" . $productid . ", " . $specialofferid . ")") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function getSpecificSpecialOffer($specialofferid){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $specialofferid = $dbmanager->sanitizeValue($specialofferid);

            $result = mysqli_query($dbconnection, "CALL GetSpecificSpecialOffer(" . $specialofferid . ")") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function getLatestSpecialOffers(){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $result = mysqli_query($dbconnection, "CALL GetLatestSpecialOffers()") or die("Query Failed: " . mysqli_error($dbconnection));
            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function getAllSpecialOffers(){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $result = mysqli_query($dbconnection, "CALL GetAllSpecialOffers()") or die("Query Failed: " . mysqli_error($dbconnection));
            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function createNewSpecialOffer($discount, $startdate, $enddate){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $discount = $dbmanager->sanitizeValue($discount);
            $startdate = $dbmanager->sanitizeValue($startdate);
            $enddate = $dbmanager->sanitizeValue($enddate);

            mysqli_query($dbconnection, "CALL CreateNewSpecialOffer(" . $discount . ", '" . $startdate . "', '" . $enddate . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function editSpecialOffer($specialofferid, $discount, $startdate, $enddate){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $specialofferid = $dbmanager->sanitizeValue($specialofferid);
            $discount = $dbmanager->sanitizeValue($discount);
            $startdate = $dbmanager->sanitizeValue($startdate);
            $enddate = $dbmanager->sanitizeValue($enddate);

            mysqli_query($dbconnection, "CALL EditSpecialOffer(" . $specialofferid . ", " . $discount . ", '" . $startdate . "', '" . $enddate . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }
}