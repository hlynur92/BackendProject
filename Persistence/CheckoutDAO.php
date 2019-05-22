<?php

include_once __DIR__ . "../../business/MailController.php";
include_once __DIR__ . "/AddressDAO.php";
class CheckoutDAO
{

    public function checkCustomer($orderData){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $email = $dbmanager->sanitizeValue($orderData['email']);

            $result = mysqli_query($dbconnection, "CALL CheckCustomer('" . $email . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function insertCustomer($orderData, $customer){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $email = $dbmanager->sanitizeValue($orderData['email']);
            $firstname = $dbmanager->sanitizeValue($orderData['firstname']);
            $lastname = $dbmanager->sanitizeValue($orderData['lastname']);

            if ($customer == null){
                mysqli_query($dbconnection, "CALL InsertCustomer('" . $email . "', '" . $firstname . "', '" . $lastname . "')") or die("Customer Query Failed: " . mysqli_error($dbconnection));
            }

            mysqli_close($dbconnection);
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function insertOrder($orderData, $addressID){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $totalprice = $dbmanager->sanitizeValue($orderData['totalprice']);
            $email = $dbmanager->sanitizeValue($orderData['email']);

            $orderdate = date("Y-m-d");
            $issuedate = date("Y-m-d");

            $dynamicsql = "INSERT INTO ProductOrder(OrderDate, AddressID, TotalPrice, IssueDate, CompanyID, Email) values ('" . $orderdate . "', " . $addressID[0] . ", " . $totalprice . ", '" . $issuedate . "', 1, '" . $email . "')";
            mysqli_query($dbconnection, $dynamicsql) or die("Order Query Failed: " . mysqli_error($dbconnection));

            $orderID = mysqli_insert_id($dbconnection);

            mysqli_close($dbconnection);

            return $orderID;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function insertOrderRows($orderData, $orderID){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            foreach ($orderData['products'] as $product){
                $quantity = $dbmanager->sanitizeValue($product['quantity']);
                $productid = $dbmanager->sanitizeValue($product['productid']);
                mysqli_query($dbconnection, "CALL StoreOrderRows(" . $quantity . ", " . $productid . ", " . $orderID . ")") or die("OrderRows Query Failed2: " . mysqli_error($dbconnection));
            }

            mysqli_close($dbconnection);

            return $orderID;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function checkoutOrder($orderData){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $addressDAO = new AddressDAO();

            $orderData = $dbmanager->sanitizeArray($orderData);

            $countryid = $addressDAO->getCountryID($orderData['address']['country']);
            $customer = $this->checkCustomer($orderData);
            $zip = $addressDAO->checkZip($orderData['address']['zipcode']);
            $address = $addressDAO->checkAddress($orderData['address']['street'], $orderData['address']['zipcode']);
            $this->insertCustomer($orderData, $customer);
            $addressid = $addressDAO->insertAddress($address, $zip, $orderData['address']['zipcode'], $orderData['address']['street'], $orderData['address']['city'], $countryid);
            $orderid = $this->insertOrder($orderData, $addressid);
            $this->insertOrderRows($orderData, $orderid);

            $mailcontroller = new MailController();

            $mailcontroller->invoiceMail($orderid);

            mysqli_close($dbconnection);
            return $orderid;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }
}