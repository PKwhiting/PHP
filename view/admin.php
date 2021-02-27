<?php
    if ($_SESSION['loggedin'] != TRUE){
        header('Location: /phpmotors/accounts/?action=login');
    }
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin page for PHP motors">
    <title>PHP motors Admin</title>
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
  <h1><?php echo $_SESSION['fullname'] ?></h1>
  <p class="minimessage">You are logged in.</p>
  <ul class="list">
    <li>Email:  <?php echo $_SESSION['email']?></li>
    <li>Client Level:  <?php echo $_SESSION['clientLevel']?></li>
  </ul>
  <p>
    <?php
    if ($_SESSION['clientLevel'] > 2){
        echo "<a class='bigbutton' href='../vehicles/index.php?action=vehicleadmin'>Vehicle Management</a>";
    }
    ?>
  </p>
  <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footersecond.php'; ?> 
  </footer>
    
  </main>
</body>
</html>