<?php

//Start the session
session_start();

define('BASE_URL', 'http://localhost:8888/2016_bingetunes/');

//ob_start(); //output buffering turned on
              //headers already sent errors

//makes sure the session is killed after inactivity
if(isset($_SESSION['LAST_ACTIVITY'])
        && (time() -$_SESSION['LAST_ACTIVITY']>1800)){
    //last request was more than 30 mnutes ago
    session_unset(); //unset session variable
    session_destroy();//destroy session data in storage
}

//update LAST_ACTIVITY time stamp
$_SESSION['LAST_ACTIVITY'] = time();