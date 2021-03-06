<?php
    //if (($_SESSION['loggedin'] != TRUE) && ($_SESSION['clientLevel'] < 2)){
    if ($_SESSION['clientData']['clientLevel'] < 2) {
        header('Location: /phpmotors/');
    }
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manage vehicle classifications and vehicle postings for PHP Motors.">
    <title>PHP motors Vehicle Management</title>
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
  <h1>Vehicle Management</h1>
  <div class="message">
    <?php
      if (isset($message)) {
      echo $message;
      }
    ?>
  </div>
  <br>
  <br>
  <div class="buttons">
    <a class="bigbutton" href="/phpmotors/vehicles/index.php?action=addClassification" title="add a vehicle classification type to the website">Add Classification</a>
      <br>
    <a class="bigbutton" href="/phpmotors/vehicles/index.php?action=registerVehicleListing" title="add a vehicle listing to the website">Add Vehicle</a>
  </div>
  <?php
    if (isset($message)) { 
    echo $message; 
    } 
    if (isset($classificationList)) { 
    echo '<h2>Vehicles By Classification</h2>'; 
    echo '<p class="minimessage">Choose a classification to see those vehicles</p>'; 
    echo $classificationList; 
    }
  ?>    
  <noscript>
  <p class="minimessage"><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
  </noscript>
  <table id="inventoryDisplay"></table>

  <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footersecond.php'; ?> 
  </footer>
    
  </main>
  <script src="../js/inventory.js"></script>
</body>
</html>