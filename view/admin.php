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
  <p>
  <h2>Account Management</h2>
  <?php
    if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
    }
  ?>
  
    <?php
    if ($_SESSION['clientLevel'] > 2){
        echo "<p class='minimessage'>Use this link to manage the inventory.</p>";
        echo "<a class='bigbutton' href='../vehicles/index.php?action=adminview'>Vehicle Management</a><br>";
    }
    ?>
    <p class="minimessage">Use this link to update account information.</p>
    <a class='bigbutton' href='../accounts/index.php?action=updateview'>Update Account</a>
  <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footersecond.php'; ?> 
  </footer>
    
  </main>
</body>
</html>