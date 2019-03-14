<?php

class DBFacade{
    private $_server = "localhost";
    private $_user = "root";
    private $_password = "agnarsson92";
    private $_dbName = "DuckDB";
    private $_connection;

    public function __construct(){

    }

    private function connectToDB(){
        $this->_connection = mysqli_connect($this->_server, $this->_user, $this->_password, $this->_dbName);
        if (mysqli_connect_errno($this->_connection)){
            die("Connection Failed: " . mysqli_connect_error());
        }
    }

    public function getProducts(){
        $this->connectToDB();
        $result = mysqli_query($this->_connection, "CALL Stored Procedure Name HERE") or die("Query Failed: " . mysqli_error());
    }
}