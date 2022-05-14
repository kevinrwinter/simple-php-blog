<?php
include "config/logic.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Materialize CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" integrity="sha512-UJfAaOlIRtdR+0P6C3KUoTDAxVTuy3lnSXLyLKlHYJlcSU8Juge/mjeaxDNMlw9LgeIotgz5FP8eUQPhX1q10A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="css/style.css">

  <title>PHP Blog | Create</title>
</head>
<body class="grey lighten-4">
  <nav class="white ">
    <div class="container">
      <a href="index.php" class="brand-logo brand-text">PHP Blog</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
      </ul>
    </div>
  </nav>

  <div class="container mt-5">
    <form class="white post-form" method="POST">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>" placeholder="Blog title">
        <div class="red-text"><?php echo $errors['title']; ?></div>
      </div>

      <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" id="author" value="<?php echo htmlspecialchars($author); ?>" placeholder="Blog author">
        <div class="red-text"><?php echo $errors['author']; ?></div>
      </div>

      <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" placeholder="Blog body text"></textarea>
        <div class="red-text"><?php echo $errors['content']; ?></div>
      </div>

      <div class="form-group">
        <button name="new_post" class="btn btn-dark">Add Post</button>
      </div>
    </form>

  </div>
</body>
</html>