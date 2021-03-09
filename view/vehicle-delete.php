<?php
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
		echo "Delete $invInfo[invMake] $invInfo[invModel]";} 
	  elseif(isset($invMake) && isset($invModel)) { 
		echo "Delete $invMake $invModel"; }?></title>
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
		echo "Delete $invInfo[invMake] $invInfo[invModel]";} 
	  elseif(isset($invMake) && isset($invModel)) { 
		echo "Delete $invMake $invModel"; }?></h1>
  <div class="message">
    <?php
      if (isset($message)) {
      echo $message;
      }
    ?>
  </div>
  <form class="form" action="/phpmotors/vehicles/index.php" method="post">
        <label for="classificationId">Classification:</label><br>
        <label for="invMake">Make:</label><br>
        <input type="text" readonly id="invMake" name="invMake" <?php if(isset($invMake)){echo "value='$invMake'";} elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; } ?> required><br>
        <label for="invModel">Model:</label><br>
        <input type="text" readonly id="invModel" name="invModel" <?php if(isset($invModel)){echo "value='$invModel'";} elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; } ?> required><br>
        <label for="invDescription">Description:</label><br>
        <input type="text" readonly id="invDescription" name="invDescription" <?php if(isset($invDescription)){echo "value='$invDescription'";} elseif(isset($invInfo['invDescription'])) {echo "value='$invInfo[invDescription]'"; } ?> required><br>    
        <br> 
        <input type="submit" name="submit" value="Delete Vehicle">
        <input type="hidden" name="action" value="deleteVehicle">
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