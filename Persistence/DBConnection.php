<?php

class DBConnection{
    private $_server = "localhost";
    private $_user = "root";
    private $_password = "agnarsson92";
    private $_dbName = "duckdb";
    private $_connection;

    public function __construct(){

    }

    public function connectToDB(){
        try{
            $this->_connection = mysqli_connect($this->_server, $this->_user, $this->_password, $this->_dbName);
            if (mysqli_connect_errno($this->_connection)){
                die("Connection Failed: " . mysqli_connect_error());

            }

            return $this->_connection;
        }catch (mysqli_sql_exception $e){
            echo "Error Message: " . $e;
        }
    }

    public function sanitizeValue($value){
        if (is_string($value)){
            return mysqli_real_escape_string($this->_connection,htmlspecialchars(trim($value)));
        }
        else{
            return $value;
        }
    }

    public function sanitizeArray($array){
        array_walk_recursive($array, function($item) {
            $item = $this->sanitizeValue($item);
        });

        return $array;
    }
}