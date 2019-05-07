<?php

class CheckoutDAO
{
    public function checkoutOrder($orderData){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $orderData = $dbmanager->sanitizeArray($orderData);

            mysqli_query($dbconnection, "CALL GetSpecificProduct(" . $productid . ")") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }
}