<?php

/*
 * DbConnect.php
 * Database Connection class
 * and open the template in the editor.
 */

/**
 * Description of DbConnect
 *
 * @author mwilliams
 */
class DbConnect {
    //create private variables
    private $conn;
    
    function __construct() {
        //empty constructor 
    }
     
    
    /**
     * Establish database connection
     * @return database connection handler
     */  
    function connect(){
//        include_once dirname($_SERVER['DOCUMENT_ROOT']).'/2016_bingetunes/includes/config.php';
        include_once './classes/config.php';
        //c:/xampp/2016_dbconn/2016_oop_connect.php
        
        //make the connection
        $this->conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER,DB_PASSWORD);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//throw exceptions
        
        
        //return the connection resource
        return $this->conn;
        
    }
}
