<?php
include_once __DIR__ . "/DBConnection.php";

class MailDAO{

    public function __construct(){

    }

    public function storeUserMail($email, $name, $subject, $message){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $email = $dbmanager->sanitizeValue($email);
            $name = $dbmanager->sanitizeValue($name);
            $subject = $dbmanager->sanitizeValue($subject);
            $message = $dbmanager->sanitizeValue($message);

            $result = mysqli_query($dbconnection, "CALL StoreUserMail('" . $email . "', '" . $name . "', '" . $subject . "', '" . $message . "', " . 0 . ")") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function invoiceMail($orderid){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $orderid = $dbmanager->sanitizeValue($orderid);

            $result = mysqli_query($dbconnection, "CALL InvoiceMail('" . $orderid . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }
}