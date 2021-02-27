<?php
//This is the accounts controller


// Create or access a Session
session_start();
unset($_SESSION['message']);
//get the database connection file
require_once '../library/connections.php';
//get the main model for use as needed
require_once '../model/main-model.php';
//get the accounts model
require_once '../model/accounts-model.php';
//functions
require_once '../library/functions.php';

//calling navbar function
$classifications = getClassifications();
$navList = navBar($classifications);
;

$action = filter_input(INPUT_GET, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_POST, 'action');
 }

 switch ($action){
    case 'loginview':
      include '../view/login.php';
      break;

    case 'registerview' :
      include '../view/register.php';
      break;
    
    case 'adminview' :
      include '../view/admin.php';
      break;


    case 'logout':
      unset($_SESSION['firstname']);
      unset($_SESSION['email']);
      unset($_SESSION['clientLevel']);
      unset($_SESSION['clientData']);
      session_unset();
      session_destroy();
      header('Location: /phpmotors/');
      break;


    case 'register':
      $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
      $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
      $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
      $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
      $clientEmail = checkEmail($clientEmail);
      $checkPassword = checkPassword($clientPassword);

      //checking for existing email address
      $emailcheck = checkExistingEmail($clientEmail);
      if($emailcheck) {
        $message = '<p class="minimessage">That email address already exists. Do you want to login instead?</p>';
        include '../view/login.php';
        exit;
      }


      // Check for missing data
      if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
        $message = '<p class="minimessage">Please provide information for all empty form fields.</p>';
        include '../view/register.php';
        exit; 
      }
      $hashedpassword = password_hash($clientPassword, PASSWORD_DEFAULT);

      $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedpassword);
      if($regOutcome === 1){
        setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
        $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
        header('Location: /phpmotors/accounts/?action=loginview');
        //unset($_SESSION['message']);
        //$message = "<p class='minimessage'>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
        //include '../view/login.php';
        exit;
       } 
       else {
        $message = "<p class='minimessage'>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
        include '../view/register.php';
        exit;
       }
      break;




      case 'login':
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);
        if(empty($clientEmail) || empty($checkPassword)){
          $message = "<p class='minimessage'>Please  provide information for all empty form fields.</p>";
          include '../view/login.php';
          exit; 
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if(!$hashCheck) {
          $message = '<p class="minimessage">Please check your password and try again.</p>';
          include '../view/login.php';
          exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
        //$fullName = $clientData["clientFirstname"]." ".$clientData["clientLastname"];
        $_SESSION['fullname'] =$clientData["clientFirstname"]." ".$clientData["clientLastname"];
        $_SESSION['email'] = $clientEmail;
        $_SESSION['firstname'] = $clientData["clientFirstname"];
        $_SESSION['clientLevel'] = $clientData["clientLevel"];
        include '../view/admin.php';
        exit;
        break;



    default:
     break;
   }
?>