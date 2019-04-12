<?php
include_once __DIR__ . "/DBConnection.php";

class MailDAO{

    public function __construct(){

    }

    public function storeUserMail($email, $name, $subject, $message){
        try{
            $dbmanager = new DBConnection();

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
}