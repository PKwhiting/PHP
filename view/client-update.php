<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Update account information for PHP Motors">
    <title>PHP Motors Account Information Update</title>
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
  <h1>Update Account Information</h1>
  <h2 class="required">*All fields are required</h2>
    <?php
        if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        }
        $clientFirstname = $_SESSION['firstname'];
        $clientLastname = $_SESSION['lastname'];
        $clientEmail = $_SESSION['email'];
        $clientId = $_SESSION['clientId'];
        
    ?>

    <form class="form" action="/phpmotors/accounts/index.php" method="post">
        <label for="fName">First name:</label><br>
        <input type="text" id="fName" name="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?> required><br>
        <label for="lName">Last name:</label><br>
        <input type="text" id="lName" name="clientLastname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?> required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required placeholder="Enter a valid email address"><br>
        <br>
        <input type="submit" name="submit" id="upubtn" value="Update Account">
        <input type="hidden" name="action" value="updateaccount">
        <br>
    </form>
    <h2>Update Password</h2>
    <form class="form" action="/phpmotors/accounts/index.php" method="post">
        <label for="password">Password:</label><br>
        <span class="passwordmessage">Password must be at least 8 characters long and contain at least 1 number, 1 capital letter, and 1 special character</span>
        <br>
        <input type="password" id="password" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
        <br>
        <input type="submit" name="submit" id="uppbtn" value="Update Password">
        <input type="hidden" name="action" value="updatepassword">
    </form>
  <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footersecond.php'; ?> 
  </footer>
</main>
</body>
</html>