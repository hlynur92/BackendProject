<?php

class CheckoutDAO
{

    public function GetCountryID($orderData){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $country = $dbmanager->sanitizeValue($orderData['address']['country']);

            $result = mysqli_query($dbconnection, "CALL GetCountryID('" . $country . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

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

    public function CheckZip($orderData){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $zip = $dbmanager->sanitizeValue($orderData['address']['zipcode']);

            $result = mysqli_query($dbconnection, "CALL CheckZip('" . $zip . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function CheckAddress($orderData){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $street = $dbmanager->sanitizeValue($orderData['address']['street']);
            $zip = $dbmanager->sanitizeValue($orderData['address']['zipcode']);

            $result = mysqli_query($dbconnection, "CALL CheckAddress('" . $street . "', '" . $zip . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function GetAddressID($orderData){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $street = $dbmanager->sanitizeValue($orderData['address']['street']);
            $zip = $dbmanager->sanitizeValue($orderData['address']['zipcode']);

            $result = mysqli_query($dbconnection, "CALL GetAddressID('" . $street . "', '" . $zip . "')") or die("Query Failed: " . mysqli_error($dbconnection));

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
                mysqli_query($dbconnection, "CALL InsertCustomer('" . $email . "', '" . $firstname . "', '" . $lastname . "')") or die("Query Failed: " . mysqli_error($dbconnection));
            }

            mysqli_close($dbconnection);
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function InsertAddress($orderData, $country, $address, $zip){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $zipcode = $dbmanager->sanitizeValue($orderData['address']['zipcode']);
            $city = $dbmanager->sanitizeValue($orderData['address']['city']);
            $street = $dbmanager->sanitizeValue($orderData['address']['street']);

            if ($address == null){
                if ($zip == null){
                    mysqli_query($dbconnection, "CALL InsertZip('" . $zipcode . "', '" . $city . "', " . $country[0]['CountryID'] . ")") or die("Query Failed: " . mysqli_error($dbconnection));
                    mysqli_query($dbconnection, "CALL InsertAddress('" . $street . "', '" . $zipcode . "')") or die("Query Failed: " . mysqli_error($dbconnection));
                }else{
                    mysqli_query($dbconnection, "CALL InsertAddress('" . $street . "', '" . $zipcode . "')") or die("Query Failed: " . mysqli_error($dbconnection));
                }
                $addressID = mysqli_insert_id($dbconnection);
            }else{
                $addressID = $this->GetAddressID($orderData);
                $addressID = $addressID[0][0];
            }

            mysqli_close($dbconnection);
            return $addressID;
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
            mysqli_query($dbconnection, $dynamicsql) or die("Query Failed: " . mysqli_error($dbconnection));

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
                mysqli_query($dbconnection, "CALL StoreOrderRows(" . $quantity . ", " . $productid . ", " . $orderID . ")") or die("Query Failed2: " . mysqli_error($dbconnection));
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

            $orderData = $dbmanager->sanitizeArray($orderData);

            $country = $this->GetCountryID($orderData);
            $customer = $this->CheckCustomer($orderData);
            $zip = $this->CheckZip($orderData);
            $address = $this->CheckAddress($orderData);
            $this->InsertCustomer($orderData, $customer);
            $addressid = $this->InsertAddress($orderData, $country, $address, $zip);
            $orderid = $this->InsertOrder($orderData, $addressid);
            $this->InsertOrderRows($orderData, $orderid);

            mysqli_close($dbconnection);
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }
}

//mysqli_query($dbconnection, "CALL StoreOrder('" . $orderdate . "', " . $addressID[0] . ", " . $totalprice . ", '" . $issuedate . "', 1, '" . $email . "')") or die("Query Failed: " . mysqli_error($dbconnection));
//$sqlquery = "CALL StoreOrder('" . $orderdate . "', " . $addressID[0] . ", " . $totalprice . ", '" . $issuedate . "', 1, '" . $email . "')";