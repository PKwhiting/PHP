<?php
//This is the main controller

// Create or access a Session
session_start();
unset($_SESSION['message']);
//get the database connection file
require_once 'library/connections.php';
//get the main model for use as needed
require_once 'model/main-model.php';
//functions
require_once 'library/functions.php';

//calling navbar function
$classifications = getClassifications();
$navList = navBar($classifications);


$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

 // Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
   $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
  }

 switch ($action){
    case 'something':
     
     break;
    
    default:
     include 'view/home.php';
   }
?>