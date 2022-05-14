<?php
include "config/logic.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" integrity="sha512-UJfAaOlIRtdR+0P6C3KUoTDAxVTuy3lnSXLyLKlHYJlcSU8Juge/mjeaxDNMlw9LgeIotgz5FP8eUQPhX1q10A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="css/style.css">

  <title>PHP Blog | Update</title>

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

    <?php foreach($posts as $post) : ?>
      <form method="GET">
        <input type="text" hidden name="id" value="<?php echo $post['id']; ?>">
        <input type="text" name="title" class="form-control bg-dark text-white my-3 text-center" placeholder="Blog title" value=" <?php echo htmlspecialchars($post['title']); ?> ">
        <div class="red-text"><?php echo $errors['title']; ?></div>

        <input type="text" name="author" class="form-control bg-dark text-white my-3 text-center" placeholder="Author" value=" <?php echo htmlspecialchars($post['author']); ?> ">
        <div class="red-text"><?php echo $errors['author']; ?></div>

        <textarea name="content" id="" class="form-control bg-dark text-white my-3"><?php echo htmlspecialchars($post['content']); ?></textarea>
        <div class="red-text"><?php echo $errors['content']; ?></div>
        
        <button name="update" class="btn btn-dark">Update Post</button>
      </form>
    <?php endforeach ?>
  </div>

</body>
</html>