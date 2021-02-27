<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login page for PHP Motors">
    <title>PHP Motors Login Page</title>
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
  <h1>Sign In</h1>
  <?php
    if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
      
    }
    if (isset($message)) {
    echo $message;
    }
  ?>
    <form class="form" method="post" action="/phpmotors/accounts/">
        <label for="clientEmail">Email:</label><br>
        <input type="email" id="clientEmail" name="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required><br>
        <label for="clientPassword">Password:</label><br>
        <input type="password" id="clientPassword" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
        <br>
        <span class="passwordmessage">Password must be at least 8 characters long and contain at least 1 number, 1 capital letter, and 1 special character</span>
        <br>
        <input class="submit" type="submit" value="login">
        <input type="hidden" name="action" value="login">
        <br>
        <a class="bigbutton" href='index.php?action=registerview' title="Login to PHP Motors account">Not a member yet?</a>
    </form>
  <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footersecond.php'; ?> 
  </footer>
</main>
</body>
</html>