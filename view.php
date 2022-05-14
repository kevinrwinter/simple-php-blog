<?php
include "config/logic.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Materialize CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" integrity="sha512-UJfAaOlIRtdR+0P6C3KUoTDAxVTuy3lnSXLyLKlHYJlcSU8Juge/mjeaxDNMlw9LgeIotgz5FP8eUQPhX1q10A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="./css/style.css">

  <title>PHP Blog | Read</title>
</head>
<body class="grey lighten-4">
  <nav class="white ">
    <div class="container">
      <a href="index.php" class="brand-logo brand-text">PHP Blog</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
      </ul>
    </div>
  </nav>

  <div class="container grey-text">

    <?php foreach($posts as $post) : ?>
      <div class="center">
        <h1> <?php echo htmlEscape($post['title']); ?> </h1>
      </div>
      <p> Posted by <?php echo htmlEscape($post['author']); ?> on <?php echo convertSqlDate($post['created_at']); ?> </p>
      <p> <?php echo convertNewlinesToParagraphs($post['content']); ?> </p>

      <div class="center">
        <div class="d-flex flex-row mt-2 justify-content-center align-items-center">
          <a href="edit.php?id=<?php echo $post['id']; ?>" class="btn btn-light btn-sm">Edit</a>

          <form action="" method="POST">
            <input type="text" hidden name="id" value="<?php echo $post['id']; ?>">
            <button class="btn btn-danger btn-sm ml-2" name="delete">Delete</button>
          </form>
        </div>
      </div>

    <?php endforeach ?>

  </div>
</body>
</html>