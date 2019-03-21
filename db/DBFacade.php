<?php

class DBFacade{
    private $_server = "localhost";
    private $_user = "root";
    private $_password = "agnarsson92";
    private $_dbName = "duckdb";
    private $_connection;

    public function __construct(){

    }

    private function connectToDB(){
        try{
            $this->_connection = mysqli_connect($this->_server, $this->_user, $this->_password, $this->_dbName);
            if (mysqli_connect_errno($this->_connection)){
                die("Connection Failed: " . mysqli_connect_error());
            }
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function getProducts(){
        try{
            $this->connectToDB();
            $result = mysqli_query($this->_connection, "GetAllProducts") or die("Query Failed: " . mysqli_error($this->_connection));

            mysqli_close();
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }

        return $result;
    }
}