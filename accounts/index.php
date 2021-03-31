<?php
//This is the accounts controller


// Create or access a Session
if(session_id() == '' || !isset($_SESSION)) {
  // session isn't started
  session_start();
}
//get the database connection file
require_once '../library/connections.php';
//get the main model for use as needed
require_once '../model/main-model.php';
//get the accounts model
require_once '../model/accounts-model.php';
//get the reviews model
require_once '../model/reviews-model.php';
//get the vehicles model
require_once '../model/vehicle-model.php';
//functions
require_once '../library/functions.php';

//calling navbar function
$classifications = getClassifications();
$navList = navBar($classifications);






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
        //var_dump($clientData);
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
        $_SESSION['initial'] = $clientData["clientFirstname"][0];
        $_SESSION['lastname'] = $clientData["clientLastname"];
        $_SESSION['email'] = $clientEmail;
        $_SESSION['firstname'] = $clientData["clientFirstname"];
        $_SESSION['clientLevel'] = $clientData["clientLevel"];
        $_SESSION['clientId'] = $clientData["clientId"];
        include '../view/admin.php';
        exit;
        break;

    case 'updateview' :
      $clientId = $_SESSION['clientId'];
      //echo($clientId);
      //$clientInfo = getClietInfo($clientId);
      include '../view/client-update.php';
      break;


    case 'updateaccount' :
      $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
      $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
      $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_STRING);
      $clientId = $_SESSION['clientId'];
      $clientInfo = getClietInfo($clientId);
      
      if ($clientInfo['clientEmail'] != $clientEmail){
        $clientEmail = checkEmail($clientEmail);
        $emailcheck = checkExistingEmail($clientEmail);
        if($emailcheck) {
          $message = '<p class="minimessage">That email address already exists. Try a different Email</p>';
          $_SESSION['message'] = $message;
          include '../view/client-update.php';
          exit;
      }

      }
    
      $clientEmail = checkEmail($clientEmail);

      if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientId)){
        $message = '<p class="minimessage">Please complete all information for updating your account.</p>';
        $_SESSION['message'] = $message;
        include '../view/client-update.php';
      }


      $updateResult = updateAccount($clientId,$clientFirstname,$clientLastname,$clientEmail);
      if($updateResult){
        $_SESSION['lastname'] = $clientLastname;
        $_SESSION['email'] = $clientEmail;
        $_SESSION['firstname'] = $clientFirstname;
        $message = "<p class='minimessage'>Congratulations $clientFirstname, your account information was updated.</p>";
        $_SESSION['message'] = $message;
        include '../view/admin.php';
        exit;
      }
      else {
        $message = "<p class='minimessage'>Error. $clientFirstname your account information was not updated.</p>";
        $_SESSION['message'] = $message;
        include '../view/client-update.php';
        exit;
        exit;
      }
      


    case 'updatepassword' :
      $clientId = $_SESSION['clientId'];
      $newPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
      $checkPassword = checkPassword($newPassword);
      $clientData = getClietInfo($clientId);


      $hashCheck = password_verify($newPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
      if($hashCheck == 1) {
        $message = '<p class="minimessage">Please provide new password.</p>';
        $_SESSION['message'] = $message;
        include '../view/client-update.php';
        exit;
      }
      if(empty($checkPassword)){
        $message = '<p class="minimessage">Please check your password and try again.</p>';
        $_SESSION['message'] = $message;
        include '../view/client-update.php';
        exit; 
      }

      $hashedpassword = password_hash($newPassword, PASSWORD_DEFAULT);
      

    
      $pwordUpdate = updatePassword($clientId, $hashedpassword);
      if($pwordUpdate === 1){
        $message = "<p class='minimessage'>Your password has been succesfully updated.</p>";
        $_SESSION['message'] = $message;
        include '../view/client-update.php';
        exit;
       } 
       else {
        $message = "<p class='minimessage'>Updating your password failed.</p>";
        $_SESSION['message'] = $message;
        include '../view/client-update.php';
        exit;
       }
      break;

    default:
      // $reviewInfo = getReviewsByClient($_SESSION['clientId']);
      // $userReviews = "<ul>";
      // foreach($reviewInfo as $review){
      //   $vehicle = getInvItemInfo($review["invId"]);
      //   $userReviews .= buildReviewList($review, $vehicle);
      // };
      // $userReviews .= "</ul>";
      include '../view/admin.php';
     break;
   }
?>