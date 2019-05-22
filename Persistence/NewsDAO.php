<?php
include_once __DIR__ . "/DBConnection.php";

class NewsDAO {

    public function getAllNews(){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $result = mysqli_query($dbconnection, "CALL GetAllNews()") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function getSpecificNews($newsid){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $newsid = $dbmanager->sanitizeValue($newsid);

            $result = mysqli_query($dbconnection, "CALL GetSpecificNews(" . $newsid . ")") or die("Query Failed: " . mysqli_error($dbconnection));

            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function getLatestNews(){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $result = mysqli_query($dbconnection, "CALL GetLatestNews()") or die("Query Failed: " . mysqli_error($dbconnection));
            $result = mysqli_fetch_all($result,MYSQLI_BOTH);

            mysqli_close($dbconnection);
            return $result;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function deleteNews($newsid){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $newsid = $dbmanager->sanitizeValue($newsid);

            mysqli_query($dbconnection, "CALL DeleteNews(" . $newsid . ")") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);

        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function createNewNews($title, $creationdate, $description, $imgpath){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $title = $dbmanager->sanitizeValue($title);
            $creationdate = $dbmanager->sanitizeValue($creationdate);
            $description = $dbmanager->sanitizeValue($description);
            $imgpath = $dbmanager->sanitizeValue($imgpath);

            mysqli_query($dbconnection, "CALL CreateNewNews('" . $title . "', '" . $description . "', '" . $imgpath . "', '" . $creationdate . "', " . 1 . ")") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);

        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function editNewsWithImage($newsid, $title, $creationdate, $description, $uploadpath){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $title = $dbmanager->sanitizeValue($title);
            $creationdate = $dbmanager->sanitizeValue($creationdate);
            $description = $dbmanager->sanitizeValue($description);
            $uploadpath = $dbmanager->sanitizeValue($uploadpath);

            mysqli_query($dbconnection, "CALL EditNewsWithImage(" . $newsid . ", '" . $title . "', '" . $description . "', '" . $uploadpath . "', '" . $creationdate . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);

        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function editNews($newsid, $title, $creationdate, $description){
        try{
            $dbmanager = new onlineversion();

            $dbconnection = $dbmanager->connectToDB();

            $newsid = $dbmanager->sanitizeValue($newsid);
            $title = $dbmanager->sanitizeValue($title);
            $creationdate = $dbmanager->sanitizeValue($creationdate);
            $description = $dbmanager->sanitizeValue($description);

            mysqli_query($dbconnection, "CALL EditNews(" . $newsid . ", '" . $title . "', '" . $description . "', '" . $creationdate . "')") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);

        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }
}