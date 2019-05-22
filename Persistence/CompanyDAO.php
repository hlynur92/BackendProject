<?php
include_once __DIR__ . "/DBConnection.php";
include_once __DIR__ . "/AddressDAO.php";

class CompanyDAO{

    public function getCompanyInfo(){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $result = mysqli_query($dbconnection, "CALL GetCompanyInfo()") or die("Query Failed: " . mysqli_error($dbconnection));
            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function getSpecificCompanyInfo($companyid){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $companyid = $dbmanager->sanitizeValue($companyid);

            $result = mysqli_query($dbconnection, "CALL GetSpecificCompanyInfo(" . $companyid . ")") or die("Query Failed: " . mysqli_error($dbconnection));
            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function deleteCompany($companyid){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $companyid = $dbmanager->sanitizeValue($companyid);

            mysqli_query($dbconnection, "CALL DeleteCompany(" . $companyid . ")") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);

        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function createNewCompany($companyname, $phonenr, $email, $openinghours, $street, $zipcode, $city, $country, $description){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $addressDAO = new AddressDAO();

            $companyname = $dbmanager->sanitizeValue($companyname);
            $phonenr = $dbmanager->sanitizeValue($phonenr);
            $email = $dbmanager->sanitizeValue($email);
            $openinghours = $dbmanager->sanitizeValue($openinghours);
            $street = $dbmanager->sanitizeValue($street);
            $zipcode = $dbmanager->sanitizeValue($zipcode);
            $city = $dbmanager->sanitizeValue($city);
            $country = $dbmanager->sanitizeValue($country);
            $description = $dbmanager->sanitizeValue($description);


            $countryid = $addressDAO->getCountryID($country);
            $zip = $addressDAO->checkZip($zipcode);
            $address = $addressDAO->checkAddress($street, $zipcode);
            $addressid = $addressDAO->insertAddress($address, $zip, $zipcode, $street, $city, $countryid);

            mysqli_query($dbconnection, "CALL CreateNewCompany(" . $phonenr . ", '" . $email . "', '" . $companyname . "', '" . $description . "', '" . $openinghours . "', " . $addressid . ")") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);

        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function editCompany($companyid, $companyname, $phonenr, $email, $openinghours, $addressid, $street, $zipcode, $city, $country, $description){
        try{
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $addressDAO = new AddressDAO();

            $companyid = $dbmanager->sanitizeValue($companyid);
            $companyname = $dbmanager->sanitizeValue($companyname);
            $phonenr = $dbmanager->sanitizeValue($phonenr);
            $email = $dbmanager->sanitizeValue($email);
            $openinghours = $dbmanager->sanitizeValue($openinghours);
            $addressid = $dbmanager->sanitizeValue($addressid);
            $street = $dbmanager->sanitizeValue($street);
            $zipcode = $dbmanager->sanitizeValue($zipcode);
            $city = $dbmanager->sanitizeValue($city);
            $country = $dbmanager->sanitizeValue($country);
            $description = $dbmanager->sanitizeValue($description);

            $countryid = $addressDAO->getCountryID($country);
            $addressDAO->editPostalCode($zipcode, $city, $countryid);
            $addressDAO->editAddress($addressid, $street, $zipcode);

            mysqli_query($dbconnection, "CALL EditCompany(" . $companyid . ", " . $phonenr . ", '" . $email . "', '" . $companyname . "', '" . $description . "', '" . $openinghours . "', " . $addressid . ")") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);

        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }
}