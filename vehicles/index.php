<?php

//This is the vehicles controller


// Create or access a Session
session_start();
unset($_SESSION['message']);


//get the database connection file
require_once '../library/connections.php';
//get the main model for use as needed
require_once '../model/main-model.php';
//get the vehicle model 
require_once '../model/vehicle-model.php';
//get the accounts model
require_once '../model/accounts-model.php';
//functions
require_once '../library/functions.php';

//get the array of classifications from DB using model
$classifications = getClassifications();
//get the array of classification Id's from DB using model
$classificationIds = getClassificationid();



//calling navbar function
$classifications = getClassifications();
$navList = navBar($classifications);



$action = filter_input(INPUT_GET, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_POST, 'action');
 }

switch ($action){
    case 'addClassification':
      include '../view/addclassification.php';
      break;

    case 'registerVehicleListing':
      include '../view/addvehicle.php';
      break;

      case 'vehicleadmin':
        include '../view/vehiclemanagement.php';
        break;

    case 'newClassification':
    $classificationName = filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_STRING);
    // Check for missing data
    if(empty($classificationName)){
      $message = '<p class="minimessage">Please provide information for all empty form fields.</p>';
      include '../view/addclassification.php';
      exit; 
    }

    $regOutcome = regVehicleClassification($classificationName);
    if($regOutcome === 1){
      $classifications = getClassifications();
      $navList = navBar($classifications);
      $message = "<p class='minimessage'>Thanks for adding the $classificationName classification.</p>";
      include '../view/vehiclemanagement.php';
      exit;
     } 
     else {
      $message = "<p>Sorry but the registration failed. Please try again.</p>";
      include '../view/addclassification.php';
      exit;
     }
    break;





    case 'registerVehicle':
    $classificationId = filter_input(INPUT_POST, 'classificationId');
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
    $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
    $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
    $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT);
    $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_STRING);
    $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);

    // Check for missing data
    if(empty($classificationId)|| empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)){
      $message = '<p class="minimessage">Please provide information for all empty form fields.</p>';
      include '../view/addvehicle.php';
      exit; 
    }

    $regOutcome = regVehicleListing($classificationId,$invMake,$invModel,$invDescription,$invImage,$invThumbnail,$invPrice,$invStock,$invColor);
    if($regOutcome === 1){
      $message = "<p class='minimessage'>Thanks for registering your $invMake $invModel.</p>";
      include '../view/vehiclemanagement.php';
      exit;
     } 
     else {
      $message = "<p class='minimessage'>Sorry but the registration failed. Please try again.</p>";
      include '../view/addvehicle.php';
      exit;
     }
    break;

    default:
     include '../view/vehiclemanagement.php';
   }





    
?>