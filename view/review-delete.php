<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Homepage for PHP motors.">
    <title>Vehicle Review Delete | PHP Motors, Inc.</title>
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
  <h1>Delete Review</h1>

    <p class="minimessage">Reviewed on <?php echo date($reviewInfo['reviewDate']); ?>
    <p class='emergencymessage'>Deletes cannot be undone. Are you sure you want to delete this review?</p>
    <div class="box">
    <label for="deleteText"><b>Review:</b> <p id="deleteText"><?php echo $reviewInfo['reviewText']; ?>
    </label><br>
    </div>
    <a class="bigbutton" href="/phpmotors/reviews/index.php?action=deleteReview&id=<?php echo $reviewId ?>">Delete</a>

<footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footersecond.php'; ?> 
  </footer>
    
  </main>
</body>
</html>