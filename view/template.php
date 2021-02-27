<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Template page for PHP motors">
    <title>PHP motors template</title>
    <link rel="stylesheet" media="screen" href="css/normalize.css">
    <link rel="stylesheet" media="screen" href="css/template_small.css">
    <link rel="stylesheet" media="screen" href="css/template_medium.css">

</head>
<body>
  <main>
    <header>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?> 
  </header>
  <nav>
    <?php echo $navList; ?> 
  </nav>
  <h1>Content Title Here</h1>
  <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
  </footer>
    
  </main>
</body>
</html>