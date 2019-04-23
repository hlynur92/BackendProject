<?php
include_once __DIR__ . "/DBConnection.php";

class ProductDAO
{
    public function __construct(){

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
}