<?php
$idList = '<select name="classificationId" id="classificationId">';
$length = count($classificationIds, COUNT_NORMAL);
for($i = 0; $i < $length; $i++) {
  $classification = $classifications[$i];
  $classificationId = $classificationIds[$i];
  $idList .= "<option value='$classificationId[classificationId]'";
    if(isset($invInfo)){
      if($classificationId['classificationId'] === $invInfo['classificationId']){
          $idList .= ' selected ';
      }
    }
  
  
  $idList .= ">$classification[classificationName]</option>";
}
$idList .= '</select>';

//if (($_SESSION['loggedin'] != TRUE) && ($_SESSION['clientLevel'] < 2)){
  if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('Location: /phpmotors/');
}

?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Modify vehicle listing for PHP Motors.">
    <title><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
		echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	  elseif(isset($invMake) && isset($invModel)) { 
		echo "Modify $invMake $invModel"; }?></title>
    <link rel="stylesheet" media="screen" href="../css/normalize.css">
    <link rel="stylesheet" media="screen" href="../css/home_small.css">
    <link rel="stylesheet" media="screen" href="../css/home_medium.css">

</head>
<body>
  <main>
    <header>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/headersecond.php'; ?> 
  </header>
  <nav>
    <?php echo $navList; ?> 
  </nav>
  <h1><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
		echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	  elseif(isset($invMake) && isset($invModel)) { 
		echo "Modify $invMake $invModel"; }?></h1>
  <div class="message">
    <?php
      if (isset($message)) {
      echo $message;
      }
    ?>
  </div>
  <form class="form" action="/phpmotors/vehicles/index.php" method="post">
        <label for="classificationId">Classification:</label><br>
        <?php echo $idList ?><br><br>
        <label for="invMake">Make:</label><br>
        <input type="text" id="invMake" name="invMake" <?php if(isset($invMake)){echo "value='$invMake'";} elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; } ?> required><br>
        <label for="invModel">Model:</label><br>
        <input type="text" id="invModel" name="invModel" <?php if(isset($invModel)){echo "value='$invModel'";} elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; } ?> required><br>
        <label for="invDescription">Description:</label><br>
        <input type="text" id="invDescription" name="invDescription" <?php if(isset($invDescription)){echo "value='$invDescription'";} elseif(isset($invInfo['invDescription'])) {echo "value='$invInfo[invDescription]'"; } ?> required><br>
        <label for="invImage">Image Path:</label><br>
        <input type="text" id="invImage" name="invImage"<?php if(isset($invImage)){echo "value='$invImage'";} elseif(isset($invInfo['invImage'])) {echo "value='$invInfo[invImage]'"; } ?> required><br>
        <label for="invThumbnail">Thumbnail Path:</label><br>
        <input type="text" id="invThumbnail" name="invThumbnail"<?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} elseif(isset($invInfo['invThumbnail'])) {echo "value='$invInfo[invThumbnail]'"; } ?> required><br>
        <label for="invPrice">Price:</label><br>
        <input type="number" id="invPrice" name="invPrice" <?php if(isset($invPrice)){echo "value='$invPrice'";} elseif(isset($invInfo['invPrice'])) {echo "value='$invInfo[invPrice]'"; } ?> required><br>
        <label for="invStock"># in Stock:</label><br>
        <input type="text" id="invStock" name="invStock" <?php if(isset($invStock)){echo "value='$invStock'";} elseif(isset($invInfo['invStock'])) {echo "value='$invInfo[invStock]'"; } ?> required><br>
        <label for="invColor">Color:</label><br>
        <input type="text" id="invColor" name="invColor" <?php if(isset($invColor)){echo "value='$invColor'";} elseif(isset($invInfo['invColor'])) {echo "value='$invInfo[invColor]'"; } ?> required><br>     
        <br> 
        <input type="submit" name="submit" value="Update Vehicle">
        <input type="hidden" name="action" value="updateVehicle">
        <input type="hidden" name="invId" value="
        <?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} 
        elseif(isset($invId)){ echo $invId; } ?>">
    </form>
  
  <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footersecond.php'; ?> 
  </footer>
    
  </main>
</body>
</html>