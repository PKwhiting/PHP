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
    $navList .= "<li><a href='/phpmotors/' title='View the home page'>Home</a></li>";
    $length = count($classifications, COUNT_NORMAL);
    for($i = 0; $i < $length; $i++) {
    $classification = $classifications[$i];
    $navList .= "<li><a href='/phpmotors/vehicles/?action=classification&classificationName=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
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

    //build the category display page
function buildVehiclesDisplay($vehicles){
    
    $dv = '<ul id="inv-display">';
 foreach ($vehicles as $vehicle) {
    $invPrice = number_format($vehicle["invPrice"]);
    $dv .= '<li>';
    $dv .= "<a href='/phpmotors/vehicles/?action=vehicleinfo&invId=$vehicle[invId]' ><img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'></a>";
    $dv .= '<hr>';
    $dv .= "<h2><a href='/phpmotors/vehicles/?action=vehicleinfo&invId=$vehicle[invId]'>$vehicle[invMake] $vehicle[invModel]</a></h2>";
    $dv .= "<span>$$invPrice</span>";
    $dv .= '</li>';
    }
    $dv .= '</ul>';
    return $dv;
        
    }
function buildvehicleDisplay($item){
    $invPrice = number_format($item["invPrice"]);
    $dv = "<h1>$item[invMake] $item[invModel]</h1>";
    $dv .= "<div id='carinfo'>";
    $dv .= "<div id='ih'>";
    $dv .= "<img src='$item[invImage]' alt='Image of $item[invMake] $item[invModel] on phpmotors.com'>";
    $dv .= "</div><div id='stats'>";
    $dv .= "<h3>Price: $$invPrice</h3>";
    $dv .= "<h3>$item[invMake] $item[invModel] Details:</h3>";
    $dv .= "<p>$item[invDescription]</p>";
    $dv .= '<ul>';
    $dv .= "<li><b>Color:</b> $item[invColor]</li>";
    $dv .= "<li><b># in Stock:</b> $item[invStock]</li>";
    $dv .= '</ul>';
    $dv .= "</div>";
    $dv .= "</div>";
    return $dv;
}
?>