<?php
include_once __DIR__ . "/DBConnection.php";
class AccountDAO
{
    public function GetAdminInfo($email){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $email = $dbmanager->sanitizeValue($email);

            $result = mysqli_query($dbconnection, "CALL GetAdminInfo('" . $email . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result[0];
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }
}