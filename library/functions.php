<?php

function checkEmail($clientEmail){
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}

function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
    return preg_match($pattern, $clientPassword);
}

//creates list for navigation
function navBar($classifications){
    $navList = '<ul>';
    $length = count($classifications, COUNT_NORMAL);
    for($i = 0; $i < $length; $i++) {
    $classification = $classifications[$i];
    $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';
    return $navList;
}



    // Build the classifications select list 
function buildClassificationList($classifications,$classificationIds){ 
    $classificationList = '<select name="classificationId" id="classificationList">'; 
    $classificationList .= "<option>Choose a Classification</option>"; 

    $length = count($classificationIds, COUNT_NORMAL);
    for($i = 0; $i < $length; $i++) {
        $classification = $classifications[$i];
        $classificationId = $classificationIds[$i];
        $classificationList .= "<option value='$classificationId[classificationId]'>$classification[classificationName]</option>"; 
    }
    // foreach ($classifications as $classification) { 
    //  $classificationList .= "<option value='$classificationIds[classificationId]'>$classification[classificationName]</option>"; 
    // } 
    $classificationList .= '</select>'; 
    return $classificationList; 
   }
?>