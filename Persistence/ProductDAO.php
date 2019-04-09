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
            //var_dump($result);

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);
            //var_dump($result);

            return $result;
            mysqli_close($dbconnection);
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function getAllProducts(){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $result = mysqli_query($dbconnection, "CALL GetAllProducts()") or die("Query Failed: " . mysqli_error($dbconnection));
            //var_dump($result);

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);
            //var_dump($result);

            return $result;
            mysqli_close($dbconnection);
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function getSpecificProduct(){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $result = mysqli_query($dbconnection, "CALL GetSpecificProduct()") or die("Query Failed: " . mysqli_error($dbconnection));
            //var_dump($result);

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);
            //var_dump($result);

            return $result;
            mysqli_close($dbconnection);
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }
}