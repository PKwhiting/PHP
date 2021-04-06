<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Homepage for PHP motors.">
    <title>PHP motors homepage</title>
    <link rel="stylesheet" media="screen" href="css/normalize.css">
    <link rel="stylesheet" media="screen" href="css/home_small.css">
    <link rel="stylesheet" media="screen" href="css/home_medium.css">
    
</head>
<body>
  <main>
    <header>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?> 
  </header>
  <nav>
    <?php echo $navList; ?>
  </nav>
  <h1>Welcome to PHP Motors!</h1>
  <div id="mainblock">
  <img src="images/vehicles/delorean.jpg" alt="image of DMC Delorean">
    <div id="amenities">
      <h2>DMC Delorean</h2>
      <ul>
        <li>3 Cup holders</li>
        <li>Superman doors</li>
        <li>Fuzzy dice!</li>
      </ul>
    </div>
    <a href="index.php" class="bigbutton" title="View DMC Deloran and all of its features.">Own Today!</a>
  </div>
  <div id="review_upgrades">
    <div id="reviews">
      <h2>DMC Delorean Reviews</h2>
      <ul>
        <li>"So fast it's almost like traveling in time." (4/5)</li>
        <li>"Coolest ride on the road." (4/5)</li>
        <li>"I'm feeling like Marty McFly!" (5/5)</li>
        <li>"The most futuristic ride of our day." (5/5)</li>
        <li>"80's living and I love it!" (5/5)</li>
      </ul>
    </div>
    
    <div>
    <h2>Delorean Upgrades</h2>
      <div id="upgrades">
        <div class="upgradeitems">
          <div class="itemimage"><img src="images/upgrades/flux-cap.png" alt="image of flux capacitor"></div>
          <a href="index.php">Flux Capacitor</a>
          </div>
          <div class="upgradeitems">
          <div class="itemimage"><img src="images/upgrades/flame.jpg" alt="image of flame decal"></div>
          <a href="index.php">Flame Decals</a>
          </div>
          <div class="upgradeitems">
          <div class="itemimage"><img src="images/upgrades/bumper_sticker.jpg" alt="image of bumper sticker"></div>
          <a href="index.php">Bumper Stickers</a>
          </div>
          <div class="upgradeitems">
          <div class="itemimage"><img src="images/upgrades/hub-cap.jpg" alt="image of hub caps"></div>
          <a href="index.php">Hub Caps</a>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
  </footer>
    
  </main>
</body>
</html>