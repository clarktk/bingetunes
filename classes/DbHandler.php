<?php

/*
 * DbHandler.php
 * Class to handle all database operations
 * This class will have the CRUD methods
 * C - Create
 * R - Read
 * U - Update
 * D - Delete
 */

/**
 * Description of DbHandler
 *
 * @author mwilliams
 */
class DbHandler {
    //private connection variable
    private $conn;
    
    //Class constructor - runs when class is initialized
    function __construct() {
        require_once dirname(__FILE__).'/DbConnect.php';
        
        //open new database connection
        try{
            $db = new DbConnect();//instantiate the DbConnect class
            $this->conn = $db->connect();
        } catch (Exception $ex) {
            $this::dbConnectError($ex->getCode());
            exit();//unconditionally stop processing

        }   
        
    }//end of constructor
    
    private static function dbConnectError($code){
        switch($code){
            case 1045:
                echo 'A database access error has occured! Please try again later';
                break;
            case 2002:
                echo 'A database server error has occured! Please try again later';
                break;
            default:
                echo 'An error has occured!  Please try again later';
                break;
        }
    }//end of dbConnectError function
    
   
}

//end of class