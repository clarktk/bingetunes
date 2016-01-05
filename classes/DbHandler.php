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
                echo '<BR>'.$code;
                break;

        }
    }//end of dbConnectError function
    
    public function createUser($first_name, $last_name, $email, $user_name, $password){
        //Get pass hash script
        require_once 'PassHash.php';
        
        //create an array for response return
        $response = array();
        
        //First check to see if user already exists (via email)
        if(!$this->isUserExists($email)){
            //user account does not exist - create it
            //Make a hashed password based on user inputted password
           $password_hash = PassHash::hash($password);
           
           //make user activation code 
           $active = md5(uniqid(rand(),true));
           
           //prepare insert statement
           $stmt = $this->conn->prepare("INSERT INTO user    
    (first_name, last_name, email, user_name, password, date_expires, active)
    VALUES (:fname, :lname, :email, :uname, :password, SUBDATE(NOW(), INTERVAL 1 DAY), :active)");
          $stmt->bindValue(':email', $email, PDO::PARAM_STR);         
          $stmt->bindValue(':password', $password_hash, PDO::PARAM_STR); 
          $stmt->bindValue(':fname', $first_name, PDO::PARAM_STR); 
          $stmt->bindValue(':lname', $last_name, PDO::PARAM_STR);
          $stmt->bindValue(':uname', $user_name, PDO::PARAM_STR);
          $stmt->bindValue(':active', $active, PDO::PARAM_STR); 
                    
          $result = $stmt->execute(); 
          
          //check for success|failure
          if($result){
              //success
              $response['message']= 'USER_SUCCESSFULLY_CREATED';
              $response['active']= $active;
                      
          }else{
              //failure
              $response['message']='USER_CREATE_FAILED';
          }
            
        }else{
            //user account already exists - return message
            $response['message'] = 'USER_ALREADY_EXISTS';
        }
        
       
        //RETURN FINAL RESPONSE        
        return $response;
    }
    
    private function isUserExists($email){
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM user  
                                      WHERE email=:email");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $num_rows = $stmt->fetchColumn();
        
        //return TRUE |  FALSE
        return $num_rows>0;
        
    }
    
    public function activateUser ($email, $active){
        $response = array();
        
        if($this->isUserExists($email)){
            $stmt = $this->conn->prepare("UPDATE user SET active=NULL, date_expires = ADDDATE(date_expires, INTERVAL 1 YEAR) WHERE email=:email AND active=:active");
            $stmt->bindValue (':email',$email, PDO::PARAM_STR);
            $stmt->bindValue (':active',$active, PDO::PARAM_STR);
            $result= $stmt->execute();
            $count = $stmt->rowCount();
            if($count>0){
                $response['message']='USER_ACTIVE_SUCCESS';
            }else{
                $response['message']='USER_ACTIVE_FAIL';
            }
        }else{
            $response['message']='USER_NOT_EXIST';
        }
        return $response;
    }
    
    public function checkLogin($email_username,$password){
        //get password hash script
        require_once 'PassHash.php';
        //1. check if email and active are ok
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM user WHERE email=:email_username OR user_name=:email_username AND active IS null");
        $stmt->bindValue(':email_username',$email_username, PDO::PARAM_STR);
        $stmt->execute();
        $num_rows = $stmt->fetchColumn();
        
        if($num_rows>0){
            //email is good and activation code is empty
            //build actual query
            $stmt = $this->conn->prepare("SELECT password FROM user WHERE email=:email_username OR user_name=:email_username");
            $stmt->bindValue(':email_username',$email_username, PDO::PARAM_STR);
            $stmt->execute();
            $row= $stmt->fetch(PDO::FETCH_OBJ);
            //FETCH_OBJ:    $row->pass
            //FETCH_ASSOC:  $row->['pass']
            if(PassHash::check_password($row->password, $password)){
                //match
                return true;
            }else{
                return false;
            }
        }else{
            //no matching email
            return false;
        }
    } 
   
    public function getUserByEmail($email_username){
        try{
            $stmt =$this->conn->prepare("SELECT user_id, type, email, first_name, last_name, user_name,
                                                IF(date_expires>=NOW(),true,false) as notexpired,
                                                IF(type='admin',true,false)as admin
                                        FROM user WHERE email = :email_username or user_name =:email_username");
            $stmt->bindValue(':email_username',$email_username, PDO::PARAM_STR);
            
            if($stmt->execute()){
               $user = $stmt->fetchAll(PDO::FETCH_ASSOC) ;
               return $user;
            }else{
               return NULL;
            }
            
        } catch (Exception $ex) {
            return NULL;
        }
        
    }
}

//end of class