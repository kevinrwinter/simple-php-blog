<?php
include "config/logic.php";
?>

<?php  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Materialize CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" integrity="sha512-UJfAaOlIRtdR+0P6C3KUoTDAxVTuy3lnSXLyLKlHYJlcSU8Juge/mjeaxDNMlw9LgeIotgz5FP8eUQPhX1q10A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="css/style.css">

  <title>PHP Blog | Home</title>

</head>
<body grey lighten-4>
  <nav class="white ">
    <div class="container">
      <a href="index.php" class="brand-logo brand-text">PHP Blog</a>
      <ul id="nav-mobile" class="right">
        <li><a href="create.php" class="btn brand">New post</a></li>
      </ul>
    </div>
  </nav>

  <h1>Simple blog site with PHP & MySQL</h1>

  <div class="container mt-5">

    <!-- Display successful post message -->
    <?php if(isset($_REQUEST['info'])) { ?>
      <?php if ($_REQUEST['info'] == "added") { ?>
        <div class="message message-success" role="alert">Blog post added successfully</div>
      <!-- Display successful update message -->
      <?php }elseif ($_REQUEST['info'] == "updated") { ?>
        <div class="message message-success" role="alert">Blog post updated successfully
        </div>
      <!-- Display successful update message -->
      <?php }elseif ($_REQUEST['info'] == "deleted") { ?>
        <div class="message message-danger" role="alert">Blog post deleted successfully
        </div>
      <?php } ?>
    <?php } ?>

    <div class="row">
      <?php foreach($posts as $post) : ?>
        <div class="col s6 md3">
          <div class="card">
            <div class="card-content content">
              <h6><?php echo htmlspecialchars($post['title']); ?></h6>
              <p><?php echo htmlspecialchars($post['content']); ?></p>
            </div>
            <div class="card-action right-align">
              <a href="view.php?id=<?php echo$post['id']; ?>" class="btn ">Read more</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>

</body>
</html>