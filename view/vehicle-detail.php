<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Homepage for PHP motors.">
    <title>Vehicle Details | PHP Motors, Inc.</title>
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
  <?php if(isset($message)){
  echo $message; }
  ?>
    <?php if(isset($vehicleInfoDisplay)){echo $vehicleInfoDisplay;} ?>
  <hr>
  <h2>Customer Reviews</h2>
  <?php
    if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
    }
    if ($_SESSION){
        if(!isset($reviews)){echo '<p class="minimessage">Be the first to add a review!';}
        echo $form;
    }else{
      $display = "<p class='minimessage'>You must <a href='/phpmotors/accounts/index.php?action=loginview'>login</a> to write a review.";
      echo $display;
    }
?>



  <?php if(isset($reviews)){echo $reviews;} ?>


  <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footersecond.php'; ?> 
  </footer>
    
  </main>
</body>
</html>