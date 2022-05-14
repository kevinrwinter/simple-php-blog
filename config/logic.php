<?php 

  $conn = mysqli_connect('db', 'root', 'lionPass', 'php_blog');


  if(!$conn) {
    echo '<h3 class="message-danger">Unable to establish database connection</h3>';
  }

  function convertNewlinesToParagraphs($content) {
    $escaped = htmlEscape($content);
    return '<p>' . str_replace("\n", "</p><p>", $escaped) . '</p>';
  }

  function convertSqlDate($sqlDate) {
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $sqlDate);
    return $date->format('d M Y, H:i');
  }

  function htmlEscape($html) {
    return htmlspecialchars($html, ENT_HTML5, 'UTF-8');
  }


  // READ
  $sql = "SELECT * FROM posts";
  $posts = mysqli_query($conn, $sql);

  $title = $author = $content = '';

  $errors = array('title'=>'', 'author'=>'', 'content'=>'');

  // CREATE
  if (isset($_REQUEST["new_post"])) {

    // Check title
    if (empty($_POST['title'])) {
      $errors['title'] = 'Blog title is required <br />';
    } else {
      $title = $_POST['title'];
      if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
        $errors['title'] = 'Title must be letters and spaces only';
      }
    }

    // Check author
    if (empty($_POST['author'])) {
      $errors['author'] = 'Blog author is required <br />';
    } else {
      $author = $_POST['author'];
      if (!preg_match('/^[a-zA-Z\s]+$/', $author)) {
        $errors['author'] = 'Author must be letters and spaces only';
      }

    }
    // Check content
    if (empty($_POST['content'])) {
      $errors['content'] = 'Blog content is required <br />';
    } else {
      $content = $_POST['content'];
    }

    // Check for errors before redirect
    if (array_filter($errors)) {
      // filter method returns false if string values empty
    } else {
      $title = mysqli_real_escape_string($conn, $_REQUEST["title"]);
      $author = mysqli_real_escape_string($conn, $_REQUEST["author"]);
      $content = mysqli_real_escape_string($conn, $_REQUEST["content"]);

      $sql = "INSERT INTO posts(title, author, content) VALUES('$title', '$author', '$content')";
      mysqli_query($conn, $sql);

      header("Location: index.php?info=added");
      exit();
    }
  }


  // Fetch data to update
  if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM posts WHERE id = $id";
    $posts = mysqli_query($conn, $sql);
  }

  // UPDATE
  if (isset($_REQUEST['update'])) {
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $title = mysqli_real_escape_string($conn, $_REQUEST["title"]);
    $author = mysqli_real_escape_string($conn, $_REQUEST["author"]);
    $content = mysqli_real_escape_string($conn, $_REQUEST["content"]);

    $sql = "UPDATE posts SET title = '$title', author = '$author', content = '$content' WHERE id = $id";
    mysqli_query($conn, $sql);

    header("Location: index.php?info=updated");
    exit();
  }

  // DELETE
  if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['id'];

    $sql = "DELETE FROM posts WHERE id = $id";
    $posts = mysqli_query($conn, $sql);

    header("Location: index.php?info=deleted");
    exit();
  }

?>