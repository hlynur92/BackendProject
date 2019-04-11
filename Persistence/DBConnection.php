<?php

class DBConnection{
    private $_server = "mysql16.cliche.dk";
    private $_user = "majlander.dk";
    private $_password = "gjfakV/L!4v0";
    private $_dbName = "majlander_dk";
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
        return mysqli_real_escape_string($this->_connection,htmlspecialchars(trim($value)));
    }
}