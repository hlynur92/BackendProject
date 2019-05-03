<?php
include_once __DIR__ . "/DBConnection.php";

class NewsDAO {

    public function getAllNews(){
        try{
            $dbmanager = new DBConnection();

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
            $dbmanager = new DBConnection();

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
            $dbmanager = new DBConnection();

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
            $dbmanager = new DBConnection();

            $dbconnection = $dbmanager->connectToDB();

            $productid = $dbmanager->sanitizeValue($newsid);

            mysqli_query($dbconnection, "CALL DeleteNews(" . $newsid . ")") or die("Query Failed: " . mysqli_error($dbconnection));

            mysqli_close($dbconnection);

        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

}

//<button type=\"button\" class=\"btn btn-sm btn-success\" onclick=\"location.href='" . $GLOBALS['URL'] . "Presentation/news-detail.php?newsid=" . $news['NewsID']  . "  '\">View more</button>
//