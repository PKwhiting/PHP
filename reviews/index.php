<?php
#This is the reviews controller
session_start();
//get the database connection file
require_once '../library/connections.php';
//get the main model for use as needed
require_once '../model/main-model.php';
//get the vehicle model 
require_once '../model/vehicle-model.php';
//get the accounts model
require_once '../model/accounts-model.php';
//get the reviews model
require_once '../model/reviews-model.php';
//functions
require_once '../library/functions.php';
require_once '../model/uploads-model.php';

//get the array of classifications from DB using model for nav
$classifications = getClassifications();
//get the array of classification Id's from DB using model for nav
$classificationIds = getClassificationid();
//calling navbar function
$classifications = getClassifications();
$navList = navBar($classifications);



$action = filter_input(INPUT_GET, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_POST, 'action');
 }

switch ($action){//display vehicle reviews,display clients reviews,
    case 'addReview':
      $reviewText = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);
      $clientId = filter_input(INPUT_POST, 'clientId', FILTER_VALIDATE_INT);
      $invId = filter_input(INPUT_POST, 'invId', FILTER_VALIDATE_INT);
      

      // Check for missing data
      if(empty($reviewText)){
        $_SESSION['message'] = '<p class="minimessage">Review was not registered. Review must be filled out to be added.</p>';
        header('Location: /phpmotors/accounts/');
        exit; 
      }

      $regOutcome = createReview($clientId, $invId, $reviewText);
      if($regOutcome === 1){
        $_SESSION['message'] = "<p class='minimessage'>Review added successfully</p>";
        header('Location: /phpmotors/accounts/');
        exit;
      } 
      else {
        $message = "<p class='minimessage'>Sorry but the review failed to be added.</p>";
        include '../accounts/index.php';
        exit;
      }
      break;


    case 'updateReviewView':
      $reviewId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
      $reviewInfo = getReview($reviewId);
      $text = $reviewInfo['reviewText'];
      if(count($reviewInfo)<1){
        $_SESSION['message'] = 'Sorry, no review could be found.';
        header('location: /phpmotors/accounts/');
       }
       $text = $reviewInfo['reviewText'];
       include '../view/review-update.php';      
      break;


    case 'deleteReviewView':
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT);
        $reviewInfo = getReview($reviewId);
        $review = buildReviewDisplay($reviewInfo);
        if (count($invInfo) < 1) {
            $message = 'Sorry, no review could be found.';
          }
          include '../view/review-delete.php';
          exit;
          break;



    case 'updateReview':
      $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
      $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);

      // Check for missing data
      if(empty($reviewText)){
        $message = '<p class="minimessage">Please add text for review.</p>';
        include '../view/review-update.php';
        exit; 
      }
      
      $updateResult = updateReview($reviewId, $reviewText);
      if($updateResult){
        $message = "<p class='minimessage'>Congratulations, your review was updated.</p>";
        $_SESSION['message'] = $message;
        header('location: /phpmotors/accounts/');
        exit;
      } 
      else {
        $message = "<p class='minimessage'>Error. the review was not updated.</p>";
        $_SESSION['message'] = $message;
        header('location: /phpmotors/accounts/');
        exit;
      }
      
      break;



    case 'deleteReview':
      $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);

      
      $updateResult = deleteReview($reviewId, $reviewText);
      if($updateResult){
        $message = "<p class='minimessage'>Congratulations, your review was deleted.</p>";
        $_SESSION['message'] = $message;
        header('location: /phpmotors/accounts/');
        exit;
      } 
      else {
        $message = "<p class='minimessage'>Error. the review was not deleted.</p>";
        $_SESSION['message'] = $message;
        header('location: /phpmotors/accounts/');
        exit;
      }
      
      break;		

    
    
    
    
      //default statement
    default:
    header('location: /phpmotors/accounts/');
    break;
    }

?>