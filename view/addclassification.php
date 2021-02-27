<?php
    if (($_SESSION['loggedin'] != TRUE) && ($_SESSION['clientLevel'] < 2)){
        header('Location: /phpmotors/');
    }
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Add vehicle classifications for PHP Motors.">
    <title>PHP motors add car classification</title>
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
  <h1>Add Car Classification</h1>
  <div class="message">
    <?php
      if (isset($message)) {
      echo $message;
      }
    ?>
  </div>
  
  <form class="form" action="/phpmotors/vehicles/index.php" method="post">
        <label for="classificationName">Classification Name:</label><br>
        <input type="text" id="classificationName" name="classificationName" required><br>
        <br>
        <input class="submit" type="submit" value="Add Classification">
        <input type="hidden" name="action" value="newClassification">
  </form>
  
  <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footersecond.php'; ?> 
  </footer>
    
  </main>
</body>
</html>