<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Template page for PHP motors">
    <title>PHP motors template</title>
    <link rel="stylesheet" media="screen" href="../css/normalize.css">
    <link rel="stylesheet" media="screen" href="../css/500_medium.css">
    <link rel="stylesheet" media="screen" href="../css/500_small.css">
</head>
<body>
  <main>
  <header>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?> 
  </header>
  <nav>
    <?php echo $navList; ?>
  </nav>
  <h1>Server Error</h1>
  <p>Sorry our server seems to be experiencing some technical difficulties. Please check back later.</p>
  <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
  </footer>
    
  </main>
</body>
</html>