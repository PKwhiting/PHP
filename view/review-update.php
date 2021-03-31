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
  <h1>Edit Review</h1>
 <form class='form' method="post" action="/phpmotors/reviews/index.php">
    <label for='screenName' value='Screen Name:'>Screen Name:<br>
    <input id='screenName' value='<?php echo strtoupper($_SESSION['initial']); echo $_SESSION['lastname'] ?>' readonly><br>
    </label>
    <label for='text' value='Review:'>Review:<br>
    <textarea id='text' name="reviewText"><?php echo $text; ?></textarea>
    </label><br>
    <input type="hidden" name="reviewId" value="<?php echo $reviewId?>">
    <input type='submit' name='submit' id='upubtn' value='Update Review'>
    <input type='hidden' name='action' value='updateReview'>
    </form>

<footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footersecond.php'; ?> 
  </footer>
    
  </main>
</body>
</html>