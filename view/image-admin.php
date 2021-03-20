<?php
    if ($_SESSION['clientData']['clientLevel'] < 2) {
        header('Location: /phpmotors/');
        exit;
    }


    if (isset($_SESSION['message'])) {
      $message = $_SESSION['message'];
     }
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manage vehicle images for PHP Motors.">
    <title>PHP motors Image Management</title>
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
  <h1>Image Management</h1>
  <div class="minimessage">Choose one of the options below:
  </div>
  <br>
  <br>
  <h2>Add New Vehicle Image</h2>
<?php
 if (isset($message)) {
  echo $message;
 } ?>

<form class="form" action="/phpmotors/uploads/" method="post" enctype="multipart/form-data">
 <label for="invItem">Vehicle:</label><br>
	<?php echo $prodSelect; ?><br><br>
	<fieldset>
		<label>Is this the main image for the vehicle?</label>
		<label for="priYes" class="pImage">Yes</label>
		<input type="radio" name="imgPrimary" id="priYes" class="pImage" value="1">
		<label for="priNo" class="pImage">No</label>
		<input type="radio" name="imgPrimary" id="priNo" class="pImage" checked value="0">
	</fieldset>
 <label>Upload Image:</label>
 <input type="file" name="file1">
 <input type="submit" class="bigbutton" value="Upload">
 <input type="hidden" name="action" value="upload">
</form>
<hr>
<h2>Existing Images</h2>
<p class="minimessage">If deleting an image, delete the thumbnail too and vice versa.</p>
<?php
 if (isset($imageDisplay)) {
  echo $imageDisplay;
 } ?>


  <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footersecond.php'; ?> 
  </footer>
    
  </main>
  <script src="../js/inventory.js"></script>
</body>
</html>
<?php unset($_SESSION['message']); ?>