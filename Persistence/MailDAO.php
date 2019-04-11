<?php
include_once __DIR__ . "/DBConnection.php";

class MailDAO{

    public function __construct(){

    }

    public function storeUserMail($email, $name, $subject, $message){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $dbmanager->sanitizeValue($email);
            $dbmanager->sanitizeValue($name);
            $dbmanager->sanitizeValue($subject);
            $dbmanager->sanitizeValue($message);

            $result = mysqli_query($dbconnection, "CALL StoreUserMail('" . $email . "', '" . $name . "', '" . $subject . "', '" . $message . "', " . 0 . ")") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }
}