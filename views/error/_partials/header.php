<?php $metaTags = include __DIR__ . '../../../../resources/meta/error.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include __DIR__ . '../../../../resources/meta/general.php'; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;700;800;900&family=Poppins:wght@400;700&display=swap"
    rel="stylesheet"
    />
    <link rel="stylesheet" href="/css/app.css" />

    <meta name="description" content="<?php echo $metaTags['description']; ?>">
    <title><?php echo $metaTags['title']; ?></title>
  </head>
  <body>
