<?php

class CheckoutDAO
{

    public function CheckCustomer($orderData){
        try{
            $dbmanager = new DBConnection();

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

    public function InsertCustomer($orderData, $customer){
        try{
            $dbmanager = new DBConnection();

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

    public function InsertOrder($orderData, $addressID){
        try{
            $dbmanager = new DBConnection();

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

    public function InsertOrderRows($orderData, $orderID){
        try{
            $dbmanager = new DBConnection();

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
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $addressDAO = new AddressDAO();

            $orderData = $dbmanager->sanitizeArray($orderData);

            $countryid = $addressDAO->GetCountryID($orderData);
            $customer = $this->CheckCustomer($orderData);
            $zip = $addressDAO->CheckZip($orderData['address']['zipcode']);
            $address = $addressDAO->CheckAddress($orderData['address']['street'], $orderData['address']['zipcode']);
            $this->InsertCustomer($orderData, $customer);
            $addressid = $addressDAO->InsertAddress($address, $zip, $orderData['address']['zipcode'], $orderData['address']['street'], $orderData['address']['city'], $countryid);
            $orderid = $this->InsertOrder($orderData, $addressid);
            $this->InsertOrderRows($orderData, $orderid);

            mysqli_close($dbconnection);
            return $orderid;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }
}

//mysqli_query($dbconnection, "CALL StoreOrder('" . $orderdate . "', " . $addressID[0] . ", " . $totalprice . ", '" . $issuedate . "', 1, '" . $email . "')") or die("Query Failed: " . mysqli_error($dbconnection));
//$sqlquery = "CALL StoreOrder('" . $orderdate . "', " . $addressID[0] . ", " . $totalprice . ", '" . $issuedate . "', 1, '" . $email . "')";