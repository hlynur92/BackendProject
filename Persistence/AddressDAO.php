<?php

class AddressDAO
{
    public function getCountryID($country){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $country = $dbmanager->sanitizeValue($country);

            $result = mysqli_query($dbconnection, "CALL GetCountryID('" . $country . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result[0]['CountryID'];
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function checkZip($zip){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $result = mysqli_query($dbconnection, "CALL CheckZip('" . $zip . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function checkAddress($street, $zip){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $result = mysqli_query($dbconnection, "CALL CheckAddress('" . $street . "', '" . $zip . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function getAddressID($street, $zip){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $result = mysqli_query($dbconnection, "CALL GetAddressID('" . $street . "', '" . $zip . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function insertAddress($addressresult, $zipresult, $zipcode, $street, $city, $countryid){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            if ($addressresult == null){
                if ($zipresult == null){
                    mysqli_query($dbconnection, "CALL InsertZip('" . $zipcode . "', '" . $city . "', " . $countryid . ")") or die("Zip Query Failed: " . mysqli_error($dbconnection));
                    mysqli_query($dbconnection, "CALL InsertAddress('" . $street . "', '" . $zipcode . "')") or die("Address Query Failed: " . mysqli_error($dbconnection));
                }else{
                    mysqli_query($dbconnection, "CALL InsertAddress('" . $street . "', '" . $zipcode . "')") or die("Address Query Failed: " . mysqli_error($dbconnection));
                }
                $addressID = mysqli_insert_id($dbconnection);
            }else{
                $addressID = $this->getAddressID($street, $zipcode);
                $addressID = $addressID[0][0];
            }

            mysqli_close($dbconnection);
            return $addressID;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function editPostalCode($zipcode, $city, $countryid){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            mysqli_query($dbconnection, "CALL EditPostalCode('" . $zipcode . "', '" . $city . "', " . $countryid . ")") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function editAddress($addressid, $street, $zipcode){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            mysqli_query($dbconnection, "CALL EditAddress(" . $addressid . ", '" . $street . "', '" . $zipcode . "')") or die("Address Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }
}